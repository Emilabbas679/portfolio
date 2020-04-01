@extends("admin.layout")
@section('title', 'Partner')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('partner.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All newss</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$partner->id}}</td>
                    </tr>

                    <tr>
                        <th>Title</th>
                        <td>{{$partner->title}}</td>
                    </tr>


                    <tr>
                        <th>About</th>
                        <td>
                            {!! $partner->about !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="/public/uploads/partners/{{$partner->img}}" alt="" width="200">
                        </td>
                    </tr>


                    <tr>
                        <th>Status</th>
                        <td>{{$partner->status}}</td>
                    </tr>


                    <tr>
                        <th>Created</th>
                        <td>{{$partner->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$partner->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('partner.destroy', $partner->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('partner.edit', $partner->id) }}">
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
