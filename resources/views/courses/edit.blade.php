@extends('layouts.app')

@section('title', 'Edit Course')
@section('content')
    <form action="{{ route('courses.update', $course) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label>{{ __('course.name_course') }}</label>
            <input type="text" class="form-control" name="name" value="{{ $course->name }}"
                placeholder="{{ __('course.name_course') }}" />
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('course.desc') }}</label>
            <input type="text" class="form-control" name="desc" value="{{ $course->desc }}"
                placeholder="{{ __('course.desc') }}" />
            @error('desc')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('course.img') }}</label>
            <input type="file" class="form-control" name="image" />
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <img src="/images/{{ $course->image }}" height="100" class="mb-3 img-responsive img" />
        <div class="mb-3">
            <label>{{ __('course.user') }}</label>
            <div class="d-flex justify-content-around align-items-center">
                {{-- @foreach ($users as $user)
                <label for="{{ $user->id }}" class="text-capitalize">{{ $user->name }}</label>
                <input type="checkbox" name="user" class="form-check-input" id="{{ $user->id }}">
                @endforeach --}}

                <select name="user[]" multiple class="form-select">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" class="text-capitalize">{{ $user->name }}</option>
                    @endforeach
                </select>

                @error('user')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <button class="btn btn-warning">{{ __('general.edit') }}</button>
        </div>
    </form>
@endsection
