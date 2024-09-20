@extends('layouts.master')
@section('content')
@include('seller.aside')
<div class="row row-sm">
  <div class="col-lg-3"></div>
<div class="col-md-5">
  <div class="box bg-white product product-3">
    <div class="p-img img-cover" style="background-image: url(/UploadedImages/<?php echo $product[0]->image; ?>);">
    </div>
    <div class="p-content">
      <center><h3>توضیحات کامل محصول</h3></center> <hr>
      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">اسم محصول:</a></h5>
        <h5 class="p-price float-xs-right"><?php echo $product[0]->productName; ?></h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">سریال نمبر محصول:</a></h5>
        <h5 class="p-price float-xs-right"><?php echo $product[0]->id; ?></h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">مدل:</a></h5>
        <h5 class="p-price float-xs-right"><?php echo $product[0]->model; ?></h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">قیمت خرید:</a></h5>
        <h5 class="p-price float-xs-right"><?php echo $product[0]->buyPrice; ?> <span style="color: blue">افغانی</span></h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">قیمت فروش:</a></h5>
        <h5 class="p-price float-xs-right"><?php echo $product[0]->salePrice; ?> <span style="color: blue">افغانی</span></h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">تعداد:</a></h5>
        <h5 class="p-price float-xs-right"><?php echo $product[0]->quantity; ?></h5>
      </div> <hr>

      <div class="clearfix">
        <h5 class="float-xs-left"><a class="text-black" href="#">تاریخ انقضا:</a></h5>
         <h5 class="p-price float-xs-right"><?php echo $product[0]->expireDate; ?></h5>
      </div>
      
    </div>
  </div>
</div>
</div>

@endsection
