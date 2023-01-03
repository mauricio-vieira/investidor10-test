@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Cadastrar categoria') }}
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

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="categoriesName" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="categoriesName" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{ route('categories.index') }}" class="btn btn-primary" role="button">Voltar</a>
            </form>

        </div>
    </div>
@endsection
