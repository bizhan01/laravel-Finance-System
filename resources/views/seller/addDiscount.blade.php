@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="col-lg-3"></div>
  <div class="container-fluid">
    <div class="col-lg-6 box box-block bg-white">
      <center>
        <h2>فروشگاه</h2>
        <h3>مدیریت فروشات</h3>
        <h4 style="color:green">فاکتور شما موفقانه ثبت گردد</h4>
        @foreach($sales as $sell)
        <h6> شماره ثبت: {{$sell->id}} </h6>
        <div class="col-lg-1">  </div>
        <p> <a href="edit/{{ $sell->id }}" class="col-lg-5" style="display: inline-block; padding: 10px 30px; font-size: 14px; color: #fff; background: #5bda19; border-radius: 40px; text-decoration:none; margin-top: 6px"> محاسبه فاکتور</a></p>
        <p> <a href="delete/{{ $sell->id }}" onclick='return confirm("آیا مطمین استید معامله لغو شود؟")' class="col-lg-5" style="display: inline-block; padding: 10px 30px; font-size: 14px; color: #fff; background: #f44236; border-radius: 40px; text-decoration:none;"> لغو فاکتور</a></p>
        @endforeach
    </center>
   </div>
 </div>
</div>
@endsection
