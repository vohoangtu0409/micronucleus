<?php if(count($pronb)) { ?>
<div class="wrap-product wrap-content">
    <!-- tiêu đề -->
    <div class="heading">
        <div class="title-main">
            <h2>
                <span class="decoration"></span> thời trang mới về
                <span class="decoration"></span>
            </h2>
            <p>Chúng tôi chuyên sỉ thời trang Quảng Châu</p>
        </div>
    </div>
    <div class="paging-product">

    </div>
</div>
<?php } ?>


<?php 
/*
<!-- Video clip Tin tức -->
<!-- <div class="wrap-intro mb-5">
	<div class="wrap-content py-5">
		<div class="title-main"><span>Video clip - tin tức</span></div>
		<div class="row">
			<div class="col-6">
				<?php if(!empty($newsnb)) { ?>
<div class="news-intro position-relative">
    <span class="news-control position-absolute transition" id="up"><i class="fas fa-chevron-up"></i></span>
    <span class="news-control position-absolute transition" id="down"><i class="fas fa-chevron-down"></i></span>
    <div class="news-scroll position-relative">
        <ul class="list-unstyled p-0 m-0">
            <?php foreach($newsnb as $v) { ?>
            <li>
                <div class="news-shadow d-flex align-items-center justify-content-start">
                    <div class="news-shadow-time position-relative text-capitalize text-center">
                        <span class="d-block"><?=$func->makeDate($v['date_created'])?></span>
                        <span class="d-block"><?=date("d/m/Y",$v['date_created'])?></span>
                    </div>
                    <div class="news-shadow-article position-relative d-flex align-items-center justify-content-start">
                        <a class="news-shadow-image rounded-circle scale-img" href="<?=$v[$sluglang]?>"
                            title="<?=$v['name'.$lang]?>">
                            <?=$func->getImage(['class' => 'lazy w-100', 'sizes' => '90x90x1', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
                        </a>
                        <div class="news-shadow-info">
                            <h3 class="news-shadow-name">
                                <a class="text-decoration-none transition text-split" href="<?=$v[$sluglang]?>"
                                    title="<?=$v['name'.$lang]?>"><?=$v['name'.$lang]?></a>
                            </h3>
                            <div class="news-shadow-desc text-split"><?=$v['desc'.$lang]?></div>
                        </div>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>
</div>
<div class="col-6">
    <div class="video-intro">
        <?=$addons->set('video-fotorama', 'video-fotorama', 4);?>
        <?php /* $addons->set('video-select', 'video-select', 4);  ?>
    </div>
</div>
</div>
</div>
</div> -->

*/
?>
<!-- Quảng Cáo -->
<?php if(count($quangcao)) { ?>
<div class="slideshow">
    <div class="owl-page owl-carousel owl-theme" data-xsm-items="1:0" data-sm-items="1:0" data-md-items="1:0"
        data-lg-items="1:0" data-xlg-items="1:0" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0"
        data-mousedrag="0" data-touchdrag="0" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
        data-dots="0"
        data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
        data-nav="1"
        data-navtext="<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-left' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='5' y1='12' x2='9' y2='16' /><line x1='5' y1='12' x2='9' y2='8' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-right' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='15' y1='16' x2='19' y2='12' /><line x1='15' y1='8' x2='19' y2='12' /></svg>"
        data-navcontainer=".control-slideshow">
        <?php foreach($quangcao as $v) { ?>
        <div class="slideshow-item" owl-item-animation>
            <a class="slideshow-image" href="<?=$v['link']?>" target="_blank" title="<?=$v['name'.$lang]?>">
                <?=$func->getImage(['class' => 'lazy w-100', 'sizes' => '1366x300x1', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
            </a>
        </div>
        <?php } ?>
    </div>
    <div class="control-slideshow control-owl transition"></div>
</div>
<?php } ?>

<!-- Danh mục sản phẩm (table_product_list) -->
<?php if(count($splistnb)) { foreach($splistnb as $vlist) {
    $dmsp = $cache->get("select name$lang, slugvi, slugen, sale_price, regular_price, discount, photo, id from #_product where id_list = ?  and   type = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist["id"] ,'san-pham') , 'result', 7200);
?>

<div class="wrap-product wrap-content">
    <div class="title-main">
        <h2>

            <span class="decoration"></span>
            <?=$vlist['name'.$lang]?>
            <span class="decoration"></span>
        </h2>
        <p>Chúng tôi chuyên sỉ thời trang nam Quảng Châu </p>
        <?php 
		/*
        <div class="paging-product-category paging-product-category-<?=$vlist['id']?>" data-list="<?=$vlist['id']?>">

        */
        ?>

    </div>
    <div class="product-wrapper1 ">
        <div class=" owl-carousel owl-theme owl-page owl-product" data-xsm-items="1:0" data-sm-items="1:0"
            data-md-items="1:0" data-lg-items="1:0" data-xlg-items="4:0" data-rewind="1" data-autoplay="1" data-loop="0"
            data-lazyload="0" data-mousedrag="0" data-touchdrag="0" data-smartspeed="800" data-autoplayspeed="800"
            data-autoplaytimeout="5000" data-dots="0"
            data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
            data-nav="1"
            data-navtext="<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-left' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='5' y1='12' x2='9' y2='16' /><line x1='5' y1='12' x2='9' y2='8' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-right' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='15' y1='16' x2='19' y2='12' /><line x1='15' y1='8' x2='19' y2='12' /></svg>"
            data-navcontainer=".control-product<?=$vlist['id']?>">

            <?php foreach($dmsp as $k => $v) { ?>
            <!-- <div class="product"> class mặc định của source -->
            <div class="product-items f-width ">
                <a class="box-product text-decoration-none" href="<?=$v[$sluglang]?>" title="<?=$v['name'.$lang]?>">
                    <p class="pic-product scale-img">
                        <?=$func->getImage(['sizes' => '270x270x1', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
                    </p>
                    <h3 class="product-name"><?=$v['name'.$lang]?></h3>
                    <p class="product-price">
                        <?php if($v['discount']) { ?>
                        <span class="price-new"><?=$func->formatMoney($v['sale_price'])?></span>
                        <span class="price-old"><?=$func->formatMoney($v['regular_price'])?></span>
                        <span class="price-per"><?='-'.$v['discount'].'%'?></span>
                        <?php } else { ?>
                        <span
                            class="price-new"><?=($v['regular_price']) ? $func->formatMoney($v['regular_price']) : lienhe?></span>
                        <?php } ?>
                    </p>
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="control-product<?=$vlist['id']?> control-owl transition"></div>
    </div>
</div>

<?php } } ?>
<!-- phần giới thiệu -->


<div class="about-wrapper">
    <div class="center">
        
            <div class="row">
                <div class="img">
                    <?=$func->getImage(['sizes' => '500x550x1', 'isWatermark' => false, 'prefix' => 'news', 'upload' => UPLOAD_NEWS_L, 'image' => $intro['photo'], 'alt' => $intro['name'.$lang]])?>

                    <div class="about-container">
                        <p>videoclip</p>
                    </div>

                    <div class="about-subContainer">
                        <p>fashion</p>
                    </div>
                </div>
        
                <div class="intro-wrapper">
                    <div class="intro">
                        <p><?= $intro['desc'.$lang] ?></p>
                        <h3><?= $intro['name'.$lang] ?></h3>
                        <p><?= htmlspecialchars_decode($intro['content'.$lang]) ?></p>

                        <div class="about-btn">
                            <a href="">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>

</div>

<!-- tiêu chí -->
<div class="criteria-wrapper">
    <div class="center">
        <div class=" owl-carousel owl-theme owl-page owl-criteria" data-xsm-items="1:0" data-sm-items="1:0"
            data-md-items="1:0" data-lg-items="1:0" data-xlg-items="4:0" data-rewind="1" data-autoplay="1" data-loop="0"
            data-lazyload="0" data-mousedrag="0" data-touchdrag="0" data-smartspeed="800" data-autoplayspeed="800"
            data-autoplaytimeout="5000" data-dots="0"
            data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
            data-nav="1"
            data-navtext="<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-left' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='5' y1='12' x2='9' y2='16' /><line x1='5' y1='12' x2='9' y2='8' /></svg>|<svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-right' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='15' y1='16' x2='19' y2='12' /><line x1='15' y1='8' x2='19' y2='12' /></svg>"
            data-navcontainer=".control-criteria">

            <?php foreach($tieuchis as $k => $v) { ?>
            <div class="item">
                <div class="img">
                    <?=$func->getImage(['sizes' => '39x42x1', 'isWatermark' => false, 'prefix' => 'photo', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name'.$lang]])?>
                </div>
                <div class="content">
                    <p class="title"><?= $v['name'.$lang] ?></p>
                    <p class="subTitle"><?= $v['desc'.$lang] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="control-criteria control-owl transition"></div>

</div>