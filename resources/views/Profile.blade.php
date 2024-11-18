<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    @extends('layouts.navbars')

    @section('content')

    <div id="conteudo" style="margin-left: 220px; margin-top: 70px;">
        <div class="content-area m-5">
            <div>
                @foreach($Users as $user)
                @if($user->id == $id)

                <h1>{{ $user->name }}</h1>
                <label>Legal: {{ $user->avaliacoesPosi }}</label>
                <label>Horrível: {{ $user->avaliacoesNega }}</label>
                <h2>Sobre o construtor:</h2>
                <p>{{ $user->longDescription }}</p>

                @php

                $totalAvaliacoes = $user->avaliacoesPosi + $user->avaliacoesNega;
                $estrelas = $totalAvaliacoes > 0 ? number_format(($user->avaliacoesPosi / $totalAvaliacoes) * 5, 1) : '0';

                @endphp

                <p>{{ $estrelas }} Estrelas</p>

                <div class="d-flex">
                    <h3>Comentários:</h3>
                    <form action="/comment/{{$user->id}}"><button type="submit" class="btn btn-primary">Comentar</button></form>
                </div>
                @foreach($Comments as $comment)
                <div>
                    <div class="card border shadow m-3">
                        <div class="card-header text-dark font-weight-bold">
                            @if($comment->UserComentado == $user->name )
                                {{$comment->UserComentou}}
                            @endif
                        </div>
                        <div class="card-body">
                            {{$comment->comment}}
                            {{$comment->avaliationId}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @endif
            @endforeach
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>