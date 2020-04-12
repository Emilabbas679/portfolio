@extends("admin.layout")
@section('title', 'About')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">About table</h6>
            <a href="{{ route('about.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($abouts as $a)
                        <tr>
                            <td>{{$a->id}}</td>
                            <td>
                                @if($a->img)
                                    <img src="/public/uploads/about/{{$a->img}}" width="100" alt="">
                                @endif
                            </td>

                            <td>{{$a->created_at->format('Y-m-d')}}</td>

                            <td>

                                <form id="delete-form" action="{{ route('about.destroy', $a->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('about.edit', $a->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{route('about.show',$a->id)}}" class="btn btn-primary btn-circle btn-sm">
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
