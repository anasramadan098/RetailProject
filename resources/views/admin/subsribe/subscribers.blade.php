@extends('admin.layout.layout')

@section('content')
    <h1 class="title">
        All Subscribers
    </h1>
    <div class="row">
        <div class="col-md-12">
            <table id="usersTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="actions">
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