@extends('layouts.auth')
@section('main')
    @push('title')
        <title>User Register</title>
    @endpush

    @push('styles')
        <style>
            .auth-back{
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                height: 100%;
            }

            .auth-overlay{
                background: #39508b9e;
            }

            .inner-box{
                background-color: #5276b270!important;
            }

            .btn-primary{
                background: #3f62cb!important;
                border: 0!important;
            }

            .auth-logo{
                width: 30%;
                border-radius: 1rem;
            }
        </style>
    @endpush

    <section class="ragister-section centred position-relative">
        <img src="{{asset('guest/images/auth-back.jpg')}}" class="position-fixed auth-back">
        <div class="position-fixed auth-overlay auth-back"></div>
        <div class="auto-container">
            <div class="row clearfix mt-5">
                <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                    <div class="inner-box mt-5">
                        <img src="{{asset('upload/logo.jpeg')}}" class="auth-logo"/>
                        <h4 class="text-white">Sign Up</h4>
                        <form action="{{ route('register.post') }}" method="post" class="default-form">
                            @csrf
                            <div class="form-group d-flex">
                                <div class="col-md-6" style="padding-left: 0;">
                                    <label class="text-white" for="given_name">Given Name</label>
                                    <input type="text" name="given_name" id="given_name" required="">
                                </div>
                                <div class="col-md-6 ps-0" style="padding-right: 0;">
                                    <label class="text-white" for="surname">Surname</label>
                                    <input type="text" name="surname" id="surname" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="email">Email</label>
                                <input type="email" name="email" id="email" required="">
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="password1">Password</label>
                                <input type="password" name="password1" id="password1" required="">
                            </div>
                            <div class="form-group">
                                <label class="text-white" for="password2">Confirm Password</label>
                                <input type="password" name="password2" id="password2" required="">
                            </div>
                            <div class="form-group mb-2 " style="text-align: start">
                                <a class="" href="{{route('login.get')}}">I already have one.</a>
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="btn btn-primary w-100 py-3">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
