<!-- Sidebar -->
<div class="site-overlay"></div>
<div class="site-sidebar" style="background-color: #373944">
  <div class="custom-scroll custom-scroll-light">
    <ul class="sidebar-menu">
      <li class="menu-title">صفحه اصلی</li>
      <li class="with-sub">
        <a href="/" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-anchor"></i></span>
          <span class="s-text">داشبورد</span>
        </a>
      </li>

      <li class="with-sub">
        <a href="{{route('category')}}" class="waves-effect  waves-light">
          <span class="s-icon"><i class="ti-anchor"></i></span>
          <span class="s-text">کتگوری محصولات</span>
        </a>
      </li>


      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-pencil-alt"></i></span>
          <span class="s-text">محصولات</span>
        </a>
        <ul>
          <li><a href="{{route('addProduct')}}">اضافه نمودن محصل جدید</a></li>
          <li><a href="{{route('product')}}">لیست محصولات</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>
          <span class="s-icon"><i class="ti-pencil-alt"></i></span>
          <span class="s-text">مشتریان</span>
        </a>
        <ul>
          <li><a href="{{route('customer')}}">اضافه نمودن مشتری جدید</a></li>
        </ul>
      </li>

      <li class="with-sub">
        <a href="#" class="waves-effect  waves-light">
          <span class="s-caret"><i class="fa fa-angle-down"></i></span>

          <span class="s-icon"><i class="ti-package"></i></span>
          <span class="menu">فروشات</span>
        </a>
        <ul>
          <li><a href="{{route('sales')}}">فروش</a></li>
          <li><a href="{{route('salesList')}}">لیست فروشات</a></li>
        </ul>
      </li>

    </ul>
  </div>
</div>

<!-- Aside End -->
