@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Cadastrar notícia') }}
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="newsTitle" class="form-label">Título</label>
                    <input type="text" class="form-control" id="newsTitle" name="title">
                </div>
                <div class="mb-3">
                    <label for="newsContent" class="form-label">Conteúdo</label>
                    <textarea class="form-control" id="newsContent" rows="3" name="content"></textarea>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="category_id">
                        <option>Selecione uma categoria para a notícia</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Imagem:</strong>
                        <input type="file" name="image" class="form-control" placeholder="Imagem da notícia">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{ route('news.index') }}" class="btn btn-primary" role="button">Voltar</a>
            </form>

        </div>
    </div>
@endsection
