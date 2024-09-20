<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Customer;
use DB;


class CustomerController extends Controller
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
      $customers = Customer::latest()->get();
      return view('seller.customers.addCustomer', compact('customers',));
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
            'name'=>'required',
            'lastName'=>'required',
            'phone'=>'required',
            'address'=>'required',

    ]);
      Customer::create([
          'name' => request('name'),
          'lastName' => request('lastName'),
          'phone' => request('phone'),
          'address' => request('address'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        try {
         session()->flash('success', 'عملیات موافقانه اجرا شد ');
         return back();
         } catch(Exception $ex) {
         session()->flash('failed', 'خطا! دوباره کوشش کنید');
         return back();
       }
    }


      public function show($id) {
       $customer = DB::select('select * from customers where id = ?',[$id]);
       return view('seller.customers.editCustomer',['customer'=>$customer]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$id) {
        $name = $request->input('name');
        $lastName = $request->input('lastName');
        $phone = $request->input('phone');
        $address = $request->input('address');

        DB::update('update customers set name = ? where id = ?',[$name,$id]);
        DB::update('update customers set lastName = ? where id = ?',[$lastName,$id]);
        DB::update('update customers set phone = ? where id = ?',[$phone,$id]);
        DB::update('update customers set address = ? where id = ?',[$address,$id]);
        return redirect('/customer');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from customers where id = ?',[$id]);
     return back();
   }

}
