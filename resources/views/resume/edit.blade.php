@extends('users.layout')

@section('title', 'Edit Resume')
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

    <form action="{{ route('resume.update', $resume) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label>{{ __('resume.job_type') }}</label>
            <input type="text" class="form-control" name="job_type" value="{{ $resume->job_type }}"
                placeholder="{{ __('resume.job_type') }}" required />
            @error('job_type')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('resume.edu') }}</label>
            <input type="text" name="education" class="form-control" placeholder="{{ __('resume.edu') }}"
                value="{{ $resume->education }}" />
            @error('education')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('resume.skills') }}</label>
            <input type="number" class="form-control" name="skills" value="{{ $resume->skills }}"
                placeholder="{{ __('resume.skills') }}" />
            @error('skills')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('resume.pdf') }}</label>
            <input type="file" class="form-control" name="resume" />
            @error('resume')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mb-3">
            <button class="btn btn-warning">{{ __('general.edit') }}</button>
        </div>
    </form>
@endsection
