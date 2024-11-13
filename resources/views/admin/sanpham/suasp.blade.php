@extends('admin.adlayout')

@section('dashboard')

<div class="container-fluid">
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('update', $hoa->id_hoa)  }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="tenhoa" value="{{ $hoa->tenhoa }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="number" class="form-control" name="gia" value="{{ $hoa->gia }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea class="form-control" name="mota" rows="3" required>{{ $hoa->mota }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Danh mục</label>
                <select class="form-select" name="id_dm" required>
                    <option value="">Chọn danh mục</option>
                    @foreach ($danhmuc as $dm)
                        <option value="{{ $dm->id_dm }}" {{ $dm->id_dm == $hoa->id_dm ? 'selected' : '' }}>
                            {{ $dm->ten_dm }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <img src="{{ asset('img/' . $hoa->img) }}" alt="Current Image" class="img-fluid mt-2" style="max-width: 150px;">
                <input type="file" class="form-control" name="img" accept="image/jpeg,image/png,image/jpg,image/gif" required>
                </div>
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        </form>
    </div>
</div>

@endsection
