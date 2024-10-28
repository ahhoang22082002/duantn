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


function updateQuantity(id, change) {
  const quantityInput = document.getElementById(`quantity-${id}`);
  let currentQuantity = parseInt(quantityInput.value);
  currentQuantity += change;
  if (currentQuantity < 1) currentQuantity = 1; 
  quantityInput.value = currentQuantity;

  const price = parseFloat(quantityInput.getAttribute('data-price')); // Lấy giá từ thuộc tính data-price
  updateTotal(price, currentQuantity, id); 
}

function updateTotal(price, quantity, id) {
  const total = price * quantity; 
  const totalElement = document.getElementById(`total-${id}`); 
  totalElement.textContent = `${total.toLocaleString('vi-VN')} VNĐ`;


  updateCartTotal();
}

function updateCartTotal() {
  const cartItems = document.querySelectorAll('.quantity-amount');
  let totalSum = 0;

  cartItems.forEach(item => {
      const quantity = parseInt(item.value); 
      const price = parseFloat(item.getAttribute('data-price')); 

      totalSum += price * quantity; 
  });


  const cartTotalElement = document.getElementById('cart-total');
  cartTotalElement.textContent = `${totalSum.toLocaleString('vi-VN')} VNĐ`;
}
