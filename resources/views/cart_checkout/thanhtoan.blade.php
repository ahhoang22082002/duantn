@extends('layout')
@section('tittle','Thanh toán')

@section('content')
		<!-- Start Hero Section -->
        @section('banner')
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Thanh toán</h1>
								
								
							
								
							</div>
						</div>
						
					</div>
				</div>
			</div>
            <div class="untree_co-section">
		    <div class="container">
		
		      <div class="row">
			 		<div class="col-md-6 mb-5 mb-md-0">
				    <h2 class="h3 mb-3 text-black">Thông tin khách hàng</h2>
				    <div class="p-3 p-lg-5 border bg-white">
				
				        <div class="form-group row">
				            <div class="col-md-6">
				                <label for="c_fname" class="text-black">Tên người dùng</label>
				               
								<div class="card">
								  <div class="card-body py-1">
								  {{ $user->ten }}
								  </div>
								</div>
				            </div>
				        </div>
				
				        <div class="form-group row">
				            <div class="col-md-12">
				                <label for="c_address" class="text-black">Địa chỉ</label>
				                
								<div class="card">
								  <div class="card-body py-1">
								  {{ Auth::user()->diachi }}
								  </div>
								</div>
				            </div>
				        </div>
				
				        <div class="form-group row mb-5">
				            <div class="col-md-6">
				                <label for="c_email_address" class="text-black">Email</label>
				               
								<div class="card">
								  <div class="card-body py-1">
								  {{ Auth::user()->email }}
								  </div>
								</div>
				            </div>
				            <div class="col-md-6">
				                <label for="c_phone" class="text-black">Số điện thoại</label>
				                
								<div class="card">
								  <div class="card-body py-1">
								  {{ Auth::user()->sdt }}
								  </div>
								</div>
				            </div>
				        </div>
				
				    </div>
				</div>

		        <div class="col-md-6">
		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Mã giảm giá</h2>
		              <div class="p-3 p-lg-5 border bg-white">

		                <label for="c_code" class="text-black mb-3">Nhập mã giảm giá nếu có</label>
		                <div class="input-group w-75 couponcode-wrap">
		                  <input type="text" class="form-control me-2" id="c_code" placeholder="ABCXYZ" aria-label="Coupon Code" aria-describedby="button-addon2">
		                  <div class="input-group-append">
		                    <button class="btn btn-primary" type="button" id="button-addon2">Áp dụng</button>
		                  </div>
		                </div>

		              </div>
		            </div>
		          </div>
				  <div class="row mb-5">


		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
					  <form action="{{ route('order.submit') }}" method="POST">
					  @csrf
					 
		              <div class="p-3 p-lg-5 border bg-white">

		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Sản phẩm của bạn</th>
							<th>Số lượng</th>
		                    <th>Tổng</th>
		                  </thead>
		                  <tbody>
						  @foreach ($cart as $item)
           				         <tr>
           				             <td>{{ $item['name'] }}</td>
           				             <td>{{ number_format($item['price']) }} VNĐ</td>
           				             <td>{{ $item['quantity'] }}</td>
           				             <td>{{ number_format($item['price'] * $item['quantity']) }} VNĐ</td>
           				         </tr>
           				     @endforeach

								<tr>
		                      <td class="text-black font-weight-bold"><strong>Tổng tiền: </strong></td>
		                      <td class="text-black font-weight-bold"><strong>{{ number_format($totalamount) }} VNĐ</strong></td>
		                    </tr>
		                  </tbody>
		                </table>
						<label for="phuongthuctt">Phương thức thanh toán:</label>
   							 <select name="phuongthuctt" id="phuongthuctt" required>
   							     <option value="cod">Thanh toán khi nhận hàng</option>
   							     <option value="bank" >Thanh toán online</option>
							
   							 </select>
		                <div class="form-group">
		                  <button class="btn btn-primary" type="submit">Thanh Toán</button>
		                </div>

		              </div>

					  </form>
		            </div>
		          </div>
		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		     
		    </div>
		  </div>

 @endsection
 
 