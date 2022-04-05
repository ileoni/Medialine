@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="search">
            <div class="mb-5">
                <form class="form-inline mb-2">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Procurar</button>
                </form>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4">
            @foreach ($products as $product)
                
                <div class="col mb-4">
                    <div class="card bg-white border-white shadow-sm mx-auto h-100 w-100">
                        @if (!$product->path)
                            <div class="media h-50">
                                <div class="w-100 bg-dark text-center align-self-center">
                                    <i class="bi bi-card-image text-white" style="font-size: 8em"></i>
                                </div>
                            </div>
                        @else
                            <div class="text-center p-4">
                                <img src="{{'/images/small/'.$product->path}}" class="card-img-top" alt="...">
                            </div>
                        @endif
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>
                                        {{ $product->name }}
                                    </h5>
                                </div>
                                <div class="card-text">
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                                <div class="card-price">
                                    <p class="font-weight-bold" style="font-size: 1.2em;">
                                        {{ $product->price }}
                                    </p>
                                </div>
                                <div class="card-action">
                                    <div class="text-right">
                                        <button class="btn btn-primary font-weight-bold" onclick="addItem({{$product}})">
                                            adicionar
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            @endforeach
        </div>
        
    </div>
</div>
@endsection

@push('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function addItem(product)
        {
            $.ajax({
                url: "{{ route('add.item') }}",
                type: "get",
                data: {
                    cart: product
                },
                success: function(res) {
                    console.log(res)
                }
            });
        }
    </script>
@endpush