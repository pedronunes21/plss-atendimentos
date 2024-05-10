<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situações</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="title-box">
        <h1 class="title">Situações</h1>
        <a href="{{ route('calls.situation.create') }}">
            <x-heroicon-s-plus-circle class="add-icon" />
        </a>
        
</svg>
    </div>

    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>

    <table border="1" class="table-auto">
        <tr>
            <th>Nome</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
        @foreach ($situations as $s)
            <tr>
                <td>{{$s->name}}</td>
                <td>
                    <a href="{{ route('calls.situation.update.view', ['situation' => $s]) }}" class="flex items-center justify-center"><x-heroicon-c-pencil class="action-icon" /></a>
                </td>
                <td>
                    <form action="{{ route('calls.situation.delete', ['situation' => $s]) }}" method="post">
                        @csrf
                        @method('delete')
                        <label class="hover:cursor-pointer flex items-center justify-center">
                            <input type="submit" hidden />
                            <x-heroicon-c-trash class="action-icon" />
                        </label>
                        
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>