<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vũ Trụ Đồng Hồ</title>
  <link rel="shortcut icon" href="assets/Img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/account_registration_form.css">
  <link rel="stylesheet" href="assets/css/header.css">
  <link rel="stylesheet" href="assets/css/footer.css">
  <link rel="stylesheet"  
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap&amp;_cacheOverride=1679484892371" data-tag="font">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" data-tag="font">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="./assets/JS/signup.js"></script>
</head>

<body>
  <!--Start: Header-->
  <div id="bar-header">
    <?php include("components/header.php"); ?>
  </div>
  <!--End: Header-->

  <div id="body" style="height: fit-content; margin-top: 50px;">
    <div class="containerlogin-containerlogin">
      <div style="width: 70%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <img src="assets/img/hoangImg/logo/logo_tron.png" alt="Logo" class="containerlogin-logo" onclick="">
        <span class="containerlogin-text24 TitleMedium">
          <span>VŨ TRỤ ĐỒNG HỒ</span>
        </span>
        <span class="containerlogin-text26">
          <span>
            <span>Nền tảng thương mại điện tử</span>
            <br>
            <span>Được yêu thích tại</span>
            <br>
            <span>Thành phố Hồ Chí Minh</span>
          </span>
        </span>
      </div>

      <form style="width: 70%; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;" name="frmdangky" id="registration-form" action="./modules/signup_processing.php" method="POST" onsubmit="return kiemTra();">

        <div class="containerlogin-group1">

          <div class="containerlogin-text LabelMedium" style="position: absolute; display: flex; flex-direction: row;">
            <span>ĐĂNG KÝ</span>
            <?php
            if (isset($_SESSION['error'])) {
              echo '<p style="font-size: 12px; line-height: 18.391px; padding-left: 12px; color: red; font-weight: bold;">' . $_SESSION['error'] . '</p>';
              unset($_SESSION['error']);
            }
            ?>
          </div>

          <div>
            <p style="margin-top: 30px; margin-bottom: 4px;">Họ và tên (*)</p>
            <input name="fullName" type="text" style="padding-left: 6px; width: 320px; height: 36px; border-style: outset; margin-bottom: 12px; border: 1px solid #674FA3; border-radius: 8px;" placeholder="Họ và tên" required>
          </div>

          <div>
            <p style="margin-bottom: 4px;">Số điện thoại (*)</p>
            <input id="numberPhone" name="numberPhone" type="text" style="padding-left: 6px; width: 320px; height: 36px; border-style: outset; margin-bottom: 12px; border: 1px solid #674FA3; border-radius: 8px;" placeholder="Số điện thoại" required>
            <p id="phoneNumber-message" style="color: red; display: none;"></p>
          </div>

          <div>
            <p style="margin-bottom: 4px;">Email (*)</p>
            <input name="email" type="email" id="email" style="padding-left: 6px; width: 320px; height: 36px; border-style: outset; margin-bottom: 12px; border: 1px solid #674FA3; border-radius: 8px;" placeholder="Email" required>
            <p id="error-message" style="color: red; display: none;"></p>
          </div>

          <div>
            <p style="margin-bottom: 4px;">Địa chỉ nhận hàng (*)</p>
            <input name="deliveryAddress" type="text" style="padding-left: 6px; width: 320px; height: 36px; border-style: outset; margin-bottom: 34px; border: 1px solid #674FA3; border-radius: 8px;" placeholder="Số nhà, đường" required>
          </div>

          <div>
            <input type="submit" id="btnSubmitLogin" class="containerlogin-text06 LabelLarge" value="Đăng ký" style="margin-left: 10px;">
          </div>

        </div>
      </form>
    </div>
  </div>

  <!--Start: Footer-->
  <div id="my-footer" style="color: blue">
    <?php include("components/footer.php"); ?>
  </div>
  <!--End: Footer-->

  <script src="./assets/JS/signup.js"></script>

  <!--Start check phone-->
  <script>
    var numberPhone = document.getElementById("numberPhone");
    var numberPhoneMessage = document.getElementById("phoneNumber-message");

    function isValidPhoneNumber(phoneNumber) {
      var pattern = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;
      return pattern.test(phoneNumber);
    }

    numberPhone.addEventListener("input", function () {
      var phoneNumber = numberPhone.value;
      
      if (phoneNumber.trim().length == 0) {
        numberPhoneMessage.innerText = ' ';
        numberPhoneMessage.style.display = "block";
      } else {
        if (isValidPhoneNumber(phoneNumber)) {
          numberPhoneMessage.innerText = "Số điện thoại hợp lệ";
          numberPhoneMessage.style.display = "block";
          numberPhoneMessage.style.color = "#00CC00";
        } else {
          numberPhoneMessage.innerText = "Số điện thoại không hợp lệ";
          numberPhoneMessage.style.display = "block";
        }
      }
    });
  </script>
  <!--End check phone-->

  <!--START: Script check các ô -->
  <script>
    function showAlert() {
      Swal.fire({
        title: 'Thông báo!',
        text: 'Bạn chưa điền đầy đủ các thông tin cần thiết!',
        icon: 'warning',
        confirmButtonText: 'Xác nhận'
      });
    }

    function kiemTra() {
      if (document.frmdangky.fullName.value.trim().length == 0 ||
        document.frmdangky.numberPhone.value.length == 0 ||
        document.frmdangky.email.value.length == 0 ||
        document.frmdangky.deliveryAddress.value.length == 0) {
        showAlert();
        return false;
      }
    }
  </script>
  <!--END: Script check các ô-->

</body>

</html>
