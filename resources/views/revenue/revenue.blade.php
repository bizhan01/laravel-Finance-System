@extends('layouts.master')
@section('content')
<div class="container">
  <br>
<center> <h1>ثبت عواید</h1> </center>
<form method="POST" action="/revenue" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row form-group">
            <div class="col-md-4">
              <label for="profession" style="color: black">تاریخ</label>
              <input type="date" name="date" value=""  class="form-control"  required>
            </div>
            <div class="col-md-4">
              <label for="fullName" style="color: black">منبع</label>
              <input type="text" name="source" value="" class="form-control" placeholder="منبع" required>
            </div>
            <div class="col-md-4">
              <label for="profession" style="color: black">مبلغ </label>
              <input type="number" name="amount" value=""  class="form-control" placeholder="مبلغ" required>
            </div>
          </div>
          <div class="col-md-13" >
            <label for="">توضیحات</label>
            <textarea name="description" class="form-control" id="exampleTextarea" rows="3" ></textarea>
          </div>
         <br>
          <div class="row form-group">
              <div class="col-md-6">
                  <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
              </div>
            </div>
        @include('layouts.errors')
      </form>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class=" col-lg-2 box box-block ">
      <p> <b>لیست عواید ماهوار</b></p>
      <div class="scroll-demo custom-scroll custom-scroll-dark" style="height: 310px;">
          @foreach($archives as $stats)
          <li>
            <a href="/revenue/?month={{ $stats['month'] }}&year={{ $stats['year'] }}" style=" font-size: 17px; color: black">
              {{$stats['month']. ' ' .$stats['year']}}
            </a>
           </li>
          @endforeach
            <a href="/revenue">همه</a>
       </div>
   </div>

    <div class="col-lg-10 box box-block bg-white">
      <h5 class="mb-1">نمایش عواید</h5>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تاریخ</th>
            <th>منبع</th>
            <th>مبلغ</th>
            <th>توضیحات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($revenues as $revenue)
          <tr>
            <td>{{$revenue->date}}</td>
            <td>{{$revenue->source}}</td>
            <td>{{$revenue->amount}}</td>
            <td>{{$revenue->description}}</td>
            <td>
              <a href="{{ URL::to('revenue/' . $revenue->id . '/edit') }}"> <input type="button"  value="ویرایش" class="btn btn-info"> </a>
            </td>
            <td>
              <form action="{{url('revenue', [$revenue->id])}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit"  onclick='return confirm("خذف شود؟")' class="btn btn-danger">حذف</button>
              </form>
            </td>
          </tr>
          <?php $sum += $revenue->amount; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="3">جمله عواید</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
