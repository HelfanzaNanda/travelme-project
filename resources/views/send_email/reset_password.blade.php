<h1>Hello {{ $user->name }}</h1>

<p> silahkan klik button reset password untuk reset password

    <a href="{{ route('driver.reset.password', $user->email) }}"></a>
</p>
