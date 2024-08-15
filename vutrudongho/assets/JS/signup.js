function validateEmail(email) {
  // Biểu thức chính quy đơn giản để kiểm tra định dạng email
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}

// Sử dụng hàm validateEmail khi người dùng nhập email
document.getElementById('registerForm').addEventListener('submit', function(event) {
  const email = document.getElementById('email').value;
  if (!validateEmail(email)) {
      event.preventDefault(); // Ngăn không cho gửi form
      alert('Email không hợp lệ. Vui lòng nhập lại.');
  }
});
