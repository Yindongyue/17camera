<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<html>
<head>
<title><?=$bbname?> - Powered by 17camera! Board</title>
<style type="text/css">
body,table {font-size: <?=FONTSIZE?>; font-family: <?=FONT?> }
</style>
</head>

<body leftmargin="80">
<script language="JavaScript">
function print(){
        if (document.layers) {
                window.print() ;  
        } else {
                var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
                document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
                WebBrowser1.ExecWB(6, 2);
                WebBrowser1.outerHTML = '';
        }
}
</script>
<img src="<?=IMGDIR?>/<?=BOARDIMG?>" alt="Board logo" border="0"><br><br>
<b>标题: </b><?=$thread['subject']?> <a href="###" onclick="print();">[打印本页]</a></span><br>
<? if(is_array($postlist)) { foreach($postlist as $post) { ?>
<hr noshade size="2" width="100%" color="#808080">
<b>作者: </b><?=$post['author']?> &nbsp; &nbsp; <b>时间: </b><?=$post['dateline']?>
<? if($post['subject']) { ?>
&nbsp; &nbsp; <b>标题: </b><?=$post['subject']?><br>
<? } ?>
<br><?=$post['message']?>
<? if($post['aaid']) { ?>
<br><?=$post['attachicon']?>&nbsp;
<? if($post['attachimg'] == 0) { ?>
附件: <?=$post['filename']?> (<?=$post['attachsize']?>) / 该附件被下载次数 <?=$post['downloads']?><br>URL <?=$boardurl?>attachment.php?aid=<?=$post['aid']?>
<? } elseif($post['attachimg'] == 1) { ?>
本贴包含图片附件 &nbsp; URL <?=$boardurl?>attachment.php?aid=<?=$post['aid']?><br><br><a href="<?=$attachurl?>/<?=$post['attachment']?>" target="_blank"><img src="<?=$attachurl?>/<?=$post['attachment']?>" border="0" alt="点击查看全图" onload="if(this.width>screen.width-333) this.width=screen.width-333"></a>
<? } } } } ?>
<br><br><br><br><hr noshade size="2" width="100%" color="<?=BORDERCOLOR?>">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center">
<tr><td>欢迎光临 <?=$bbname?> (<?=$boardurl?>)</td>
<td align="right">
Powered by 17camera! </td></tr></table>

</body>
</html>