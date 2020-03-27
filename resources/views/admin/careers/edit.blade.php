@extends('admin.layout')
@section('title', 'Edit Career')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Edit {{ $career->position }}</h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 offset-md-1">
                <form class="user" method="POST" action="{{ route('career.update', $career->id) }}" enctype="multipart/form-data">
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
                                    <div class="col-md-2"><label for="position">Position {{$locale->code}}</label></div>
                                    <div class="col-md-10">
                                        <input id="position" type="text" class="form-control @error('position') is-invalid @enderror"
                                               name="position[{{ $locale->code }}]" value="{{$career->getTranslation('position', $locale->code)}}"
                                               placeholder="{{ __('Position -').$locale->language }}" >
                                        @error('position')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <div class="col-md-2"><label for="about">About {{$locale->code}}</label></div>
                                    <div class="col-md-10">

                                        <textarea name="about[{{$locale->code}}]" id="" cols="30" rows="10" class="textarea @error('content') is-invalid @enderror"> {{$career->getTranslation('about', $locale->code)}}</textarea>
                                        @error('about')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <div class="col-md-2"><label for="offers">Offers {{$locale->code}}</label></div>
                                    <div class="col-md-10">

                                        <textarea name="offers[{{$locale->code}}]" id="" cols="30" rows="10" class="textarea @error('content') is-invalid @enderror"> {{$career->getTranslation('offers', $locale->code)}}}</textarea>
                                        @error('offers')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <div class="col-md-2"><label for="requirements">Requirements {{$locale->code}}</label></div>
                                    <div class="col-md-10">

                                        <textarea name="requirements[{{$locale->code}}]" id="" cols="30" rows="10" class="textarea @error('content') is-invalid @enderror"> {{$career->getTranslation('requirements', $locale->code)}}</textarea>
                                        @error('requirements')
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
                        <div class="col-md-2"><label for="status">Status</label></div>
                        <div class="col-md-10">
                            <select name="status" id="status" class="form-control">
                                <option value="active" @if($career->status == 'active') selected @endif>Active</option>
                                <option value="inactive" @if($career->status == 'inactive') selected @endif>Inactive</option>
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


