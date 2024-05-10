<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Atendimento</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1 class="title">Criar um atendimento</h1>
        <form action="{{route('calls.create')}}" method="post" class="container">
            @csrf
            @method('post')
            <div class="input-div">
                <label>Título: </label>
                <input type="text" name="title" placeholder="Título">
            </div>
            <div class="input-div">
                <label>Descrição: </label>
                <input type="text" name="description" placeholder="Descrição">
            </div>
            <div class="input-div">
                <label>Categoria: </label>
                <select name="category">
                    @foreach ( $categories as $c )
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
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
                <button class="button" type="submit">Criar atendimento</button>
            </div>
        </form>
    </div>
</body>
</html>