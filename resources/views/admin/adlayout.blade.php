<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Thiên Lý shop</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('/assets/images/logos/seodashlogo.png')}}" />
  <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/cdb.min.css" />
  <style>
 
</style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          
          <img src="{{asset('img/logo.png')}}" style="max-width:70px;max-height:70px" alt="">

         
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('ad')}}" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Trang chủ</span>
              </a>
            </li>
           
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('qlsp')}}" aria-expanded="false">
                <span>
                <iconify-icon icon="mdi:flower"></iconify-icon>
                </span>
                <span class="hide-menu">Quản lí sản phẩm</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('qldm')}}" aria-expanded="false">
                <span>
                <iconify-icon icon="tdesign:catalog"></iconify-icon>
                </span>
                <span class="hide-menu">Quản lí danh mục</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('qldh')}}" aria-expanded="false">
                <span>
                <iconify-icon icon="solar:bag-bold"></iconify-icon>
                </span>
                <span class="hide-menu">Quản lí đơn hàng</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('qltk')}}" aria-expanded="false">
                <span>
                <iconify-icon icon="mdi:user"></iconify-icon>
                </span>
                <span class="hide-menu">Quản lí tài khoản</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('km')}}" aria-expanded="false">
                <span>
                <iconify-icon icon="mdi:hot"></iconify-icon>
                </span>
                <span class="hide-menu">Mã khuyến mãi</span>
              </a>
            </li>
      
         
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
             <ul class="navbar-nav">
                 @if (Auth::check())
                 <li class="nav-item"></li>
                 <li class="nav-item d-flex align-items-center">
             <img src="{{ asset('admin/assets/images/profile/user-1.jpg') }}" alt="User Avatar" class="rounded-circle me-2" style="width: 40px; height: 40px;"> <!-- Hình ảnh -->
             <a class="nav-link" href="#">{{ Auth::user()->ten }}</a> 
          </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class=" nav-link" style="padding: 0; margin-left: 5px;">Đăng xuất</button>
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"><img src="{{ asset('/img/user.svg') }}"></a>
            </li>
        @endif
    </ul>
</div>

        </nav>
      </header>
      <!--  Header End -->
     @yield('dashboard')
  </div>
  <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('admin/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/9d1d9a82d2.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
  <script>
    @if(isset($daysOfWeek) && isset($weeklySales))
      const ctx = document.getElementById("chart").getContext('2d');
      const daysOfWeek = @json($daysOfWeek); 
      const weeklySales =  @json($weeklySales); 
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels:daysOfWeek,
          datasets: [{
            label: 'Doanh thu theo tuần',
            backgroundColor: 'rgba(161, 198, 247, 1)',
            borderColor: 'rgb(47, 128, 237)',
            data: weeklySales ,
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
      @endif
      @if(isset($hot))
      const ctx2 = document.getElementById("chart2").getContext('2d');
      const productNames = @json($hot->pluck('tenhoa'));
      const productSales = @json($hot->pluck('total_sold')); 
      const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: productNames,
          datasets: [{
            label: 'Top 5 sản phẩm bán chạy',
            backgroundColor: 'rgba(161, 198, 247, 1)',
            borderColor: 'rgb(47, 128, 237)',
            data: productSales ,
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
      @endif
</script>


  </body>

</html>