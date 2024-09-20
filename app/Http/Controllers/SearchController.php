<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Product;
use DB;

class SearchController extends Controller
{
    public function search()
    {
      $q = Input::get ( 'q' );
    	if($q != ""){
    		$user = Product::where ( 'productName', 'LIKE', '%' . $q . '%' )->orWhere ( 'category', 'LIKE', '%' . $q . '%' )->get ();
          $products = Product::latest()->get();
    		if (count ( $user ) > 0)
    			return view ( 'seller.products.products', compact('products') )->withDetails ( $user )->withQuery ( $q );
    		else
    			return view ( 'seller.products.products', compact('products') )->withMessage ( 'معلوماتی موجود نیست دوباره کوشش کنید!' );
    	}
    	return view ( 'seller.products.products', compact('products') )->withMessage ( 'معلوماتی موجود نیست دوباره کوشش کنید!');

    }

}
