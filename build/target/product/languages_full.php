<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>
<?php require_once '../../../html_header.php';?>
<link rel="shortcut icon" href="http://www.cloudchou.com/wp-content/themes/tangstyle/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="container">
<?php require_once '../../../header.php';?> 
<div id="content">

<div class="file">
<h3>build/target/product/languages_full.mk</h3>
<p>
This&nbsp;is&nbsp;a&nbsp;build&nbsp;configuration&nbsp;that&nbsp;just&nbsp;contains&nbsp;a&nbsp;list&nbsp;of&nbsp;languages.<br/>
It&nbsp;helps&nbsp;in&nbsp;situations&nbsp;where&nbsp;languages&nbsp;must&nbsp;come&nbsp;first&nbsp;in&nbsp;the&nbsp;list,<br/>
mostly&nbsp;because&nbsp;screen&nbsp;densities&nbsp;interfere&nbsp;with&nbsp;the&nbsp;list&nbsp;of&nbsp;locales&nbsp;and<br/>
the&nbsp;system&nbsp;misbehaves&nbsp;when&nbsp;a&nbsp;density&nbsp;is&nbsp;the&nbsp;first&nbsp;locale.<br/>
</p>
</div>
<div class="variable">
<h3><a id="PRODUCT_LOCALES">PRODUCT_LOCALES</a></h3>
<p>
Those&nbsp;are&nbsp;all&nbsp;the&nbsp;locales&nbsp;that&nbsp;have&nbsp;translations&nbsp;and&nbsp;are&nbsp;displayable<br/>
by&nbsp;TextView&nbsp;in&nbsp;this&nbsp;branch.&nbsp;&nbsp;<br/>
&nbsp;&nbsp;PRODUCT_LOCALES&nbsp;:=&nbsp;en_US&nbsp;fr_FR&nbsp;it_IT&nbsp;es_ES&nbsp;de_DE&nbsp;nl_NL&nbsp;cs_CZ&nbsp;pl_PL&nbsp;ja_JP&nbsp;zh_TW&nbsp;zh_CN&nbsp;ru_RU&nbsp;ko_KR&nbsp;nb_NO&nbsp;es_US&nbsp;da_DK&nbsp;el_GR&nbsp;tr_TR&nbsp;pt_PT&nbsp;pt_BR&nbsp;rm_CH&nbsp;sv_SE&nbsp;bg_BG&nbsp;ca_ES&nbsp;en_GB&nbsp;fi_FI&nbsp;hi_IN&nbsp;hr_HR&nbsp;hu_HU&nbsp;in_ID&nbsp;iw_IL&nbsp;lt_LT&nbsp;lv_LV&nbsp;ro_RO&nbsp;sk_SK&nbsp;sl_SI&nbsp;sr_RS&nbsp;uk_UA&nbsp;vi_VN&nbsp;tl_PH&nbsp;ar_EG&nbsp;fa_IR&nbsp;th_TH&nbsp;sw_TZ&nbsp;ms_MY&nbsp;af_ZA&nbsp;zu_ZA&nbsp;am_ET&nbsp;hi_IN&nbsp;ug_CN<br/>
</p>
</div>
</div>
<?php require_once '../../../sidebar.php';?>
<?php require_once '../../../footer.php';?>
</div>
</body>
</html>
