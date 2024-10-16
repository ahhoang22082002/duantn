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
