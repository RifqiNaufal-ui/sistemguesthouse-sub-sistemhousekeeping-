<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Room;

class RoomController extends Controller
{
    public function index(){
        $title = 'Room Page';
        $data = Room::get();
        $rooms = Room::all();

        return view('room.index',compact('title','data','rooms'));
    }

    public function add(){
        $title = 'Add Room ';

        return view('room.add',compact('title'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'roomType'=>'required',
            'numberRoom'=>"required|unique:rooms|max:255",
            'price'=>'required',
            'code'=>'required'
        ]);

        $data['id'] = $request->id;
        $data['roomType'] = $request->roomType;
        $data['numberRoom'] = $request->numberRoom;
        $data['price'] = $request->price;
        $data['code'] = $request->code;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        \Session::flash('sukses','Successfully Adding Data');

        Room::insert($data);

        return redirect('room');
    }

    public function edit($id){
        $dt = Room::find($id);
        $title = "Edit Room Number $dt->numberRoom";

        return view('room.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'roomType'=>'required',
            'price'=>'required',
            'code'=>'required'
        ]);
        
       	$data['roomType'] = $request->roomType;
        // $data['numberRoom'] = $request->numberRoom;
        $data['price'] = $request->price;
        $data['code'] = $request->code;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Room::where('id',$id)->update($data);

        \Session::flash('sukses','Successfully Updated Data');

        return redirect('room');
    }

    public function delete($id){
        try {
            Room::where('id',$id)->delete();

            \Session::flash('sukses','Successfully Deleted Data');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('room');
    }

    public function laporan()
    {   
        $data = Room::all();

        return view('room.laporan',compact('data'));       
    }
}
