@extends("admin.layout")
@section('title', 'History')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('history.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All histories</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$history->id}}</td>
                    </tr>

                    <tr>
                        <th>Date</th>
                        <td>{{$history->date}}</td>
                    </tr>

                    <tr>
                        <th>Content</th>
                        <td>
                            {!! $history->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="/public/uploads/history/{{$history->img}}" alt="" width="200">
                        </td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>{{$history->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$history->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('history.destroy', $history->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('history.edit', $history->id) }}">
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
