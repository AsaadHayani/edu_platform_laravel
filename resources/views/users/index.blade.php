@extends('users.layout')

@section('title', 'Users')
@section('btn1')
    {{ __('user.users') }}
@endsection
@section('btn1_link')
    {{ route('users.index') }}
@endsection
@section('btn2')
    @if (Auth::user() && Auth::user()->role !== 0)
        <a href="{{ route('users.create') }}" class="btn btn-primary">{{ __('user.add_user') }}</a>
    @endif
@endsection
@section('count')
    {{ __('user.count_user') }}: {{ count($users) }}
@endsection
@section('btn_resume')
    <a href="{{ route('resume.index') }}" class="btn btn-success mx-2">{{ __('resume.resumes') }}</a>
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
                <td>ID</td>
                <th>{{ __('user.name_user') }}</th>
                <th>{{ __('user.email') }}</th>
                <th>{{ __('user.role') }}</th>
                <th>{{ __('general.edit') }}</th>
                <th>{{ __('general.delete') }}</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @if (count($users) > 0)
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
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
                        @if (Auth::user() && Auth::user()->role !== 0)
                            <td><a href="{{ route('users.edit', $user) }}"
                                    class="btn btn-info">{{ __('general.edit') }}</a>
                            </td>
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">{{ __('general.delete') }}</button>
                                </form>
                            </td>
                        @else
                            <td colspan="2">
                                <p class="text-danger fw-bold m-0">Can't Edited by This User</p>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                    @else
                <tr>
                    <td colspan="5">
                        <h2 class="text-danger fw-bold">The Elements is Not Found, Or Wrong</h2>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="mt-4">{{ $users->links() }}</div>
@endsection
