<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Revenue;
use App\Expense;
use App\Sell;
use App\User;
use App\Menu;
use DB;

class BalanceController extends Controller
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

         if($month =request('month')){
           $sales->whereMonth('created_at', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $sales->whereYear('created_at', $year);
         }
          $sales = $sales->get();

         $archives1= Sell::selectRaw('year(created_at)year,monthname(created_at) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(created_at)desc')
         ->get()
         ->ToArray();

          // Revenue part

         $revenues= Revenue::latest();

         if($month =request('month')){
           $revenues->whereMonth('date', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $revenues->whereYear('date', $year);
         }
         $revenues = $revenues->get();

         $archives2= Revenue::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(date)desc')
         ->get()
         ->ToArray();


         $expenses= Expense::latest();

         if($month =request('month')){
           $expenses->whereMonth('date', Carbon::parse($month)->month);
         }

         if($year=request('year')){
           $expenses->whereYear('date', $year);
         }
         $expenses = $expenses->get();

         $archives3= Expense::selectRaw('year(date)year,monthname(date) month,COUNT(*)published')
         ->groupBy('year','month')
         ->orderByRaw('min(date)desc')
         ->get()
         ->ToArray();

         return view('balance.balance', compact('sales','archives1', 'revenues', 'archives2', 'expenses' ,'archives3'));
       }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('menu/addMenu');
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
            'foodName'=>'required',
            'category'=>'required',
            'cost'=>'required',
            'foodImage' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('foodImage')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages"), $new_name);
        }
        else {
          $new_name = 'about.png';
        }
          Menu::create([
              'foodName' => request('foodName'),
              'category' => request('category'),
              'cost' => request('cost'),
              'foodImage' => $new_name,
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),

            ]);
            return redirect('#');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('test');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu/editMenu',compact('menu',$menu));
    }


    public function edittt(Menu $menu)
    {
        return view('menu/editMenu',compact('menu',$menu));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonlInfo $personlInfo)
    {
        //Validate
        $request->validate([
            'fullName' => 'required',
            'profession' => 'required',
        ]);

        $personlInfo->fullName = $request->fullName;
        $personlInfo->profession = $request->profession;
        $personlInfo->dob = $request->dob;
        $personlInfo->phone = $request->phone;
        $personlInfo->email = $request->email;
        $personlInfo->address = $request->address;
        $personlInfo->profileImage = $request->profileImage;
        $personlInfo->save();
        $request->session()->flash('message', 'Successfully modified the task!');
        return redirect('/personlInfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Menu $menu)
    {
        $menu->delete();
        return redirect('/menu');
    }
}
