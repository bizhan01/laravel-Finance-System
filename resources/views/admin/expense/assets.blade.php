@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <h4>لیست اجناس ( سرمایه های ثابت)</h4>
    <div class="box box-block bg-white">
      <h5 class="mb-1">نمایش اطلاعات</h5>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تصویر</th>
            <th>سریال نمبر</th>
            <th>اسم محصول</th>
            <th>مدل</th>
            <th>قیمت</th>
            <th>تعداد</th>
            <th>جمله</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($products as $product)
          <tr>
            <td><img src="UploadedImages/{{$product->image}}" alt="" height="30px" /></td>
            <td>{{$product->id}}</td>
            <td>{{$product->productName}}</td>
            <td>{{$product->model}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price * $product->quantity }}</td>
          </tr>
            <?php $sum += $product->price * $product->quantity; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="5">جمله عواید</th>
              <th colspan="2" style="text-align: center"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
