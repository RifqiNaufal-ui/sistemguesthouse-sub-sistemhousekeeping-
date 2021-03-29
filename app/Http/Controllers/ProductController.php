<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use View;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index(){
        $title = 'Mini Bar Product Page';
        $products = Product::all();
        $data = Product::orderBy('created_at','desc')->get();

        return view('product.index',compact('title','data','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add Mini Bar Product';

        return view('product.add',compact('title'));
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

        $product = new Product;
        $product->name = $request->get('name');
		$product->price = $request->get('price');
		$product->save();

        \Session::flash('sukses','Successfully Adding Data');
		return Redirect::to('/product')->with('message', 'Product Created');
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
		$product = Product::find($id);
        $title = "Edit Product $product->nama";

        return view('product.edit',compact('title','product'));
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
        $product = Product::find($id);
        $product->name = $request->get('name');
		$product->price = $request->get('price');
		$product->save();		

        \Session::flash('sukses','Data Updated Successfully');
		return Redirect::to('/product')->with('message', 'Product Updated');
    }

    public function delete($id){
        Product::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
        return redirect('/product');
    }
}
