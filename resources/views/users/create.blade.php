@extends('users.layout')

@section('title', 'Add User')
@section('btn1')
    {{ __('user.users') }}
@endsection
@section('btn1_link')
    {{ route('users.index') }}
@endsection
@section('btn2')
    @if (Auth::user() && Auth::user()->role !== 0)
        <a href="{{ route('users.create') }}" class="btn btn-primary">{{ __('user.add_user') }}</a>
    @endif
@endsection
@section('box')
    @if (session()->has('message'))
        <div class="alert alert-warning text-center" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center" role="alert">
            @foreach ($errors->all() as $error)
                <p class="m-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label>{{ __('user.name_user') }}</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                placeholder="{{ __('user.name_user') }}" required />
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.email') }}</label>
            <input type="email" name="email" class="form-control" placeholder="{{ __('user.email') }}"
                value="{{ old('email') }}" />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.pass') }}</label>
            <input type="password" class="form-control" name="password" placeholder="{{ __('user.pass') }}"
                value="{{ old('password') }}" />
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.c-pass') }}</label>
            <input type="password" class="form-control" name="c-password" placeholder="{{ __('user.c-pass') }}"
                value="" />
            @error('c-password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.role') }}</label>
            <select class="form-select" aria-label="Default select example" name="role">
                <option selected disabled>{{ __('user.select') }}</option>
                <option value="0">{{ __('user.stu') }}</option>
                @if (Auth::user() && Auth::user()->role == 2)
                    <option value="1">{{ __('user.teacher') }}</option>
                    <option value="2">{{ __('user.admin') }}</option>
                @endif
            </select>
            @error('role')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row justify-content-around align-items-center mb-3">
            <button class="btn btn-primary col-md-6 col-lg-3">{{ __('general.create') }}</button>
            <input class="btn btn-success col-md-6 col-lg-3" type="reset"/>
        </div>
    </form>
@endsection
