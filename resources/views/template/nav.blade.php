<li class="nav-item @if ($active == 'Spp')
    {{'active'}}
@endif">
    <a class="nav-link" href="{{url('pembayaran')}}">
        <i class="fas fa-fw fa-cube" style="color: black;"></i>
        <span class="text-dark">Spp</span>
    </a>
</li>


@if(Auth::user()->level == 'admin')
<li class="nav-item @if ($title == 'Akun') {{ 'active' }} @endif">

    <a href="{{ url('user') }}" class="nav-link">
        <i class="fa-solid fa-user" style="color: black;"></i>
        <span class="text-dark">Profil</span>
    </a>
</li>
@endif
