@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">
        <div class="row">
        <h3 class=" mb-2">Thống kê</h3>
        <div class="col-lg-3">
       
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng sản phẩm</h4>
                <h1 class=" mb-2 text-warning text-center  text-uppercase">{{$tongsanpham}}</h1>
               <div class="d-flex justify-content-center">
               <a href="{{route('qlsp')}}" class="card-link text-center">  <button class="btn btn-primary mb-3">Quản lí sản phẩm</button></a>
               </div>
                
              </div>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng danh mục</h4>
                <h1 class=" mb-2 text-warning text-center  text-uppercase">{{$tongdanhmuc}}</h1>
               <div class="d-flex justify-content-center">  <a href="{{route('qldm')}}" class="card-link">  <button class="btn btn-primary mb-3">Quản lí danh mục</button></a></div>
              
              </div>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng tài khoản</h5>
                <h1 class=" mb-2 text-warning text-center  text-uppercase">{{$tongtaikhoan}}</h1>
                <div class="d-flex justify-content-center"> <a href="{{route('qltk')}}" class="card-link">  <button class="btn btn-primary mb-3">Quản lí tài khoản</button></a></div>
               
              </div>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4 class="card-title text-center">Tổng đơn hàng</h4>
                <h1 class="mb-2 text-warning text-center  text-uppercase">{{$tongdonhang}}</h1>
               <div class="d-flex justify-content-center"><a href="{{route('qldh')}}" class="card-link">  <button class="btn btn-primary mb-3">Quản lí đơn hàng</button></a></div>
                
              </div>
            </div>
        </div>
            <div class="col-lg-8">
            <h3 class=" mb-2">Doanh thu</h3>

            <div class="card chart-container">
    <canvas id="chart"></canvas>
  </div>
          
           </div>
           <div class="col-lg-4">
       
           <form action="{{ route('ad.sta') }}" method="POST">
            @csrf
           <div class="row mb-3">
             
                   <h4>Xem doanh thu của ngày:</h4>
                   <input type="date" class="form-control" id="date" name="date" value="{{ request('date') }}">

           
             

              
           </div>

          <button type="submit" class="btn btn-primary">Lọc</button>
      </form>
          <div class="mt-4">
              <h4>Thống kê doanh thu</h4>
              <p>Doanh thu: <strong>{{ number_format($sales, 0, ',', '.') }} VND</strong></p>
          </div>
           
             
        </div>
     
        <div class="col-lg-4">
      <h3 class="text-center mb-2">Sản phẩm bán chạy</h3>
      <div class="card">
              <table class="table">

                <thead class="table-primary">
                  <tr>
                    <th scope="col">Hoa</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Tổng đơn hàng</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($hot as $item)
                <tr>
                    <td>{{$item->tenhoa}}</td>
                    <td>{{$item->hoa->danhmuc->ten_dm}}</td>
                    <td>{{$item->total_sold}}</td>
                  </tr>                
                @endforeach

                </tbody>
          </table>
              </div>
      </div>
      <div class="col-lg-8">
      <div class="card chart-container">
              <canvas id="chart2"></canvas>
            </div>
      </div>
     
      </div>
    </div>
   
@endsection