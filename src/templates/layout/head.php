<!-- Basehref -->
<base href="<?=$configBase?>"/>

<!-- UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Title, Keywords, Description -->
<title><?=$seo->get('title')?></title>
<meta name="keywords" content="<?=$seo->get('keywords')?>"/>
<meta name="description" content="<?=$seo->get('description')?>"/>

<!-- Robots -->
<meta name="robots" content="index,follow" />

<!-- Favicon -->
<link href="<?=ASSET.UPLOAD_PHOTO_L.$favicon['photo']?>" rel="shortcut icon" type="image/x-icon" />

<!-- Webmaster Tool -->
<?=htmlspecialchars_decode($setting['mastertool'])?>

<!-- GEO -->
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="Hồ Chí Minh" />
<meta name="geo.position" content="10.823099;106.629664" />
<meta name="ICBM" content="10.823099, 106.629664" />

<!-- Author - Copyright -->
<meta name='revisit-after' content='1 days' />
<meta name="author" content="<?=$setting['name'.$lang]?>" />
<meta name="copyright" content="<?=$setting['name'.$lang]." - [".$optsetting['email']."]"?>" />

<!-- Facebook -->
<meta property="og:type" content="<?=$seo->get('type')?>" />
<meta property="og:site_name" content="<?=$setting['name'.$lang]?>" />
<meta property="og:title" content="<?=$seo->get('title')?>" />
<meta property="og:description" content="<?=$seo->get('description')?>" />
<meta property="og:url" content="<?=$seo->get('url')?>" />
<meta property="og:image" content="<?=$seo->get('photo')?>" />
<meta property="og:image:alt" content="<?=$seo->get('title')?>" />
<meta property="og:image:type" content="<?=$seo->get('photo:type')?>" />
<meta property="og:image:width" content="<?=$seo->get('photo:width')?>" />
<meta property="og:image:height" content="<?=$seo->get('photo:height')?>" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="<?=$optsetting['email']?>" />
<meta name="twitter:creator" content="<?=$setting['name'.$lang]?>" />
<meta property="og:url" content="<?=$seo->get('url')?>" />
<meta property="og:title" content="<?=$seo->get('title')?>" />
<meta property="og:description" content="<?=$seo->get('description')?>" />
<meta property="og:image" content="<?=$seo->get('photo')?>" />

<!-- Canonical -->
<link rel="canonical" href="<?=$func->getCurrentPageURL()?>" />

<!-- Chống đổi màu trên IOS -->
<meta name="format-detection" content="telephone=no">

<!-- Viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<!-- Minh Long Link -->
    <!-- cdn font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    </link>

    <!-- kit font awesome -->
    <script src="https://kit.fontawesome.com/8548ee4b2e.js" crossorigin="anonymous"></script>



    <!-- jquery cdn -->

    <script src="http://demo21.ninavietnam.com.vn/thang_03/nhakhoamic_259522w/assets/js/jquery.min.js?v=8jJNPWzI80"></script>

    <link rel="stylesheet" href="./OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="./OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">

    <script type="text/javascript" src="./OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script type="text/javascript" src="./OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>




    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;600&family=Mulish:wght@400;600;700;900&family=Open+Sans&family=Oswald:wght@200;700&family=Roboto:wght@700&display=swap" rel="stylesheet">