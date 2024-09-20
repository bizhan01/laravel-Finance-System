@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <!-- ُSuccess Flash Message -->
        @if($success = session('success'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div>{{$success}}</div>
        </div>
        @endif
      <center> <h3>اضافه نمودن محصول جدید</h3> </center>
      <form method="POST" action="{{route('saveProduct')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black"> اسم محصول </label>
               <input type="text"  name="productName" class="form-control" placeholder="اسم محصول" required>
             </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">بخش </label>
                <select class="form-control" name="category" required >
                  <option value="">انتخاب کنید</option>
                  @foreach($categories as $category)
                  <option>{{$category->title}}</option>
                  @endforeach
                </select>
              </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">مدل </label>
               <input type="text"  name="model" class="form-control" placeholder="مدل" >
             </div>
          </div>

          <div class="row form-group">
             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">قیمت خرید</label>
               <input type="number" max="100000" min="1" name="buyPrice" class="form-control" placeholder="قیمت خرید" required>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">قیمت فروش</label>
               <input type="number" max="100000" min="1" name="salePrice" class="form-control" placeholder="قیمت فروش" required>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">تعداد </label>
               <input type="number" max="1000" min="1" name="quantity" class="form-control" placeholder="تعداد" required>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">تاریخ انقضا </label>
               <input type="date"  name="expireDate" class="form-control" placeholder="تاریخ انقضا" >
             </div>
          </div>

          <div class="row form-group" >
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="University Name" style="color:black">تصویر محصول</label>
               <input type="file" name="image" id="input-file-now" class="dropify" required=""/>
             </div>
          </div>

          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="اضافه کردن محصول جدید" class="btn btn-success btn-lg" />
             </div>
          </div>
          @include('layouts.errors')
        </form>
      </div>
    </div>
</div>
@endsection
