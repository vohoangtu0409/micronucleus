<?php
	/* Check HTTP */
	$func->checkHTTP($http, $config['arrayDomainSSL'], $configBase, $configUrl);

	/* Validate URL */
	$func->checkUrl($config['website']['index']);

	/* Check login */
    $func->checkLoginMember();

    /* Mobile detect */
    
    define('TEMPLATE', './templates/');

    /* Router */
    $router->setBasePath($config['database']['url']);
    $router->map('GET', array(ADMIN.'/', 'admin'), function(){
    	global $func, $config;
    	$func->redirect($config['database']['url'].ADMIN."/index.php");
    	exit;
    });
    $router->map('GET', array(ADMIN, 'admin'), function(){
    	global $func, $config;
    	$func->redirect($config['database']['url'].ADMIN."/index.php");
    	exit;
    });
    $router->map('GET|POST', '', 'index', 'home');
    $router->map('GET|POST', 'index.php', 'index', 'index');
    $router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
    $router->map('GET|POST', '[a:com]', 'allpage', 'show');        
    $router->map('GET', THUMBS.'/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
    	global $func;
    	$func->createThumb($w, $h, $z, $src, null, THUMBS);
    },'thumb');
    $router->map('GET', WATERMARK.'/product/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
    	global $func, $cache;
    	$wtm = $cache->get("select status, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark', 'photo_static'), 'fetch', 7200);
    	$func->createThumb($w, $h, $z, $src, $wtm, "product");
    },'watermark');
    $router->map('GET', WATERMARK.'/news/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
    	global $func, $cache;
    	$wtm = $cache->get("select status, photo, options from #_photo where type = ? and act = ? limit 0,1", array('watermark-news', 'photo_static'), 'fetch', 7200);
    	$func->createThumb($w, $h, $z, $src, $wtm, "news");
    },'watermarkNews');

    /* Router match */
    $match = $router->match();

    /* Router check */
	if(is_array($match))
	{
		if(is_callable($match['target']))
		{
			call_user_func_array($match['target'], $match['params']); 
		}
		else
		{
			$com = (!empty($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
			$getPage = !empty($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
		}
	}
	else
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit;
	}

    /* Setting */
    $sqlCache = "select * from #_setting";
    $setting = $cache->get($sqlCache, null, 'fetch', 7200);
    $optsetting = (!empty($setting['options'])) ? json_decode($setting['options'],true) : null;

	// var_dump($optsetting);
    /* Lang */
    $lang = 'vi';
   
    /* Slug lang */
    $sluglang = 'slugvi';

    /* SEO Lang */
    $seolang = "vi";

    /* Require datas lang */
    require_once LIBRARIES."lang/$lang.php";

	/* Tối ưu link */
	$requick = array(
		/* Sản phẩm */
		array("tbl" => "product_list", "field" => "idl", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_cat", "field" => "idc", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_item", "field" => "idi", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_sub", "field" => "ids", "source" => "product", "com" => "san-pham", "type" => "san-pham"),
		array("tbl" => "product_brand", "field" => "idb", "source" => "product", "com" => "thuong-hieu", "type" => "san-pham"),
		array("tbl" => "product", "field" => "id", "source" => "product", "com" => "san-pham", "type" => "san-pham", "menu" => true),
		
		/* Tags */
		array("tbl" => "tags", "tbltag" => "product", "field" => "id", "source" => "tags", "com" => "tags-san-pham", "type" => "san-pham", "menu" => true),
		array("tbl" => "tags", "tbltag" => "news", "field" => "id", "source" => "tags", "com" => "tags-tin-tuc", "type" => "tin-tuc", "menu" => true),

		/* Thư viện ảnh */
		array("tbl" => "product", "field" => "id", "source" => "product", "com" => "thu-vien-anh", "type" => "thu-vien-anh", "menu" => true),

		/* Video */
		array("tbl" => "photo", "field" => "id", "source" => "video", "com" => "video", "type" => "video", "menu" => true),

		/* Tin tức */
		array("tbl" => "news_list", "field" => "idl", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news_cat", "field" => "idc", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news_item", "field" => "idi", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news_sub", "field" => "ids", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc"),
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "tin-tuc", "type" => "tin-tuc", "menu" => true),

		/* Bài viết */
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "tuyen-dung", "type" => "tuyen-dung", "menu" => true),
		array("tbl" => "news", "field" => "id", "source" => "news", "com" => "chinh-sach", "type" => "chinh-sach", "menu" => false),

		/* Trang tĩnh */
		array("tbl" => "static", "field" => "id", "source" => "static", "com" => "gioi-thieu", "type" => "gioi-thieu", "menu" => true),

		/* Liên hệ */
		array("tbl" => "", "field" => "id", "source" => "", "com" => "lien-he", "type" => "", "menu" => true),
	);

	/* Find data */
	if(!empty($com) && !in_array($com, ['tim-kiem', 'account', 'sitemap']))
	{
		foreach($requick as $k => $v)
		{
			$urlTbl = (!empty($v['tbl'])) ? $v['tbl'] : '';
			$urlTblTag = (!empty($v['tbltag'])) ? $v['tbltag'] : '';
			$urlType = (!empty($v['type'])) ? $v['type'] : '';
			$urlField = (!empty($v['field'])) ? $v['field'] : '';
			$urlCom = (!empty($v['com'])) ? $v['com'] : '';
			
			if(!empty($urlTbl) && !in_array($urlTbl, ['static', 'photo']))
			{
				$row = $d->rawQueryOne("select id from #_$urlTbl where $sluglang = ? and type = ? and find_in_set('hienthi',status) limit 0,1",array($com,$urlType));
				
				if(!empty($row['id']))
				{
					$_GET[$urlField] = $row['id'];
					$com = $urlCom;
					break;
				}
			}
		}
	}

	/* Switch coms */
	switch($com)
	{
		case 'lien-he':
			$source = "contact";
			$template = "contact/contact";
			$seo->set('type','object');
			$titleMain = lienhe;
			break;
		case 'gioi-thieu':
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->set('type','article');
			$titleMain = gioithieu;
			break;
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->set('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$titleMain = tintuc;
			break;
		case 'tuyen-dung':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->set('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$titleMain = tuyendung;
			break;
		case 'chinh-sach':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "";
			$seo->set('type','article');
			$type = $com;
			$titleMain = null;
			break;
		case 'thuong-hieu':
			$source = "product";
			$template = "product/product";
			$seo->set('type','object');
			$type = 'san-pham';
			$titleMain = null;
			break;
		case 'san-pham':
			$source = "product";
			$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
			$seo->set('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$titleMain = sanpham;
			break;
		case 'tim-kiem':
			$source = "search";
			$template = "product/product";
			$seo->set('type','object');
			$titleMain = timkiem;
			break;
		case 'tags-san-pham':
			$source = "tags";
			$template = "product/product";
			$type = $urlType;
			$table = $urlTblTag;
			$seo->set('type','object');
			$titleMain = null;
			break;
		case 'tags-tin-tuc':
			$source = "tags";
			$template = "news/news";
			$type = $urlType;
			$table = $urlTblTag;
			$seo->set('type','object');
			$titleMain = null;
			break;
		case 'thu-vien-anh':
			$source = "product";
			$template = isset($_GET['id']) ? "album/album_detail" : "album/album";
			$seo->set('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$titleMain = thuvienanh;
			break;
		case 'video':
			$source = "video";
			$template = "video/video";
			$type = $com;
			$seo->set('type','object');
			$titleMain = "Video";
			break;		
		case 'sitemap':
			include_once LIBRARIES."sitemap.php";
			exit();
			
		case '':
		case 'index':
			$source = "index";
			$template ="index/index";
			$seo->set('type','website');
			break;

		default: 
			header('HTTP/1.0 404 Not Found', true, 404);
			include("404.php");
			exit();
	}

	/* Require datas for all page */
	require_once SOURCES."allpage.php";

	/* Include sources */
	if(!empty($source))
    {
        include SOURCES.$source.".php";
    }

    /* Include sources */
	if(empty($template))
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
	}
?>