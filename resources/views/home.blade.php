@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3">
            
            @foreach ($products as $product)
                
                <div class="col mb-4">
                    <div class="card mx-auto h-100 w-75">
                        @if (!$product->path)
                        <div class="media h-50">
                            <div class="w-100 text-center align-self-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                </svg>
                            </div>
                        </div>
                        @else
                            <div class="text-center">
                                <img src="{{$product->path}}" class="card-img-top" alt="...">
                            </div>
                        @endif
                        <div class="card-body">
                                <h5 class="card-title">
                                    {{ $product->name }}
                                </h5>
                                <p class="card-text">
                                    {{ $product->description }}
                                </p>
                                <p class="card-price text-right">
                                    {{ $product->price }}
                                </p>
                                <div class="action text-right">
                                    <a href="#" class="btn btn-outline-dark">Add</a>
                                </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        
    </div>
</div>
@endsection