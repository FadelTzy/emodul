<div class="container">
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a class="nav-link @if (Request::is('user')) active
            @endif "  href="{{url('user')}}">
                <span>
                    <i class="nav-icon bi bi-house"></i>
                    <span class="nav-text">Beranda</span>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::is('user/materi/*')) active
            @endif" href="stats.html">
                <span>
                    <i class="nav-icon bi bi-binoculars"></i>
                    <span class="nav-text">Materi</span>
                </span>
            </a>
        </li>
        <li class="nav-item centerbutton">
            <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal"
                id="centermenubtn">
                <span class="theme-radial-gradient">
                    <i class="bi bi-grid size-22"></i>
                </span>
            </button>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="shop.html">
                <span>
                    <i class="nav-icon bi bi-bag"></i>
                    <span class="nav-text">Quiz</span>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::is('user/tentang')) active
            @endif" href="{{url('user/tentang')}}">
                <span>
                    <i class="nav-icon bi bi-question-octagon"></i>
                    <span class="nav-text">Tentang</span>
                </span>
            </a>
        </li>
    </ul>
</div>