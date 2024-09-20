<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sell;
use App\salesItem;
use DB;


class salesItemController extends Controller
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
        $sell_id= sell::latest()
        ->orderByRaw('(id)desc LIMIT 1')
        ->get();

       return view('seller.salesDetails', compact('sell_id'));
    }


    public function salesDetails()
    {
      return view('seller/salesDetails');
    }

    public function create()
    {
      return view('seller/salesDetails');
    }

    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
       {
        $user_id = $request->user_id;
        $sell_id = $request->sell_id;
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;


            for($i = 0; $i < count($user_id); $i++){

             $salesItem = DB::table('sales_items')->where('user_id', $user_id)->get();

              if($salesItem)

            {
                $this->validate(request(),[
               'id' => 'unique',
               'sell_id' => 'required',
               'product_id' => 'nullable',
               'product_qty' =>'required',
           ]);

                   salesItem::create([
                    'user_id' => $user_id[$i],
                    'sell_id' => $sell_id[$i],
                    'product_id' => $product_id[$i],
                    'product_qty' => $product_qty[$i],
                    'created_at'=>carbon::now(),
                    'updated_at'=>carbon::now(),
                   ]);
           }else{
                    return redirect('/addDiscount');
             }
           }
        return redirect('/addDiscount');
       }


}
