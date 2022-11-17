<footer>


<?=$addons->set('fanpage-facebook', 'fanpage-facebook', 2);?>
                    <?=$addons->set('messages-facebook', 'messages-facebook', 2);?>


    <!-- footer top -->
    <div class="top">
        <div class="center">
            <div class="logo">

                <?=$func->getImage(['sizes' => '120x100x3', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name'.$lang]])?>

            </div>
            <div class="contact-s">
                <h1><?=$setting['name'.$lang] ?></h1>

                <div class="info-container">
                    <div class="info">
                        <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                        <p>162/81 Nguyễn Văn Khối, Phường 8, Quận Gò Vấp, Tp.HCM</p>
                    </div>

                    <div class="info">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <p>Email: linhtran1992dn@gmail.com</p>
                    </div>

                    <div class="info">
                        <span class="icon"><i class="fa-solid fa-phone"></i></span>
                        <p>Điện thoại: 0938 979 004</p>
                    </div>

                    <div class="info">
                        <span class="icon"><i class="fa-brands fa-aws"></i></span>
                        <p>https://www.companyname.com/</p>
                    </div>
                </div>

                <!-- footer social -->

                <div class="social">
                    <span><i class="fa-brands fa-facebook-f"></i></span>
                    <span><i class="fa-brands fa-tiktok"></i></span>
                    <span><i class="fa-brands fa-google"></i></span>
                    <span><i class="fa-brands fa-youtube"></i></i></span>
                    <span><i class="fa-brands fa-instagram"></i></span>
                    <span><i class="fa-brands fa-edge"></i></span>
                </div>
            </div>


            <div class="qr">
                <h3 class="footer-heading">mã QR</h3>

                <img src="assets/images/images_ttxl/qr.png" alt="">
            </div>
        </div>

    </div>
    <!-- bottom -->
    <div class="bottom">
        <div class="center">
            <div class="row">
                <div class="right-s">
                    <p>Copyright © 2021 by Company Name. All rights reserved. Design by NiNa Co.,Ltd</p>
                </div>
                <div class="left-s">
                    <p>Đang online: 100 / Tổng truy cập: 10000</p>
                </div>
            </div>
        </div>
    </div>

    <div class="map">
    <?=$addons->set('footer-map', 'footer-map', 2);?>
    </div>
</footer>