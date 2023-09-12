@extends('layouts.app')

@section('title', 'Home')
@section('dash')
    <section id="home" class="bg-dark text-white text-center text-sm-start py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="py-3">
                    <p class="py-1 m-0 lead">{{ __('home.logged_in') }}</p>
                    <h2 class="display-3">{{ __('home.uni') }} <b class="text-info"
                            style="font-size: 52px">{{ __('home.idlib') }}</b></h2>
                    <div class="row align-items-center">
                        <div class="col">
                            <a href="{{ route('courses.index') }}" class="btn btn-primary">{{ __('nav.courses') }}</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('tutorials.index') }}" class="btn btn-warning">{{ __('nav.tutorials') }}</a>
                        </div>
                        <div class="col">
                            <a href="{{ route('users.index') }}" class="btn btn-success">{{ __('nav.users') }}</a>
                        </div>
                    </div>
                </div>
                <img src="./images/logo.png" alt="" class="d-none d-md-block img-fluid w-50" />
            </div>
        </div>

        <section id="accordion" class="py-5">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col">
                        <h5>{{ __('home.num_c') }}
                            <br>
                            <span class='text-warning'>{{ count($courses) }} / {{ __('home.total') }}</span>
                        </h5>
                    </div>
                    <div class="col">
                        <h5>{{ __('home.num_l') }}
                            <br>
                            <span class='text-warning'>{{ count($tutorials) }} / {{ __('home.total') }}</span>
                        </h5>
                    </div>
                    <div class="col">
                        <h5>{{ __('home.num_u') }}
                            <br>
                            <span class='text-warning'>{{ count($users) }} / {{ __('home.total') }}</span>
                        </h5>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
