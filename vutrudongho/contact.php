<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vũ Trụ Đồng Hồ</title>
  <link rel="shortcut icon" href="assets/Img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap&amp;_cacheOverride=1679484892371"
        data-tag="font">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        data-tag="font">
        <style>
        /* Style cho biểu mẫu */
        .input {
            margin-right: 0;
            padding: 80px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-sizing: border-box; /* Đảm bảo padding không làm tăng chiều rộng */
        }

        /* Style cho các nhãn và trường nhập */
        .input label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input input[type="text"],
        .input input[type="email"],
        .input select,
        .input textarea {
            width: calc(50% - 10px); /* Hoặc sử dụng 100% và loại bỏ margin-right */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Đảm bảo padding không làm tăng chiều rộng */
        }


        .input textarea {
            width: calc(100% - 20px); /* Chiều rộng của textarea */
            margin-right: 0; /* Bỏ khoảng cách bên phải */
        }

        /* Style cho nút gửi */
        .input button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* Màu nền của nút */
            color: #fff; /* Màu chữ của nút */
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px; /* Khoảng cách phía trên nút */
            transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu nền */
        }

        .input button:hover {
            background-color: #0056b3; /* Màu nền khi di chuột qua nút */
        }

    </style>
</head>
  <!--Start: Header-->
  <div id="bar-header">
    <?php
    include("components/header.php");
    ?>
  </div>
  <!--End: Header-->
<body style="position: relative;    background: rgb(128,83,221);
    background: linear-gradient(133deg, rgba(128,83,221,1) 2%, rgba(173,114,206,1) 50%, rgba(220,165,200,1) 100%);" >
    <div id="container-aboutUs" style="position: relative;top:50px;height: fit-content;width: 100%;display: flex;flex-direction: column;align-items: center;">
        <img src="assets/Img/hoangImg/imgs/banner_contact.png" width="100%" alt="">
        <a name="lien_he_chung_toi"></a>
            <div id="lienhechungtoi" style="margin-top:50px;display: flex;flex-direction: column;width: 95%;background-color: #fff;height: fit-content;padding: 12px;">
                <p style="font-weight: bold;font-size: 24px;margin-bottom: 4px;">Liên hệ ngay với chúng tôi</p>
                <form action="process_contact.php" method="post" class="input">
                <div class="form-group">
                    <label for="full_name">Họ và tên:</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Chủ đề:</label>
                    <select id="subject" name="subject" required>
                        <option value="support">Hỗ trợ kỹ thuật</option>
                        <option value="product">Câu hỏi về sản phẩm</option>
                        <option value="feedback">Phản hồi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Nội dung:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>

                <button type="submit">Gửi</button>
            </form>
        <a name="ban_hang_online"></a>
        <div id="banhangonline" style="margin-top:50px;display: flex;flex-direction: column;width: 95%;background-color: #fff;height: fit-content;padding: 12px;">
            <p style="font-weight: bold;font-size: 24px;margin-bottom: 4px;">Bán hàng online</p>
            <p>Tư vấn & Mua hàng trực tuyến: 1900.2091 (08:30 - 12:00; 13:30 - 21:30)</p>
            <p>Số điện thoại liên hệ:</p>
            <p>Hà Nội: (024).73045566</p>
            <p>Đà Nẵng: (024).73045566</p>
            <p>TP.Hồ Chí Minh: (028).73045566</p>
            <p>Email hỗ trợ bán hàng Online, doanh nghiệp: online@vutrudongho.com</p>
            <p>Email hỗ trợ chung: contact@vutrudongho.com</p>
        </div>
        <a name="cham_soc_khach_hang"></a>
        <div id="chamsockhachhang" style="margin-top:50px;display: flex;flex-direction: column;width: 95%;background-color: #fff;height: fit-content;padding: 12px;">
            <p style="font-weight: bold;font-size: 24px;margin-bottom: 4px;">Chăm sóc khách hàng</p>
            <p>Bộ phận Chăm sóc khách hàng là bộ phận chuyên tiếp nhận góp ý, thắc mắc & phản hồi của khách hàng trước, đang và sau khi mua hàng. </p>
            <p>Với đội ngũ nhân viên năng động & sẵn sàng lắng nghe, mọi thắc mắc về dịch vụ, chất lượng sản phẩm,... đều sẽ được tiếp nhận và tư vấn rõ ràng, cụ thể, nhằm mang lại cho khách hàng trải nghiệm mua hàng trọn vẹn nhất tại Vũ Trụ Đồng Hồ.</p>
            <p>Quý khách cần thông tin về sản phẩm, chính sách bán hàng hoặc các vấn đề liên quan tới Vũ Trụ Đồng Hồ, xin vui lòng liên hệ bộ phận Chăm sóc khách hàng qua hình thức:</p>
            <p>- Email: cskh@vutrudongho.com</p>
            <p>- Hotline: 1900 2000</p>
            <p>Hoặc để lại tin nhắn qua fanpage Vũ Trụ Đồng Hồ. Chúng tôi sẽ cố gắng phản hồi sớm nhất có thể.</p>
            <p>Zalo: /ZaloVuTruDongHo</p>
            <p>Facebook: /Vutrudonghoofficial</p>
        </div>
        <a name="ho_tro_ky_thuat"></a>
        <div id="hotrokythuat" style="margin-top:50px;margin-bottom:50px;display: flex;flex-direction: column;width: 95%;background-color: #fff;height: fit-content;padding: 12px;">
            <p style="font-weight: bold;font-size: 24px;margin-bottom: 4px;">Hỗ trợ kỹ thuật</p>
            <p>Trung tâm bảo hành dịch vụ Vũ Trụ Đồng Hồ</p>
            <p>Địa chỉ miền Bắc: 27A Nguyễn Công Trứ, P.Đồng Nhân, Q.Hai Bà Trưng, HN (SĐT 093.235.10.80)</p>
            <p>Địa chỉ miền Trung: 27A Nguyễn Công Trứ, P.Đồng Nhân, Q.Hai Bà Trưng, Đà Nẵng (SĐT 093.235.10.80)</p>
            <p>Địa chỉ miền Nam: 27A Nguyễn Công Trứ, P.Đồng Nhân, Q.Hai Bà Trưng, TP.HCM (SĐT 093.235.10.80)</p>
        </div>
    </div>
      <!--Start: Footer-->
  <div id="my-footer" style="margin-top: 50px;" >
    <?php
    include("components/footer.php");
    ?>
  </div>
  <!--End: Footer-->
    <!--start Hiện thanh line-->
    <script>
    var lineHome = document.getElementById("navbarContact");

    lineHome.style.borderBottom = '2px solid #fff';
    lineHome.style.paddingBottom = '1.15px';
  </script>
  <!--end Hiện thanh line-->
</body>

</html>