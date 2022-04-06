@extends('layouts.default')

@section('content')

    <div class="container">
        <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
            @csrf
    
            @include('product.form')
    
            <button class="btn btn-primary" type="submit">
                Salvar
            </button>
    
        </form>
    </div>

@endsection