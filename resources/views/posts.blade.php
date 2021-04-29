<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>My Blogs</title>
    <link rel="stylesheet" href="/app.css">
    {{-- <script src="/app.js"></script> --}}
</head>

<body>

    @foreach ($posts as $post)
        <article>
            <a href="/posts/{{ $post->slug }}">
                <h1>{{ $post->title }}</h1>
            </a>
            <div>{!! $post->body !!}</div>
        </article>
    @endforeach

</body>

</html>
