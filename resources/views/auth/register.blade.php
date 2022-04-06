@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-sm-10">
                <div class="card border-white shadow-sm rounded">
                    <div class="card-header bg-white text-center font-weight-bold">
                        Cadastro
                    </div>
                    <div class="card-body text-center p-5">
                        <form method="POST" action="{{ route('user.store') }}">

                            <div class="row">
                                <div class="col">
                                    <h5 class="text-left mb-5">
                                        Usuário
                                    </h5>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="name">Nome</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="name" name="name" type="text">
                                        </div>
                                    </div>
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
                                    
                                </div>
                                <div class="col">
                                    <h5 class="text-left mb-5">
                                        Endereço
                                    </h5>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="state">Estado</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="state" name="state" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="city">Cidade</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="city" name="city" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="street">Rua</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="street" name="street" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="number">Numero</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="number" name="number" type="text">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="action p-3">
                                <button class="btn btn-primary" type="submit">Salvar</button>
                                <a class="btn btn-light" href="{{ route('home') }}">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection