@extends('layouts.default')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-sm-10">
            <div class="card border-white shadow-sm rounded">
                <div class="card-header bg-white text-center font-weight-bold">
                    Cadastro
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div class="col-8 col-sm-8">
                            <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                                @csrf
                            
                                @include('product.form')
                            
                                <button class="btn btn-primary" type="submit">
                                    Salvar
                                </button>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- <div class="container">
    </div> --}}

@endsection