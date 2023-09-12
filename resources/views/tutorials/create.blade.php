@extends('layouts.app')

@section('title','Add Lesson')
@section('content')
    <form action="{{ route('tutorials.store') }}" method="post" class="container" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>{{ __('lesson.name_tutorial') }}</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="{{ __('lesson.name_tutorial') }}" required />
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('lesson.content') }}</label>
            <input type="text" class="form-control" name="content" value="{{ old('content') }}" placeholder="{{ __('lesson.content') }}"
                required />
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('course.name_course') }}</label>
            <select class="form-select" aria-label="Default select example" name="course_id">
                <option selected disabled>Select Course</option>
                @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('lesson.video') }}</label>
            <input type="file" class="form-control" name="video" value="{{ old('video') }}" />
            @error('video')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row justify-content-around align-items-center mb-3">
            <button class="btn btn-primary col-md-6 col-lg-3">{{ __('general.create') }}</button>
            <input class="btn btn-success col-md-6 col-lg-3" type="reset"/>
        </div>
    </form>
@endsection
