@extends('layouts.master')

@section('content')
<div class="container">
  <br>
<center> <h1>ثبت تدارکات</h1> </center>
<form method="POST" action="/personlInfo" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row form-group">
            <div class="col-md-6 mb-3 mb-md-0">
              <label for="fullName" style="color: black">اسم جنس</label>
              <input type="text" name="fullName" value="" class="form-control" placeholder="اسم جنس" required>
            </div>
            <div class="col-md-6">
              <label for="profession" style="color: black">تاریخ خرید</label>
              <input type="date" name="profession" value=""  class="form-control" placeholder="Enter your profession" required>
            </div>
          </div>
          <div class="row form-group">
              <div class="col-md-6 mb-3 mb-md-0">
                <label for="Date of Birth" style="color: black">نمبر بل</label>
                  <input type="text" name="dob" value="" class="form-control" placeholder="نمبر بل">
              </div>
              <div class="col-md-6">
                <label for="phoneNumber" style="color: black">قیمت</label>
                <input type="number" name="phone" value=""  class="form-control" placeholder="قیمت" required>
              </div>
            </div>

              <div class="row form-group">

                  <div class="col-md-6">
                     <br>
                      <input type="submit" name="submit" value="ذخیره" class="btn btn-success">
                  </div>
                </div>
        @include('layouts.errors')
      </form>
      <hr>

      <!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>لیست تدارکات ثبت شده در سیستم</h4>
          <div class="box box-block bg-white">
            <h5 class="mb-1">استخراج معلومات</h5>
            <table class="table table-striped table-bordered dataTable" id="table-2">
              <thead>
                <tr>
                  <th>اسم جنس</th>
                  <th>تاریخ خرید</th>
                  <th>نمبر بل</th>
                  <th>قیمت</th>
                
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 4.0</td>
                  <td>Win 95+</td>
                  <td>4</td>

                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 5.0</td>
                  <td>Win 95+</td>
                  <td>5</td>

                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 5.5</td>
                  <td>Win 95+</td>
                  <td>5.5</td>

                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 6</td>
                  <td>Win 98+</td>
                  <td>6</td>

                </tr>

                <tr>
                  <td>Other browsers</td>
                  <td>All others</td>
                  <td>-</td>
                  <td>-</td>

                </tr>
              </tbody>

            </table>
          </div>
        </div>
      </div>
</div>
@endsection
