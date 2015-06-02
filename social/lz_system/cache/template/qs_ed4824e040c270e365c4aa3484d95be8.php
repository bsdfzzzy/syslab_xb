<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<title>电子科技大学学报·社科版</title>
<link rel="icon" href="images/favicon.png" type="images/x-icon" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/xb.css" type="text/css" rel="stylesheet"/>
<link  href="css/buttons.css" type="text/css" rel="stylesheet"/>
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/buttons.js"></script>
</head>

<body id="wrap">

		<div id="banner">
	<img src="images/img_01.jpg">
    <img id="logo" src="images/logo.png">
	<div id="nav_top">
    	<p id="dateInfo"></p>
    	<ul>
        	<li style="border:none!important;"><a href="index.php">首页</a></li>
            <li><a href="index.php?p=newsitem&item_id=4" id="introduce">期刊简介</a></li>
            <li><a href="index.php?p=newsitem&item_id=3" id="editorial-board">编委会</a></li>
            <li><a href="index.php?p=newsitem&item_id=2" id="editors">编辑部</a></li>
            <li><a href="index.php?p=category&category_id=-1&yid=1" id="qikan">期刊浏览</a></li>
            <li><a href="index.php?p=newsitem&item_id=1497" id="wants">征稿启事</a></li>
            <li><a href="index.php?p=guestbook" id="comment">留言</a></li>
    <!--        <li><a href="index.php?p=newsitem&item_id=1">联系我们</a></li> -->
        </ul>
    </div>
    <div id = "glow">
        <div class="glow" style="width:10px;height:15px;"></div>
        <div class="glow" style="width:30px;height:30px;"></div>
        <div class="glow" style="width:50px;height:50px;"></div>
    </div>
    <script type="text/javascript">
    setTimeout(function(){
        document.getElementById("logo").style.left = "430px";
    },200);
       $(document).ready(function(){
        var now =new Date();
        var s=now.getHours();
        var min=now.getMinutes();
       var year=now.getFullYear();
       var moth=now.getMonth();
       var date=now.getDate();
       if (min<10){
           document.getElementById('dateInfo').innerHTML=year+"年"+(moth+1)+"月"+date+"日&nbsp;&nbsp;   "+s+":0"+min;
       }else{
           document.getElementById('dateInfo').innerHTML=year+"年"+(moth+1)+"月"+date+"日&nbsp;&nbsp;   "+s+":"+min;
       }
       
       });
      
    </script>
    <script type="text/javascript">
    if(console.log)
    {
      console.log("一张网页，要经历怎样的过程，才能抵达用户面前？");
      console.log("一位新人，要经历怎样的成长，才能站在技术之巅？");
      console.log("探寻这里的秘密；");
      console.log("体验这里的挑战；");
      console.log("成为这里的主人；");
      console.log("加入Ｓｙｓｌａｂ，你，可以影响世界。");
      console.log("http://www.syslab.us/");
    }

    </script>

</div>




		<div id="content">

	
   
   
    <div id="left">
    <div class="panel1 jian mleft">
        <ul class="ull mainUll">
            <li class="mainitem">
                <img class="icon1" src="images/app_edit.png"><span class="title1">采编系统</span>
            </li>
            <li class="item shadow"><span class="title title3"><a href="http://dkjb.cbpt.cnki.net/EditorDN/index.aspx?t=1&mid=dkjb" class="title3a"><img class="icon2" src="images/write.png">作者投稿</a></span>
            </li>
            <li class="item shadow"><span class="title title3"><a href="http://dkjb.cbpt.cnki.net/EditorDN/index.aspx?t=1&mid=dkjb" class="title3a"><img class="icon2" src="images/acheck.png">作者查稿</a></span>
            </li>
            <li class="item shadow"><span class="title title3"><a href="http://dkjb.cbpt.cnki.net/EditorDN/index.aspx?t=2&mid=dkjb" class="title3a"><img class="icon2" src="images/buddy_group.png">专家审稿</a></span>
            </li>
            <li class="item shadow"><span class="title title3"><a href="http://dkjb.cbpt.cnki.net/EditorDN/index.aspx?t=2&mid=dkjb" class="title3a"><img class="icon2" src="images/user.png">编委审稿</a></span>
            </li>
            <li class="item shadow"><span class="title title3"><a href="http://dkjb.cbpt.cnki.net/EditorDN/index.aspx?t=3&mid=dkjb" class="title3a"><img class="icon2" src="images/work1.png">编辑办公</a></span>
            </li>
            
            <li class="item shadow"><span class="title title3"><a  href="http://dkjb.cbpt.cnki.net/EditorDN/index.aspx?t=3&mid=dkjb" class="title3a"><img class="icon2" src="images/work2.png">主编办公</a></span>
            </li>

        </ul>
    </div>
    <div class="panel1 jian mleft">
        <ul class="ull">
            <li class="mainitem">
                <img class="icon1" src="images/notice.png"><span class="title1">作者须知</span>
            </li>
             <li class="item hre"><span class="title tit"><img  class="icon5" src="images/ar.png"><a href="http://www.magtech.com.cn/journalx_author_faq.html" class="button-border-primary button-rounded btnw" style="height:auto;">注意事项</a></span>
            </li>
            <li class="item hre"><span class="title tit"><img  class="icon5" src="images/ar.png"><a href="index.php?p=newsitem&item_id=1499" class="button-border-primary button-rounded btnw"><!--<img class="icon2" src="images/edit_user.png">-->投稿须知</a></span>
            </li>
            <li class="item hre"><span class="title tit"><img  class="icon5" src="images/ar.png"><a  href="index.php?p=newsitem&item_id=1500" class="button-border-primary button-rounded btnw"><i class="fa fa-download"></i>审稿流程</a></span>
            </li>
            <li class="item hre"><span class="title tit"><img  class="icon5" src="images/ar.png"><a  href="index.php?p=newsitem&item_id=1501" class="button-border-primary button-rounded btnw"><i class="fa fa-download"></i>编校流程</a></span>
            </li>
            <li class="item hre"><span class="title tit"><img  class="icon5" src="images/ar.png"><a  href="index.php?p=newsitem&item_id=1502" class="button-border-primary button-rounded btnw"><i class="fa fa-download"></i>版权申明</a></span>
            </li>
            <li class="item hre"><span class="title tit"><img  class="icon5" src="images/ar.png"><a  href="index.php?p=category&category_id=6" class="button-border-primary button-rounded btnw"><i class="fa fa-download"></i>资料下载</a></span>
            </li>
        </ul>
    </div>
    <div class="panel1 jian mleft">
        <ul class="ull">
            <li class="mainitem">
                <img class="icon1" src="images/book.png"><span class="title1">文章导读</span>
            </li>
            <li class="item_2 hre"><span class="title"><a href="index.php?p=ranklist&type=time"><i class="fa fa-plus"></i>精选文章</a></span>
            </li>
            <li class="item_2 hre"><span class="title ko"><a href="index.php?p=ranklist&type=view"><i class="fa fa-thumbs-up"></i>文章点击排行</a></span>
            </li>
            <li class="item_2 hre"><span class="title ko"><a  href="index.php?p=ranklist&type=download"><i class="fa fa-download"></i>全文下载排行</a></span>
            </li>
             <li class="item_2 hre"><span class="title"><a href="index.php?p=category&category_id=-1&yid=1" ><i class="fa fa-plus"></i>过刊浏览</a></span>
            </li>
             <li class="item_2 hre"><span class="title"><a href="index.php?p=advance_search" ><i class="fa fa-plus"></i>文章检索</a></span>
            </li>
        </ul>
    </div>
<?php
  $map = "select count(*) from lz_curip where type=0";
  $online = $db->get_all($map);
  $map = "select `value` from `lz_webdata` where `name`='webview'";
  $webview = $db->get_all($map);
  $map = "select count(*) from `lz_curip` where type=1";
  $today = $db->get_all($map);
  $webview = $webview[0]["value"];
  $online = $online[0]['count(*)'];
  $today = $today[0]['count(*)'];
  //echo $webview." , ".$online;
?>
    <div class="panel1 jian mleft">
    <ul class="ull">
        <li class="mainitem">
            <img class="icon1" src="images/stats.png"><span class="title1">访问统计</span>
        </li>
        <li class="item4"><span class="title ko"><a ><i class="fa fa-plus lef"></i>访问统计:<span class="number"><?=$webview?></span>
            </a>
            </span>
        </li>
        <li class="item4"><span class="title ko"><a ><i class="fa fa-thumbs-up lef"></i>今日访问:<span class="number"><?=$today?></span>
            </a>
            </span>
        </li>
        <li class="item4"><span class="title ko"><a ><i class="fa fa-download lef"></i>当前在线:<span class="number"><?=$online?></span>
            </a>
            </span>
        </li>
    </ul>
</div>
<!--
        <h3>全文检索</h3>
   
        <form action="search.php" method="get" id="form_1" >
            <input value=""  name="q" type="text" /><br />
            <select name="tm">
                  <option value="1">按标题</option>
                  <option value="2">按作者</option>
                  <option value="3">按关键词</option>
             </select>
            <input type="submit" value="开始搜索"  />
        </form>
-->
</div>
   
    ﻿<div id="middle">
    <a href="index.php?p=newsitem&item_id=1497"><img src="images/info.jpg" style="margin-top: 10px;"></a>
    <form name="" id="search" method="get" action="index.php">
    <div class="sea"><img class="icon3" src="images/partner_search.png">

        <span class="spans">文章快速检索</span>
        <input id="search"  name ='name' type="text" value="">
		<input type = 'hidden' name = 'p' value='advance_search'>
		<input type = 'hidden' name = 'page_size'  value ='30'>
		<input type = 'hidden' name = 'sort_mode'  value ='category'>
        <a onclick="document.getElementById('search').submit()" class="button glow" style="margin-top:4px;margin-left:5px;width:0px;height:24px;float:left;"><span class="Go">Go</span></a>
        <a href="index.php?p=advance_search" class="spans" style="margin-left:4px;">高级检索</a>
    </div>
    </form>
	<div class="panel1 jian" style="display:block;position:relative;float:left;width:515px;height:250px;margin-top:25px;">
            <ul class="ull">
                <li class="mainitem" style="width:300px;margin:10px 10px;text-align:left;margin-left:20px;" >
					<img class="icon1" src="images/ann.png"> 
					<span class="title1" style="letter-spacing:15px;">信息公告</span>
				</li>
                <div id="newsrock">
            <ul class="newspan">
                
            <?php if (!empty($_obj['news'])){if (!is_array($_obj['news']))$_obj['news']=array(array('news'=>$_obj['news'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['news'] as $rowcnt=>$news) { $news['ROWCNT']=($rowcounter); $news['ALTROW']=$rowcounter%2; $news['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$news; ?>
                    <li class="news"><span class="redspot" valign="top">.</span><a href="index.php?p=newsitem&item_id=<?php echo $_obj['item_id']; ?>" title="<?php echo $_obj['name']; ?>" limit="13"><?php echo show_description_text($_obj['name'],15);
?></a></li>
                <?php } $_obj=$_stack[--$_stack_cnt];} ?> 
            </ul>
       </div> 
                <p class="morein"><a href="index.php?p=category&category_id=2" style="color:red;float:right;margin:auto 10px 10px auto;position:static;bottom:20px;">更多...</a></p>
            </ul>    
        </div>
<?php 
    $prevId = $_obj['prev_cur_next']['prev'];
    $nextId = empty($_obj['prev_cur_next']['next'])?$_obj['prev_cur_next']['cur']:$_obj['prev_cur_next']['next'];
    $map = "SELECT * FROM `lz_category` WHERE parent_id=1 AND category_id=".$_obj['prev_cur_next']['cur']." AND status=1 ORDER BY category_id DESC  LIMIT 1";
    $_arr = $db->get_all($map);
    foreach($_arr as $article)
    {
?>
    <div class="mainco" style="display:block;position:relative;float:left; margin-top:15px;">
            <script type="text/javascript">
                            $(document).ready(function(){
                             var $abs = $('div.abstract'); 
                                $abs.hide();
                            $('a.more').click(function(){
                                $(this).parent().parent().next('div').slideToggle('slow');
                                var $link=$(this);
                                if($link.text()=='[+摘要]' ){
                                    $link.text('[─摘要]');
                                }
                                else{
                                    $link.text('[+摘要]');
                                }
                                    
                            });
                               /* $('.data3').mouseover(function(){
                                    $(this).css('background','#F5F6F3');
                                });
                                 $('.data3').mouseout(function(){
                                    $(this).css('background','#fff');
                                });*/
                                var $data3a = $('.data3:even');
                            $data3a.css('background','#EDEDED');
                            }); 
                            
            </script>
    <div class="catatab">
            <ul class="tabb">
                <li class="tab_active">&nbsp;&nbsp;&nbsp;&nbsp;目录</li>
                <li class="tab_no"></li>
            </ul>
<script type="text/javascript">
    jQuery.fn.limit = function () {
        //var self = $("[limit]");
        self.each(function () {
            var objString = $(this).text();
            var objLength = $(this).text().length;
            var num = $(this).attr("limit");
            if (objLength > num) {
                $(this).attr("title", objString);
                objString = $(this).text(objString.substring(0, num) + "...");
            }
        /*  else {
                 $(this).removeAttr("limit");
                 }*/
        })
    }
    $(function () {
        $("[limit]").limit();
    })
</script>

    
<?php
        $childid=$article[category_id];
       // echo "<div id='m_to+p'>";
        //    echo "<a href='index.php?p=category&category_id=1'>更多已发行往期</a>";
        //echo "</div>";
    
        $_arr = $db->get_all("SELECT * FROM `lz_category` WHERE parent_id=$childid AND status=1 ORDER BY category_id DESC");
        
         foreach($_arr as $art) {
?>

        <div class="midcontent">
                <div class="catagroy">
                    <p class="catah1"><a class="catah1_a" href='index.php?p=category&category_id=<?=$art["category_id"]?>'><?=$art["name"]?></p>
                </div>

<?php    
        $itemid=$art[category_id];
        $_arr = $db->get_all("SELECT * FROM `lz_item` WHERE category_id=$itemid AND status=1 ORDER BY order_id DESC,publish_time DESC ");  
        foreach($_arr as $at){
?>
         <ul class="data2">
                    <li class="data3"><a class="catename" href='index.php?p=item&item_id=<?=$at[item_id]?>'><?=$at['name']?></a>
                        <span class="author"><?=$at['author']?></span>
                        <div class="voldata">
                        <span class="Vol"><?=$at["periodsAndpage"]?></span>
                        <span class="showabstract"><a class="more" href="javascript:void(0);">[+摘要]</a></span>
                        <span class="data_sp"><a href='index.php?p=pdfdownload&file=<?=$at["file_name"]?>&item_id=<?=$at["item_id"]?>'><u>PDF下载</u></a>&nbsp;&nbsp;(<span  class="red">&nbsp;<?=$at["download_count"]?>&nbsp;</span>)</span>
                        <span class="data_sp mag"><a href='index.php?p=viewhtml&file=<?=$at["file_name"]?>&item_id=<?=$at["item_id"]?>'>在线阅读</a>&nbsp;&nbsp;(<span  class="red">&nbsp;<?=$at["view_count"]?>&nbsp;</span>)</span>
                        </div>
                        
                        <div class="abstract"><?=$at["description"]?></div>
                    </li>
        </ul>
<?php
                 }
        echo "</div>";
      
            }
        }
?> 
    </div>
    </div>

</div>
   
    ﻿<div id="right">
      
     <div class="panel1 jian just">
        <ul class="ull">
            <li class="mainitem mainitem_T iee"><img class="icon1" src="images/moleskine_pure.png"><span class="title1">期刊信息</span></li>
			<img class="magazine" src="images/img-xb.jpg">
            <li><span class="mainfo2" style="*maigin-top:10px;">1959年创刊，双月刊</span></li>
            <li><span class="mainfo2">主管：中华人民共和国教育部</span></li>
            <li><span class="mainfo2">主办：电子科技大学</span></li>
            <li><span class="mainfo2">主编：田江</span></li>
            <li><span class="mainfo2">编辑出版：电子科技大学学报编辑部</span></li>
            <li><span class="mainfo2">出版物号：CN51-1569/C</span></li>
            <li><span class="mainfo2 mr8">ISSN 1008-8105</span></li>
            <li><span class="mainfo2">国内发行代号：62-113</span></li>
            <li><span class="mainfo2">国外发行代号：4847Q</span></li>
            <li><span class="mainfo2">通信地址：四川省成都市建设北路二</span></li>
            <li><span class="mainfo2 mr8">段4号</span></li>
            <li><span class="mainfo2">邮编：610054</span></li>
            <li><span class="mainfo2">电话号码：(028)83201443</span></li>
            <li><span class="mainfo2">Email：xbshkb@uestc.edu.cn</span></li>
             </ul>       
    </div>
     <div class="panel1 jian">
        <ul class="ull">
            <li class="mainitem mainitem_T"><img class="icon1" src="images/globe_yellow.png"><span class="title1">友情链接</span></li>
            <li class="mainfo2"><a href="http://www.moe.edu.cn/">教育部</a></li>
            <li class="mainfo2"><a href="http://www.uestc.edu.cn">电子科技大学</a></li>
            <li class="mainfo2"><a href="http://www.gapp.gov.cn/">国家新闻出版广电总局</a></li>
            <li class="mainfo2"><a href="http://www.scppa.gov.cn/">四川省新闻出版广电局</a></li>
            <li class="mainfo2"><a href="http://www.engineeringvillage.com">Ei village</a></li>
            <li class="mainfo2"><a href="http://www.cnki.net/">中国知识资源总库(CNKI)</a></li>             
            <li class="mainfo2"><a href="http://www.wanfangdata.com.cn/">万方数据库</a></li>             

        </ul>    
    </div>
    	<!--
<div id="r_header">
		<h2><a href="http://www.xb.uestc.edu.cn/nature/index.php?p=category&category_id=2">新闻动态</a></h2>
			<ul>
			<marquee align="bottom" direction="down" onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll" scrollamount=2>
            	<?php if (!empty($_obj['news'])){if (!is_array($_obj['news']))$_obj['news']=array(array('news'=>$_obj['news'])); $_stack[$_stack_cnt++]=$_obj; $rowcounter = 0; foreach ($_obj['news'] as $rowcnt=>$news) { $news['ROWCNT']=($rowcounter); $news['ALTROW']=$rowcounter%2; $news['ROWBIT']=$rowcounter%2; $rowcounter++;$_obj=&$news; ?>
            		<li><a href="index.php?p=newsitem&item_id=<?php echo $_obj['item_id']; ?>" title="<?php echo $_obj['name']; ?>"><?php echo show_description_text($_obj['name'],15);
?></a></li>
            	<?php } $_obj=$_stack[--$_stack_cnt];} ?>
			</marquee> 
			</ul>
		<li class="link_s"><a href="index.php?p=category&category_id=2">more</a></li>
        </div> 
	<hr /> 
        <div id="r_bottom">
		<h2>友情链接</h2>
        	<ul>
            	<li class="link_a"><a href="http://www.moe.edu.cn/">教育部</a></li>
                <li class="link_a"><a href="http://www.uestc.edu.cn">电子科技大学</a></li>
                <li class="link_a"><a href="http://www.ei.org.cn/">Ei中国</a></li>
                <li class="link_a"><a href="http://www.lib.uestc.edu.cn/ERDataBaseIntro55.aspx">中国期刊全文数据库</a></li>
                <li class="link_a"><a href="http://www.wanfangdata.com.cn/">万方数据库</a></li>
                <li class="link_a"><a href="http://www.intl-jest.com/">中国电子学刊</a></li>             
            </ul>
        </div> -->
    </div>
<script type="text/javascript">
    jQuery.fn.limit = function () {
        var self = $("[limit]");
        self.each(function () {
            var objString = $(this).text();
            var objLength = $(this).text().length;
            var num = $(this).attr("limit");
            if (objLength > num) {
                $(this).attr("title", objString);
                objString = $(this).text(objString.substring(0, num) + "...");
            }
		/*	else {
			     $(this).removeAttr("limit");
				 }*/
        })
    }
    $(function () {
        $("[limit]").limit();
    })
</script>

</div>




		﻿<div id="bottom">
	<p>	
    	<span class="copyright">copyright©2014 电子科技大学学报编辑部  </span>
        <span class="copyright">地址：成都市建设北路二段四号电子科技大学主楼中213室  电话：(028)83201443  Email:xbshkb@uestc.edu.cn </span>
        <a href="admin.php"><span class="name">  管理登陆</span></a>
    </p>
     <div id="leftsead">
	<ul>
		<li><a class="youhui"><img src="images/wechat.jpg" width="47" height="49" class="shows" /><img src="images/wechatma.jpg" width="200" height="200" class="hides1" usemap="#taklhtml"/><map name="taklhtml"><area shape="rect" coords="26,273,115,300 " href="" /></map></a></li>
        <li><a class="youhui"><img src="images/weibo.jpg" width="47" height="49" class="shows" /><img src="images/weiboma.jpg" width="200" height="200" class="hides" usemap="#taklhtml"/><map name="taklhtml"><area shape="rect" coords="26,273,115,300 " href="" /></map></a></li>
		<li><a id="top_btn"><img src="images/ll06.jpg" width="131" height="49" class="hides"/><img src="images/l06.png" width="47" height="49" class="shows" /></a></li>
	</ul>
</div>
<script type="text/javascript">
    $(document).ready(function(){

	   $("#leftsead a").hover(function(){
		if($(this).prop('className')=='youhui')
            {
                $(this).children("img.hides").show();
                $(this).children("img.hides1").show();
            }
           else{
			$(this).children("img.hides").show();
            $(this).children("img.hides1").show();
			$(this).children("img.shows").hide();
			$(this).children("img.hides").animate({'marginRight':'0px'},'slow');
            $(this).children("img.hides1").animate({'marginRight':'0px'},'slow'); 
		  }
	},function(){ 
		if($(this).prop('className')=='youhui'){
			$(this).children("img.hides").hide('slow');
            $(this).children("img.hides1").hide('slow');
		}else{
			$(this).children("img.hides").animate({'marginRight':'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
            $(this).children("img.hides1").animate({'marginRight':'-143px'},'slow',function(){$(this).hide();$(this).next("img.shows").show();});
		}
	});

	$("#top_btn").click(function(){if(scroll=="off") return;$("html,body").animate({'scrollTop': 0}, 730);});
	/* var t=$("#m_middle h1:first").text();
		if(t=='期刊简介')
			$('#introduce').addClass('hactive');
		else if(t=='学报编委')
			$('#editorial-board').addClass('hactive');
		else if(t=='编辑部')
				$('#editors').addClass('hactive');
		else if(t=='征稿启事')
				$('#wants').addClass('hactive');
        else if(t=='期刊浏览')
                $('#qikan').addClass('hactive');
        else if(t=='留言')
                $('#comment').addClass('hactive');
		else
			{
				var t=$("[href='index.php']")
				t.addClass('hactive');
			}
*/
		var myNav = document.getElementById('nav_top').getElementsByTagName('a');
		for(var i=0;i<myNav.length;i++){
		    var link=myNav[i].getAttribute("href");
		    var webUrl=document.location.href;
		    if(webUrl.indexOf(link)!=-1){
                myNav[i].className="hactive";
                if(i==0){
                    myNav[0].className="hactive";
                }else{
                    myNav[0].removeAttribute('class');
    
                }
            }
		}

		});
		
</script>
</div>

</body>
</html>
