@extends("admin.layout")
@section('title', 'User')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All Users</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{$user->name}}</td>
                    </tr>

                    <tr>
                        <th>E-mail</th>
                        <td>{{$user->email}}</td>
                    </tr>

                    <tr>
                        <th>Created</th>
                        <td>{{$user->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
{{--                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('.edit', ->id) }}">--}}
{{--                                    <i class="far fa-edit"></i>--}}
{{--                                </a>--}}
                                <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection()
