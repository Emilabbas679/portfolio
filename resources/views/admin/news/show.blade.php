@extends("admin.layout")
@section('title', 'News')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('news.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                All newss</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>#</th>
                        <td>{{$news->id}}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{$news->title}}</td>
                    </tr>


                    <tr>
                        <th>Slug</th>
                        <td>{{$news->slug}}</td>
                    </tr>

                    <tr>
                        <th>Content</th>
                        <td>
                            {!! $news->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="/public/uploads/news/{{$news->img}}" alt="" width="200">
                        </td>
                    </tr>


                    <tr>
                        <th>Status</th>
                        <td>{{$news->status}}</td>
                    </tr>

                    <tr>
                        <th>Created by</th>
                        <td>{{$news->createdby->email}}</td>
                    </tr>

                    <tr>
                        <th>Updated by</th>
                        <td>{{$news->updatedby->email}}</td>
                    </tr>


                    <tr>
                        <th>Created</th>
                        <td>{{$news->created_at}}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{$news->updated_at}}</td>
                    </tr>
                    <tr>
                        <th>Operations</th>
                        <td>
                            <form id="delete-form" action="{{ route('news.destroy', $news->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary btn-circle btn-sm" href="{{ route('news.edit', $news->id) }}">
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
