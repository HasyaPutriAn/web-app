<div class="sidebar">
    <ul class="nav">
        <li><a href="/dashboard">Home</a></li>
        <li><a href="/gallery">Gallery</a></li>
        <li><a href="{{ route('employe.index') }}">Employe</a></li>
        <li><a href="/about">About</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
    </ul>
</div>
