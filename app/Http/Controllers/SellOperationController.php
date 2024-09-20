<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Sell;
use DB;

class SellOperationController extends Controller
{
    public function index() {
      $sales = DB::select('select * from sells');
      return view('seller.addDiscount',['sales'=>$sales]);
   }


   public function show($id) {
   $sales = DB::select('select * from sells where id = ?',[$id]);

   $sales_info = DB::table('sells as sel')
        ->rightJoin('sales_items as si', 'sel.id', '=', 'si.sell_id')
        ->rightJoin('products as pro', 'si.product_id', '=', 'pro.id')
        ->where('sel.id', $id)
        ->get();

    return view('seller.editSales',['sales'=>$sales], compact('sales_info'));
   }



   public function edit(Request $request,$id) {
    $total = $request->input('total');
    $discount = $request->input('discount');
    $payable = $request->input('payable');

    DB::update('update sells set total = ? where id = ?',[$total,$id]);
    DB::update('update sells set discount = ? where id = ?',[$discount,$id]);
    DB::update('update sells set payable = ? where id = ?',[$payable,$id]);
    return redirect('/print');
   }

   public function print()
   {
     $sales= sell::latest()
     ->orderByRaw('(id)desc LIMIT 1')
     ->get();

    return view('seller.print', compact('sales'));
   }

   public function printInvioce(Request $request,$id)
   {
     $sales= sell::latest()
     ->orderByRaw('(id)desc LIMIT 1')
     ->get();

     $sales_info = DB::table('sells as sel')
          ->rightJoin('sales_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('products as pro', 'si.product_id', '=', 'pro.id')
          ->where('sel.id', $id)
          ->get();

     return view('seller.invioce', compact('sales_info', 'sales'));
   }

   public function transactionDetails(Request $request,$id)
   {
     $sales_info = DB::table('sells as sel')
          ->rightJoin('sales_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('users as ur', 'si.user_id', '=', 'ur.id')
          ->rightJoin('products as pro', 'si.product_id', '=', 'pro.id')
          ->where('sel.id', $id)
          ->get();

     return view('admin.transactionDetails', compact('sales_info'));
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Task  $task
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
      DB::delete('delete from sells where id = ?',[$id]);
      return redirect('/addDiscount');
   }


}
