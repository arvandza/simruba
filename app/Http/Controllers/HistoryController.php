<?php

namespace App\Http\Controllers;

use App\Models\ItemLoanHistory;
use App\Models\RoomLoanHistory;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function indexRoom()
    {
        $roomHistory = RoomLoanHistory::paginate(20);
        return view('admin.roomloans.history', compact('roomHistory'));
    }
    public function indexItem()
    {
        $itemHistory = ItemLoanHistory::paginate(20);
        return view('admin.itemloans.history', compact('itemHistory'));
    }
}
