<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel #4 : Passing Data Controller Ke View Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h1>Tutorial Laravel</h1>
	<a href="https://www.malasngoding.com/category/laravel">www.malasngoding.com</a>
 
    <p>Nama : {{ $nama }} - <?php echo $nama; ?></p>
    <p>Umur : {{ $umur }} - <?php echo $umur; ?></p>
    <p>Mata Pelajaran</p>
    <ul>
        @foreach($matkul as $m)
 
		<li>{{ $m }}</li>
 
		@endforeach
		
	</ul>
</body>
</html>