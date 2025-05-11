<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemLoan;
use App\Models\ItemLoanHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemLoansController extends Controller
{
    public function index()
    {
        $inventory = ItemLoan::where('status', 'pending')->paginate(20);
        return view('admin.itemloans.index', compact('inventory'));
    }

    public function requestItemLoans(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'item_id' => 'required|exists:items,id',
                'user_id' => 'required|exists:users,id',
                'start_time' => 'required|date|after_or_equal:today',
                'end_time' => 'required|date|after:start_time',
                'reason' => 'required|string',
                'quantity' => 'required|integer|min:1|max:250',
            ]);

            $item = Item::findOrFail($request->item_id);

            if ($request->quantity > $item->quantity) {
                DB::rollBack();
                toastr()->error('Jumlah peminjaman melebihi batas jumlah item yang tersedia');
                return redirect()->route('itemloans.index');
            }

            ItemLoan::create([
                'item_id' => $request->item_id,
                'user_id' => $request->user_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'reason' => $request->reason,
                'quantity' => $request->quantity,
            ]);


            $item->update([
                'quantity' => $item->quantity - $request->quantity,
            ]);

            if ($item->quantity == 0) {
                $item->update([
                    'status' => 'unavailable',
                ]);
            }

            DB::commit();
            toastr()->success('Data berhasil disimpan');
            return redirect()->route('availableitems.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal menyimpan data, ' . $e->getMessage());
            return redirect()->route('availableitems.index');
        }
    }

    public function edit(Item $itemlist)
    {
        $itemlist = Item::find($itemlist->id);
        return view('mahasiswa.request', compact('itemlist'));
    }

    public function acceptOrReject(Request $request, ItemLoan $itemLoan)
    {
        DB::beginTransaction();
        try {
            $itemLoan->update([
                'status' => $request->status,
            ]);
            $item = Item::where('id', $itemLoan->item_id)->first();

            if ($request->status === 'accepted') {
                if ($item->quantity <= 0) {
                    $item->update([
                        'status' => 'unavailable',
                    ]);
                }
            } else {
                $item->update([
                    'quantity' => $item->quantity + $itemLoan->quantity,
                    'status' => 'available',
                ]);
                $itemLoan->delete();
            }

            DB::commit();
            toastr()->success('Pengajuan telah di' . ($request->status == 'accepted' ? 'terima' : 'tolak'));

            return redirect()->route('itemloans.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Kesalahan, ' . $e->getMessage());
            return redirect()->route('itemloans.index');
        }
    }

    public function indexReturnItem()
    {
        $inventory = ItemLoan::where('status', 'accepted')->paginate(20);
        return view('admin.itemloans.return', compact('inventory'));
    }

    public function returnTheItem(ItemLoan $itemLoan)
    {
        DB::beginTransaction();
        try {
            $item = Item::where('id', $itemLoan->item_id)->first();
            $item->update([
                'quantity' => $item->quantity + $itemLoan->quantity,
                'status' => 'available',
            ]);
            // Add to history
            ItemLoanHistory::create([
                'item_id' => $itemLoan->item_id,
                'user_id' => $itemLoan->user_id,
                'start_time' => $itemLoan->start_time,
                'end_time' => $itemLoan->end_time,
                'reason' => $itemLoan->reason,
                'status' => 'returned',
                'returned_at' => now(),
            ]);
            $itemLoan->delete();
            DB::commit();
            toastr()->success('Barang telah dikembalikan');
            return redirect()->route('loanitem.retur');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal mengembalikan item, ' . $e->getMessage());
            return redirect()->route('loanitem.retur');
        }
    }
}
