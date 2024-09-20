<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sell;
use App\Revenue;
use App\Customer;
use DB;


class SellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $sales= Sell::latest();
      return view('seller.sells', compact('sales'));
    }

    public function salesList()
    {
      $sales= Sell::latest();


            if($month =request('month')){
              $sales->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if($year=request('year')){
              $sales->whereYear('created_at', $year);
            }
            $sales = $sales->get();

            $archives= Sell::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at)desc')
            ->get()
            ->ToArray();
      return view('seller.salesList', compact('sales', 'archives'));
    }

    public function salesReport()
    {
      $sales= Sell::latest();

            if($month =request('month')){
              $sales->whereMonth('created_at', Carbon::parse($month)->month);
            }

            if($year=request('year')){
              $sales->whereYear('created_at', $year);
            }
            $sales = $sales->get();

            $archives= Sell::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at)desc')
            ->get()
            ->ToArray();
      return view('admin.salesReport', compact('sales', 'archives'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
        'total'=>'required',
        'discount'=>'required',
        'payable'=>'required',

    ]);
      Sell::create([
          'total' => request('total'),
          'discount' => request('discount'),
          'payable' => request('payable'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        return redirect('salesDetails');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    // public function show(Revenue $product)
    // {
    //     return view('registrar/details',compact('product'));
    // }


    public function addDiscount()
    {
      $sales= sell::latest()
      ->orderByRaw('(id)desc LIMIT 1')
      ->get();

     return view('seller.addDiscount', compact('sales'));
    }

    public function info()
    {
      $customers = Customer::latest()->get();
       return view('seller.editSales', campact('customers'));
    }


    public function show($id) {

     $users = DB::select('select * from sells where id = ?',[$id]);

     return view('seller.editSales',['sell'=>$sell, 'customers'=>$customers]);
  }



    public function edit(Request $request,$id) {
     $total = $request->input('total');
     $discount = $request->input('discount');
     $payable = $request->input('payable');

     DB::update('update sells set total = ? where id = ?',[$total,$id]);
     DB::update('update sells set discount = ? where id = ?',[$discount,$id]);
     DB::update('update sells set payable = ? where id = ?',[$payable,$id]);
     return redirect('/addDiscount');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
       DB::delete('delete from sells where id = ?',[$id]);
       return redirect('/sales');
    }
}
