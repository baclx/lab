<form method="post" action="{{ route('process_login') }}">
    @csrf
    Email
    <input type="email" name="email">
    <br>
    Password
    <input type="password" name="password">
    <br>
    <button>Login</button>
    <a href="{{ route('register') }}">Đăng ký</a>
</form>
