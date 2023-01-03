@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Notícias') }}
        </div>

        <div class="card-body">
            <a href="{{ route('news.create') }}" class="btn btn-primary" role="button">Cadastrar notícia</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->category->name ?? '[Sem categoria]' }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <form action="{{ route('news.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-primary" role="button">Atualizar</a>

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
            {{ $news->links() }}
        </div>
    </div>
@endsection
