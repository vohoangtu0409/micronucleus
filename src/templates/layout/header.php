<div class="header">
    <div class="header-top">
        <div class="wrap-content d-flex align-items-center justify-content-between">
            <p class="info-header"><?=$slogan['name'.$lang]?></p>
            <p class="info-header"><i class="fas fa-envelope"></i>Email: <?=$optsetting['email']?></p>
            <p class="info-header"><i class="fas fa-phone-square-alt"></i>Hotline: <?=$optsetting['hotline']?></p>
            <ul class="social social-header list-unstyled p-0 m-0">
                <?php foreach($social as $k => $v) { ?>
                <li class="d-inline-block align-top mr-1">
                    <a href="<?=$v['link']?>" target="_blank">
                        <?=$func->getImage(['sizes' => '30x30x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
                    </a>
                </li>
                <?php } ?>
            </ul>


        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap-content d-flex align-items-center justify-content-between">
            <a class="logo-header" href="">
                <?=$func->getImage(['sizes' => '120x100x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name'.$lang]])?>
            </a>
            <?php 
			/* 
			 <a class="banner-header" href="">
			 <?= $func->getImage(['sizes' => '730x120x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $banner['photo'], 'alt' => $setting['name'.$lang]])?>
            </a>
            */
            ?>

            <div class="title">
                <h1>chuyên sỉ thời trang nam</h1>
                <p>
                    Địa chỉ: 162/81 Nguyễn Văn Khối, Phường 8, Quận Gò Vấp, TP.HCM
                </p>
            </div>
            <!-- <a class="hotline-header">
				<p>Hotline hỗ trợ:</p>
				<span><?=$optsetting['hotline']?></span>
			</a> -->
            <div class="contact">
                <p class="contact-padding">hotline:</p>
                <h2 class="contact-padding">0938 979 004 - 0938 979 004</h2>
                <div class="owner">
                    <p class="contact-padding">liên hệ xuân linh</p>
                </div>
            </div>
        </div>
    </div>
</div>