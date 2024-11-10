@extends('admin.adlayout')

@section('dashboard')
<div class="container">
    <h2>Phân quyền cho: {{ $user->ten }}</h2>

    <form action="{{ route('qltk.doiquyen', $user->id_nguoi) }}" method="POST">
        @csrf
        <label>Chọn vai trò:</label>
        <div>
            <input type="radio" id="admin" name="role" value="1" {{ $user->role == 1 ? 'checked' : '' }}>
            <label for="admin">Admin</label>
        </div>
        <div>
            <input type="radio" id="customer" name="role" value="0" {{ $user->role == 0 ? 'checked' : '' }}>
            <label for="customer">Khách hàng</label>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
</div>
@endsection
