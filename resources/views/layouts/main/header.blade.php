<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary mb-4">
        <a href="{{ route('home') }}" class="navbar-brand text-white font-weight-bold">
            <img src="https://laravel.com/img/notification-logo.png" width="60" height="60" alt="Laravel Logo">
            Laravel
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav offset-1">
                <a class="nav-item nav-link text-light font-weight-bold" href="{{ route('home') }}">
                    Home
                </a>
                @if (Auth::user() && Auth::user()->type == "admin")
                    <a class="nav-item nav-link text-light font-weight-bold" href="{{ route('product') }}">
                        Produtos
                    </a>
                @endif
            </div>
        </div>
    </nav>
    @if (
        !request()->routeIs('cart') 
        && !request()->routeIs('login')
        && !request()->routeIs('register')
        && !request()->routeIs('product.create')
        && !request()->routeIs('product.update')
    )
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="" style="font-size: 1.2em;">
                    @if (Auth::check())
                        <i class="bi bi-person-circle"></i>
                        {{Auth::user()->name}}
                    @endif
                </div>
            </div>
            <div class="col text-right">
                <div class="">
                    @if (!Auth::check())
                        <a class="btn" href="{{ route('login') }}">Entrar</a>
                        <a class="btn" href="{{ route('user.create') }}">Crie a sua conta</a>
                    @else
                        <a class="btn" href="{{ route('logout') }}">Sair</a>
                    @endif
                        <a 
                            class="btn"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="Carrinho de compras"
                            href="{{ route('cart') }}"
                        >
                            <i class="bi bi-cart" style="font-size: 1.5em"></i>
                        </a>
                </div>        
            </div>
        </div>    
    @endif

    </div>
</div>