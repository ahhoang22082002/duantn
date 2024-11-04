@extends('admin.adlayout')

@section('dashboard')

<div class="container-fluid">
    <div class="container">
        <h1>Thêm sản phẩm</h1>
        <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tenhoa" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" class="form-control" name="gia" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea class="form-control" name="mota" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Danh mục</label>
                <select class="form-select" name="id_dm" required>
                    <option value="">Chọn danh mục</option>
                    @foreach ($danhmuc as $dm)
                        <option value="{{ $dm->id_dm }}">{{ $dm->ten_dm }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" name="img" accept="image/jpeg,image/png,image/jpg,image/gif" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>
</div>

@endsection
