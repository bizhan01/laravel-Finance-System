<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use App\Category;
use DB;

class ProductController extends Controller
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
      $products = Product::latest()->get();
      return view('seller.products.products', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::get();
      return view('seller.products.addProduct', compact('categories'));
    }

//     public function info(Product $product)
// {
//     return view('seller.products.details',compact('product'));
// }


    public function info($id) {
     $product = DB::select('select * from products where id = ?',[$id]);
     return view('seller.products.details',['product'=>$product]);
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
            'productName'=>'required',
            'category'=>'required',
            'model'=>'nullable',
            'buyPrice'=>'required', 'max:255',
            'salePrice'=>'required', 'max:255',
            'quantity'=>'required',
            'expireDate'=>'nullable',
            'image' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('image')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name);
        }
        else {
          $new_name = 'about.png';
        }
          Product::create([
              'productName' => request('productName'),
              'category' => request('category'),
              'model' => request('model'),
              'buyPrice' => request('buyPrice'),
              'salePrice' => request('salePrice'),
              'quantity' => request('quantity'),
              'expireDate' => request('expireDate'),
              'image' => $new_name,
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
       $product = DB::select('select * from products where id = ?',[$id]);
       return view('seller.products.editProduct',['product'=>$product]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$id) {
         $productName = $request->input('productName');
         $category = $request->input('category');
         $model = $request->input('model');
         $buyPrice = $request->input('buyPrice');
         $salePrice = $request->input('salePrice');
         $quantity = $request->input('quantity');
         $expireDate = $request->input('expireDate');

         if($image = $request->file('image')){
           $new_name =rand() . '.' . $image-> getClientOriginalExtension();
           $image -> move("UploadedImages", $new_name);
         }
         else {
           $new_name = $request->input('image');
         };

         DB::update('update products set productName = ? where id = ?',[$productName,$id]);
         DB::update('update products set category = ? where id = ?',[$category,$id]);
         DB::update('update products set model = ? where id = ?',[$model,$id]);
         DB::update('update products set buyPrice = ? where id = ?',[$buyPrice,$id]);
         DB::update('update products set salePrice = ? where id = ?',[$salePrice,$id]);
         DB::update('update products set quantity = ? where id = ?',[$quantity,$id]);
         DB::update('update products set expireDate = ? where id = ?',[$expireDate,$id]);
         DB::update('update products set image = ? where id = ?',[$new_name,$id]);
         return redirect('/product');
      }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from products where id = ?',[$id]);
     return back();
   }

}
