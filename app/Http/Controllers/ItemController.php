<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory = Item::paginate(20);
        return view('admin.items.index', compact('inventory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:150',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'quantity' => 'required|integer|min:1|max:500',
            ]);

            $imagePath = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // Simpan langsung dengan nama unik di storage
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images/items', $filename);

                // Simpan path-nya untuk disimpan ke DB
                $imagePath = "images/items/{$filename}";
            }

            Item::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'quantity' => $request->quantity,
            ]);

            DB::commit();
            toastr()->success('Data berhasil disimpan');
            return redirect()->route('items.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal menyimpan data, ' . $e->getMessage());
            return redirect()->route('items.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $item = Item::find($item->id);
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:150',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
                'quantity' => 'required|integer|min:1|max:500',
            ]);

            $imagePath = $item->image;

            if ($request->hasFile('image')) {
                if ($item->image && Storage::exists('public/' . $item->image)) {
                    Storage::delete('public/' . $item->image);
                }

                $file = $request->file('image');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images/items', $filename);
                $imagePath = "images/items/{$filename}";
            }

            $item->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'quantity' => $request->quantity,
            ]);

            DB::commit();
            toastr()->success('Data berhasil disimpan');
            return redirect()->route('items.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal menyimpan data, ' . $e->getMessage());
            return redirect()->route('items.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        DB::beginTransaction();
        try {
            $item->delete();
            DB::commit();
            toastr()->success('Data berhasil dihapus');
            return redirect()->route('items.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal menghapus data, ' . $e->getMessage());
            return redirect()->route('items.index');
        }
    }

    // Show the list of available items
    public function availableItems()
    {
        $items = Item::where('quantity', '>', 0)->get();
        return view('mahasiswa.itemlist', compact('items'));
    }
}
