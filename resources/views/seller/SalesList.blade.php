@extends('layouts.master')
@section('content')
@include('seller.aside')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
       <center><h2>لیست فروشات</h2></center>
      <h5 class="mb-1">برای دیدن جزئیات هر معامله بر روی شماره آن کلیک کنید</h5>
        <!-- Archive Start -->
         <div class="dropdown pull-right">
             <a href="#" class=" arrow-none card-drop fa fa-ellipsis-v" data-toggle="dropdown" aria-expanded="false" style="font-size: 15px">
                 انتخاب ماه و سال<i class="mdi mdi-dots-vertical"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-right">
                 <!-- item-->
                 @foreach($archives as $stats)
                 <li>
                   <a href="/salesList/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" class="dropdown-item form-control" style=" font-size: 17px; color: black">
                     {{$stats['month']. ' ' .$stats['year']}}
                   </a>
                  </li>
                 @endforeach
                <a href="/salesList" class="dropdown-item form-control">همه</a>
             </div>
         </div><br>
         <!-- Archive End -->
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>تاریخ</th>
            <th>قیمت کلی</th>
            <th>تخفیف</th>
            <th>قابل پرداخت</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($sales as $sell)
          <tr>
            <td><a href="printInvioce/{{ $sell->id }}">{{$sell->id}}</a></td>
            <td>{{$sell->created_at}}</td>
            <td>{{$sell->total}}</td>
            <td>{{$sell->discount}}</td>
            <td>
              <?php
                $main_cost = $sell->total;
                $discount = $sell->discount;
                $x = ($main_cost * $discount) / 100;
                $payable = $main_cost - $x;
                print ("$payable");
               ?>
            </td>
          </tr>
          <?php $sum += $payable; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="4">جمله عواید</th>
              <th colspan="1"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
