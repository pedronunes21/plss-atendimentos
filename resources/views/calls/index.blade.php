<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimentos</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex">
        <div class="title-box">
            <h1 class="title">Atendimentos</h1>
            <a href="{{ route('calls.create') }}">
                <x-heroicon-s-plus-circle class="add-icon" />
            </a>
        </div>
        <div class="flex flex-col px-[20px]">
            <a class="text-blue-400" href="{{ route('calls.category.index.view') }}">Categorias</a>
            <a class="text-blue-400" href="{{ route('calls.situation.index.view') }}">Situações</a>
        </div>
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
            <th>Título</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Situação</th>
            <th>Prazo</th>
            <th>Resolvido em</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
        @foreach ($calls as $c)
            <tr>
                <td>{{$c->title}}</td>
                <td>{{$c->description}}</td>
                <td>{{$c->category->name}}</td>
                <td>{{$c->situation->name}}</td>
                <td>{{date('d/m/Y', strtotime($c->solution_deadline))}}</td>
                @if ($c->solution_date === null)
                    <td></td>
                @else
                    <td>{{date('d/m/Y', strtotime($c->solution_date))}}</td>
                @endif
                <td>
                    <a href="{{ route('calls.update.view', ['call' => $c]) }}" class="flex items-center justify-center"><x-heroicon-c-pencil class="action-icon" /></a>
                </td>
                <td>
                    <form action="{{ route('calls.delete', ['call' => $c]) }}" method="post">
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