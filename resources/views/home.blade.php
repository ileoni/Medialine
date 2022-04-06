@extends('layouts.default')

@section('content')
    <div class="container pb-5">
        <div class="search">
            <div class="mb-2">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Procurar</button>
                </form>
            </div>
        </div>
        @if ($products->first())
            <div class="row row-cols-4 row-cols-md-4">
                @foreach ($products as $product)
                    <div class="">
                        <div class="col mb-4">
                            <div class="card bg-white border-white shadow-sm mx-auto h-100 w-100">
                                @if (!$product->images->first()->small)
                                    <div class="bg-dark" style="height: 15rem;">
                                        <div class="text-center">
                                            <i class="bi bi-card-image text-white" style="font-size: 8em"></i>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center p-4" style="height: 15rem;">
                                        <img src="{{ $product->images->first()->small }}" class="card-img-top" alt="...">
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
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center font-weight-bold border-top" style="font-size: 1.5em;">
                Não há produtos.
            </p>
        @endif
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