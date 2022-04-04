<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a href="#" class="navbar-brand">
            <img src="https://laravel.com/img/notification-logo.png" width="60" height="60" alt="Laravel Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav offset-1">
            <a class="nav-item nav-link text-light font-weight-bold" href="{{ route('home') }}">
                Home
            </a>
            <a class="nav-item nav-link text-light font-weight-bold" href="{{ route('product') }}">
                Produtos
            </a>
            <a class="nav-item nav-link text-light font-weight-bold" href="{{ route('user') }}">
                Clientes
            </a>
          </div>
        </div>
    </nav>
    <div class="text-right p-3">
        @if (!Auth::check())
            <a class="btn" href="{{ route('login') }}">Entrar</a>
            <a class="btn" href="{{ route('register') }}">Crie a sua conta</a>
        @else
            <a class="btn" href="{{ route('logout') }}">Sair</a>
        @endif
        <a class="btn" href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
        </a>
    </div>
</div>