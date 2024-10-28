    @extends('admin.adlayout')

    @section('dashboard')

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
                        <th>Vai trò</th> <!-- Thêm cột vai trò -->
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection
