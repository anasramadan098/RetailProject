@extends('admin.layout.layout')

@section('content')
    <h1 class="title">
        All Users
    </h1>
    <div class="row">
        <div class="col-md-12">
            <table id="usersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="actions">
                                <a href="{{ route('users.edit', $user->id)}}" title="Edit" class="btn btn-warning">
                                    <span>
                                        Edit
                                    </span>
                                </a>
                                <form action="{{ route('users.destroy', $user->id)}}"  method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                     class="btn btn-danger" title="Delete">
                                        <span>
                                            Delete
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection