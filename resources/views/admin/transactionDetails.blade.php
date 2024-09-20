<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>ملکه ثریا</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('../vendors/bootstrap4-rtl/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/themify-icons/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/animate.css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/waves/waves.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/switchery/dist/switchery.min.css') }}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

	</head>
	<body class="fixed-sidebar fixed-header skin-default">

		<div class="wrapper">
			<!-- Preloader -->
			<div class="preloader"></div>
			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="">
				<!-- Content -->
				<div class="content-area py-1">
					<div class="container-fluid">
						<h4>جزئیات معامله</h4>
						<div class="card">
							<div class="card-block">
								<table class="table table-bordered table-striped mb-2">
									<thead>
										<tr>
											<th>خوراک ها</th>
											<th>قیمت</th>
											<th>تعداد</th>
											<th>قیمت کلی</th>
										</tr>
									</thead>
									<tbody>
									@foreach($sales_info as $sell)
										<tr>
                      <td>{{$sell->productName}}</td>
                      <td>{{$sell->price}}</td>
                      <td>{{$sell->product_qty}}</td>
                      <td>{{$sell->price * $sell->product_qty}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="row">
									<div class="col-lg-6">
										<div class="col-sm-6 col-xs-6">
											<div class="clearfix mb-0-25">
												<strong class="float-xs-left">اسم فروشنده: {{$sell->name}}</strong>
												<strong class="float-xs-left">تاریخ معامله: {{$sell->created_at}}</strong>
											</div>
										</div>
									</div>

									<div class="col-lg-6">
										<div class="text-xs-right">
											<div class="mb-0-5">قیمت کلی: {{$sell->total}}</div>
											<div class="mb-0-5">  تخفیف: <span>%{{$sell->discount}}</span>
										</div>
											قابل پرداخت:
											<strong>
												<?php
														$main_cost = $sell->total;
														$discount = $sell->discount;
														$x = ($main_cost * $discount) / 100;
														$payable = $main_cost - $x;
														print ("$payable");
												 ?>
											</strong>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer clearfix">
                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light">
  							<button type="button" class="btn btn-info label-left float-xs-right mr-0-5">
									<span class="btn-label"><i class="ti-printer"></i></span>
									چاپ بیل
								</button>
								</a>
									<a href="/salesReport"><button type="button" class="btn-warning" name="button" >برگشت</button></a>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/tether/js/tether.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/bootstrap4-rtl/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/detectmobilebrowser/detectmobilebrowser.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/mwheelIntent.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jquery-fullscreen-plugin/jquery.fullscreen-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/waves/waves.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/switchery/dist/switchery.min.js') }}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
	</body>


<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
</html>
