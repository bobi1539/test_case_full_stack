@extends('layouts.main')

@include('layouts.navbar')

@section('container')


    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">

                @if (session()->has('messageError'))
                    <div id="flash-data-error" data-flashdata="{{ session('messageError') }}"></div>
                @endif

                <main class="form-signin">
                    <h1 class="h3 mb-3 fw-normal text-center">Login Majoo Teknologi</h1>
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-floating">
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input name="password" type="password" class="form-control" id="password"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                    {{-- <small class="d-block text-center mt-3">
                        Not Registered?
                        <a href="/register">Register Now!</a>
                    </small> --}}
                </main>
                <p class="text-center">Email : ucup@gmail.com</p>
                <p class="text-center">Password : password</p>
            </div>
        </div>
    </div>

@endsection
