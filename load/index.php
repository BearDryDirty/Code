<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery特效视频教程,css群:189035492,js touch触屏特效</title>
<link type="text/css" rel="stylesheet" href="css/163css.css" />
<style type="text/css">
.nodata{ display:none; width:100%; float:left; text-align:center; color:#f00; line-height:32px;}
#container{ width:640px; margin-top: 200px; margin:20px auto; text-align:left;}
.single_item{ width:640px; height: 100px; float:left; margin-bottom:10px; padding-bottom:10px; border-bottom:1px solid #d4d4d4; font-size:60px;}
.single_item .apic{ width:120px; float:left; margin-right:10px;}
.single_item .apic img{ width:120px;}
.single_item .grp{ float:left; width:510px;}
.single_item .title{ font-size:14px; padding-bottom:4px; float:left; width:100%;}
.single_item .desc{ width:100%; float:left; line-height:18px;}
.load{ width:100%; float:left; text-align:center; height:102px; line-height:102px;}
.load span{ display:inline-block; padding-left:20px; background:url(images/loader.gif) no-repeat 0 42px;}
</style>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
</head>
<body>
<?php
require_once('connect.php'); //连接数据库
?>
<div id="container">
    <?php
    $query=mysql_query("select * from phpcms_content order by contentid desc limit 0,10");
    while ($row=mysql_fetch_array($query)) {
    ?>
    <div class="single_item">	 
		 <a target='_blank' class="apic" href='http://www.163css.net/<?php echo $row['url'] ?>'><img src='http://www.163css.net/<?php echo $row['thumb'] ?>' /></a>
		 <div class="grp">
         	<h6 class="title"><?php echo $row['title'];?></h6>
			<div class="desc">
				<?php echo $row['description'];?>
			</div>
		 </div>
    </div>
    <?php } ?>
 </div>
 
<div class="nodata"></div>
<script type="text/javascript">
    $(function(){
        var winH = $(window).height(); //页面可视区域高度
        var i = 1; //设置当前页数
		var jiazai=true;
        $(window).scroll(function () {
            var pageH = $(document.body).height();
            var scrollT = $(window).scrollTop(); //滚动条top
            var aa = (pageH-winH-scrollT)/winH;
            if(aa<0.02 && jiazai){
			jiazai=false;
			$.getJSON("result.php",{page:i},function(json){
				jiazai=true;
				if(json){
					var str = "";
					$.each(json,function(index,array){
						var str = "<div class=\"single_item\"><a target='_blank' class='apic' href='http://www.163css.net/"+array['url']+"'><img src='http://www.163css.net/"+array['thumb']+"' /></a>";
                        var str = str + "<div class=\"grp\"><div class=\"title\">"+array['title']+"</div><div class=\"desc\">"+array['description']+"</div></div></div>";
						$("#container").append(str);
					});
					i++;
				}else{
					$(".nodata").show().html("别滚动了，已经到底了。。。");
					$('.single_item:last').css('border-bottom','none');
					$(".load").hide();
					return false;
				}
			});
			
		}
        });
    });
</script>
</body>
</html>
