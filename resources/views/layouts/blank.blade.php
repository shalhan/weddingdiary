<!DOCTYPE html>
<html lang="en">

<head>
	<title>Wedding Diary</title>

	<!-- BEGIN META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="wedding, photography, wedding photography, wedding photographer">
	<meta name="description" content="Wedding diary is a website for wedding photographer to publish their works">
	<!-- END META -->

	@include("assets.styles")

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1401481649"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1401481651"></script>
		<![endif]-->
</head>

<body>

	<!-- START BLANK SECTION -->
	<div>
		@yield("content")
	</div>
	<!-- START BLANK SECTION -->

	@include("assets.scripts")

</body>

</html>