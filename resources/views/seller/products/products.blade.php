@extends('layouts.master')
@section('content')
@include('seller.aside')
<div class="colorlib-menu">
  <div class="container">
    <div class="row col-lg-2"></div>
    <div class="row col-lg-8"><br>
      <center>
        <h2>لیست محصولات</h2>
        @if(isset($message))
        <h3>{{ $message }}</h3>
        @endif
        <form action="{{route('search')}}" method="POST" role="search" class="search-job">
          {{ csrf_field() }}
            <div class="input-group ">
              <input type="text" name="q" class="form-control  b-a" placeholder="جستجو..." required>
              <span class="input-group-btn">
                <button type="submit" class="btn  btn-rounded btn-primary b-a">
                  <i class="fa fa-search">  جستجو </i>
                </button>
              </span>
            </div>
          </form>
      </center>
    </div>


    @if(isset($details))
       <div class="row col-lg-12"><br>
         <center>
           <h5>  نتایج موجود برای کیوری  <span style="color: blue"> {{ $query }} </span> عارتند از:</h5>
         </center>
       </div>
       <div class="col-lg-12 box box-block bg-white">
           <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
               <tr>
                 <th>تصویر محصول</th>
                 <th>اسم محصول</th>
                 <th>کتگوری</th>
                 <th>مدل</th>
                 <th>قیمت خرید</th>
                 <th>قیمت فروش</th>
                 <th>تعداد</th>
                 <th>تاریخ انقضا</th>
               </tr>
               </thead>
               <tbody>
                 @foreach($details as $product)
                 <tr>
                     <td><img src="/UploadedImages/{{$product->image}}" height="50px" width="50px"alt=""></td>
                     <td>{{$product->productName}}</td>
                     <td>{{$product->category}}</td>
                     <td>{{$product->model}}</td>
                     <td>{{$product->buyPrice}}</td>
                     <td>{{$product->salePrice}}</td>
                     <td>{{$product->quantity}}</td>
                     <td>{{$product->expireDate}}</td>
                 </tr>
                 @endforeach
               </tbody>
           </table>
        </div>
     </div>
   @endif
  </div>



<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 animate-box">
          <div class="tab-content">
              <!-- ّfood list -->
            <div role="tabpanel" class="tab-pane active" id="main">
              <div class="row row-sm">
              @foreach($products as $product)
              <div class="col-md-3">
                <div class="box bg-white product product-3">
                  <div class="p-img img-cover" style="background-image: url(UploadedImages/{{$product->image}});">
                    <div class="float-xs-right col-lg-3 bg-warning">{{$product->id}}</div>
                    <a href="product/{{ $product->id }}"><button type="submit" class="btn btn-info btn-block">توضیحات</button></a>
                  </div>
                  <div class="p-content">
                    <div class="clearfix">
                      <h5 class="float-xs-left"><a class="text-black" href="#">{{$product->productName}} <span style="color: blue">{{$product->model}}</span></a></h5>
                      <div class="p-price float-xs-right">{{$product->salePrice}} <span style="color: blue">افغانی</span></div>
                    </div>
                    <div class="p-info">
                      <a href="editProduct/{{ $product->id }}" class="fa fa-edit"></a>
                      <div class="p-price float-xs-right">
                       <a href="deleteProduct/{{ $product->id }}" onclick='return confirm("حذف شود؟")' class="fa fa-trash" style="color: red"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              </div>
           </div>
         </div>
       </div>
    </div>
  </div>
</div>




<script src="/assets/js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf']
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>
@endsection
