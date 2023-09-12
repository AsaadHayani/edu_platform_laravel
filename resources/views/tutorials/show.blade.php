@extends('users.layout')

@section('title', 'Details Tutorial')
@section('btn1')
    {{ __('nav.tutorials') }}
@endsection
@section('btn1_link')
    {{ route('tutorials.index') }}
@endsection
@section('btn2')
    <a href="{{ route('tutorials.create') }}" class="btn btn-primary">{{ __('lesson.add_tutorial') }}</a>
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
                <th>{{ __('user.name_user') }}</th>
                <th>{{ __('user.email') }}</th>
                <th>{{ __('user.role') }}</th>
                <th>{{ __('lesson.done') }}</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($users as $user)
                <tr>
                    <td class="text-capitalize">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role === 0)
                            {{ __('user.stu') }}
                        @elseif ($user->role === 1)
                            {{ __('user.teacher') }}
                        @else
                            {{ __('user.admin') }}
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('is_done', $user) }}" method="post">
                            @csrf
                            <input class="form-check-input" type="checkbox" name="is_done"
                                {{ $tutorial->is_done == $tutorial->user->id ? 'checked' : '' }} style="margin-top:5px"
                                onclick="event.preventDefault(); this.closest('form').submit();" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
