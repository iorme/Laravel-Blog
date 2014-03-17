@extends('layouts/article')

@section('main')

<h1>All Users</h1>

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

@if (!empty($users))
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Email</th>
            <th>Roles</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->email }}</td>
            <td>
                @foreach ($user->getGroups() as $group)
                {{ $group->name }}
                @endforeach
            </td>
            <td>{{ $status[$user->activated] }}</td>
            <td>{{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method'
=> 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

    </tbody>

</table>

@else
There are no users
@endif

@stop
