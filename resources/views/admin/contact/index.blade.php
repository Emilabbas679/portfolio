@extends("admin.layout")
@section('title', 'Contact')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Contact table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($msgs as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->name}}</td>
                            <td>{{$m->email}}</td>
                            <td>{{$m->phone}}</td>
                            <td>
                                @if($m->is_read)
                                    Read
                                    @else
                                Unread
                                    @endif
                            </td>
                            <td>{{$m->created_at->format('Y-m-d')}}</td>

                            <td>

                                <form id="delete-form" action="{{ route('contact.destroy', $m->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('contact.show',$m->id)}}" class="btn btn-primary btn-circle btn-sm">
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
