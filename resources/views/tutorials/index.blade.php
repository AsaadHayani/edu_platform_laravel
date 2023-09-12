@extends('layouts.app')

@section('title', 'All Lessons')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-primary text-center" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    @if (count($tutorials) > 0)
        <div class="row justify-content-around align-items-center text-center tutorial">
            @if (Auth::user() && Auth::user()->role !== 0)
                <a href="{{ route('tutorials.create') }}" class="btn btn-primary">{{ __('lesson.add_tutorial') }}</a>
            @endif
            @foreach ($tutorials as $tutorial)
                <div class="col-md-6 col-lg-3 mt-3">
                    <div class="card text-bg-light shadow" id="tutorial">
                        @if ($tutorial->video != null)
                            <video autoplay="autoplay" controls="controls" muted loop="loop"
                                src="/videos/{{ $tutorial->video }}" type="video" height="150">
                            </video>
                        @else
                            <div class="card-header">{{ __('lesson.name_tutorial') }}: <b>{{ $tutorial->title }}</b></div>
                        @endif
                        <div class="card-body">
                            @if ($tutorial->video != null)
                                <h4 class="card-title">{{ __('lesson.name_tutorial') }}: <b>{{ $tutorial->title }}</b></h4>
                            @endif
                            <p class="card-text">{{ __('lesson.content') }}: <b>{{ $tutorial->content }}</b></p>

                            @can('viewAny', $tutorial)
                                <form action="{{ route('is_done', $tutorial) }}" method="post">
                                    @csrf
                                    <p class="card-text label" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('lesson.is_done') }}:
                                        <input class="form-check-input" type="checkbox"
                                            {{ $tutorial->is_done == 0 ? '' : 'checked' }} style="margin-top:5px" />
                                    </p>
                                </form>
                            @endcan {{-- o t m --}}
                            <p class="card-text">{{ __('course.name_course') }}: <i>"{{ $tutorial->course->name }}"</i>
                            </p>
                            <p class="card-text">{{ __('general.updated_at') }}: <q>{{ $tutorial->updated_at }}</q></p>
                        </div>
                        <div class="card-footer bg-transparent border-black">
                            @can('update', $tutorial)
                                <a href="{{ route('tutorials.edit', $tutorial) }}"
                                    class="btn btn-warning">{{ __('general.edit') }}</a>
                                @endcan @can('view', $tutorial)
                                <a href="{{ route('tutorials.show', $tutorial) }}"
                                    class="btn btn-success mx-3">{{ __('general.check') }}</a>
                                @endcan @can('delete', $tutorial)
                                <form action="{{ route('tutorials.destroy', $tutorial) }}" method="post">
                                    @csrf @method('delete')
                                    <button class="btn-close position-absolute top-0 start-100 translate-middle bg-danger p-2"
                                        aria-label="Close"></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-4">{{ $tutorials->links() }}</div>
        </div>
    @else
        <h2 class="text-danger text-center fw-bold">Not Found</h2>
    @endif
@endsection
