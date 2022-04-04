@extends('layouts.default-auth')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-sm-10">
                <div class="card mt-5 border-white shadow-sm rounded">
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
{{-- @extends('layouts.default-auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
