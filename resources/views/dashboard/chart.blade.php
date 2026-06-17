<h1>Dashboard</h1>

<p>Selamat datang di chart, {{auth()->user()->username }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>