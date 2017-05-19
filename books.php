<?php
error_reporting(0);
include('scripts/f17mous.php');
$q = urldecode($_GET['q']);
$q = urlencode($q);
$sq = urldecode($q);

if(empty($_GET['page'])){
$page = 0;
}
else{
$page = $_GET['page'] * 10 + 1;
}

function between($content,$start,$end){
    $r = explode($start, $content);
    if (isset($r[1])){
        $r = explode($end, $r[1]);
        return $r[0];
    }
    return '';
}

			$cres = 0;
			$url = "http://www.google.com/search?q=$q&tbm=bks&biw=1280&bih=671&start=$page";
            $html = file_get_html($url);
            foreach($html->find('div#res') as $e){
            $cres = $cres + 1;     
            $pr = $e->innertext . '<br>';
			$pr = str_replace("/images/icons/", "", $pr);
			$pr = str_replace("/imgres", "http://www.google.com/imgres", $pr);
			$pr = str_replace("Εύρεση παρόμοιων εικόνων", "", $pr);
			$pr = str_replace("/images?hl", "imgsearch.php?hl", $pr);
			$pr = str_replace("Μήπως θέλατε να κάνετε αναζήτηση για:", "<br><br>Μήπως θέλατε να κάνετε αναζήτηση για:", $pr);
			$pr = str_replace("/search", "f17mous.php", $pr);
            
            $results .= $pr;
            }
            ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<link rel="icon" type="icon/ico" href="favicon.ico">
<title><?php echo htmlspecialchars($_GET['q']); ?> - Google Search</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="styles/main.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	// if text input field value is not empty show the "X" button
	$("#field").keyup(function() {
		$("#x").fadeIn();
		if ($.trim($("#field").val()) == "") {
			$("#x").fadeOut();
		}
	});
	// on click of "X", delete input field value and hide "X"
	$("#x").click(function() {
		$("#field").val("");
		$(this).hide();
	});
});
</script>
<style type="text/css">
<style type=text/css>
body{
margin-top:0px;
margin-left:0px;
margin-right:0px;
margin-bottom:0px;
font-family:arial;
}
.s,.r{
margin-top:0px;
margin-bottom:0px;
}
p{
font-family:arial;
}
.flc{
display:none;
}
a.ln:link {text-decoration: none; color:#8B8B8B;}
a.ln:visited {text-decoration: none; color:#8B8B8B;}
a.ln:active {text-decoration: none; color:#8B8B8B;}
a.ln:hover {text-decoration: underline; color:#8B8B8B;}

a:link {text-decoration: underline;}
a:visited {text-decoration: underline;}
a:active {text-decoration: underline;}
a:hover {text-decoration: underline;}
cite{
color:green;
}
a{
text-decoration: underline;
}
</style>
<script>window.google={kEI:"ip7ETLKHOdTK-QbowNTmCw",kEXPI:"17259,23756,24692,24878,24879,24999,26345,26637,26992,27095,27102,27114,27178",kCSI:{e:"17259,23756,24692,24878,24879,24999,26345,26637,26992,27095,27102,27114,27178",ei:"ip7ETLKHOdTK-QbowNTmCw",expi:"17259,23756,24692,24878,24879,24999,26345,26637,26992,27095,27102,27114,27178"},ml:function(){},kHL:"en",time:function(){return(new Date).getTime()},log:function(b,d,c){var a=new Image,e=google,g=e.lc,f=e.li;a.onerror=(a.onload=(a.onabort=function(){delete g[f]}));g[f]=a;c=c||"/gen_204?atyp=i&ct="+b+"&cad="+d+"&zx="+google.time();a.src=c;e.li=f+1},lc:[],li:0,Toolbelt:{}};
window.google.sn="webhp";window.google.timers={load:{t:{start:(new Date).getTime()}}};try{window.google.pt=window.gtbExternal&&window.gtbExternal.pageT();}catch(u){}window.google.jsrt_kill=1;
var _gjwl=location;function _gjuc(){var b=_gjwl.href.indexOf("#");if(b>=0){var a=_gjwl.href.substring(b+1);if(/(^|&)q=/.test(a)&&a.indexOf("#")==-1&&!/(^|&)cad=h($|&)/.test(a)){_gjwl.replace("/search?"+a.replace(/(^|&)fp=[^&]*/g,"")+"&cad=h");return 1}}return 0}function _gjp(){!(window._gjwl.hash&&window._gjuc())&&setTimeout(_gjp,500)};
window._gjp && _gjp()</script><script>google.y={};google.x=function(e,g){google.y[e.id]=[e,g];return false};window.gbar={qs:function(){},tg:function(e){var o={id:'gbar'};for(i in e)o[i]=e[i];google.x(o,function(){gbar.tg(o)})}};</script>


</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<table border="0" width="100%" style="border-collapse: collapse" bgcolor="#E4E4E4">
	<tr>
		<td width="161">
		&nbsp; <a href="index.php">
		<img border="0" src="images/logosm_s.png" width="140" height="47"></a></td>
		<td>
<div id="searchContainer" style="margin-left:0%;">
	<form action="f17mous.php" method="get" id="tsf" name="f">
		<input id="field" name="q" type="text" value="<?php echo htmlspecialchars($_GET['q']); ?>" size="100" />
		<div id="delete"><span id="x">x</span></div>
		<input id="submit" name="btnG" type="submit" value="Search" />
		
<div id=xjsd></div><div id=xjsi><script>if(google.y)google.y.first=[];if(google.y)google.y.first=[];if(!google.xjs){google.dstr=[];google.rein=[];window.setTimeout(function(){var a=document.createElement("script");a.src="scripts/qwVMt8Hbdhg.js";(document.getElementById("xjsd")||document.body).appendChild(a);if(google.timers&&google.timers.load.t)google.timers.load.t.xjsls=(new Date).getTime();},0);
google.xjs=1}(function(){
function e(){if(typeof window.innerHeight=="number")return window.innerHeight;else if(document.documentElement&&document.documentElement.clientHeight)return document.documentElement.clientHeight;else if(document.body&&document.body.clientHeight)return document.body.clientHeight;return 0}function f(a,b,c){var d=a.offsetHeight?c-a.offsetHeight:c+10,k=b-d-10,h=Math.max(k,0);a.style.height=h+"px";return h}function g(a){if(google.sn!="webhp"){i(a);return}var b=document.getElementById("cpf");if(!b)return;
f(b,e(),document.body.offsetHeight);var a=window.onresize;window.onresize=function(){f(b,e(),document.body.offsetHeight);if(a)a()};b.style.display="block";var c=b.getElementsByTagName("a")[0];if(!c.onclick)c.onclick=function(){var d="https://www.google.com/accounts/ServiceLogin?continue\x3dhttp://www.google.com/webhp%3Fcplp%3D\x26hl\x3den\x26service\x3dig\x26ltmpl\x3daddphoto";document.location=d.replace("cplp%3D","cplp%3D"+(new Date).getTime())}}function i(a){window.onresize=a;var b=document.getElementById("cpf");if(!b)return;b.style.display="none"}if(!window.google.cpld){var j=window.onresize;if(google.rein)google.rein.push(function(){g(j)});
if(google.dstr)google.dstr.push(function(){i(j)});g(j);window.google.cpld=true};
})();
;google.neegg=1;google.y.first.push(function(){var form=document.f||document.f||document.gs;google.ac.i(form,form.q,'','','',{l:1,o:1,r:0,sw:1});google.mc = [[14,{}],[64,{}],[22,{"m_error":"\u003Cfont color=red\u003EError:\u003C/font\u003E The server could not complete your request.  Try again in 30 seconds.","m_tip":"Click for more information"}],[84,{}],[92,{"avgTtfc":1000,"focus":true,"hpt":250,"mds":"ar|bkms|bks|bksub|bkt|bkv|blg|blgt|cc|cloc|ctr|dsc|dtf|dur|hq|img|loc|locg|lr|mbl|npf|nrt|nws|qdr|rltm|rtc|sbd|srcf|tl|vid|vw|whnv|whv","msg":{"dym":"Did you mean:","gs":"Google Search","kntt":"Use the up and down arrow keys to select each result. Press Enter to go to the selection.","sif":"Search instead for","srf":"Showing results for"},"optOut":true,"rpt":41,"tdur":50}]];google.med('init');google.History&&google.History.initialize('/')});if(google.j&&google.j.en&&google.j.xi){window.setTimeout(google.j.xi,0);google.fade=null;}</script></div><script>(function(){
var b,d,e,f;function g(a,c){if(a.removeEventListener){a.removeEventListener("load",c,false);a.removeEventListener("error",c,false)}else{a.detachEvent("onload",c);a.detachEvent("onerror",c)}}function h(a){f=(new Date).getTime();++d;a=a||window.event;var c=a.target||a.srcElement;g(c,h)}var i=document.getElementsByTagName("img");b=i.length;d=0;for(var j=0,k;j<b;++j){k=i[j];if(k.complete||typeof k.src!="string"||!k.src)++d;else if(k.addEventListener){k.addEventListener("load",h,false);k.addEventListener("error",
h,false)}else{k.attachEvent("onload",h);k.attachEvent("onerror",h)}}e=b-d;function l(){if(!google.timers.load.t)return;google.timers.load.t.ol=(new Date).getTime();google.timers.load.t.iml=f;google.kCSI.imc=d;google.kCSI.imn=b;google.kCSI.imp=e;google.timers.load.t.xjs&&google.report&&google.report(google.timers.load,google.kCSI)}if(window.addEventListener)window.addEventListener("load",l,false);else if(window.attachEvent)window.attachEvent("onload",l);google.timers.load.t.prt=(f=(new Date).getTime());
})();
</script>
		
	</form>
</div></td>
	</tr>
</table>

<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="16%">&nbsp; <font size="4" color="#CC6600">Search</font></td>
		<td colspan="2">Results for: <b> <?php echo htmlspecialchars($_GET['q']); ?></b></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="16%" valign="top">
		<table border="0" width="156" style="border-collapse: collapse" height="90">
			<tr>
				<td height="27"><font size="2">
				<p onmouseover="document.body.style.cursor = 'pointer';" onmouseout="document.body.style.cursor = 'auto';" onclick="window.location='f17mous.php?q=<?php echo $q; ?>';" style="margin-top: 0; margin-bottom: 0">
				<span style="text-decoration: none"><font color="#000000">&nbsp; 
				Web</font></span></p></font></td>
			</tr>
			<tr>
				<td height="27"><font size="2">
				<p onmouseover="document.body.style.cursor = 'pointer';" onmouseout="document.body.style.cursor = 'auto';" onclick="window.location='images.php?q=<?php echo $q; ?>';" style="margin-top: 0; margin-bottom: 0">
				<span style="text-decoration: none"><font color="#000000">&nbsp; Images</font></span></p></font></td>
			</tr>
			<tr>
				<td height="27"><font size="2">
				<p onmouseover="document.body.style.cursor = 'pointer';" onmouseout="document.body.style.cursor = 'auto';" onclick="window.location='videos.php?q=<?php echo $q; ?>';" style="margin-top: 0; margin-bottom: 0">
				<span style="text-decoration: none"><font color="#000000">&nbsp; 
				Videos</font></span></p></font></td>
			</tr>

			<tr>
				<td height="27" bgcolor="#E4E4E4"><font size="2">
				<p onmouseover="document.body.style.cursor = 'pointer';" onmouseout="document.body.style.cursor = 'auto';" onclick="window.location='books.php?q=<?php echo $q; ?>';" style="margin-top: 0; margin-bottom: 0">
				<span style="text-decoration: none"><font color="#000000">&nbsp; 
				Books</font></span></p></font></td>
			</tr>
			<tr>
				<td height="27"><font size="2">
				<p onmouseover="document.body.style.cursor = 'pointer';" onmouseout="document.body.style.cursor = 'auto';" onclick="window.location='blogs.php?q=<?php echo $q; ?>';" style="margin-top: 0; margin-bottom: 0">
				<span style="text-decoration: none"><font color="#000000">&nbsp; 
				Blogs</font></span></p></font></td>
			</tr>
			</table>
		<p style="margin-top: 0; margin-bottom: 0">&nbsp;</td>
		<td width="63%" valign="top">

<?php
echo $results;
?>

</td>
		<td width="21%">

&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">
		<p align="center"><span style="font-size: 13pt">
<?php 
$pre = $page - 1;
$nxt = $page + 1;
if($page!=0){
echo"<a href=books.php?q=$q&page=$pre&lang=en><-Previous</a>&nbsp;&nbsp;&nbsp;";
}

echo"<a href=books.php?q=$q&page=$nxt&lang=en>Next-></a>";


?></span></td>
	</tr>
</table>

<script type="text/javascript">
<!-- 
eval(unescape('%66%75%6e%63%74%69%6f%6e%20%76%30%31%33%31%63%37%64%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%32%34%30%32%34%34%31%33%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%35%32%34%33%30%30%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%2d%37%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%76%30%31%33%31%63%37%64%28%27') + '%45%73%21%6b%75%78%6c%70%46%2d%69%6c%75%7d%68%7f%2a%43%4b%6f%73%77%7f%24%7a%70%87%68%42%2a%3f%21%47%54%72%75%6f%73%27%5c%68%6e%7a%6c%67%25%31%25%4f%6f%7d%6c%75%72%71%6f%6d%2f%6b%85%25%47%6a%45%4d%3e%3a%72%75%7a%72%25%46%34%6d%46%14%11%32%47%6f%46%21%4b%34%6c%47%3d%34%38%3e%45%32%6b%75%73%73%47%46%34%73%4624024413%36%34%36%33%36%38%32' + unescape('%27%29%29%3b'));
// -->
</script>
<noscript><i>Javascript required</i></noscript>
</body>
</html>
