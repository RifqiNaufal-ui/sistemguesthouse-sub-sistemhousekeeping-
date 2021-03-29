<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Packages;

use View;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

class PackageController extends Controller
{
    public function index(){
        $title = 'Laundry Package Page';
        $packages = Packages::all();
        $data = Packages::orderBy('created_at','desc')->get();

        return view('packages.index',compact('title','data','packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Laundry Package';
        return view('packages.add',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required'
        ]);

        $packages = new Packages;
		$packages->name = $request->get('name');
		$packages->price = $request->get('price');
		$packages->save();

        \Session::flash('sukses','Successfully Adding Data');
		return Redirect::to('/packages')->with('message', 'Packages Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$packages = Packages::find($id);
        $title = "Edit Package $packages->nama";
        return view('packages.edit',compact('title','packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $packages = Packages::find($id);
		$packages->name = $request->get('name');
		$packages->price = $request->get('price');
		$packages->save();		

        \Session::flash('sukses','Data Updated Successfully');
		return Redirect::to('/packages')->with('message', 'Package Updated');
    }

    public function delete($id){
        Packages::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
        return redirect('/packages');
    }
}
