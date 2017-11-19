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
    @forelse($messages as $message)
        <div class="col-md-6">
            <img class="img-thumbnail" src="{{ $message['image'] }}" alt="">
            <p>
                {{$message['content']}}
                <a href="/messages/{{$message['id']}}">Leer Más</a>
            </p>
        </div>
    @empty
        <p class="text-info">
            No hay Mensajes para Mostrar
        </p>
    @endforelse
</div>
@endsection