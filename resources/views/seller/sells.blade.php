@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
			<div class="col-lg-4 col-md-4 col-sm-4"></div>
      <div class="col-md-4">
        <div class="box bg-info user-1">
            <div class="box box-block tile tile-2 bg-info mb-2">
              <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
              <div class="t-content">
                <h3 class="mb-1">سیستم مدیریت فروشگاه</h3>
                <h3 class="mb-1">مدیریت فروشات</h3>
                <h6 class="text-uppercase">فروشنده</h6>
              </div>
                <div class="u-content">
                  <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5> <br>
                  <div class="text-xs-center pb-0-5">
                    <form method="POST" action="{{route('newSell')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <input type="hidden" name="total" value="0">
                     <input type="hidden" name="discount" value="0">
                     <input type="hidden" name="payable" value="0">
                     <button type="submit" class="btn btn-lg btn-primary btn-rounded mr-0-5">اجرای فروش جدید</button>
                  </form>
                  </div>
                </div>
              </div>
                <div class="u-counters">
                  <div class="row no-gutter">
                    <div class="col-xs-12 uc-item">
                      <a class="text-black" href="#">
                        <strong>تاریخ</strong> <br>
                        <strong><?php echo date('Y-m-d') ?></strong>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
