@extends('layouts.app')

@section('content')
<h1>Listagem de posts</h1>

    @forelse($posts as $post)
        <a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a>
        <hr>

        @empty
            <p>Nenhum post cadastrado</p>
    @endforelse

    {!! $posts->links() !!}
@endsection