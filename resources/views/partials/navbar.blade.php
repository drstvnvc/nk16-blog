<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/posts">Vivify Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/posts/create">Add a post</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endguest
            </ul>
            <span class="navbar-text">
                @auth
                {{auth()->user()->name}}
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</a>
                </form>

                @endauth
            </span>
        </div>
    </div>
</nav>