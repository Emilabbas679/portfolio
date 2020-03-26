@extends("admin.layout")
@section('title', 'Comment')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('comment.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All newss</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$comment->id}}</td>
                    </tr>
                    <tr>
                        <th>User</th>
                        <td>{{$comment->user->email}}</td>
                    </tr>


                    <tr>
                        <th>News</th>
                        <td>{{$comment->news->title}}</td>
                    </tr>

                    <tr>
                        <th>Created</th>
                        <td>{{$comment->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$comment->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


@endsection()
