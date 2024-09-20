@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
      <div class="col-md-4">
        <div class="box bg-white user-1">
          <div class="u-img img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
          <div class="u-content">
            <div class="avatar box-64">
              <img class="b-a-radius-circle shadow-white" src="/UploadedImages/{{Auth::user()->profileImage}}" alt="">
              <i class="status bg-success bottom right"></i>
            </div>
            <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
            <p class="text-muted pb-0-5">مدیر سیستم</p>
            <div class="text-xs-center pb-0-5">
              <button type="submit" class="btn btn-primary btn-rounded mr-0-5">ویرایش پروفایل </button>
              <!-- <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button> -->
              <a  href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <button type="submit" class="btn btn-danger btn-rounded">خروج از سیستم</button>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </div>
          <div class="u-counters">
            <div class="row no-gutter">
              <div class="col-xs-6 uc-item">
                <a class="text-black" href="#">
                  <strong>ساعت</strong> <br>
                  <strong><?php echo date('h-m-s') ?></strong>
                </a>
              </div>
              <div class="col-xs-6 uc-item">
                <a class="text-black" href="#">
                  <strong>تاریخ</strong> <br>
                  <strong><?php echo date('Y-M-D') ?></strong>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box box-block bg-white">
          <div class="clearfix mb-1">
            <h5 class="float-xs-left">آمار فروشات</h5>
            <div class="float-xs-right">
              <button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
              <button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
              <button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
            </div>
          </div>
          <div id="advanced" class="chart-container mb-1" style="height: 295px;"></div>
          <div class="text-xs-center">
            <span class="mx-1"><i class="fa fa-circle text-success"></i> عواید</span>
            <span class="mx-1"><i class="fa fa-circle text-warning"></i> سفارشات</span>
            <span class="mx-1"><i class="fa fa-circle text-danger"></i> مصارف</span>
            <span class="mx-1"><i class="fa fa-circle text-primary"></i> سایر</span>
          </div>
        </div>
      </div>
    </div>


    <div class="row row-md">
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-success mb-2">
          <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$revenues}}</h1>
            <h6 class="text-uppercase">فروشات ماه جاری</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-danger mb-2">
          <div class="t-icon right"><i class="fa fa-money"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$expenses}}</h1>
            <h6 class="text-uppercase">مضارف ماه جاری</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-primary mb-2">
          <div class="t-icon right"><i class="ti-package"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$productCount}}</h1>
            <h6 class="text-uppercase">محصولات موجود</h6>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block tile tile-2 bg-warning mb-2">
          <div class="t-icon right"><i class="fa fa-user"></i></div>
          <div class="t-content">
            <h1 class="mb-1">{{$empolyeeCount}}</h1>
            <h6 class="text-uppercase">کارمندان</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
