    @extends('admin.adlayout')

    @section('dashboard')
    @if(session('success'))
    <script>
        alert('{{ session('success') }}');
        window.location.href = "{{route('qltk')}}"; 
    </script>
    @endif
    <div class="container-fluid">
        <div class="container">
            <h1>Thông tin người dùng</h1>
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th> 
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $u)
                    <tr>
                    
                        <td>{{ $u->ten }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->diachi }}</td>
                        <td>{{ $u->sdt }}</td>
                        <td>{{ $u->role_name }}</td> 
                        <td><a href="{{ route('qltk.phanquyen', $u->id_nguoi) }}" class="btn btn-primary mb-2">Phân quyền</a>

                        <form action="{{ route('qltk.delete', $u->id_nguoi) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">Xóa</button>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection
