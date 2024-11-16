<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
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

    <div>
        <h3>Comentários:</h3>
    </div>

    <div>
        <div class="card border shadow m-3">
            <div class="card-header text-dark font-weight-bold">

                <div class="d-flex justify-content-between">
                    <h4>Lucas Matheus</h4>
                    <div class="d-flex">
                        @if($category == 3)
                        <form action="/report" method="post">
                            @method('UPDATE')
                            <button type="submit" class="btn text-danger rounded">Reportar</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $user->lowDescription }}</p>
                <div class="d-flex justify-content-between">
                    <a href="/chat/{{$user->id}}/{{$user->categoryId}}" class="btn btn-outline-primary rounded">Ver mais</a>
                    <div class="d-flex">
                        @if($category == 3)
                        <form action="destroy/{{$user->id}}" method="get" onsubmit="return confirm('Tem certeza que deseja apagar?');" class="mr-2">
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded">Apagar</button>
                        </form>
                        <form action="/destroy" method="post">
                            @method('UPDATE')
                            <button type="submit" class="btn btn-outline-success rounded">Editar</button>
                        </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endif
    @endforeach

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>