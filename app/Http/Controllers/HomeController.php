<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Employee;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenues = DB::table('revenues')->whereMonth('date', Carbon::now())->sum('amount');
        $expenses = DB::table('expenses')->whereMonth('date', Carbon::now())->sum('total');
        $productCount = DB::table('products')->count('id');
        $empolyeeCount = DB::table('employees')->count('id');
        $products = DB::table('products')->whereMonth('created_at', Carbon::now())->count('id');
        $soldProducts = DB::table('sales_items')->whereMonth('created_at', Carbon::now())->count('product_id');
        $xp = DB::table('products')->whereMonth('expireDate', '<=' , Carbon::now())->count('id');
        $sales_items = DB::table('sales_items')->whereMonth('created_at' , Carbon::now())->count('id');
        return view('home', compact('revenues', 'expenses','productCount', 'empolyeeCount', 'products', 'soldProducts', 'xp', 'sales_items'));
    }
}
