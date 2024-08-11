<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner Example</title>
    <style>
        #banner {
            position: fixed;
            bottom: 0px;
            z-index: 98;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
        }
        #close-btn {
            position: absolute;
            bottom: 100%;
            right: 1px;
            background: rgb(161, 90, 90);
            padding: 5px 10px;
            cursor: pointer;
            color: #fff;
        }
    </style>
</head>
<body>
        <div id="banner">
            <a href="index.php">
                <div style="display: inline-block; position: relative;">
                    <div>
                        <img src="assets/Img/hoangImg/imgs/banner_contact.png" width="700" height="80" alt="Contact Banner">
                    </div>
                    <div id="close-btn">X</div>
                </div>
            </a>
        </div>


    <script>
            document.addEventListener('DOMContentLoaded', function() {
            var closeButton = document.getElementById('close-btn');
            var banner = document.getElementById('banner');

            // Kiểm tra trạng thái banner có bị ẩn không
            console.log('Banner Hidden Status:', localStorage.getItem('bannerHidden'));
            if (localStorage.getItem('bannerHidden') === 'True') {
                banner.style.display = 'none'; // Ẩn banner nếu đã bị ẩn
            } else {
                banner.style.display = 'block'; // Hiển thị banner nếu không có trạng thái ẩn
            }

            function resetBannerStatus() {
                setTimeout(function() {
                    localStorage.removeItem('bannerHidden'); // Xóa trạng thái ẩn
                    checkBannerStatus(); // Cập nhật trạng thái banner
                }, 5 * 60 * 1000); // 5 phút = 5 * 60 * 1000 ms
            }

            // Kiểm tra trạng thái banner khi tải trang
            checkBannerStatus();
            // Xử lý sự kiện nhấp nút đóng banner
            closeButton.addEventListener('click', function() {
                banner.style.display = 'none'; // Ẩn banner
                localStorage.setItem('bannerHidden', 'true'); // Lưu trạng thái ẩn vào localStorage
                resetBannerStatus(); // Đặt lại trạng thái sau 5 phút
            });
        });

    </script>
</body>
</html>
