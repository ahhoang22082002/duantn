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
		    <!-- để thông tin cá nhân (đã đăng ký trc đó ) -->
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Để lại đánh giá cho chúng tôi</h2>
		          <div class="p-3 p-lg-5 border bg-white">
		           
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">Họ <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_fname" name="c_fname">
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Tên<span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_lname" name="c_lname">
		              </div>
		            </div>

		            

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Địa chỉ <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_address" name="c_address" >
		              </div>
		            </div>

		       
		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="c_email_address" class="text-black">Email <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_email_address" name="c_email_address">
		              </div>
		              <div class="col-md-6">
		                <label for="c_phone" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_phone" name="c_phone" >
		              </div>
		            </div>

		          

		            <div class="form-group">
		              <label for="c_order_notes" class="text-black">Đánh giá</label>
		              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Đánh giá của bạn "></textarea>
					  <button class="btn btn-primary mt-3" type="button">Xác nhận</button>
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
   							     <option value="bank">Chuyển khoản ngân hàng</option>
							
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
		      <!-- </form> -->
		    </div>
		  </div>

 @endsection
 
 