@extends('admin.adlayout')

@section('dashboard')

<div class="container-fluid">
    <div class="container">
        <h1>Thêm Danh mục</h1>
        <form action="{{ route('dmadd') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="ten_dm" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
</form>

    </div>
</div>

@endsection
