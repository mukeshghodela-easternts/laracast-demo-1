<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>My Blogs</title>
    <link rel="stylesheet" href="/app.css">
    {{-- <script src="/app.js"></script> --}}
</head>

<body>
    <?= $post ?>
    <a href="/">Go Back</a>
</body>

</html>
