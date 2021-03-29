<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Packages;
use App\Drycleanings;
use App\DrycleaningDetails;
use App\Room;
use DB;
// use Illuminate\Support\Facades\DB;

use PDF;

class DrycleaningController extends Controller
{
    public function index()
    {
		$title = 'Proses In Out Laundry / Dry Cleaning Page';
        $drycleanings = Drycleanings::all();
        $rooms = Room::all();
        $data = Drycleanings::join('rooms','room_id','=','rooms.id')
                ->select('rooms.id','rooms.numberRoom')->distinct()->get();

        return view('drycleanings.index', compact('drycleanings', 'title', 'rooms','data'));
    }

    public function show($id)
    {       
        $drycleanings = Drycleanings::find($id);
        $title = "Proses In Out Laundry / Dry Cleaning Details";
        $drycleaning_details = DrycleaningDetails::where('drycleanings_id','=',$id)->get();

        //dd($drycleaning_details->drycleanings());
        return view('drycleanings.show',compact('title','drycleanings','drycleaning_details'));
    }

    public function laporan($id)
    {   
        $drycleanings = Drycleanings::where('id','=',$id)->get();
        $drycleaning_details = DrycleaningDetails::where('drycleanings_id','=',$id)->get();
        $packages = Packages::where('id','=',$id)->get();
        $customPaper = array(0,0,400.00,283.80);

        // $pdf = PDF::loadview('drycleanings.laporan', compact('drycleanings', 'drycleaning_details', 'packages', 'customPaper', 'pdf'))->setPaper($customPaper, 'landscape');
        //     return $pdf->stream();
        
        return view('drycleanings.laporan', compact('drycleanings', 'drycleaning_details', 'packages', 'customPaper', 'pdf'));
    }

    public function add()
    {
    	$title = 'Add Proses In Out Laundry / Dry Cleaning';
        $packages = Packages::all();
		$getid = DrycleaningDetails::all();
		$rooms = Room::orderBy('numberRoom','asc')->get();

        return view('drycleanings.add')->with('packages', $packages)->with('drycleanings', $getid)->with('orderby', $getid)->with('title', $title)->with('rooms', $rooms);
    }

    public function store(Request $request)
    {

        $title = 'Add Proses In Out Laundry / Dry Cleaning';
        $drycleanings = new Drycleanings;
        $input = $request->all();
        $drycleanings->name = $request->get('name');
        $drycleanings->room_id = $request->get('room_id');
        $drycleanings->total = $request->get('total');
        $drycleanings->date = $request->get('date');
        $drycleanings->save();
        $j = $drycleanings->id;
        if($j > 0){
            for($id = 0; $id < count($input['package_id']); $id++){
                $drycleaning_details = new DrycleaningDetails;
                $drycleaning_details->drycleanings_id = $j;
                $drycleaning_details->package_id = $input['package_id'][$id];
                $drycleaning_details->quantity = $input['qty'][$id];
                $drycleaning_details->unitprice = $input['price'][$id];
                $drycleaning_details->amount = $input['amount'][$id];
                $drycleaning_details->save();
            }
            
        }
        $packages = Packages::all();
        $drycleaning_details = DrycleaningDetails::where('drycleanings_id', $drycleanings->id)->get();
        $orderby = Drycleanings::where('id', $drycleanings->id)->get();
        $rooms = Room::orderBy('numberRoom','asc')->get();

        \Session::flash('sukses','Successfully Adding Data');

        return redirect('drycleanings')->with('drycleanings', $drycleaning_details)->with('packages', $packages)->with('orderby', $orderby)->with('title', $title)->with('rooms', $rooms);     
    }

     public function edit($id){
        $packages = Packages::all();
        $getid = DrycleaningDetails::all();
        $rooms = Room::orderBy('numberRoom','asc')->get();
        $drycleanings = Drycleanings::find($id);
        $title = "Edit Proses In Out Laundry / Dry Cleaning $drycleanings->name";
        $drycleaning_details = DrycleaningDetails::where('drycleanings_id','=',$id)->get();

        return view('drycleanings.edit')->with('packages', $packages)->with('drycleanings', $getid)->with('orderby', $getid)->with('title', $title)->with('rooms', $rooms)->with('drycleanings', $drycleanings)->with('drycleaning_details', $drycleaning_details);
    }

     public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required',
            'room_id'=>'required'
        ]);

        // dd($request->all());

        $dataUpdateDrycleanings = $request->only('name', 'room_id','total','date');

        $drycleanings = Drycleanings::find($id);
        $drycleanings->update($dataUpdateDrycleanings);

        if ($request->package_id > 0) {
            foreach ($request->package_id as $key => $value) {
                $data = [
                    'drycleanings_id' => $drycleanings->id,
                    'package_id' => $request->package_id[$key],
                    'quantity' => $request->qty[$key],
                    'unitprice' => $request->price[$key],
                    'amount' => $request->amount[$key]
                ];
                // DrycleaningDetails::updateOrCreate([
                //     'package_id' => $request->package_id[$key]
                // ], $data);

                DB::table('drycleaning_details')->where('id', $request->idDetailDrycleanings[$key])->update($data);
            }
        }   

        \Session::flash('sukses','Successfully Updated Data');

       return redirect('drycleanings');     
    }

    public function destroy($id)
    {
        Drycleanings::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

     public function delete($id)
    {
        DrycleaningDetails::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

    public function hapus()
    {   
        DrycleaningDetails::truncate();
        
        \Session::flash('sukses','Successfully Deleted Data');
        return redirect()->back();
    }
}
