@extends('layout')
@section('tittle','Giỏ hàng')

@section('content')
@if(session('success'))
    <script>
        alert('{{ session('success') }}');
        window.location.href = "{{ route('cart') }}"; 
    </script>
@endif
@if(session('error'))
    <script>
        alert('{{ session('error') }}');
        window.location.href = "{{ route('cart') }}"; 
    </script>
@endif
<!-- Start Hero Section -->
@section('banner')
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Giỏ hàng của bạn</h1>
							</div>
						</div>
						
					</div>
				</div>
			</div>

<div class="untree_co-section before-footer-section">
          <div class="container">
                  <div class="row mb-5">

                    
                      <div class="site-blocks-table">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="product-thumbnail">Hình ảnh</th>
                              <th class="product-name">Tên hoa</th>
                              <th class="product-price">Giá</th>
                              <th class="product-quantity">Số lượng</th>
                              <th class="product-total">Tổng</th>
                              <th class="product-remove">Xóa</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($cart as $id => $item)
                            <tr>
                              <td class="product-thumbnail">
                                @if (isset($item['img']))
                                  <img src="{{ asset('img/' . $item['img']) }}" alt="Image" class="img-fluid">
                                @else
                                  <p>No image available</p>
                                @endif
                              </td>
                              <td class="product-name">
                                <h2 class="h5 text-black">{{ $item['name'] }}</h2>
                              </td>
                              <td>{{ number_format($item['price']) }} VNĐ</td>
                              <td>
                              <form class="col-md-12" method="POST" action="{{ route('cart.update') }}">
                              @csrf
                                <input type="number" class="form-control text-center" name="quantity[{{ $id }}]" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-primary">Cập nhật giỏ hàng</button>
                    </form>
                              </td>
                              <td id="total-{{ $id }}">{{ number_format($item['price'] * $item['quantity']) }} VNĐ</td>
                              <td>
                                  <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                  </form>
                                </td>

                            </tr>
                            @endforeach
                            <tr>
                              <td colspan="4" class="text-right">Tổng cộng</td>
                              <td id="cart-total">
                                {{ number_format(array_reduce($cart, function($carry, $item) {
                                    return $carry + ($item['price'] * $item['quantity']);
                                }, 0)) }} VNĐ
                              </td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                              
                    
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <a href="{{ route('cuahang') }}"><button class="btn btn-secondary me-2">Tiếp tục mua sắm</button></a>
                    </div>
                    <div class="col-md-6 pl-5">
                      <a href="{{ route('thanhtoan') }}">
                        <button class="btn btn-secondary me-2">Tiến hành thanh toán</button>
                      </a>
                    </div>
                  </div>
                </div>

          </div>
	@endsection
 

    