@extends('admin.adlayout')

@section('dashboard')
<div class="container-fluid">
<div class="card-body">
    <div class="row">
   
    <div class="table-responsive">
    <a href="{{route('themdm')}}" class="btn btn-primary mb-3">Thêm danh mục</a>
        <table class="table text-nowrap align-middle mb-0">
            <thead>
                <tr class="border-2 border-bottom border-primary border-0"> 
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col" class="text-center">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danhmuc as $dm)
                <tr>
                    <td>{{ $dm->ten_dm }}</td>
                    <td class="text-center">
                        <a href="{{ route('dmedit', $dm->id_dm) }}" class="btn btn-primary">Sửa</a>
                        <form action="{{ route('dmdelete', $dm->id_dm) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

</div>

@endsection