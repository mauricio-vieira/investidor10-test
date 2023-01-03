@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Nenhuma categoria cadastrada!') }}
        </div>

        <div class="card-body">
            <a href="{{ route('categories.create') }}" class="btn btn-primary" role="button">Cadastrar categoria</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>
@endsection
