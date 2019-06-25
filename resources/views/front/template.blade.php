<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title> @yield('pageTitle') </title>
		<link rel="stylesheet" href="/css/app.css">
	</head>
	<body>

		@include('front.navbar')

		@yield('mainContent')
		
		@yield('secondContent')
	</body>
</html>
