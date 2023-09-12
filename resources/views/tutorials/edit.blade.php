@extends('layouts.app')

@section('title', 'Edit Lesson')
@section('content')
    <form action="{{ route('tutorials.update', $tutorial) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label>{{ __('lesson.name_tutorial') }}</label>
            <input type="text" class="form-control" name="title" value="{{ $tutorial->title }}"
                placeholder="{{ __('lesson.name_tutorial') }}" />
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('lesson.content') }}</label>
            <input type="text" class="form-control" name="content" value="{{ $tutorial->content }}"
                placeholder="{{ __('lesson.content') }}" />
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('course.name_course') }}</label>
            <select class="form-select" name="course_id">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $tutorial->course->id ? 'checked' : '' }}>
                        {{ $course->name }}</option>
                @endforeach
            </select>
            @error('course')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('lesson.video') }}</label>
            <input type="file" class="form-control" name="video" value="/videos/{{ $tutorial->video }}" />
            @error('video')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        @if ($tutorial->video != null)
            <video autoplay="autoplay" controls="controls" muted loop="loop" src="/videos/{{ $tutorial->video }}"
                type="video" width="200" height="100" class="mb-3">
            </video>
        @else
            <img src="https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-scaled-1150x647.png"
            height="100" class="mb-3 img-responsive img" />
        @endif
        <div class="row mb-3">
            <button class="btn btn-warning">{{ __('general.edit') }}</button>
        </div>
    </form>
@endsection
