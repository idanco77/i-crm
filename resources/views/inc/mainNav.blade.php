<a class="navbar-brand" href="{{ url('') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo" width="50"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-align-justify fa-lg"></i>
</button>

<div class="collapse navbar-collapse" id="navbarsExample04">
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" href="{{ url('user-admins') }}">ניהול משתמשים</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('user-admins/contacts') }}">ניהול פניות</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('user-admins/views') }}">ניהול צפיות</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">יציאה</a>
        </li>
    </ul> 
    @if(Session::has('user_id'))
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <span class="nav-link">{{ Session::get('user_name') }}</span>
        </li>  
    </ul>
    @endif
</div>
