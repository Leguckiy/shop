<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>Панель администратора</h1>
</div>

<div class="container">
<div class="row mt-2">
    <div class="col-2 menu">
        <p>Меню</p>
        <ul class="list-group">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manufacturer.index') }}">Производители</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Покупатели</a>
            </li>
        </ul>
    </div>
    <div class="col-10 content">
        @yield('content')
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>



