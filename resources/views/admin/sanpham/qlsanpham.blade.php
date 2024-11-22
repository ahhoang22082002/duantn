@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">
<h1 class="text-primary text-uppercase">Danh sách sản phẩm</h1>
<div class="col-md-9"> <h3>Tổng số sản phẩm : {{$tongsanpham}} </h3></div>
<div class="col-md-3"><a href="{{route('themsp')}}" class="btn btn-primary mb-3">Thêm sản phẩm</a></div>

<table class="table">
            <thead>
                <tr>
                    
                    <th>Ảnh</th>
                    <th>Tên hoa</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
               <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($hoa as $item)
                  
                    <tr>
                        <td><img src="{{ asset('img/'.$item->img) }}" class="card-img-top" style="max-width:5em;" alt="..."></td>
                        <td>{{$item->tenhoa}}</td>
                        <td>{{$item->gia}}</td>
                        <td>{{$item->danhmuc->ten_dm}}</td>
                        <td>
                            <a href="{{ route('edit', $item->id_hoa) }}" class="btn btn-primary mb-2">Chỉnh sửa</a>
                            <form action="{{ route('delete', $item->id_hoa) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                        </form>
                        </td>
                    </tr>
                  
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $hoa->links('pagination::bootstrap-5') }}

                </div>
       
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
@endsection