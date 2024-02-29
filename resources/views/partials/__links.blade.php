<ul>
    @guest
       @php
           $res = explode(".", $routeName);
       @endphp

       @if($res[2] === "register")
       <li><a href="{{route("pages.Auth.login")}}">Login</a></li>
       @else
       <li><a href="{{route("pages.Auth.register")}}">Register</a></li>
       @endif
    @endguest
    <li>
      
    @auth
    <li>
        <span>{{Auth::user()->email}}  | </span>
     </li>
    <li>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    @endauth
  </li>
</ul>