<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customers;

class CustomerController extends Controller
{
    public function index(){
    	$title = 'Customer Page';
    	$data = Customers::orderBy('name','asc')->get();

    	return view('customers.index',compact('title','data'));
    }

    public function add(){
    	$title = 'Add Customer';

    	return view('customers.add',compact('title'));
    }

    public function store(Request $request){
    	$data['id'] = $request->id;
    	$data['email'] = $request->email;
    	$data['name'] = $request->name;
    	$data['phone'] = $request->phone;
    	$data['address'] = $request->address;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Customers::insert($data);

    	\Session::flash('sukses','Successfully Adding Data');

    	return redirect('customers');
    }

    public function edit($id){
        $data = Customers::find($id);
        $title = "Edit Customer $data->name";

        return view('customers.edit',compact('title','data'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            // 'email'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Customers::where('id',$id)->update($data);

        \Session::flash('sukses','Data Updated Successfully');
        return redirect('customers');
    }

    public function delete($id){
        try {
            Customers::where('id',$id)->delete();

            \Session::flash('sukses','Data Deleted Successfully');

            
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('customers');
    }
}
