@extends('layouts.app')

@section('content')
<h1>Blog Posts</h1>
<a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>

<div class="row">
    @foreach($posts as $post)
        <div class="col-md-4">
            <h2>{{ $post->title }}</h2>
            <p>{{ Str::limit($post->content, 100) }}</p>
            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Read More</a>
        </div>
    @endforeach
</div>
@endsection
