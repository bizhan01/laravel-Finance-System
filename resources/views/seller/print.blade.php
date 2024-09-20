@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="col-lg-3"></div>
  <div class="container-fluid">
    <div class="col-lg-6 box box-block bg-white">
      <center>
        <h3>فروشگاه ملکه ثریا</h3>
        <h4>مدیریت فروشات</h4>
        <h5 style="color:#5bda19">فاکتور موفقانه محاسبه گردد و آماده چاپ می باشد</h5>
        @foreach($sales as $sell)
          <h6> شماره ثبت: {{$sell->id}} </h6>
          <p> <a href="printInvioce/{{ $sell->id }}"  style="display: inline-block; padding: 10px 30px; font-size: 14px; color: #fff; background: #5bda19; border-radius: 40px; text-decoration:none;"> چاپ فاکتور</a></p>
       @endforeach
    </center>
   </div>
 </div>
</div>
@endsection
