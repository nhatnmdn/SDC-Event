<div class="container" style="text-align: center">
    <h3>Hi, {{$user->email}}</h3>
    <p><a href="{{route('password.reset.form', ['email' => $user->email])}}">Please click here to reset your password</a></p>
</div>
