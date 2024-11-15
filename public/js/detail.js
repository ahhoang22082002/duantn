document.addEventListener('DOMContentLoaded', function () {
  const selectedItem = document.getElementById('selectedItem');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const dropdownItems = document.querySelectorAll('.dropdown-item');

 
  selectedItem.addEventListener('click', function () {
    dropdownItems.forEach(item => {
   
      item.style.display = item.style.display === 'none' ? 'block' : 'none';
    });
  });

 
  dropdownItems.forEach(item => {
    item.addEventListener('click', function () {
      selectedItem.textContent = this.textContent; 
      dropdownItems.forEach(i => i.style.display = 'none');
    });
  });

  
  dropdownItems.forEach((item, index) => {
    if (index !== 0) { 
      item.style.display = 'none';
    }
  });
});


//cart




function updateQuantity(itemId, change, price) {
  var quantityInput = document.getElementById('quantity-' + itemId);
  var newQuantity = parseInt(quantityInput.value) + change;
  if (newQuantity < 1) {
    alert("Số lượng không thể nhỏ hơn 1.");
    return;
};
  quantityInput.value = newQuantity;
  var totalCell = document.getElementById('total-' + itemId);
  totalCell.innerHTML = '$' + numberWithCommas((newQuantity * price).toFixed(2));
  $.ajax({
      url: '/cart/update',
      method: 'POST',
      data: {
          id: itemId,
          quantity: newQuantity,
          _token: '{{ csrf_token() }}'
      },
      success: function(response) {
          updateCartTotal(); 
      }
  });
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
function updateTotal(price, itemId) {
  var quantityInput = document.getElementById('quantity-' + itemId);
  var totalCell = document.getElementById('total-' + itemId);
  var newTotal = (quantityInput.value * price).toFixed(2);
  totalCell.innerHTML = '$' + numberWithCommas(newTotal);

  updateCartTotal();
}
function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
document.getElementById('phuongthuctt').addEventListener('change', function () {
  var form = document.getElementById('paymentForm');
  if (this.value === 'bank') {
      form.action = "{{ route('vnpay') }}";  // Thay 'vnpay' bằng tên route của bạn cho VNPay
  } else {
      form.action = "{{ route('order.submit') }}";
  }
});

