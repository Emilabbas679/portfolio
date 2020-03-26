@extends("admin.layout")
@section('title', 'News')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">News table</h6>
            <a href="{{ route('news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Comment</th>
                        <th>Like</th>
                        <th>View</th>
                        <th>Created by</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Comment</th>
                        <th>Like</th>
                        <th>View</th>
                        <th>Created by</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($all_news as $n)
                        <tr>
                            <td>{{$n->id}}</td>
                            <td>{{$n->title}}</td>
                            <td>{{$n->comments}}</td>
                            <td>{{$n->likes}}</td>
                            <td>{{$n->views}}</td>
                            <td>{{$n->created_by}}</td>
                            <td>{{$n->created_at->format('Y-m-d')}}</td>

                            <td>

                                <form id="delete-form" action="{{ route('news.destroy', $n->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('news.edit', $n->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{route('news.show',$n->id)}}" class="btn btn-primary btn-circle btn-sm">
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
