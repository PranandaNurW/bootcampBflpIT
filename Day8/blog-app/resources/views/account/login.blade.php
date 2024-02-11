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
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show text-s" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show text-s" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <form class="user" method="POST" action="{{ route('auth.auth') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email..." value="{{ old('email') }}">
                                        @error('email')
                                        <div class="ml-3 invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror   
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                        <div class="ml-3 invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <input type="submit" name="" class="btn btn-primary btn-user btn-block" value="Login">
                                    <hr>
                                </form>
                                <div class="text-center small">
                                    Not registered? <a href="{{ route('auth.registration') }}">Create an Account!</a>
                                </div>
                                <div class="text-center small mt-3">
                                    Just wanna look around? <a href="{{ route('blog.index') }}">See Blog.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection