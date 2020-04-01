@extends('admin.layout')
@section('title', 'Add Process')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Add Process</h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 offset-md-1">
                <form class="user" method="POST" onsubmit="return validateForm()" name="createProcess" action="{{ route('process.store') }}" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-pills mb-3 ml-5" id="pills-tab" role="tablist">
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
                                    <div class="col-md-2"><label for="text">Text {{$locale->code}}</label></div>
                                    <div class="col-md-10">

                                        <textarea name="text[{{$locale->code}}]" id="text" cols="30" rows="10" class="textarea @error('text') is-invalid @enderror"> {{old('text')}}</textarea>
                                        @error('text')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                        @endforeach
                            <div class="form-group form-row">
                                <div class="col-md-2"><label for="title">Title</label></div>
                                <div class="col-md-10">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                           name="title" value="{{ old('title') }}" placeholder="Title">
                                    <span class="invalid-feedback title-error-js">Title is required </span>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <div class="col-md-2"><label for="icon">Icon </label></div>
                                <div class="col-md-10">
                                    <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror"
                                           name="icon" value="{{ old('icon') }}" placeholder="Icon..">
                                    <span class="invalid-feedback icon-error-js">Icon is required </span>

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
                                        <option value="active"  selected>Active</option>
                                        <option value="inactive" >Inactive</option>
                                    </select>
                                </div>
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



@push('js')

    <script>
        function validateForm() {
            var title = document.forms["createProcess"]["title"].value;
            var icon = document.forms['createProcess']['icon'].value;
            if(title == ''){
                $('.title-error-js').show('');
            }
            else{
                $('.title-error-js').hide('');
            }


            if(icon == ''){
                $('.icon-error-js').show('');
            }
            else{
                $('.icon-error-js').hide('');
            }


            if(title == '' || icon == ""){
                return false;
            }
            else{
                return true;
            }

        }
    </script>
@endpush


