@extends('admin.layout')
@section('title', 'Add Member')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Add Member</h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 offset-md-1">
                <form class="user" method="POST" onsubmit="return validateForm()" name="createPartner" action="{{ route('partner.store') }}" enctype="multipart/form-data">
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
                                    <div class="col-md-2"><label for="title-{{$locale->code}}">Title {{$locale->code}}</label></div>
                                    <div class="col-md-10">
                                        <input id="title-{{$locale->code}}" type="text" class="form-control @error('title') is-invalid @enderror"
                                               name="title[{{ $locale->code }}]" value="{{ old('title') }}"
                                               placeholder="{{ __('Title -').$locale->language }}" >
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <div class="col-md-2"><label for="about">About {{$locale->code}}</label></div>
                                    <div class="col-md-10">

                                        <textarea name="about[{{$locale->code}}]" id="" cols="30" rows="10" class="textarea @error('content') is-invalid @enderror"> {{old('about')}}</textarea>
                                        @error('about')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                        @endforeach


                            <div class="form-group form-row">
                                <div class="col-md-2"><label for="img">Image </label></div>
                                <div class="col-md-10">
                                    <input id="img" type="file" class="form-control @error('img') is-invalid @enderror"
                                           name="img" value="{{ old('img') }}">
                                    <span class="invalid-feedback img-error-js"></span>

                                    @error('img')
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
            var img = document.forms["createPartner"]["img"].value;
            if(img == ''){
                $('.img-error-js').html('Image is required');
                $('.img-error-js').show('');
                return false;
            }
            else{
                $('.img-error-js').hide('');
                return true;
            }


        }
    </script>
@endpush


