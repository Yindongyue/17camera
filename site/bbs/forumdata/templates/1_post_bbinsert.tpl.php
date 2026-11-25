<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($bbinsert) { ?>
<script language="JavaScript">
var text_input = "文字";
var help_mode = "UBB 代码 - 帮助信息\n\n点击相应的代码按钮即可获得相应的说明和提示";
var adv_mode = "UBB 代码 - 直接插入\n\n点击代码按钮后不出现提示即直接插入相应代码";
var normal_mode = "UBB 代码 - 提示插入\n\n点击代码按钮后出现向导窗口帮助您完成代码插入";
var email_help = "插入邮件地址\n\n插入邮件地址连接。\n例如：\n[email]support@17camera.com[/email]\n[email=support@17camera.com]Dai Zhikang[/email]";
var email_normal = "请输入链接显示的文字，如果留空则直接显示邮件地址。";
var email_normal_input = "请输入邮件地址。";
var fontsize_help = "设置字号\n\n将标签所包围的文字设置成指定字号。\n例如：[size=3]文字大小为 3[/size]";
var fontsize_normal = "请输入要设置为指定字号的文字。";
var font_help = "设定字体\n\n将标签所包围的文字设置成指定字体。\n例如：[font=仿宋]字体为仿宋[/font]";
var font_normal = "请输入要设置成指定字体的文字。";
var bold_help = "插入粗体文本\n\n将标签所包围的文本变成粗体。\n例如：[b]17camera 工作室[/b]";
var bold_normal = "请输入要设置成粗体的文字。";
var italicize_help = "插入斜体文本\n\n将标签所包围的文本变成斜体。\n例如：[i]17camera 工作室[/i]";
var italicize_normal = "请输入要设置成斜体的文字。";
var quote_help = "插入引用\n\n将标签所包围的文本作为引用特殊显示。\n例如：[quote]UBB 版权所有 - 17camera Studio[/quote]";
var quote_normal = "请输入要作为引用显示的文字。";
var color_help = "定义文本颜色\n\n将标签所包围的文本变为制定颜色。\n例如：[color=red]红颜色[/color]";
var color_normal = "请输入要设置成指定颜色的文字。";
var center_help = "居中对齐\n\n将标签所包围的文本居中对齐显示。\n例如：[align=center]内容居中[/align]";
var center_normal = "请输入要居中对齐的文字。";
var link_help = "插入链接\n\n插入一个连接。\n例如：\n[url][/url]\n[url=]17camera 工作室[/url]";
var link_normal = "请输入链接显示的文字，如果留空则直接显示链接。";
var link_normal_input = "请输入 URL。";
var image_help = "插入图像\n\n在文本中插入一幅图像。\n例如：[img]/cdb/images/logo.gif[/img]";
var image_normal = "请输入图像的 URL。";
var flash_help = "插入 flash\n\n在文本中插入 flash 动画。\n例如：[swf]/cdb/images/banner.swf[/swf]";
var flash_normal = "请输入 flash 动画的 URL。";
var code_help = "插入代码\n\n插入程序或脚本原始代码。\n例如：[code]echo\"这里是我们的论坛\";[/code]";
var code_normal = "请输入要插入的代码。";
var list_help = "插入列表\n\n插入可由浏览器显示来的规则列表项。\n例如：\n[list]\n[*]；列表项 #1\n[*]；列表项 #2\n[*]；列表项 #3\n[/list]";
var list_normal = "请选择列表格式：字母式列表输入 \"A\"；数字式列表输入 \"1\"。此处也可留空。";
var list_normal_error = "错误：列表格式只能选择输入 \"A\" 或 \"1\"。";
var list_normal_input = "请输入列表项目内容，如果留空表示项目结束。";
var underline_help = "插入下划线\n\n给标签所包围的文本加上下划线。\n例如：[u]17camera 工作室[/u]";
var underline_normal = "请输入要加下划线的文字。";
</script>

<script language="JavaScript" src="include/bbcode.js"></script>
<tr>
<td bgcolor="<?=ALTBG1?>">UBB 代码<br><span class="smalltxt">
<input type="radio" name="mode" value="2" onclick="chmode('2')" checked> 提示插入<br>
<input type="radio" name="mode" value="0" onclick="chmode('0')"> 直接插入<br>
<input type="radio" name="mode" value="1" onclick="chmode('1')"> 帮助信息
</span></td><td bgcolor="<?=ALTBG2?>">
<select name="font" onFocus="this.selectedIndex=0" onChange="chfont(this.options[this.selectedIndex].value)" size="1">
<option value="宋体">宋体</option><option value="黑体">黑体</option>
<option value="Arial">Arial</option>
<option value="Book Antiqua">Book Antiqua</option>
<option value="Century Gothic">Century Gothic</option>
<option value="Courier New">Courier New</option>
<option value="Georgia">Georgia</option>
<option value="Impact">Impact</option>
<option value="Tahoma">Tahoma</option>
<option value="Times New Roman">Times New Roman</option>
<option value="Verdana" selected>Verdana</option></select>
<select name="size" onFocus="this.selectedIndex=2" onChange="chsize(this.options[this.selectedIndex].value)" size="1">
<option value="-2">-2</option>
<option value="-1">-1</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3" selected>3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option></select>
<select name="color" onFocus="this.selectedIndex=1" onChange="chcolor(this.options[this.selectedIndex].value)" size="1">
<option value="White" style="color:white;">White</option>
<option value="Black" style="color:black;">Black</option>
<option value="Red" style="color:red;">Red</option>
<option value="Yellow" style="color:yellow;">Yellow</option>
<option value="Pink" style="color:pink;">Pink</option>
<option value="Green" style="color:green;">Green</option>
<option value="Orange" style="color:orange;">Orange</option>
<option value="Purple" style="color:purple;">Purple</option>
<option value="Blue" style="color:blue;">Blue</option>
<option value="Beige" style="color:beige;">Beige</option>
<option value="Brown" style="color:brown;">Brown</option>
<option value="Teal" style="color:teal;">Teal</option>
<option value="Navy" style="color:navy;">Navy</option>
<option value="Maroon" style="color:maroon;">Maroon</option>
<option value="LimeGreen" style="color:limegreen;">LimeGreen</option></select>
<br><br>
<a href="javascript:bold()"><img src="<?=IMGDIR?>/bb_bold.gif" border="0" width="23" height="22" alt="插入粗体文本"></a>
<a href="javascript:italicize()"><img src="<?=IMGDIR?>/bb_italicize.gif" border="0" width="23" height="22" alt="插入斜体文本"></a>
<a href="javascript:underline()"><img src="<?=IMGDIR?>/bb_underline.gif" border="0" width="23" height="22" alt="插入下划线"></a>
<a href="javascript:center()"><img src="<?=IMGDIR?>/bb_center.gif" border="0" width="23" height="22" alt="居中对齐"></a>
<a href="javascript:hyperlink()"><img src="<?=IMGDIR?>/bb_url.gif" border="0" width="23" height="22" alt="插入链接"></a>
<a href="javascript:email()"><img src="<?=IMGDIR?>/bb_email.gif" border="0" width="23" height="22" alt="插入邮件地址"></a>
<a href="javascript:image()"><img src="<?=IMGDIR?>/bb_image.gif" border="0" width="23" height="22" alt="插入图像"></a>
<a href="javascript:flash()"><img src="<?=IMGDIR?>/bb_flash.gif" border="0" width="23" height="22" alt="插入 flash"></a>
<a href="javascript:code()"><img src="<?=IMGDIR?>/bb_code.gif" border="0" width="23" height="22" alt="插入代码"></a>
<a href="javascript:quote()"><img src="<?=IMGDIR?>/bb_quote.gif" border="0" width="23" height="22" alt="插入引用"></a>
<a href="javascript:list()"><img src="<?=IMGDIR?>/bb_list.gif" border="0" width="23" height="22" alt="插入列表"></a>
<a href="javascript:Cwma()"><img src="<?=IMGDIR?>/mp.gif" border="0" width="23" height="22" alt="mediaplayer file"></a>
<a href="javascript:Crm()"><img src="<?=IMGDIR?>/rm.gif" border="0" width="23" height="22" alt="realplayer file"></a>
</td></tr>
<? } ?>
