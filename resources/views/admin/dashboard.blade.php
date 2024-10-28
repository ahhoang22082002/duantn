@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex align-items-center gap-2 mb-4">
                            Traffic Overview
                            <span>
                                <iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success" data-bs-title="Traffic Overview"></iconify-icon>
                            </span>
                        </h5>
                        <div id="traffic-overview" >
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body text-center">
              <img src="{{asset('admin/assets/images/profile/user-1.jpg')}} " alt="image" class="img-fluid" width="205">
              <h4 class="mt-7">Danh sách Tài Khoản</h4>
              <p class="card-subtitle mt-2 mb-3">Kiểm tra từng tài khoản nhân viên</p>
                <button class="btn btn-primary mb-3">Xem Thêm</button>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quản lí sản phẩm</h5>
              <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                  <thead>
                    <tr class="border-2 border-bottom border-primary border-0"> 
                      <th scope="col" class="ps-0">Tên sản phẩm</th>
                 
                      <th scope="col" class="text-center">Danh mục</th>
                     
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @foreach ($hoa as $h)
                    <tr>
                      <th scope="row" class="ps-0 fw-medium">
                        <span class="table-link1 text-truncate d-block">{{$h->tenhoa}}</span>
                      </th>
                      <td class="text-center fw-medium">{{$h->danhmuc->ten_dm}}</td>
                     
                    </tr>
                    @endforeach
                   
                   
                   
                  
                  </tbody>
                </table>
              </div>
              <a href="{{route('qlsp')}}"><button class="btn btn-primary mb-3">Quản lí sản phẩm</button></a>
            </div>
          
          </div>
        </div>
     
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a>Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
    </div>
@endsection