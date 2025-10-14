 
<h4 class="mb-4">Admin Panel</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href=" {{ route('admin.index') }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
@if(session('user_role') == 'administrator')
    <li class="nav-item mb-2">
        <a class="nav-link text-white" href="{{ route('admin.dottori.index') }}">
            <i class="fas fa-home me-2"></i> Dottori
        </a>
    </li>
@elseif(session('user_role') == 'dottore')
    <li class="nav-item mb-2">
        <a class="nav-link text-white" href="{{ route('admin.dottori.pazienti.delDottore', ['dottore' => session('user_id')]) }}   ">
            <i class="fas fa-home me-2"></i> Pazienti
        </a>
    </li>
     <li class="nav-item mb-2">
 <a class="nav-link" href="{{ route('admin.dottori.calendar') }}">
    <i class="bi bi-calendar-plus"></i> Inserisci Calendario
</a>
</li>
@endif
        </li>
        {{-- <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('minicrociere.index') }}">
                <i class="fas fa-ship me-2"></i> MiniCrociere
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('dottori.index') }}">
                <i class="fas fa-users me-2"></i> dottori
            </a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link text-white" href="{{ route('ruoli.index') }}">
                <i class="fas fa-user-shield me-2"></i> Ruoli
            </a>
        </li> --}}
    </ul>

