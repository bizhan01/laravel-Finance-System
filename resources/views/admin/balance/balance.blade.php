@extends('layouts.master')

@section('content')

<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script>

<center> <h1>صورت حساب (بیلانس)</h1> </center>

  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
    <h4>تاریخ (ماه و سال)</h4>
      <div class=" col-lg-2 col-md-2 col-sm-2 box box-block ">
        <div class="scroll-demo custom-scroll custom-scroll-dark" style="height: 200px;">
            @foreach($archives1 as $stats)
            <li>
              <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" style=" font-size: 17px; color: black">
                {{$stats['month']. ' ' .$stats['year']}}
              </a>
             </li>
            @endforeach
            <a href="/balance">همه</a>
       </div>
    </div>

      <div class="col-lg-10 col-md-10 col-sm-10 box box-block bg-white">
        <h5 class="mb-1">لیست فروشات</h5>
        <table class="table table-striped table-bordered editable-table" id="table-2">
          <thead>
            <tr>
              <th>شماره</th>
              <th>تاریخ</th>
              <th>قمیت کلی</th>
              <th>تخفیف (%)</th>
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
              <td name="payable">
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


  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <h4>تاریخ (ماه و سال)</h4>
        <div class=" col-lg-2 col-md-2 col-sm-2 box box-block ">
          <div class="scroll-demo custom-scroll custom-scroll-dark" style="height: 200px;">
              @foreach($archives2 as $stats)
              <li>
                <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" style=" font-size: 17px; color: black">
                  {{$stats['month']. ' ' .$stats['year']}}
                </a>
               </li>
              @endforeach
              <a href="/balance">همه</a>
         </div>
      </div>
      <div class="col-lg-10 col-md-10 col-sm-10 box box-block bg-white">
        <h5 class="mb-1">لیست عواید</h5>
        <table class="table table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>منبع</th>
              <th>مبلغ</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum1=0; ?>
            @foreach($revenues as $revenue)
            <tr>
              <td>{{$revenue->date}}</td>
              <td>{{$revenue->source}}</td>
              <td>{{$revenue->amount}}</td>
            </tr>
            <?php $sum1 += $revenue->amount; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله عواید</th>
                 <th colspan="1" id="fn"><?php echo $sum1; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <h3 style="color: #0af30a"> جمله عواید  <?php
            $total = $sum + $sum1;
            echo $total;
         ?></h3> </center>
      </div>
    </div>
  </div><!-- Content -->




  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <h4>تاریخ (ماه و سال)</h4>
      <div class=" col-lg-2 col-md-2 col-sm-2 box box-block ">

        <div class="scroll-demo custom-scroll custom-scroll-dark" style="height: 200px;">
            @foreach($archives3 as $stats)
            <li>
              <a href="/balance/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" style=" font-size: 17px; color: black">
                {{$stats['month']. ' ' .$stats['year']}}
              </a>
             </li>
            @endforeach
            <a href="/balance">همه</a>
       </div>
    </div>
      <div class="box col-lg-10 col-md-10 col-sm-10 box-block bg-white">
        <h5 class="mb-1">لیست مصارف</h5>
        <table class=" table  table-striped table-bordered dataTable" id="table-2">
          <thead>
            <tr>
              <th>تاریخ</th>
              <th>جنس</th>
              <th>قیمت کلی</th>
            </tr>
          </thead>
          <tbody>
            <?php $sum2=0; ?>
            @foreach($expenses as $expenses)
            <tr>
              <td>{{$expenses->date}}</td>
              <td>{{$expenses->item}}</td>
              <td>{{$expenses->total}}</td>
            </tr>
            <?php $sum2 += $expenses->total; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="2">جمله مصارف</th>
                <th colspan="1" ><?php echo $sum2; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
        <center style="direction: ltr; ">
          <h3 style="color: red"> جمله مصارف <?php
            echo $sum2;
         ?></h3> </center>
      </div>
      <center style="direction: ltr">
        <h1  style="color: #f57609">
          <span class="fa fa-balance-scale"></span>
           <?php
          $c = $total - $sum2;
          echo $c;
          ?>
            بیلانس
        </h1>
     </center>
    </div>
  </div>

@endsection
