<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Construção</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    @extends('layouts.navbars')

    @section('title', 'Página Inicial')

    @section('content')

    <div id="conteudo" style="margin-left: 220px; margin-top: 70px;">
        <div class="content-area m-5">
            <div>

                <form action="/update/{{$user->id}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="categoryId" class="form-label">Senha:</label>
                        <input type="text" name="password" id="password" class="form-control" value="{{ $user->password }}">
                    </div>

                    <div class="mb-3">
                        <label for="categoryId" class="form-label">Categoria:</label>
                        <select name="categoryId" id="categoryId" class="form-control" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $user->categoryId) selected @endif>
                                {{ $category->id }} - {{ $usersJoin->firstWhere('categoryId', $category->id)->Name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="lowDescription" class="form-label">Breve descrição:</label>
                        <textarea name="lowDescription" id="lowDescription" class="form-control">{{ $user->lowDescription }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="lowDescription" class="form-label">Descrição longa:</label>
                        <textarea name="longDescription" id="longDescription" class="form-control">{{ $user->longDescription }}</textarea>
                    </div>


                    <div class="d-flex justify-content-end">
                        <a class="btn btn-secondary mr-3" href="/dashboard">Cancelar</a>
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>