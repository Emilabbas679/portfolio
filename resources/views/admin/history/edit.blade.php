@extends('admin.layout')
@section('title', 'Edit History')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Edit </h6>
        </div>
        <div class="card-body">
            <div class="col-md-10 offset-md-1">
                <form class="user" method="POST" action="{{ route('history.update', $history->id) }}" enctype="multipart/form-data">
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
                                    <div class="col-md-2"><label for="content-{{$locale->code}}">Content {{$locale->code}}</label></div>
                                    <div class="col-md-10">
                                        <textarea name="content[{{$locale->code}}]" id="" cols="30" rows="10" class='textarea'>
                                            {{$history->getTranslation('content', $locale->code)}}
                                        </textarea>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <?php $date = explode(' ', $history->date) ;?>
                    <div class="form-group form-row">
                        <div class="col-md-2"><label for="date">Date</label></div>
                        <div class="col-md-10">
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                                   name="date" value="{{$date[0]}}" placeholder="Date">
                            <span class="invalid-feedback date-error-js"></span>

                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    @if($history->img)
                    <div class="form-group form-row">
                        <div class="col-md-2"><label for="old_img">Current Image</label></div>
                        <div class="col-md-10">
                            <img src="/public/uploads/history/{{$history->img}}" alt="" width="200">
                        </div>
                    </div>
                    @endif


                    <div class="form-group form-row">
                        <div class="col-md-2"><label for="img">New Image</label></div>
                        <div class="col-md-10">
                            <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
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


