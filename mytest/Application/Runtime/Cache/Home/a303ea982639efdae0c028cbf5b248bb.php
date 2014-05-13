<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/Public/jcImgScroll/css/public.css" rel="stylesheet" type="text/css" media="all" />
<style>
<!-- 
/* jQuery jcImgScroll css */
.jcImgScroll { position:relative; height:342px; }
.jcImgScroll li { border:1px solid #ccc; }
.jcImgScroll li a { background:#fff; display:block; height:340px;  }
.jcImgScroll li.loading a { background:#fff url(img/loading.gif) no-repeat center center;} 
.jcImgScroll li img,.jcImgScroll li,.jcImgScroll em,.jcImgScroll dl { display:none;}
.jcImgScroll em.sPrev { background:url(/Public/jcImgScroll/img/arrow-left.png) no-repeat right center; }
.jcImgScroll em.sNext { background:url(/Public/jcImgScroll/img/arrow-right.png) no-repeat left center;}
.jcImgScroll dl dd { background:url(/Public/jcImgScroll/img/NumBtn.png) no-repeat 0 bottom; text-indent:-9em; }
.jcImgScroll dl dd:hover,.jcImgScroll dl dd.curr { background-position:0 0; }
-->
</style>
<script src="/Public/jcImgScroll/js/jQuery-1.7.1.js" language="javascript" type="text/javascript"></script>
<script src="/Public/jcImgScroll/js/jQuery-easing.js" language="javascript" type="text/javascript"></script>
<script src="/Public/jcImgScroll/js/jQuery-jcImgScroll.js" language="javascript" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
<!-- 
$(function(){
	$("#menu").jcImgScroll({
		arrow : {
			width:110,	
			height:342,
			x:220,
			y:0
		},
		count : <?php echo ($num); ?>,
		offsetX : 140,
		NumBtn : true
	});
});
-->
</script>
</head>

<body>

<!--下面只是说明与程序代码无关-->
<h1 style="font-size:20px; text-align:center; padding:20px 0;"></h1>
<div style="text-align:right; margin-right:200px; line-height:25px; padding-top:10px;">
	欢迎您，<?php echo (session('username')); ?> 
<a href="/index.php/Home/Public/logout">
										点击这里退出
									</a>
</div>

<!-- HTML 开始 -->
<div id="menu" class="jcImgScroll">
	<script>
	function a(m){
		window.location.href="/index.php/" + m; 
	}
	</script>
	<ul>
		<?php if(is_array($authModule)): $i = 0; $__LIST__ = $authModule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><li  onclick="a('<?php echo ($m); ?>')"><a href="/index.php/<?php echo ($m); ?>/Index/index" onclick="a()" path="/Public/jcImgScroll/img/33858e84935f6f9919cdf11d8b704749.png" title="<?php echo ($m); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>

<!-- HTML 结束  -->
</body>
</html>