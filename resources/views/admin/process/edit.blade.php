@extends('admin.layout')
@section('title', 'Edit Process')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{ $process->title }}</h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 offset-md-1">
                <form class="user" method="POST" action="{{ route('process.update', $process->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        @foreach ($locales as $locale)
                            <li class="nav-item">
                                <a class="nav-link {{ ($locale->code == 'az') ? 'active': '' }}" id="pills-tab-{{ $locale->code }}"
                                   data-toggle="pill" href="#pills-{{ $locale->code }}" role="tab"
                                   aria-controls="pills-{{ $locale->code }}" aria-selected="true">{{ $locale->language }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content pt-2 pl-1" id="pills-tabContent">
                        @foreach ($locales as $locale)
                            <div class="tab-pane fade show {{ ($locale->code == 'az') ? 'active': '' }}" id="pills-{{ $locale->code }}"
                                 role="tabpanel" aria-labelledby="pills-tab-{{ $locale->code }}">

                                <div class="form-group form-row">
                                    <div class="col-md-2"><label for="text-{{$locale->code}}">Content {{$locale->code}}</label></div>
                                    <div class="col-md-10">
                                        <textarea name="text[{{$locale->code}}]" id="text-{{$locale->code}}" cols="30" rows="10" class='textarea'>
                                            {{$process->getTranslation('text', $locale->code)}}
                                        </textarea>
                                        @error('text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="form-group form-row">
                        <div class="col-md-2"><label for="name">Title</label></div>
                        <div class="col-md-10">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title" value="{{$process->title}}" placeholder="Title">
                            <span class="invalid-feedback name-error-js"></span>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <div class="col-md-2"><label for="icon">Icon</label></div>
                        <div class="col-md-10">
                            <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror"
                                   name="icon" value="{{$process->icon}}" placeholder="Icon">
                            <span class="invalid-feedback name-error-js"></span>

                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-row">
                        <div class="col-md-2"><label for="status">Status</label></div>
                        <div class="col-md-10">
                            <select name="status" id="status" class="form-control">
                                <option value="active" @if($process->status == 'active') selected @endif>Active</option>
                                <option value="inactive" @if($process->status == 'inactive') selected @endif>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Edit') }}
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection


