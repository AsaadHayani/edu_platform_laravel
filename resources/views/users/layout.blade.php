@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="d-flex justify-content-between align-items-center card-header">
            <b class='text-success'>@yield('count')</b>
            <div class="row justify-content-end align-items-center">
                <div class="col">
                    @yield('btn_resume')
                </div>
                <div class="col">
                    <a href="@yield('btn1_link')" class="btn btn-info">@yield('btn1')</a>
                </div>
                <div class="col">
                    @yield('btn2')
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            @yield('box')
        </div>
    </div>
@endsection
