<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts.navbars')

    @section('content')

    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sua Construção</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .navbar-fixed-top {
                position: fixed;
                top: 0;
                left: 250px;
                width: calc(100% - 250px);
                z-index: 9999;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 250px;
                height: 100vh;
                background-color: #343a40;
                padding-top: 10px;
            }

            .link {
                font-size: 18px;
                color: #779EC5;
            }

            .link:hover {
                font-size: 18px;
                color: #DDDDDD;
            }

            .navbar-brand {
                font-size: 25px;
            }
        </style>
    </head>

    <body>

        @extends('layouts.navbars')

        @section('title', 'Página Inicial')

        @section('content')

        <div id="conteudo" style="margin-left: 220px; margin-top: 70px;">
            <div class="content-area m-5">
                <div>
                    <form action="/store" method="post">
                        @csrf
                        <h1>Crie seu algo aqui</h1>
                        <div class="form-group">
                            <label for="">Seu algo:</label>
                            <input type="text" class="form-control mb-2" name="name" placeholder="nome do seu algo">
                            <input type="submit" class="btn btn-success" value="Criar evento">
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

</body>

</html>