@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')


    <div class="container-fluid mt--7">

        <div class="row mt-5">

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

            <div class="col-xl-6 mb-6 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">All Breweries</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">name</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($breweries as $brewery)
                              <tr>
                                  <th scope="row">
                                      {{$brewery->name}}
                                  </th>
                                  <td>
                                      {{$brewery->city}}
                                  </td>
                                  <td>
                                      <form action="{{ route('breweries.destroy', $brewery->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure? Deleting a Brewery Will Also Delete All The Labels That Belong To It.')" type="submit"><i class="fa fa-trash"></i></button>
                                      </form>
                                  </td>
                                  <td>
                                        <a href="{{ route('breweries.edit',$brewery->id)}}" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                                  </td>
                              </tr>
                              @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-6 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">All Beer Lables</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Brewery</th>
                                    <th scope="col">Rating</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($beers as $beer)
                                <tr>
                                    <th scope="row">
                                      {{$beer->lable}}
                                    </th>
                                    <td>
                                      {{$beer->brewery->name}}
                                    </td>
                                    <td>
                                      {{$beer->rating}}
                                    </td>
                                    <td>
                                        <form action="{{ route('beers.destroy', $beer->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('beers.destroy', $beer->id)}}" method="post">
                                          @csrf
                                          @method('EDIT')
                                          <button class="btn btn-primary" onclick="return confirm('Are you sure?')" type="submit"><i class="fa fa-edit"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
