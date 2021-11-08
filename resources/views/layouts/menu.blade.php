


<li class="nav-item">
    <a href="{{ route('waterBills.index') }}"
       class="nav-link {{ Request::is('waterBills*') ? 'active' : '' }}">
        <p>Water Bills</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('logs.index') }}"
       class="nav-link {{ Request::is('logs*') ? 'active' : '' }}">
        <p>Logs</p>
    </a>
</li>


