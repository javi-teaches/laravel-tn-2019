<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title> @yield('pageTitle') </title>
		<link rel="stylesheet" href="/css/app.css">
	</head>
	<body>
		@include('front.navbar')

		<div class="container">
			@yield('mainContent')
		</div>

		@yield('secondContent')
	</body>
</html>
