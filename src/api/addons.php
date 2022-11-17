<?php
	include "config.php";
	
	$type = (!empty($_GET["type"])) ? htmlspecialchars($_GET["type"]) : '';
?>
<?php if($type == 'video-fotorama') {
	$video_home = $d->rawQuery("select link_video, id, name$lang from #_photo where type = ? and act <> ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb, id desc",array('video','photo_static')); if(count($video_home)) { ?>
	<div id="fotorama-videos" data-width="100%" data-thumbmargin="10" data-height="330" data-fit="cover" data-thumbwidth="140" data-thumbheight="80" data-allowfullscreen="true" data-nav="thumbs">
	    <?php foreach($video_home as $k => $v) { ?>
	        <a href="https://youtube.com/watch?v=<?=$func->getYoutube($v['link_video'])?>" title="<?=$v['name'.$lang]?>"></a>
	    <?php } ?>
	</div>
<?php } } ?>

<?php if($type == 'video-select') {
	$video_home = $d->rawQuery("select link_video, id, name$lang from #_photo where type = ? and act <> ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb, id desc",array('video','photo_static')); if(count($video_home)) { ?>
	<div class="video-main">
        <iframe width="100%" height="100%" src="//www.youtube.com/embed/<?=$func->getYoutube($video_home[0]['link_video'])?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <select class="listvideos">
        <?php foreach($video_home as $k => $v) { ?>
            <option value="<?=$v['id']?>"><?=$v['name'.$lang]?></option>
        <?php } ?>
    </select>
<?php } } ?>

<?=($type == 'footer-map') ? htmlspecialchars_decode($optsetting['coords_iframe']) : ''; ?>

<?php if($type == 'fanpage-facebook') { ?>
	<div class="fb-page" 
	    data-href="<?=$optsetting['fanpage']?>" 
	    data-tabs="timeline" 
	    data-width="300" 
	    data-height="200" 
	    data-small-header="true" 
	    data-adapt-container-width="true" 
	    data-hide-cover="false" data-show-facepile="true">
	    <div class="fb-xfbml-parse-ignore">
	    <blockquote cite="<?=$optsetting['fanpage']?>">
	    <a href="<?=$optsetting['fanpage']?>">Facebook</a>
	    </blockquote>
	    </div>
	</div>
<?php } ?>

<?php if($type == 'messages-facebook') { ?>
	<div class="js-facebook-messenger-box onApp rotate bottom-right cfm rubberBand animated" data-anim="rubberBand">
		<svg id="fb-msng-icon" data-name="messenger icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 30.47 30.66"><path d="M29.56,14.34c-8.41,0-15.23,6.35-15.23,14.19A13.83,13.83,0,0,0,20,39.59V45l5.19-2.86a16.27,16.27,0,0,0,4.37.59c8.41,0,15.23-6.35,15.23-14.19S38,14.34,29.56,14.34Zm1.51,19.11-3.88-4.16-7.57,4.16,8.33-8.89,4,4.16,7.48-4.16Z" transform="translate(-14.32 -14.34)" style="fill:#fff"></path></svg>
		<svg id="close-icon" data-name="close icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 39.98 39.99"><path d="M48.88,11.14a3.87,3.87,0,0,0-5.44,0L30,24.58,16.58,11.14a3.84,3.84,0,1,0-5.44,5.44L24.58,30,11.14,43.45a3.87,3.87,0,0,0,0,5.44,3.84,3.84,0,0,0,5.44,0L30,35.45,43.45,48.88a3.84,3.84,0,0,0,5.44,0,3.87,3.87,0,0,0,0-5.44L35.45,30,48.88,16.58A3.87,3.87,0,0,0,48.88,11.14Z" transform="translate(-10.02 -10.02)" style="fill:#fff"></path></svg>
	</div>
	<div class="js-facebook-messenger-container">
		<div class="js-facebook-messenger-top-header">
			<span><?=$setting['name'.$lang]?></span>
		</div>
		<div class="fb-page" data-href="<?=$optsetting['fanpage']?>" data-tabs="messages" data-small-header="true" data-height="300" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$optsetting['fanpage']?>" class="fb-xfbml-parse-ignore"><a href="<?=$optsetting['fanpage']?>">Facebook</a></blockquote></div>
	</div>
<?php } ?>

<?php if($type == 'script-main') { ?>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	    var js, fjs = d.getElementsByTagName(s)[0];
	    if (d.getElementById(id)) return;
	    js = d.createElement(s); js.id = id; js.async=true;
	    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
	    fjs.parentNode.insertBefore(js, fjs);
	    }(document, 'script', 'facebook-jssdk'));
	</script>
	<script src="//sp.zalo.me/plugins/sdk.js"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55e11040eb7c994c"></script>
<?php } ?>