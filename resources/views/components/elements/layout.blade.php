<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>一覧ページ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mx-auto mt-9 max-w-screen-lg">
        {{ $slot }}
    </div>
    <script src="js/sort.js"></script>
</body>
</html>
