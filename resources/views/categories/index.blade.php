@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Categorias') }}
        </div>

        <div class="card-body">
            <a href="{{ route('news.create') }}" class="btn btn-primary" role="button">Cadastrar categoria</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary" role="button">Atualizar</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                                    </td>
                                </tr>
                            </form>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="card-footer">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
