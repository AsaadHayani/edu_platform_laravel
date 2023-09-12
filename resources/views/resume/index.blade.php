@extends('users.layout')

@section('title', 'Resume')
@section('btn1')
    {{ __('resume.resumes') }}
@endsection
@section('btn1_link')
    {{ route('resume.index') }}
@endsection
@section('btn2')
    @if (Auth::user() && Auth::user()->role !== 1)
        <a href="{{ route('resume.create') }}" class="btn btn-primary">{{ __('resume.add_resume') }}</a>
    @endif
@endsection
@section('box')
    @if (session()->has('message'))
        <div class="alert alert-primary text-center" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <table class="table table-striped table-hover table-bordered text-center align-middle shadow">
        <thead>
            <tr>
                <td>#</td>
                <th>{{ __('resume.user_resume') }}</th>
                <th>{{ __('resume.job_type') }}</th>
                <th>{{ __('resume.edu') }}</th>
                <th>{{ __('resume.skills') }}</th>
                <th>{{ __('resume.down') }}</th>
                <th>{{ __('general.edit') }}</th>
                <th>{{ __('general.delete') }}</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($resume as $r)
                <tr>
                    <td><b>{{ $loop->iteration }}</b></td>
                    <td class="text-capitalize"><b>{{ $r->users->name }}</b></td>
                    <td>{{ $r->job_type }}</td>
                    <td>{{ $r->education }}</td>
                    <td>{{ $r->skills }}%</td>
                    <td><a href="/files/{{ $r->resume }}" download="cv.pdf"
                            class="btn btn-success">{{ __('resume.down') }} <i class="fas fa-download"></i></a></td>
                    <td><a href="{{ route('resume.edit', $r) }}" class="btn btn-info">{{ __('general.edit') }}</a></td>
                    <td>
                        <form action="{{ route('resume.destroy', $r) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">{{ __('general.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $resume->links() }}</div>
@endsection
