@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-sm-6">
                <div class="card border-white shadow-sm rounded">
                    <div class="card-header bg-white text-center font-weight-bold">
                        Login
                    </div>
                    <div class="card-body text-center p-5">
                        <form method="POST" action="{{ route('login') }}">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="email">Email</label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="email" name="email" type="text">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="password">Senha</label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="password" name="password" type="password">
                                </div>
                            </div>

                            <div class="action p-3">
                                <button class="btn btn-primary" type="submit">Entrar</button>
                                <a class="btn btn-light" href="{{ route('home') }}">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection