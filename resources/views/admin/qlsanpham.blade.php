@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">

        <div class="card">
          
          <div class="card-body">
          <div class="row">
          <div class="col-md-9"> <h3>Tổng số sản phẩm : {{$tongsanpham}} </h3></div>
          <div class="col-md-3"><a href="{{route('themsp')}}" class="btn btn-primary mb-3">Thêm sản phẩm</a></div>
          </div>
          
            <div class="row">
            @foreach ($hoa as $item)
            <div class="col-md-4">
                
                <div class="card">
                  <div class="card-header">
                  <h5 class="card-title">{{$item->tenhoa}}</h5>
                  </div>
                  <img src="{{ asset('img/'.$item->img) }}" class="card-img-top" alt="...">
                  <div class="card-body">
                   
                    <p class="card-text">{{$item->mota}}</p>
                    <a href="{{ route('edit', $item->id_hoa) }}" class="btn btn-primary">Sửa</a>
                    <form action="{{ route('delete', $item->id_hoa) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
            </form>
                  </div>
                </div>
              </div>
                @endforeach
              
              <div class="d-flex justify-content-center">
            {{ $hoa->links('pagination::bootstrap-5') }}

                </div>
            </div>
          </div>
        </div>
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
@endsection