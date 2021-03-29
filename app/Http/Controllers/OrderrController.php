<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use App\Orderr;
use App\OrderrDetail;
use App\Room;
use DB;
// use Illuminate\Support\Facades\DB;

use PDF;

class OrderrController extends Controller
{
    public function index()
    {
		$title = 'Order Mini Bar Page';
        $orderr = Orderr::all();
        $rooms = Room::all();
        $data = Orderr::join('rooms','room_id','=','rooms.id')
                ->select('rooms.id','rooms.numberRoom')->distinct()->get();

        return view('orderrs.index', compact('orderr', 'title', 'rooms','data'));
    }

    public function periode(Request $request){
        try {
            $dari = $request->dari;
            $sampai = $request->sampai;

            $title = "Transaksi Pesanan dari $dari sampai $sampai";

            $data = Orderr::whereDate('updated_at','>=',$dari)->whereDate('updated_at','<=',$sampai)->orderBy('created_at','desc')->get();

            return view('orderr.index',compact('title','data'));
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());

            return redirect()->back();
        }
    }

    public function pertanggal(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $data = Orderr::with('rooms','products','orderrdetails')->whereBetween('updated_at' ,[$dari, $sampai])->latest()->get();

        return view('orderrs.pertanggal',compact('data'));
    }

    public function show($id)
    {       
        $orderr = Orderr::find($id);
        $title = "Order Mini Bar Details";
        $orderrdetails = OrderrDetail::where('orderr_id','=',$id)->get();

        //dd($orderrdetails->orderrs());
        return view('orderrs.show',compact('title','orderr','orderrdetails'));
    }

    public function laporan($id)
    {   
        $orderr = Orderr::where('id','=',$id)->get();
        $orderrdetails = OrderrDetail::where('orderr_id','=',$id)->get();
        $products = Product::where('id','=',$id)->get();
        $customPaper = array(0,0,400.00,283.80);

        // $pdf = PDF::loadview('orderrs.laporan', compact('orderr', 'orderrdetails', 'products', 'customPaper', 'pdf'))->setPaper($customPaper, 'landscape');
        //     return $pdf->stream();
        
        return view('orderrs.laporan', compact('orderr', 'orderrdetails', 'products', 'customPaper', 'pdf'));
    }

    public function add()
    {
    	$title = 'Add Order Mini Bar';
        $products = Product::all();
		$getid = OrderrDetail::all();
        $data = DB::table('products')->get();
		$rooms = Room::orderBy('numberRoom','asc')->get();

        return view('orderrs.add')->with('products', $products)->with('orderrs', $getid)->with('orderrby', $getid)->with('title', $title)->with('rooms', $rooms)->with('data', $data);
    }

    public function store(Request $request)
    {

        $title = 'Order Mini Bar';
        $orderr = new Orderr;
        $input = $request->all();
        $orderr->name = $request->get('name');
        $orderr->room_id = $request->get('room_id');
        $orderr->department = $request->get('department');
        $orderr->date = $request->get('date');
        $orderr->total = $request->get('total');
        $orderr->save();
        $j = $orderr->id;
        if($j > 0){
            for($id = 0; $id < count($input['product_id']); $id++){
                $orderrdetails = new OrderrDetail;
                $orderrdetails->orderr_id = $j;
                $orderrdetails->product_id = $input['product_id'][$id];
                $orderrdetails->quantity = $input['qty'][$id];
                $orderrdetails->unitprice = $input['price'][$id];
                $orderrdetails->amount = $input['amount'][$id];
                $orderrdetails->save();
            }
            
        }
        $products = Product::all();
        $orderrdetails = OrderrDetail::where('orderr_id', $orderr->id)->get();
        $orderrby = Orderr::where('id', $orderr->id)->get();
        $rooms = Room::orderBy('numberRoom','asc')->get();

        \Session::flash('sukses','Successfully Adding Data');

        return redirect('orderrs')->with('orderrs', $orderrdetails)->with('products', $products)->with('orderrby', $orderrby)->with('title', $title)->with('rooms', $rooms);     
    }

     public function edit($id){
        $products = Product::all();
        $getid = OrderrDetail::all();
        $rooms = Room::orderBy('numberRoom','asc')->get();
        $orderr = Orderr::find($id);
        $title = "Edit Order Mini Bar $orderr->name";
        $orderrdetails = OrderrDetail::where('orderr_id','=',$id)->get();

        return view('orderrs.edit')->with('products', $products)->with('orderrs', $getid)->with('orderrby', $getid)->with('title', $title)->with('rooms', $rooms)->with('orderr', $orderr)->with('orderrdetails', $orderrdetails);
    }

     public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required',
            'room_id'=>'required',
            'department'=>'required',
            'date'=>'required'
        ]);

        // dd($request->all());

        $dataUpdateOrder = $request->only('name', 'room_id', 'department', 'date','total');
        $orderr = Orderr::find($id);
        $orderr->update($dataUpdateOrder);

        if ($request->product_id > 0) {
            foreach ($request->product_id as $key => $value) {
                $data = [
                    'orderr_id' => $orderr->id,
                    'product_id' => $request->product_id[$key],
                    'quantity' => $request->qty[$key],
                    'unitprice' => $request->price[$key],
                    'amount' => $request->amount[$key]
                ];
                // OrderrDetail::updateOrCreate([
                //     'product_id' => $request->product_id[$key]
                // ], $data);

                DB::table('orderr_details')->where('id', $request->idDetailOrder[$key])->update($data);
            }
        }   

        \Session::flash('sukses','Successfully Updated Data');

       return redirect('orderrs');     
    }

    public function destroy($id)
    {
        Orderr::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

     public function delete($id)
    {
        OrderrDetail::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

    public function hapus()
    {   
        OrderrDetail::truncate();
        
        \Session::flash('sukses','Successfully Deleted Data');
        return redirect()->back();
    }
}
