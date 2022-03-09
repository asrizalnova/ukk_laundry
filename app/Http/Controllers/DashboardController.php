<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function Dashboard(){
        $outlet = Outlet::all();
        $paket = Paket::all();
        $member = Member::all();
        $transaksi = Transaksi::where('status', '=', 'proses')->get();

        return view('Dashboard', compact('outlet','paket','member','transaksi'));

    }
}
