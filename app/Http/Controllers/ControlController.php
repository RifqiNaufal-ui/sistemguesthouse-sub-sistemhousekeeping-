<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controls;
use App\ControlDetails;
use App\Room;
use DB;

class ControlController extends Controller
{
    public function index()
    {
        $title = 'Control of Linen Exchange Page';
        $data = Controls::orderBy('created_at','desc')->get();
        $controls = Controls::all();
        $rooms = Room::all();

        return view('controls.index',compact('controls','title','data','rooms'));
    }

    public function add()
    {
        $title = 'Add Control of Linen Exchange';
        $rooms = Room::orderBy('numberRoom','asc')->get();
        
        return view('controls.add',compact('title','rooms'));
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $lastid=Controls::create($data)->id;
        if(count($request->articles) > 0)
        {
        foreach($request->articles as $data=>$v){
            $data2=array(
                'controls_id'=>$lastid,
                'articles'=>$request->articles[$data],
                'dirty'=>$request->dirty[$data],
                'clean'=>$request->clean[$data],
                'description'=>$request->description[$data],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
        ControlDetails::insert($data2);
      }
        }

        \Session::flash('sukses','Successfully Adding Data');

        return redirect('controls');
    }

    public function edit($id){
       	$data = ControlDetails::find($id);
        $title = "Edit Control Of Linen Exchange - $data->articles";
        $rooms = Room::orderBy('numberRoom','asc')->get();
        
        return view('controls.edit',compact('title','data','rooms'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'articles'=>'required',
            'dirty'=>'required',
            'clean'=>'required',
            'description'=>'required'
        ]);

        // $data['id'] = \Uuid::generate(4);
        // $data['controls_id'] = $request->controls_id;
        $data['articles'] = $request->articles;
        $data['dirty'] = $request->dirty;
        $data['clean'] = $request->clean;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        ControlDetails::where('id',$id)->update($data);

        \Session::flash('sukses','Successfully Updated Data');

        return redirect('controls');
    }

    public function destroy($id)
    {
        Controls::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

     public function delete($id)
    {
        ControlDetails::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

    public function hapus()
    {   
        ControlDetails::truncate();
        
        \Session::flash('sukses','Successfully Deleted Data');
        return redirect()->back();
    }

    public function show($id)
    {       
        $controls = Controls::find($id);
        $title = "Control Of Linen Exchange Details $controls->guest_name";
        $control_details = ControlDetails::where('controls_id','=',$id)->get();

        return view('controls.show',compact('title','controls','control_details'));
    }

     public function laporan($id)
    {   
        $controls = Controls::where('id','=',$id)->get();
        $control_details = ControlDetails::where('controls_id','=',$id)->get();

        return view('controls.laporan',compact('controls', 'control_details'));       
    }

}
