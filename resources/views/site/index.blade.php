@extends('layouts.site')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Investidor10</h1>
                <p class="lead text-muted">Bem vindo! Esta é a página de notícias do Investidor10, aqui você fica atualizado sobre o mundo dos investimentos.</p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($news as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            @if ($item->image)
                                <img src="/images/{{ $item->image }}" class="bd-placeholder-img card-img-top" alt="{{ $item->title }}" height="225px">
                            @else
                                <img src="/images/noimage.jpg" class="bd-placeholder-img card-img-top" alt="{{ $item->title }}" height="225px">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->title }}</h4>
                                <h6 class="card-title">{{ $item->category ?? '' }}</h6>
                                <p class="card-text">{{ Str::limit($item->content, 20) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('site.details', $item->slug) }}" class="btn btn-primary" role="button">Ler notícia</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-footer">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
