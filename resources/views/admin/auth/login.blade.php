@extends('admin.auth.layout.master')
@section('dynamic-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 login-block">
            <div class="">
                <h3 class="login-form-text text-center">Stayteller</h3>
                <h4 class="form-title text-center">Administrator Login</h4>
                <form class="form-horizontal m-t-20" id="loginform" action="{{ route('admin.submit.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email address" >
                        <span class="invalid-feedback error error-email"></span>
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Password" >
                        <span class="invalid-feedback error error-password"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <a class="mt-3" style="font-size:12px" href="">Forgot Password?</a>
                        </div>
                    </div>                  
                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-primary form-submit text-center" type="submit" name="submit">
                            Login
                        </button>
                    </div>

                    <div class="c-grey font-medium f14 text-center"> Do not have an account? <a href="" data-target="#register" data-toggle="modal">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection