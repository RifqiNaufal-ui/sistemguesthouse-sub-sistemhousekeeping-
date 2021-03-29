<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\OrderrDetail;
use App\ControlDetails;
use DB;

class Dashboard_controller extends Controller
{
    public function index(){
    	$title = 'Dashboard Admin';
    	$rooms = Room::get();
    	$quantitys = DB::table('orderr_details')->get()->sum('quantity');
    	$dirtys = DB::table('control_details')->get()->sum('dirty');
    	$cleans = DB::table('control_details')->get()->sum('clean');
    	return view('dashboard.index',compact('title', 'rooms', 'quantitys', 'dirtys', 'cleans'));
    }
}
