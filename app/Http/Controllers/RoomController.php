<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::paginate(20);
        return view('admin.rooms.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create');
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
                'capacity' => 'required|integer|min:1|max:100',
            ]);

            $imagePath = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // Simpan langsung dengan nama unik di storage
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images/rooms', $filename);

                // Simpan path-nya untuk disimpan ke DB
                $imagePath = "images/rooms/{$filename}";
            }

            Room::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'capacity' => $request->capacity
            ]);

            DB::commit();
            toastr()->success('Data berhasil dibuat');
            return redirect()->route('rooms.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal menambahkan data baru, ' . $e->getMessage());
            return redirect()->route('rooms.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $room = Room::find($room->id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:150',
                'description' => 'required|string',
                'capacity' => 'required|integer|min:1|max:100',
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            $imagePath = $room->image;

            if ($request->hasFile('image')) {
                if ($room->image && Storage::exists('public/' . $room->image)) {
                    Storage::delete('public/' . $room->image);
                }

                $file = $request->file('image');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images/rooms', $filename);
                $imagePath = "images/rooms/{$filename}";
            }

            $room->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'capacity' => $request->capacity
            ]);

            DB::commit();
            toastr()->success('Data berhasil diubah');
            return redirect()->route('rooms.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal mengubah data, ' . $e->getMessage());
            return redirect()->route('rooms.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        DB::beginTransaction();
        try {
            $room->delete();
            DB::commit();
            toastr()->success('Data berhasil dihapus');
            return redirect()->route('rooms.index');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Gagal menghapus data, ' . $e->getMessage());
            return redirect()->route('rooms.index');
        }
    }

    // Show the list of available rooms
    public function availableRooms()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('mahasiswa.roomlist', compact('rooms'));
    }
}
