@extends('layouts.app')

@section('title', 'Add Course')
@section('content')
    <form action="{{ route('courses.store') }}" method="post" class="container" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>{{ __('course.name_course') }}</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                placeholder="{{ __('course.name_course') }}" required />
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('course.desc') }}</label>
            <input type="text" class="form-control" name="desc" value="{{ old('desc') }}"
                placeholder="{{ __('course.desc') }}" required />
            @error('desc')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('course.img') }}</label>
            <input type="file" class="form-control" name="image" value="{{ old('image') }}" required />
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label>{{ __('course.user') }}</label>
            {{-- <div class="d-flex justify-content-around align-items-center">
                @foreach ($users as $user)
                <label for="{{ $user->id }}" class="text-capitalize">{{ $user->name }}</label>
                <input type="checkbox" name="user" class="form-check-input" id="{{ $user->id }}">
                @endforeach
            </div> --}}

                <select name="user[]" multiple size="5" class="form-select">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" class="text-capitalize">{{ $user->name }}</option>
                    @endforeach
                </select>

                @error('user')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        </div>
        <div class="row justify-content-around align-items-center mb-3">
            <button class="btn btn-primary col-md-6 col-lg-3">{{ __('general.create') }}</button>
            <input class="btn btn-success col-md-6 col-lg-3" type="reset"/>
        </div>
    </form>
@endsection
