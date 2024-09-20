@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="py-2 text-xs-center">
      <h2>سیستم مدیریت فروشگاه</h2>
          مدیریت فروشات
    </div>
      <div class="col-sm-8 push-sm-2">
        <div class="card price-card">
          <div class="card-header price-card-header bg-primary text-xs-center">
            <h3 class="text-uppercase">ثبت محصولات</h3>
          </div>
          <div class="price-card-list" style="padding: 40px">
            <form method="POST" action="{{route('saveSell')}}" >
              {{ csrf_field() }}
               <div class="row  form-group">
                 @foreach($sell_id as $sell_id)
                  <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
                   <input type="hidden" name="sell_id[]" value="{{$sell_id->id}}">
                 @endforeach
                   <div class="input-daterange input-group">
                     <span class="input-group-addon bg-primary b-0 text-white">سریال نمبر محصول</span>
                     <input type="number" max="10000" min="1" name="product_id[]" value="" class="form-control"  required>
                     <span class="input-group-addon bg-primary b-0 text-white">تعداد</span>
                     <input type="number" max="1000" min="1" name="product_qty[]" value=""  class="form-control"  required >
                   </div>
               </div>

               <div class="row  form-group">
                   <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
                   <input type="hidden" name="sell_id[]" value="{{$sell_id->id}}">
                   <div class="input-daterange input-group">
                      <span class="input-group-addon bg-primary b-0 text-white">سریال نمبر محصول</span>
                     <input type="number" max="10000" min="1" name="product_id[]" value="" class="form-control">
                     <span class="input-group-addon bg-primary b-0 text-white">تعداد</span>
                     <input type="number" max="1000" min="1" name="product_qty[]" value=""  class="form-control">
                   </div>
               </div>

               <div class="row  form-group">
                   <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
                   <input type="hidden" name="sell_id[]" value="{{$sell_id->id}}">
                   <div class="input-daterange input-group">
                      <span class="input-group-addon bg-primary b-0 text-white">سریال نمبر محصول</span>
                     <input type="number" max="10000" min="1" name="product_id[]" value="" class="form-control">
                     <span class="input-group-addon bg-primary b-0 text-white">تعداد</span>
                     <input type="number" max="1000" min="1" name="product_qty[]" value=""  class="form-control">
                   </div>
               </div>

               <div class="row  form-group">
                   <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
                   <input type="hidden" name="sell_id[]" value="{{$sell_id->id}}">
                   <div class="input-daterange input-group">
                      <span class="input-group-addon bg-primary b-0 text-white">سریال نمبر محصول</span>
                     <input type="number" max="10000" min="1" name="product_id[]" value="" class="form-control">
                     <span class="input-group-addon bg-primary b-0 text-white">تعداد</span>
                     <input type="number" max="1000" min="1" name="product_qty[]" value=""  class="form-control">
                   </div>
               </div>
               <div class="row  form-group">
                   <input type="hidden" name="user_id[]" value="{{Auth::user()->id}}">
                   <input type="hidden" name="sell_id[]" value="{{$sell_id->id}}">
                   <div class="input-daterange input-group">
                      <span class="input-group-addon bg-primary b-0 text-white">سریال نمبر محصول</span>
                     <input type="number" max="10000" min="1" name="product_id[]" value="" class="form-control">
                     <span class="input-group-addon bg-primary b-0 text-white">تعداد</span>
                     <input type="number" max="1000" min="1" name="product_qty[]" value=""  class="form-control">
                   </div>
               </div>

              <input type="submit" name="submit" value="ذخیره" class="btn btn-primary btn-block btn-lg">
               @include('layouts.errors')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
