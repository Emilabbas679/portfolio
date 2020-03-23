@extends("admin.layout")
@section('title', 'Roles')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">User Roles table</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Role</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->role->name}}</td>
                            <td>{{$role->user->email}}</td>

                            <td>{{$role->model_type}}</td>

                            <td>
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('user-role.edit', $role->model_id) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
