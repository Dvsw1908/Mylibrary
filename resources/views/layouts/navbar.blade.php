<nav class="navbar">
    <div class="nav-container">
        <!-- Left-aligned items -->
        <div class="nav-left">
            <span id="judul" style="font-weight: bold; font-size: 18px;">Mylibrary</span>
        </div>
        
        <!-- Center-aligned items -->
        <div class="nav-center">
            <input id="search-bar" type="text" placeholder="Search...">
        </div>
        
        <!-- Right-aligned items -->
        <div class="nav-right">
            <div class="user-info">
                <span id="nama-user">{{ Auth::user()->name }}</span>
                <span id="job-user">Librarian</span>
            </div>
            <img src="{{asset('assets/profile.jpg')}}" alt="profile">
        </div>
    </div>
</nav>