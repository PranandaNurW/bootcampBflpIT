@extends('layouts.plain')

@section('container')

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-5 col-md-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('auth.register') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="exampleInputname" aria-describedby="nameHelp"
                                            placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="ml-3 invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror   
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="exampleInputEmail" placeholder="Email Address" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="ml-3 invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                            <div class="ml-3 invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="password_confirmation" class="form-control form-control-user  @error('password_confirmation') is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password">
                                            @error('password_confirmation')
                                            <div class="ml-3 invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" name="" class="btn btn-primary btn-user btn-block" value="Register">
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center small">
                                    Already have an account? <a href="{{ route('auth.login') }}">Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection