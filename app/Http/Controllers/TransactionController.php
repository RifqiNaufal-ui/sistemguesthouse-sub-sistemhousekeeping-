<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Packages;
use App\Transactions;
use App\TransactionDetails;
use App\Customers;
use DB;
// use Illuminate\Support\Facades\DB;

use PDF;

class TransactionController extends Controller
{
    public function index()
    {
		$title = 'Transaction Order Page';
        $transactions = Transactions::all();
        $customers = Customers::all();

        return view('transactions.index', compact('transactions', 'title', 'customers','data'));
    }

    public function show($id)
    {       
        $transactions = Transactions::find($id);
        $title = "Transaction Order Details";
        $transaction_details = TransactionDetails::where('transactions_id','=',$id)->get();

        //dd($transaction_details->transactions());
        return view('transactions.show',compact('title','transactions','transaction_details'));
    }

    public function laporan($id)
    {   
        $transactions = Transactions::where('id','=',$id)->get();
        $transaction_details = TransactionDetails::where('transactions_id','=',$id)->get();
        $packages = Packages::where('id','=',$id)->get();
        $customers = Customers::where('id','=',$id)->get();
        $customPaper = array(0,0,400.00,283.80);

        $pdf = PDF::loadview('transactions.laporan', compact('transactions', 'transaction_details', 'packages', 'customers','customPaper', 'pdf'))->setPaper($customPaper, 'landscape');
            return $pdf->stream();
        
        // return view('transactions.laporan', compact('transactions', 'transaction_details', 'packages', 'customers','customPaper', 'pdf'));
    }

    public function add()
    {
    	$title = 'Add Transaction Order';
        $packages = Packages::all();
		$getid = TransactionDetails::all();
		$customers = Customers::orderBy('name','asc')->get();

        return view('transactions.add')->with('packages', $packages)->with('customers', $customers)->with('transactions', $getid)->with('orderby', $getid)->with('title', $title);
    }

    public function store(Request $request)
    {

        $title = 'Add Transaction Order';
        $transactions = new Transactions;
        $input = $request->all();
        $transactions->customer_id = $request->get('customer_id');
        $transactions->total = $request->get('total');
        $transactions->getmoney = $request->get('getmoney');
        $transactions->backmoney = $request->get('backmoney');
        $transactions->date = $request->get('date');
        $transactions->save();
        $j = $transactions->id;
        if($j > 0){
            for($id = 0; $id < count($input['package_id']); $id++){
                $transaction_details = new TransactionDetails;
                $transaction_details->transactions_id = $j;
                $transaction_details->package_id = $input['package_id'][$id];
                $transaction_details->quantity = $input['qty'][$id];
                $transaction_details->unitprice = $input['price'][$id];
                $transaction_details->discount = $input['dis'][$id];
                $transaction_details->amount = $input['amount'][$id];
                $transaction_details->save();
            }
            
        }
        $packages = Packages::all();
        $transaction_details = TransactionDetails::where('transactions_id', $transactions->id)->get();
        $orderby = Transactions::where('id', $transactions->id)->get();
        $customers = Customers::orderBy('name','asc')->get();

        \Session::flash('sukses','Successfully Adding Data');

        return redirect('transactions')->with('transactions', $transaction_details)->with('packages', $packages)->with('orderby', $orderby)->with('title', $title)->with('customers', $customers);     
    }

     public function edit($id){
        $packages = Packages::all();
        $getid = TransactionDetails::all();
        $customers = Customers::orderBy('name','asc')->get();
        $transactions = Transactions::find($id);
        $title = "Edit Transaction Order";
        $transaction_details = TransactionDetails::where('transactions_id','=',$id)->get();

        return view('transactions.edit')->with('packages', $packages)->with('transactions', $getid)->with('orderby', $getid)->with('title', $title)->with('customers', $customers)->with('transactions', $transactions)->with('transaction_details', $transaction_details);
    }

     public function update(Request $request, $id){
        $this->validate($request,[
            'customer_id'=>'required',
            'total'=>'required',
            'getmoney'=>'required',
            'backmoney'=>'required',
            'date'=>'required'
        ]);

        // dd($request->all());

        $dataUpdateTransactions = $request->only('customer_id','total','getmoney','backmoney','date');
        $transactions = Transactions::find($id);
        $transactions->update($dataUpdateTransactions);

        if ($request->package_id > 0) {
            foreach ($request->package_id as $key => $value) {
                $data = [
                    'transactions_id' => $transactions->id,
                    'package_id' => $request->package_id[$key],
                    'quantity' => $request->qty[$key],
                    'unitprice' => $request->price[$key],
                    'discount' => $request->dis[$key],
                    'amount' => $request->amount[$key]
                ];
                // TransactionDetails::updateOrCreate([
                //     'package_id' => $request->package_id[$key]
                // ], $data);

                DB::table('transaction_details')->where('id', $request->idDetailTransactions[$key])->update($data);
            }
        }   

        \Session::flash('sukses','Successfully Updated Data');

       return redirect('transactions');     
    }

    public function destroy($id)
    {
        Transactions::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

     public function delete($id)
    {
        TransactionDetails::where('id',$id)->delete();

        \Session::flash('sukses','Successfully Deleted Data');
         return redirect()->back();
    }

    public function hapus()
    {   
        TransactionDetails::truncate();
        
        \Session::flash('sukses','Successfully Deleted Data');
        return redirect()->back();
    }
}
