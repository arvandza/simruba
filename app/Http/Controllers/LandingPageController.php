<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use App\Models\RoomLoan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $rooms = Room::where('status', 'available')->get();
        return view('index', compact('rooms'));
    }

    public function dashboard()
    {
        $totalRooms = Room::count();
        $totalItems = Item::count();
        $totalAvailableRoom = Room::where('status', 'available')->count();
        return view('admin.dashboard', compact('totalRooms', 'totalItems', 'totalAvailableRoom'));
    }

    public function searchRoom(Request $request)
    {
        $rooms = Room::where('status', 'available')->get();
        return view('search', compact('rooms'));
    }
}
