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
			  <div class="row mb-5">
		            <div class="col-md-12">
		              
		              <div class="p-3 p-lg-5 border bg-white">
                      <h2 class="h3 mb-3 text-black">Đăng nhập để áp dụng mã giảm giá và theo dõi tình trạng đơn hàng</h2>
					  
					
		              </div>
		            </div>
		          </div>
			 		<div class="col-md-6 mb-5 mb-md-0">
				    <h2 class="h3 mb-3 text-black">Thông tin khách hàng</h2>
				    <div class="p-3 p-lg-5 border bg-white">
									
					<form action="{{ route('cusorder.submit') }}" method="POST">
					@csrf
					<div class="form-group">
					    <label for="user_name" class="text-black">Tên người dùng</label>
					    <input type="text" id="user_name" class="form-control" name="ten"  required>
					</div>
					
					<div class="form-group">
					    <label for="user_address" class="text-black">Địa chỉ</label>
					    <input type="text" id="user_address" class="form-control" name="diachi"  required>
					</div>
					<div class="form-group row">
					    <div class="col-md-6">
					        <label for="user_email" class="text-black">Email</label>
					        <input type="email" id="user_email" class="form-control" name="email"  required>
					    </div>
					    <div class="col-md-6">
					        <label for="user_phone" class="text-black">Số điện thoại</label>
					        <input type="text" id="user_phone" class="form-control" name="sdt" required>
					    </div>
					</div>

				
				    </div>
				</div>

		        <div class="col-md-6">
		       
				  <div class="row mb-5">


		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
					  
					 
		              <div class="p-3 p-lg-5 border bg-white">

		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Sản phẩm của bạn</th>
							<th>Giá</th>
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
		                      <td class="text-black font-weight-bold">
									<strong> 
									@php
                						$cart = Session::get("cart_" . Auth::id(), []);
                						$totalAmount = 0;
                						foreach ($cart as $item) {
                						    $totalAmount += $item['price'] * $item['quantity'];
                						}
                						$finalAmount = Session::get("final_amount_" . Auth::id(), $totalAmount);
            							@endphp
            							{{ number_format($finalAmount) }} VNĐ
							 		 </strong></td>
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
 
 