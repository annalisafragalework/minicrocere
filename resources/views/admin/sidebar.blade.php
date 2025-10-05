
    <h4 class="mb-4">Admin Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href=" {{ route('admin.index') }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
           <li class="nav-item mb-2">
        <a class="nav-link text-white" href="{{ route('admin.utenti.index') }}">
    <i class="fas fa-home me-2"></i> Utenti
</a>

        </li>
        {{-- <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('minicrociere.index') }}">
                <i class="fas fa-ship me-2"></i> MiniCrociere
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('utenti.index') }}">
                <i class="fas fa-users me-2"></i> Utenti
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('ruoli.index') }}">
                <i class="fas fa-user-shield me-2"></i> Ruoli
            </a>
        </li> --}}
    </ul>

