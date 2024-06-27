<div id="sidebar">
  <div class="logo">
    <img src="{{ asset('assets/logo_Mylibrary.png') }}" alt="Logo">
  </div>
  <ul class="nav">  
    <li class="icons">
      <a href="{{ route('home') }}">
        <span class="material-icons" id="icons">dashboard</span>
      </a>
    </li>
    <li>
      <a href="{{ route('books.index') }}">
        <span class="material-symbols-outlined" id="icons">menu_book</span>
      </a>
    </li>
    <li>
      <a href="{{ route('borrowers.index') }}">
        <span class="material-symbols-outlined" id="icons">person</span>
      </a>
    </li>
    <li>
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="material-symbols-outlined" id="icons">logout</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
  </ul>
</div>