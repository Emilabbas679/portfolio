@extends("admin.layout")
@section('title', 'Career')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('career.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All newss</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$career->id}}</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td>{{$career->position}}</td>
                    </tr>

                    <tr>
                        <th>About</th>
                        <td>
                            {!! $career->about !!}
                        </td>
                    </tr>


                    <tr>
                        <th>Requirements</th>
                        <td>
                            {!! $career->requirements !!}
                        </td>
                    </tr>


                    <tr>
                        <th>Offers</th>
                        <td>
                            {!! $career->offers !!}
                        </td>
                    </tr>


                    <tr>
                        <th>Status</th>
                        <td>{{$career->status}}</td>
                    </tr>



                    <tr>
                        <th>Created</th>
                        <td>{{$career->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$career->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('career.destroy', $career->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('career.edit', $career->id) }}">
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
