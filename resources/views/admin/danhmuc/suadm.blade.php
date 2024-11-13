@extends('admin.adlayout')

@section('dashboard')

<div class="container-fluid">
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('dmupdate', $danhmuc->id_dm) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="ten_dm" value="{{ $danhmuc->ten_dm }}" required>
            </div>
          
          
          
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </form>
    </div>
</div>

@endsection
