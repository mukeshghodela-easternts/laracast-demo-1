@extends('layout')

@section('banner')
<h1>My Blogs</h1>
@endsection

@section('content')
@foreach ($posts as $post)
<article class="{{ $loop->even ? 'even-row' : 'odd-row' }}">
    <a href="/posts/{{ $post->id }}">
        <h1>{!! $post->title !!}</h1>
    </a>
    <div>{{ $post->excerpt }}</div>
</article>
@endforeach
@endsection