
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <!-- <a class="navbar-brand" href="#">Tafreeh</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="d-flex float-right" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger ms-89" type="submit">Logout</button>
            </form>
        </div>
        
    </div>
</nav>