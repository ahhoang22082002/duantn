@extends('layout')
@section('tittle','Giỏ hàng')

@section('content')

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
                <form class="col-md-12" method="post">
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
                                      <p>No image available</p> <!-- Hoặc một hình ảnh mặc định -->
                                  @endif
                              </td>
                              <td class="product-name">
                                  <h2 class="h5 text-black">{{ $item['name'] }}</h2>
                              </td>
                              <td>${{ number_format($item['price']) }}</td>
                              <td>
                                  <form class="d-flex align-items-center">
                                      <input type="hidden" name="id" value="{{ $item['id'] }}">
                                      <div class="input-group" style="max-width: 200px;">
                                          <div class="input-group-prepend">
                                              <button class="btn btn-outline-black decrease" type="button" onclick="updateQuantity('{{ $item['id'] }}', -1, '{{ $item['price'] }}')">&minus;</button>
                                          </div>
                                          <input type="number" 
                                                 class="form-control text-center quantity-amount" 
                                                 name="quantity" 
                                                 id="quantity-{{ $item['id'] }}" 
                                                 value="{{ $item['quantity'] }}" 
                                                 min="1" 
                                                 onchange="updateTotal('{{ $item['price'] }}', '{{ $item['id'] }}')"
                                                 data-price="{{ $item['price'] }}"> <!-- Thêm thuộc tính data-price -->
                                          <div class="input-group-append">
                                              <button class="btn btn-outline-black increase" type="button" onclick="updateQuantity('{{ $item['id'] }}', 1, '{{ $item['price'] }}')">&plus;</button>
                                          </div>
                                      </div>
                                  </form>
                              </td>
                                <td id="total-{{ $item['id'] }}">${{ number_format($item['quantity'] * $item['price']) }}</td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                                    </form>
                                  </td>
                          </tr>
                                    @endforeach
                          <tr>
                               <td colspan="4" class="text-right">Tổng cộng</td>
                               <td id="cart-total">${{ number_format(array_reduce($cart, function($carry, $item) {
                                   return $carry + ($item['price'] * $item['quantity']);
                               }, 0)) }}</td>
                               <td></td>
                           </tr>

                      </tbody>
                      <tfoot>
            



                      </tfoot>

                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                   
                    <div class="col-md-6">
                      <a href="{{route('cuahang')}}"><button class="btn btn-secondary me-2">Tiếp tục mua sắm</button></a>
                    </div>
                  </div>
                 
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                   
                      
                   
        
                      <div class="row">
                        <div class="col-md-12">
                          <a href="{{route('thanhtoan')}}"><button class="btn btn-secondary me-2" onclick="window.location='checkout.html'">Tiến hành thanh toán</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
	@endsection
 

    