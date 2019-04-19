<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Boostbox - Blank page</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		@include("assets.styles")

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1401481649"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1401481651"></script>
		<![endif]-->
	</head>
	<body >

        @include("components.header")

		<!-- BEGIN BASE-->
		<div id="base">

            @include("components.sidebar")

			<!-- BEGIN CONTENT-->
			<div id="content">
				<!-- START BLANK SECTION -->
				<section>
					@yield("content")
				</section>
				<!-- START BLANK SECTION -->
			</div><!--end #content-->
			<!-- END CONTENT -->

		</div><!--end #base-->
		<!-- END BASE -->

		@include("assets.scripts")

	</body>
</html>
