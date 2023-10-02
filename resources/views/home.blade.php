<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    {{-- <a href="{{route('index')}}" type="button" class="btn btn-outline-danger">index</a> --}}
    <a href="{{ route('tasks.index') }}">Ir a la lista de tareas</a>

</div>