@extends('layout')
@section('tittle','Cửa hàng')

@section('content')

<!-- Start Hero Section -->
@section('banner')
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Sản phẩm của chúng tôi</h1>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		

		

		<div class="untree_co-section product-section before-footer-section">
		<div class="container">
    <div class="row">
        <div class="col-md-3">
          
           <h3 class="mb-2">Danh mục</h3>
            
           
           
                <ul class="list-group list-group-flush">
                @foreach ($dm as $d)
                        <a href="{{ route('cuahang.danhmuc', ['id_dm' => $d->id_dm]) }}" style="text-decoration: none;">
                            <li class="list-group-item" style=" text-transform: uppercase;">
                                {{ $d->ten_dm }}
                            </li>
                        </a>
                    @endforeach
                </ul>
           

                       
        </div>
        <div class="col-md-9">
          
           

        <div class="mb-3">
            <form action="{{ route('hoa.search') }}" method="GET" id="searchForm">
                 <select name="sort" class="form-select" style="max-width: 150px;"onchange="this.form.submit()">
                            <option value="">Sắp xếp</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                   
                </select>
             </form>
        </div>

            <div id="searchResults" class="row" >
             <div class="d-flex justify-content-end mb-4">
                     <form action="{{ route('hoa.search') }}" method="GET" id="searchForm" class="input-group" style="max-width: 400px;">
                         <input type="text" name="query" class="form-control" placeholder="Tìm kiếm hoa">
                         <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                     </form>
            </div>
            @foreach ($hoa as $item)
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="{{ route('cuahang.chitiet', ['id_hoa' => $item->id_hoa]) }}">
                            <img src="img/{{$item->img }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $item->tenhoa }}</h3>
                            <strong class="product-price">{{ number_format($item->gia, 0, ',', '.') }} VNĐ</strong>
                            <span class="icon-cross">
                                <img src="img/cross.svg" class="img-fluid">
                            </span>
                        </a>
                    </div>
            @endforeach

            </div>
            <div class="d-flex justify-content-center">
            {{ $hoa->links('pagination::bootstrap-5') }}

                </div>
                
        </div>
    </div>
</div>

		</div>
@endsection
