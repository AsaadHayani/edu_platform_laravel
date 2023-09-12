@extends('users.layout')

@section('title', 'Add Resume')
@section('btn1')
    {{ __('resume.resumes') }}
@endsection
@section('btn1_link')
    {{ route('resume.index') }}
@endsection
@section('btn2')
    @if (Auth::user() && Auth::user()->role == 2)
        <a href="{{ route('resume.create') }}" class="btn btn-primary">{{ __('resume.add_resume') }}</a>
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
    <form action="{{ route('resume.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>{{ __('resume.job_type') }}</label>
            <input type="text" class="form-control" name="job_type" value="{{ old('job_type') }}"
                placeholder="{{ __('resume.job_type') }}" required />
            @error('job_type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('resume.edu') }}</label>
            <input type="text" name="education" class="form-control" placeholder="{{ __('resume.edu') }}"
                value="{{ old('education') }}" required />
            @error('education')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('resume.skills') }}</label>
            <input type="number" class="form-control" name="skills" placeholder="{{ __('resume.skills') }}"
                value="{{ old('skills') }}" required />
            @error('skills')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('resume.pdf') }}</label>
            <input type="file" class="form-control" name="resume" value="{{ old('resume') }}" required />
            @error('resume')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="user_id">
                <option selected disabled>{{ __('resume.select') }}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" class="text-capitalize">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row justify-content-around align-items-center mb-3">
            <button class="btn btn-primary col-md-6 col-lg-3">{{ __('general.create') }}</button>
            <input class="btn btn-success col-md-6 col-lg-3" type="reset"/>
        </div>
    </form>
@endsection
