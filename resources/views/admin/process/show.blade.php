@extends("admin.layout")
@section('title', 'Process')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('process.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All newss</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$process->id}}</td>
                    </tr>

                    <tr>
                        <th>Icon</th>
                        <td><i class="{{$process->icon}}"></i></td>
                    </tr>

                    <tr>
                        <th>Title</th>
                        <td>{{$process->title}}</td>
                    </tr>

                    <tr>
                        <th>Text</th>
                        <td>
                            {!! $process->text !!}
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{$process->status}}</td>
                    </tr>

                    <tr>
                        <th>Created</th>
                        <td>{{$process->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$process->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('process.destroy', $process->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('process.edit', $process->id) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection()
