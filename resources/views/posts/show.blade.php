@extends('layouts.app')

@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<img src="{{ asset('storage/'.$post->image_path) }}" alt="{{ $post->title }}">

<h2>Comments</h2>
@foreach($post->comments as $comment)
    @if($comment->is_visible)
        <p>{{ $comment->content }} - {{ $comment->user->name }}</p>
    @endif
@endforeach

<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="content" class="form-control"></textarea>
    <button type="submit" class="btn btn-primary">Add Comment</button>
</form>
@endsection
