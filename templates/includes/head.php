<!DOCTYPE HTML>
<html>
<head dir="<?=TMR?>">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="description" content="<?=DESCRIPTION?>">
	<meta name="keywords" content="<?=KEYWORDS?>">
    <link href="css/styles.css?v=7" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script type="text/javascript" src="js/core.js?v=2"></script>
	<script type="text/javascript" src="js/my.js?v=2"></script>
	<title><?=TITLE?></title>
</head>
<body>
	<div class="cloud"><div class="rt"><span></span></div></div>
	<div id="flashBg">
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="300" id="fer" align="middle">
			<param name="movie" value="/img/fer.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#ffffff" />
			<param name="play" value="true" />
			<param name="loop" value="true" />
			<param name="wmode" value="transparent" />
			<param name="scale" value="showall" />
			<param name="menu" value="true" />
			<param name="devicefont" value="false" />
			<param name="salign" value="" />
			<param name="allowScriptAccess" value="sameDomain" />
			<!--[if !IE]>-->
			<object type="application/x-shockwave-flash" data="/img/fer.swf" width="100%" height="300">
				<param name="movie" value="/img/fer.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="transparent" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
			<!--<![endif]-->
				<a href="http://www.adobe.com/go/getflash">
					<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
				</a>
			<!--[if !IE]>-->
			</object>
			<!--<![endif]-->
		</object>
	</div>
	<div id="maket">
		<div id="header">
			<div id="flashGlobe">
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="50" height="50" align="middle">
					<param name="movie" value="/img/globe.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#fff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="transparent" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
					<!--[if !IE]>-->
					<object type="application/x-shockwave-flash" data="/img/globe.swf" width="50" height="50">
						<param name="movie" value="/img/globe.swf" />
						<param name="quality" value="high" />
						<param name="bgcolor" value="#fff" />
						<param name="play" value="true" />
						<param name="loop" value="true" />
						<param name="wmode" value="transparent" />
						<param name="scale" value="showall" />
						<param name="menu" value="true" />
						<param name="devicefont" value="false" />
						<param name="salign" value="" />
						<param name="allowScriptAccess" value="sameDomain" />
					<!--<![endif]-->
						<a href="http://www.adobe.com/go/getflash">
							<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
						</a>
					<!--[if !IE]>-->
					</object>
					<!--<![endif]-->
				</object>
			</div>
			<a href="/"><img src="img/logo.png" alt="Logo <?=TITLE?>"/></a>
			<img src="img/header_img.png" alt="header <?=TITLE?>"/>
		</div>
		<div id="menu">
			<?menu_build(0)?>
			<span class="jlang">
				<a <?=$lang=='az'?'class="active"':null?> tabindex="az" href="?language=az">az</a>
				<a <?=$lang=='en'?'class="active"':null?> tabindex="en" href="?language=en">en</a>
				<a <?=$lang=='ru'?'class="active"':null?> tabindex="ru" href="?language=ru">ru</a>
			</span>
		</div>
		<div id="wrapper"><span class="back"></span>
			