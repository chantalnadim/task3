<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    <div class="post-preview">
    <h2>{{ $title }}</h2>
    <p>{{ $content }}</p>
    <a href="{{ $link }}" class="btn btn-secondary">Read More</a>
</div>
<x-post-preview :title="$post->title" :content="Str::limit($post->content, 100)" :link="route('posts.show', $post->id)"/>

</div>
