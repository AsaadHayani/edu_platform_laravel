@extends('users.layout')

@section('title', 'Edit User')
@section('btn1')
    {{ __('user.users') }}
@endsection
@section('btn1_link')
    {{ route('users.index') }}
@endsection
@section('btn2')
    @if (Auth::user() && Auth::user()->role !== 1)
        <a href="{{ route('users.create') }}" class="btn btn-primary">{{ __('user.add_user') }}</a>
    @endif
@endsection
@section('box')
    @if (session()->has('message'))
        <div class="alert alert-warning text-center" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label>{{ __('user.name_user') }}</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                placeholder="{{ __('user.name_user') }}" required />
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.email') }}</label>
            <input type="email" name="email" class="form-control" placeholder="{{ __('user.email') }}"
                value="{{ $user->email }}" />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.pass') }}</label>
            <input type="password" class="form-control" name="password" placeholder="{{ __('user.pass') }}" />
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.c-pass') }}</label>
            <input type="password" class="form-control" name="c-password" placeholder="{{ __('user.c-pass') }}" />
            @error('c-password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('user.role') }}</label>
            <select class="form-select" aria-label="Default select example" name="role">
                <option selected disabled>{{ __('user.select') }}</option>
                <option value="0">{{ __('user.stu') }}</option>
                <option value="1">{{ __('user.teacher') }}</option>
                @if (Auth::user() && Auth::user()->role == 2)
                    <option value="2">{{ __('user.admin') }}</option>
                @endif
            </select>
            @error('role')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mb-3">
            <button class="btn btn-warning">{{ __('general.edit') }}</button>
        </div>
    </form>
@endsection
