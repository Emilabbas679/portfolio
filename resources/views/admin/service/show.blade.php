@extends("admin.layout")
@section('title', 'Service')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('service.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All news</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$service->id}}</td>
                    </tr>

                    <tr>
                        <th>Icon</th>
                        <td><i class="{{$service->icon}}"></i></td>
                    </tr>

                    <tr>
                        <th>Title</th>
                        <td>{{$service->title}}</td>
                    </tr>

                    <tr>
                        <th>Text</th>
                        <td>
                            {!! $service->text !!}
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>{{$service->status}}</td>
                    </tr>

                    <tr>
                        <th>Created</th>
                        <td>{{$service->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$service->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('service.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('service.edit', $service->id) }}">
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
