@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش محصول</h3></center><hr>
				<form action = "/editProduct/<?php echo $product[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="row form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black"> اسم محصول </label>
               <input type="text"  name="productName" value="<?php echo $product[0]->productName; ?>" class="form-control" placeholder="اسم محصول" required>
             </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">بخش </label>
                <select class="form-control" name="category" required >
                  <option value="<?php echo $product[0]->category; ?>"><?php echo $product[0]->category; ?></option>
                  <option value="1">پوشاک</option>
                  <option value="2">وسایل بهداشتی و آرایشی</option>
                  <option value="3">بوت و کیف</option>
                  <option value="4">سایر</option>
                </select>
              </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">مدل </label>
               <input type="text"  name="model" value="<?php echo $product[0]->model; ?>" class="form-control" placeholder="مدل" >
             </div>
          </div>

          <div class="row form-group">
             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">قیمت خرید</label>
               <input type="number" max="100000" min="1" name="buyPrice" value="<?php echo $product[0]->buyPrice; ?>" class="form-control" placeholder="قیمت خرید" required>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">قیمت فروش</label>
               <input type="number" max="100000" min="1" name="salePrice" value="<?php echo $product[0]->salePrice; ?>" class="form-control" placeholder="قیمت فروش" required>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">تعداد </label>
               <input type="number" max="1000" min="1" name="quantity" value="<?php echo $product[0]->quantity; ?>" class="form-control" placeholder="تعداد" required>
             </div>

             <div class="col-lg-3 col-md-3 col-sm-3">
               <label  for="Field of Study" style="color:black">تاریخ انقضا </label>
               <input type="date"  name="expireDate" value="<?php echo $product[0]->expireDate; ?>" class="form-control" placeholder="تاریخ انقضا" >
             </div>
          </div>

          <div class="row form-group" >
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="University Name" style="color:black">تصویر محصول</label>
               <input type="hidden" name="image" value="<?php echo $product[0]->image; ?>">
							 <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="/UploadedImages/<?php echo $product[0]->image; ?>" />
             </div>
          </div>

          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success " />
								<button type="reset" class="btn btn-rounded btn-warning"><li class="fa fa-remove"> لغو</li></button>
             </div>
          </div>
					@include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>
@endsection
