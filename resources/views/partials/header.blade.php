<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
        <a class="navbar-brand ml-5" href="{{ url('/') }}">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Начало</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/todos">Todos</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
