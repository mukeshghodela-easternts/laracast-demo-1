@extends('layout')

@section('banner')
    <h1>My Blogs</h1>
@endsection

@section('content')
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'even-row' : 'odd-row' }}">
            <a href="/posts/{{ $post->slug }}">
                <h1>{{ $post->title }}</h1>
            </a>
            <p>
                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a
                    href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>
            <div>{!! $post->excerpt !!}</div>
        </article>
    @endforeach
@endsection
