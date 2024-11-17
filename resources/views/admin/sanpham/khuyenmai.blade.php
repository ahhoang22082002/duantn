@extends('admin.adlayout')

@section('dashboard')
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
<div class="container-fluid">
<h1 class="text-primary text-uppercase">Tạo mã khuyến mãi</h1>
<form action="{{ route('taokm') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="code" class="text-black">Mã giảm giá</label>
        <input type="text" name="code" id="code" class="form-control" required placeholder="Nhập mã giảm giá">
    </div>

    <div class="form-group">
        <label for="discount_value" class="text-black">Giảm giá (%)</label>
        <input type="number" name="discount_value" id="discount_value" class="form-control" required placeholder="Nhập giá trị giảm giá" min="1" max="100">
    </div>

    <div class="form-group">
        <label for="start_date" class="text-black">Ngày bắt đầu</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="end_date" class="text-black">Ngày kết thúc</label>
        <input type="date" name="end_date" id="end_date" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Tạo mã giảm giá</button>
</form>
<div class="col-lg-12 mt-3">
<div class="card">
              <table class="table">

                <thead class="table-primary">
                  <tr>
                    <th scope="col">Mã khuyến mãi</th>
                    <th scope="col">Phần trăm giảm</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Sửa</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($km as $item)
                <tr>
                    <td>{{$item->ma_khuyenmai}}</td>
                    <td>{{$item->phantramgiam}}</td>
                    <td>{{$item->ngay_bat_dau}}</td>
                    <td>{{$item->ngay_ket_thuc}}</td>
                    <td>
                           
                            <form action="{{ route('km.delete', $item->id_km) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Bạn có chắc chắn muốn mã giảm giá này?')">Xóa</button>
                        </form>
                        </td>
                  </tr>                
                @endforeach

                </tbody>
          </table>
              </div>
</div>
</div>

@endsection