@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Laratter</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="navbar-link" href="">Home</a>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    <form action="/messages/create" method="post">
        <div class="form-group @if($errors->has('message')) has-danger @endif">
            {{ csrf_field() }}
            <input name="message" class="form-control" type="text" placeholder="Type message">
            @if ($errors->any())
                @foreach($errors->get('message') as $error)
                    <div class="form-control-feedback">
                        {{$error}}
                    </div>
                @endforeach
            @endif
        </div>
    </form>
</div>
<div class="row">
    @forelse($messages as $message)
        <div class="col-md-6">
            <img class="img-thumbnail" src="{{ $message->image }}" alt="">
            <p>
                {{$message['content']}}
                <a href="/messages/{{$message->id}}">Leer Más</a>
            </p>
        </div>
    @empty
        <p class="text-info">
            No hay Mensajes para Mostrar
        </p>
    @endforelse

    @if (count($messages))
        <div class="mt-2 mx-auto">
            {{ $messages->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>
@endsection