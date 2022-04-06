@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="search">
                    <form class="form-inline mb-2">
                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Procurar</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="text-right">
                    <a class="btn btn-primary" href="{{ route('product.create') }}">
                        Cadastrar
                    </a>
                </div>
            </div>
        </div>
        
        @if ($products->first())
            @include('product.table')
        @else
            <p class="text-center font-weight-bold border-top" style="font-size: 1.5em;">
                Não há produtos.
            </p>
        @endif
    
    </div>
@endsection