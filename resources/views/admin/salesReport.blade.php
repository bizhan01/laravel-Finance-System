@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
   <center><h2>لیست فروشات</h2></center>
  <div class="container-fluid">
    <div class="col-lg-2 col-md-2 col-sm-2 box box-block ">
      <p> <b>لیست فروشات ماهوار</b></p>
      <div class="scroll-demo custom-scroll custom-scroll-dark" style="height: 310px;">
          @foreach($archives as $stats)
          <li>
            <a href="/salesReport/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" style=" font-size: 17px; color: black">
              {{$stats['month']. ' ' .$stats['year']}}
            </a>
           </li>
          @endforeach
            <a href="/salesReport">همه</a>
       </div>
   </div>

    <div class="col-lg-10 col-md-10 col-sm-10 box box-block bg-white">
      <h5 class="mb-1">برای مشاهده جزئیات هر معامله روی شماره آن کلیک کنید.</h5>
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
            <td><a href="transactionDetails/{{$sell->id}}">{{$sell->id}}</a></td>
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
