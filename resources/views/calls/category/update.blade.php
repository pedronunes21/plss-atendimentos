<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
    <h1 class="title">Editar categoria</h1>
    <form action="{{route('calls.category.update', ['category' => $category])}}" method="post" class="container">
        @csrf
        @method('put')
        <div class="input-div">
            <label>Nome: </label>
            <input type="text" name="name" placeholder="Nome" value="{{ $category->name }}">
        </div>
        <div>
            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div>
        <button class="button" type="submit">Salvar categoria</button>
        </div>
    </form>
    </div>
</body>
</html>