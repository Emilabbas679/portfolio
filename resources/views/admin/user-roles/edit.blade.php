@extends('admin.layout')
@section('title', 'Update Role')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Update Role</h6>
        </div>
        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form class="user" method="POST" action="{{ route('user-role.update', $user_role->model_id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select name="role_id" id="" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if($role->id == $user_role->role_id)  @endif>{{$role->name}}</option>
                                @endforeach
                            </select>

                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">User</label>
                        <div class="col-sm-9">
                            <select name="model_id" id="" class="form-control">
                                @foreach($users as $u)
                                    <option value="{{$u->id}}" @if($u->id == $user_role->model_id)  @endif>{{$u->email}}</option>
                                @endforeach
                            </select>

                            @error('model_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection



