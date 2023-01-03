@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Atualizar notícia') }}
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

            <form action="{{ route('news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="newsTitle" class="form-label">Título</label>
                    <input type="text" class="form-control" id="newsTitle" name="title" value="{{ $news->title }}">
                </div>
                <div class="mb-3">
                    <label for="newsContent" class="form-label">Conteúdo</label>
                    <textarea class="form-control" id="newsContent" rows="3" name="content">{{ $news->content }}</textarea>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="category_id">
                        <option>Selecione uma categoria para a notícia</option>
                        @foreach ($categories as $category)
                            <option  @selected($category->id == $news->category_id) value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Imagem:</strong>
                        <input type="file" name="image" class="form-control" placeholder="Imagem da notícia">
                        @if ($news->image)
                            <img src="/images/{{ $news->image }}" width="300px">
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('news.index') }}" class="btn btn-primary" role="button">Voltar</a>
            </form>

        </div>
    </div>
@endsection
