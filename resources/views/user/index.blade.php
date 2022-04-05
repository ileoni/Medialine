@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="search">
                    <div class="">
                        <form class="form-inline mb-2">
                            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success my-2 my-sm-0" type="submit">Procurar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('user.table')
    </div>
@endsection