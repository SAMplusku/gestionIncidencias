@extends('master')
@section('content')
    <div class="d-flex justify-content-center align-items-center h-75">
        <form class="form-signin w-75" action="" method="get">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
            <button class="btn btn-success btn-block" type="submit"> Sign in</button>
            <hr>
            <a class="a" href="/signup"><button class="btn btn-primary btn-block" type="button">Sign up New Account</button></a>
        </form>
    </div>
@endsection
