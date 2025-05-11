<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomLoan;
use App\Models\RoomLoanHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomLoansController extends Controller
{
    public function index()
    {
        $room = RoomLoan::where('status', 'pending')->paginate(20);
        return view('admin.roomloans.index', compact('room'));
    }

    public function requestRoomLoans(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'room_id' => 'required|exists:rooms,id',
                'user_id' => 'required|exists:users,id',
                'start_time' => 'required|date|after_or_equal:today',
                'end_time' => 'required|date|after:start_time',
                'reason' => 'required|string',
            ]);

            $room = Room::findOrFail($request->room_id);

            if ($room->status != 'available') {
                DB::rollBack();
                toastr()->error('Ruangan tidak tersedia untuk peminjaman');
                return redirect()->route('roomloans.index');
            }

            RoomLoan::create([
                'room_id' => $request->room_id,
                'user_id' => $request->user_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'reason' => $request->reason,
            ]);

            $room->update([
                'status' => 'unavailable',
            ]);

            DB::commit();
            toastr()->success('Pengajuan peminjaman ruangan berhasil');
            return redirect()->route('roomloans.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal mengajukan peminjaman ruangan');
            return redirect()->route('roomloans.index')->with('error', 'Failed to send room loan request. ' . $e->getMessage());
        }
    }

    public function edit(Room $roomLoan)
    {
        $roomLoan = Room::find($roomLoan->id);
        return view('mahasiswa.requestroom', compact('roomLoan'));
    }

    public function acceptOrReject(Request $request, RoomLoan $roomLoan)
    {
        DB::beginTransaction();
        try {
            $roomLoan->update([
                'status' => $request->status,
            ]);
            $room = Room::findOrFail($roomLoan->room_id);

            if ($request->status === 'accepted') {
                $room->update([
                    'status' => 'unavailable',
                ]);
            } else {
                $room->update([
                    'status' => 'available',
                ]);
                $roomLoan->delete();
            }
            DB::commit();
            toastr()->success('Pengajuan telah di' . ($request->status == 'accepted' ? 'terima' : 'tolak'));
            return redirect()->route('roomloans.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Kesalahan, ' . $e->getMessage());
            return redirect()->route('roomloans.index');
        }
    }

    public function indexReturnRoom()
    {
        $room = RoomLoan::where('status', 'accepted')->paginate(20);
        return view('admin.roomloans.return', compact('room'));
    }

    public function returnTheRoom(RoomLoan $roomLoan)
    {
        DB::beginTransaction();
        try {
            $room = Room::findOrFail($roomLoan->room_id);
            $room->update([
                'status' => 'available',
            ]);
            // Add to history
            RoomLoanHistory::create([
                'room_id' => $roomLoan->room_id,
                'user_id' => $roomLoan->user_id,
                'start_time' => $roomLoan->start_time,
                'end_time' => $roomLoan->end_time,
                'reason' => $roomLoan->reason,
                'status' => 'returned',
                'returned_at' => now(),
            ]);
            $roomLoan->delete();
            DB::commit();
            toastr()->success('Ruangan telah dikembalikan');
            return redirect()->route('loanroom.return');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal mengembalikan ruangan, ' . $e->getMessage());
            return redirect()->route('loanroom.return');
        }
    }
}
