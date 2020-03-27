@extends("admin.layout")
@section('title', 'Career')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Career table</h6>
            <a href="{{ route('career.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($careers as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->position}}</td>
                            <td>{{$c->status}}</td>
                            <td>{{$c->created_at->format('Y-m-d')}}</td>
                            <td>{{$c->updated_at->format('Y-m-d')}}</td>

                            <td>

                                <form id="delete-form" action="{{ route('career.destroy', $c->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('career.edit', $c->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{route('career.show',$c->id)}}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
