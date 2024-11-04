document.addEventListener('DOMContentLoaded', function () {
  const selectedItem = document.getElementById('selectedItem');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const dropdownItems = document.querySelectorAll('.dropdown-item');

  // Hiện các item khi click vào item đã chọn
  selectedItem.addEventListener('click', function () {
    dropdownItems.forEach(item => {
      // Chỉ hiện các item khác khi item đã chọn được nhấp
      item.style.display = item.style.display === 'none' ? 'block' : 'none';
    });
  });

  // Khi chọn item trong danh sách, thay thế nội dung của item đã chọn và ẩn danh sách
  dropdownItems.forEach(item => {
    item.addEventListener('click', function () {
      selectedItem.textContent = this.textContent; // Thay đổi nội dung item đã chọn
      dropdownItems.forEach(i => i.style.display = 'none'); // Ẩn tất cả item sau khi chọn
    });
  });

  // Khởi tạo: Ẩn tất cả dropdown items ngoại trừ item đã chọn
  dropdownItems.forEach((item, index) => {
    if (index !== 0) { // Giữ item đầu tiên
      item.style.display = 'none';
    }
  });
});


//cart




function updateQuantity(itemId, change, price) {
  var quantityInput = document.getElementById('quantity-' + itemId);
  var newQuantity = parseInt(quantityInput.value) + change;

  if (newQuantity < 1) return; // Không cho phép số lượng nhỏ hơn 1

  quantityInput.value = newQuantity;

  // Cập nhật tổng tiền cho từng sản phẩm
  var totalCell = document.getElementById('total-' + itemId);
  totalCell.innerHTML = '$' + numberWithCommas((newQuantity * price).toFixed(2));

  // Gửi yêu cầu Ajax để cập nhật session
  $.ajax({
      url: '/cart/update', // Đường dẫn đến route để cập nhật giỏ hàng
      method: 'POST',
      data: {
          id: itemId,
          quantity: newQuantity,
          _token: '{{ csrf_token() }}' // Đừng quên token CSRF
      },
      success: function(response) {
          // Cập nhật tổng số tiền giỏ hàng
          updateCartTotal();
      }
  });
}

function updateTotal(price, itemId) {
  var quantityInput = document.getElementById('quantity-' + itemId);
  var totalCell = document.getElementById('total-' + itemId);
  var newTotal = (quantityInput.value * price).toFixed(2);
  totalCell.innerHTML = '$' + numberWithCommas(newTotal);

  updateCartTotal();
}

function updateCartTotal() {
  var total = 0;
  $('.quantity-amount').each(function() {
      var quantity = $(this).val();
      var price = $(this).data('price');
      total += (quantity * price);
  });
  $('#cart-total').html('$' + numberWithCommas(total.toFixed(2)));
}
ư
function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


