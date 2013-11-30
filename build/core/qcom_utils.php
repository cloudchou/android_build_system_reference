<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Android编译系统参考手册</title>
<?php require_once '../../html_header.php';?>
<link rel="shortcut icon" href="http://www.cloudchou.com/wp-content/themes/tangstyle/images/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="container">
<?php require_once '../../header.php';?> 
<div id="content">

<div class="">
<h3><a id="">▶ &nbsp;&nbsp;</a></h3>
<p>
</p>
</div>
<div class="variable">
<h3><a id="[_thisfile]">■ &nbsp;&nbsp;[_thisfile]</a></h3>
<p>
Board&nbsp;platforms&nbsp;lists&nbsp;to&nbsp;be&nbsp;used&nbsp;for&nbsp;TARGET_BOARD_PLATFORM&nbsp;specific&nbsp;featurization<br/>
</p>
</div>
<div class="variable">
<h3><a id="QCOM_BOARD_PLATFORMS">■ &nbsp;&nbsp;QCOM_BOARD_PLATFORMS</a></h3>
<p>
高通的板子<br/>
</p>
</div>
<div class="variable">
<h3><a id="MSM7K_BOARD_PLATFORMS">■ &nbsp;&nbsp;MSM7K_BOARD_PLATFORMS</a></h3>
<p>
mtk的板子<br/>
</p>
</div>
<div class="variable">
<h3><a id="QSD8K_BOARD_PLATFORMS">■ &nbsp;&nbsp;QSD8K_BOARD_PLATFORMS</a></h3>
<p>
qsd的板子<br/>
</p>
</div>
<div class="variable">
<h3><a id="[match-word]">■ &nbsp;&nbsp;[match-word]</a></h3>
<p>
$(call&nbsp;match-word,w1,w2)<br/>
checks&nbsp;if&nbsp;w1&nbsp;==&nbsp;w2<br/>
How&nbsp;it&nbsp;works<br/>
&nbsp;&nbsp;if&nbsp;(w1-w2&nbsp;not&nbsp;empty&nbsp;or&nbsp;w2-w1&nbsp;not&nbsp;empty)&nbsp;then&nbsp;not_match&nbsp;else&nbsp;match<br/>
returns&nbsp;true&nbsp;or&nbsp;empty<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(warning&nbsp;:$(1):&nbsp;:$(2):&nbsp;:$(subst&nbsp;$(1),,$(2)):)&nbsp;\<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$(warning&nbsp;:$(2):&nbsp;:$(1):&nbsp;:$(subst&nbsp;$(2),,$(1)):)&nbsp;\<br/>
</p>
</div>
<div class="variable">
<h3><a id="[find-word-in-list]">■ &nbsp;&nbsp;[find-word-in-list]</a></h3>
<p>
$(call&nbsp;find-word-in-list,w,wlist)<br/>
finds&nbsp;an&nbsp;exact&nbsp;match&nbsp;of&nbsp;word&nbsp;w&nbsp;in&nbsp;word&nbsp;list&nbsp;wlist<br/>
How&nbsp;it&nbsp;works<br/>
&nbsp;&nbsp;fill&nbsp;wlist&nbsp;spaces&nbsp;with&nbsp;colon<br/>
&nbsp;&nbsp;wrap&nbsp;w&nbsp;with&nbsp;colon<br/>
&nbsp;&nbsp;search&nbsp;word&nbsp;w&nbsp;in&nbsp;list&nbsp;wl,&nbsp;if&nbsp;found&nbsp;match&nbsp;m,&nbsp;return&nbsp;stripped&nbsp;word&nbsp;w&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
returns&nbsp;stripped&nbsp;word&nbsp;or&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="[match-word-in-list]">■ &nbsp;&nbsp;[match-word-in-list]</a></h3>
<p>
$(call&nbsp;match-word-in-list,w,wlist)<br/>
does&nbsp;an&nbsp;exact&nbsp;match&nbsp;of&nbsp;word&nbsp;w&nbsp;in&nbsp;word&nbsp;list&nbsp;wlist<br/>
How&nbsp;it&nbsp;works<br/>
&nbsp;&nbsp;if&nbsp;the&nbsp;input&nbsp;word&nbsp;is&nbsp;not&nbsp;empty<br/>
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;output&nbsp;of&nbsp;an&nbsp;exact&nbsp;match&nbsp;of&nbsp;word&nbsp;w&nbsp;in&nbsp;wordlist&nbsp;wlist<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;empty<br/>
returns&nbsp;true&nbsp;or&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="[match-prefix]">■ &nbsp;&nbsp;[match-prefix]</a></h3>
<p>
$(call&nbsp;match-prefix,p,delim,w/wlist)<br/>
matches&nbsp;prefix&nbsp;p&nbsp;in&nbsp;wlist&nbsp;using&nbsp;delimiter&nbsp;delim<br/>
How&nbsp;it&nbsp;works<br/>
trim&nbsp;the&nbsp;words&nbsp;in&nbsp;wlist&nbsp;w<br/>
if&nbsp;find-word-in-list&nbsp;returns&nbsp;not&nbsp;empty<br/>
return&nbsp;true<br/>
else<br/>
return&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="[get-vendor-board-platforms]">■ &nbsp;&nbsp;[get-vendor-board-platforms]</a></h3>
<p>
The&nbsp;following&nbsp;utilities&nbsp;are&nbsp;meant&nbsp;for&nbsp;board&nbsp;platform&nbsp;specific<br/>
featurisation<br/>
&nbsp;$(call&nbsp;get-vendor-board-platforms,v)<br/>
returns&nbsp;list&nbsp;of&nbsp;board&nbsp;platforms&nbsp;for&nbsp;vendor&nbsp;v<br/>
</p>
</div>
<div class="variable">
<h3><a id="[is-board-platform]">■ &nbsp;&nbsp;[is-board-platform]</a></h3>
<p>
$(call&nbsp;is-board-platform,bp)<br/>
&nbsp;returns&nbsp;true&nbsp;or&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="[is-not-board-platform]">■ &nbsp;&nbsp;[is-not-board-platform]</a></h3>
<p>
$(call&nbsp;is-not-board-platform,bp)<br/>
&nbsp;returns&nbsp;true&nbsp;or&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="[is-board-platform-in-list]">■ &nbsp;&nbsp;[is-board-platform-in-list]</a></h3>
<p>
$(call&nbsp;is-board-platform-in-list,bpl)<br/>
returns&nbsp;true&nbsp;or&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="[is-chipset-in-board-platform]">■ &nbsp;&nbsp;[is-chipset-in-board-platform]</a></h3>
<p>
$(call&nbsp;is-chipset-in-board-platform,chipset)<br/>
does&nbsp;a&nbsp;prefix&nbsp;match&nbsp;of&nbsp;chipset&nbsp;in&nbsp;TARGET_BOARD_PLATFORM<br/>
uses&nbsp;underscore&nbsp;as&nbsp;a&nbsp;delimiter<br/>
returns&nbsp;true&nbsp;or&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="[is-chipset-prefix-in-board-platform]">■ &nbsp;&nbsp;[is-chipset-prefix-in-board-platform]</a></h3>
<p>
$(call&nbsp;is-chipset-prefix-in-board-platform,prefix)<br/>
does&nbsp;a&nbsp;chipset&nbsp;prefix&nbsp;match&nbsp;in&nbsp;TARGET_BOARD_PLATFORM<br/>
assumes&nbsp;'_'&nbsp;and&nbsp;'a'&nbsp;as&nbsp;the&nbsp;delimiter&nbsp;to&nbsp;the&nbsp;chipset&nbsp;prefix<br/>
How&nbsp;it&nbsp;works<br/>
&nbsp;&nbsp;if&nbsp;($(prefix)_&nbsp;or&nbsp;$(prefix)a&nbsp;match&nbsp;in&nbsp;board&nbsp;platform)<br/>
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;true<br/>
&nbsp;&nbsp;else<br/>
&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;empty<br/>
</p>
</div>
<div class="variable">
<h3><a id="CUPCAKE_SDK_VERSIONS">■ &nbsp;&nbsp;CUPCAKE_SDK_VERSIONS</a></h3>
<p>
CUPCAKE_SDK_VERSIONS&nbsp;:=&nbsp;3<br/>
</p>
</div>
<div class="variable">
<h3><a id="DONUT_SDK_VERSIONS">■ &nbsp;&nbsp;DONUT_SDK_VERSIONS</a></h3>
<p>
DONUT_SDK_VERSIONS&nbsp;&nbsp;&nbsp;:=&nbsp;4<br/>
</p>
</div>
<div class="variable">
<h3><a id="ECLAIR_SDK_VERSIONS">■ &nbsp;&nbsp;ECLAIR_SDK_VERSIONS</a></h3>
<p>
ECLAIR_SDK_VERSIONS&nbsp;&nbsp;:=&nbsp;5&nbsp;6&nbsp;7<br/>
</p>
</div>
<div class="variable">
<h3><a id="FROYO_SDK_VERSIONS">■ &nbsp;&nbsp;FROYO_SDK_VERSIONS</a></h3>
<p>
FROYO_SDK_VERSIONS&nbsp;&nbsp;&nbsp;:=&nbsp;8<br/>
</p>
</div>
<div class="variable">
<h3><a id="GINGERBREAD_SDK_VERSIONS">■ &nbsp;&nbsp;GINGERBREAD_SDK_VERSIONS</a></h3>
<p>
GINGERBREAD_SDK_VERSIONS&nbsp;:=&nbsp;9&nbsp;10<br/>
</p>
</div>
<div class="variable">
<h3><a id="HONEYCOMB_SDK_VERSIONS">■ &nbsp;&nbsp;HONEYCOMB_SDK_VERSIONS</a></h3>
<p>
HONEYCOMB_SDK_VERSIONS&nbsp;:=&nbsp;11&nbsp;12&nbsp;13<br/>
</p>
</div>
<div class="variable">
<h3><a id="ICECREAM_SANDWICH_SDK_VERSIONS">■ &nbsp;&nbsp;ICECREAM_SANDWICH_SDK_VERSIONS</a></h3>
<p>
ICECREAM_SANDWICH_SDK_VERSIONS&nbsp;:=&nbsp;14&nbsp;15<br/>
</p>
</div>
<div class="variable">
<h3><a id="JELLY_BEAN_SDK_VERSIONS">■ &nbsp;&nbsp;JELLY_BEAN_SDK_VERSIONS</a></h3>
<p>
JELLY_BEAN_SDK_VERSIONS&nbsp;:=&nbsp;16&nbsp;17<br/>
</p>
</div>
<div class="variable">
<h3><a id="[is-android-codename]">■ &nbsp;&nbsp;[is-android-codename]</a></h3>
<p>
$(call&nbsp;is-android-codename,codename)<br/>
codename&nbsp;is&nbsp;one&nbsp;of&nbsp;cupcake,donut,eclair,froyo,gingerbread,icecream<br/>
please&nbsp;refer&nbsp;the&nbsp;$(codename)_SDK_VERSIONS&nbsp;declared&nbsp;above<br/>
</p>
</div>
<div class="variable">
<h3><a id="[is-android-codename-in-list]">■ &nbsp;&nbsp;[is-android-codename-in-list]</a></h3>
<p>
$(call&nbsp;is-android-codename-in-list,cnlist)<br/>
cnlist&nbsp;is&nbsp;combination/list&nbsp;of&nbsp;android&nbsp;codenames&nbsp;&nbsp;&nbsp;<br/>
</p>
</div>
</div>
<?php require_once '../../sidebar.php';?>
<?php require_once '../../footer.php';?>
</div>
</body>
</html>
