<hr>

@if(auth()->check())

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

<form action="{{route('comment.store')}}" method="POST" class="form">
    @csrf
    <input type="hidden" name="post_id" value="{{$post->id}}">

    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Titulo" />
    </div>

    <div class="form-group">
        <textarea class="form-control" name="body" cols="30" rows="5" placeholder="Comentário"></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
@else
<p>Precisa estar logado para comentar. <a href="{{route('login')}}">Clique aqui para entrar</a></p>
@endif


<hr>

<h3>Comentários ({{$post->comments->count()}})</h3>
@foreach($post->comments as $comment)
    <p>
        <b>{{ $comment->user->name }} comentou: </b>
        {{ $comment->title  }} - {{ $comment->body  }}
    </p>

@endforeach