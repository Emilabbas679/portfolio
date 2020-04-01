@extends("admin.layout")
@section('title', 'Partners')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Partners table</h6>
            <a href="{{ route('partner.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Add new partner</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($partners as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->status}}</td>
                            <td>
                                @if($p->img)
                                    <img src="/public/uploads/partners/{{$p->img}}" width="100" alt="">
                                @endif
                            </td>

                            <td>{{$p->created_at->format('Y-m-d')}}</td>

                            <td>

                                <form id="delete-form" action="{{ route('partner.destroy', $p->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('partner.edit', $p->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{route('partner.show',$p->id)}}" class="btn btn-primary btn-circle btn-sm">
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
