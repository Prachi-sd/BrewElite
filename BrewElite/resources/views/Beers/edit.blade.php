@extends('layouts.app', ['title' => __('Edit Beer Lable')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This Is Beer Lable Edit Form, Here You Can Edit A Beer Lable'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
          <div class="col-sm-12">
            @if(session()->get('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>

            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Edit Beer Lable') }}</h3>
                        </div>
                    </div>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <div class="card-body">

                        <form method="post" action="{{ route('beers.update', $beer->id) }}" autocomplete="off">
                          @method('PATCH')
                          @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Beer Lable Information') }}</h6>

                            <div class="pl-lg-4">
                              <div class="form-group{{ $errors->has('lable') ? ' has-danger' : '' }}">
                                  <label class="form-control-label" for="input-brewery">{{ __('Brewery') }}</label>

                                  <select class="form-control" name="brewery_id" required>
                                    <option value="{{ $beer->brewery_id }}" selected>{{ $beer->brewery->name }} - {{ $beer->brewery->city }}</option>
                                    @foreach($breweries as $brewery)
                                    @if($brewery->id != $beer->brewery_id)
                                      <option value="{{$brewery->id}}">{{$brewery->name}} - {{$brewery->city}}</option>
                                    @endif
                                    @endforeach
                                  </select>

                                  @if ($errors->has('brewery_id'))
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('brewery_id') }}</strong>
                                      </span>
                                  @endif
                              </div>

                                <div class="form-group{{ $errors->has('lable') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-lable">{{ __('Lable') }}</label>
                                    <input type="text" value="{{ $beer->lable }}" name="lable" id="input-lable" class="form-control form-control-alternative{{ $errors->has('lable') ? ' is-invalid' : '' }}" placeholder="{{ __('Lable') }}" required autofocus>

                                    @if ($errors->has('lable'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lable') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-rating">{{ __('Rating') }}</label>
                                    <input type="number" value="{{ $beer->rating }}" name="rating" id="input-rating" class="form-control form-control-alternative{{ $errors->has('Rating') ? ' is-invalid' : '' }}" placeholder="{{ __('Rating') }}"  required>

                                    @if ($errors->has('rating'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rating') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update Beer Lable') }}</button>
                                </div>
                            </div>
                        </form>

                        <hr class="my-4" />

                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
