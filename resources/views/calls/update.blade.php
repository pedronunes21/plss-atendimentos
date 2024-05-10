<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atendimento</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
    <h1 class="title">Editar Atendimento</h1>
    <form action="{{route('calls.update', ['call' => $call])}}" method="post" class="container">
        @csrf
        @method('put')
        <div class="input-div">
                <label>Título: </label>
                <input type="text" name="title" placeholder="Título" value="{{ $call->title }}">
            </div>
            <div class="input-div">
                <label>Descrição: </label>
                <input type="text" name="description" placeholder="Descrição" value="{{ $call->description }}">
            </div>
            <div class="input-div">
                <label>Categoria: </label>
                <select name="category">
                    @foreach ( $categories as $c )
                        @if ($call->category_id === $c->id)
                            <option selected value="{{ $c->id }}">{{ $c->name }}</option>
                        @else
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-div">
                <label>Situação: </label>
                <select name="situation">
                    @foreach ( $situations as $s )
                        @if ($call->situation_id === $s->id)
                            <option selected value="{{ $s->id }}">{{ $s->name }}</option>
                        @else
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endif
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
        <button class="button" type="submit">Salvar atendimento</button>
        </div>
    </form>
    </div>
</body>
</html>