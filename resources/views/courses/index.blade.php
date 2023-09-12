@extends('layouts.app')

@section('title', 'All Courses')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-primary text-center" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    @if (count($courses) > 0)
        @foreach ($courses as $course)
            <div class="shadow py-3 mb-3 position-relative course" id="course">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="text-capitalize">
                        <h5>{{ __('course.name_course') }}: <b>{{ $course->name }}</b></h5>
                        <h5>{{ __('course.desc') }}: <b>{{ $course->desc }}</b></h5>
                        <h6>{{ __('general.updated_at') }}: <q>{{ $course->updated_at }}</q></h6>
                        {{-- o t m --}}
                        <h6>
                            {{ __('course.less_names') }}:
                            @if (count($course->tutorials))
                                @foreach ($course->tutorials as $c)
                                    <i>"{{ $c->title }}"</i>
                                @endforeach
                            @else
                                <b class="text-danger">No Lessons</b>
                            @endif
                        </h6>
                        {{-- m t m --}}
                        {{-- {{$course->users}} --}}
                        <h6>{{ __('course.by') }}:
                            @foreach ($course->users as $c)
                                <i>"{{ $c->name }}"</i>
                            @endforeach
                        </h6>
                    </div>
                    <img src="/images/{{ $course->image }}" height="100">
                </div>
                @can('update', $course)
                    <div class="d-flex text-center justify-content-around">
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-success">{{ __('general.show') }}</a>
                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-warning">{{ __('general.edit') }}</a>
                    </div>
                @endcan
                @can('delete', $course)
                    <form action="{{ route('courses.destroy', $course) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn-close position-absolute top-0 start-100 translate-middle bg-danger p-2"
                            aria-label="Close"></button>
                    </form>
                @endcan
            </div>
        @endforeach
        <div class="mt-4">{{ $courses->links() }}</div>
    @else
        <h2 class="text-danger text-center fw-bold">Not Found</h2>
    @endif
@endsection
