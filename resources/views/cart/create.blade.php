@extends('layouts.default')

@section('content')
    <div class="container">

        @include('cart.table')

        <div class="total">
            <div class="text-right font-weight-bold p-3">
                VALOR TOTAL <span style="font-size: 1.5em">R$ {{$total}}</span>
            </div>
        </div>
        <div class="action">
            <div class="d-flex justify-content-end p-3">
                <button class="btn btn-primary">
                    Comprar
                </button>
            </div>
        </div>
    </div>
@endsection