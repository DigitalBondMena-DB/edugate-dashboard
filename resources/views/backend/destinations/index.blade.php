@extends('backend.layouts.app')

@php $pageTitle = 'الأماكن'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')

    @if (auth()->user()->role === 'super-admin')
        <div class="row">
            <div class="col-md-12">
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-4">
                            <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                        </div>
                        <div class="col-md-4 col-8 text-right">
                            <a class="btn btn-white btn-round" href="{{ route('destinations.create') }}">اضف الأماكن</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    @if(count($rows))
                    <table class="table table-bordered table-striped">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          English name
                        </th>
                        <th>
                          Arabic name
                        </th>
                        <th>
                          Universities
                      </th>
                      <th>
                        Flag
                      </th>
                        <th>
                          Image
                        </th>
                        <th>
                          Banner
                        </th>
                        <th class="text-right">
                          Control
                        </th>
                      </thead>
                      <tbody>
                      @foreach ($rows as $destination)
                        <tr>
                          <td>
                            {{$destination->id}}
                          </td>
                          <td>
                            {{$destination->en_name}}
                          </td>
                          <td>
                            {{$destination->ar_name}}
                          </td>
                          <td>
                            @foreach($destination->universities as $key => $university)
                            {{$university->en_name}}
                              @if($key !== array_key_last($destination->universities->toArray()))
                              -
                              @endif
                            @endforeach
                          </td>
                          <td>
                            <img src="{{ asset('destinations/' . $destination->flag) }}" width="100px" height="100px">
                          </td>
                          <td>
                            <img src="{{ asset('destinations/' . $destination->featured_image) }}" width="100px" height="100px">
                          </td>
                          <td>
                            <img src="{{ asset('destinations/' . $destination->banner_image) }}" width="100px" height="100px">
                          </td>
                          <td class="td-actions row justify-content-center no-gutters py-5">
                            <div class="col-6">
                              <a href="{{ route('destinations.edit', $destination->id) }}">
                                    <button title="" class="btn btn-icon  btn-success" type="button" data-original-title="Edit Destination" rel="tooltip">
                                    <i class="material-icons">edit</i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-6">
                              <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button title="" class="btn btn-icon btn-danger" type="submit" data-original-title="Remove Destination" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                            </div>
                                
                                
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {{ $rows->links() }} 
                        @else
                        <h3 class="text-center">No Destinations Found</h3>
                    @endif
                  </div>
                </div>
              </div>
        </div>
    @endif

    @if (auth()->user()->role === 'admin')
        @if (auth()->user()->admin_status)
          <div class="row">
            <div class="col-md-12">
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-4">
                            <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                        </div>
                        <div class="col-md-4 col-8 text-right">
                            <a class="btn btn-white btn-round" href="{{ route('destinations.create') }}">اضف الأماكن</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    @if(count($rows))
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          English name
                        </th>
                        <th>
                          Arabic name
                        </th>
                        <th>
                          Universities
                      </th>
                      <th>
                        Flag
                      </th>
                        <th>
                          Image
                        </th>
                        <th>
                          Banner
                        </th>
                        <th class="text-right">
                          Control
                        </th>
                      </thead>
                      @foreach ($rows as $destination)
                      <tbody>
                        <tr>
                          <td>
                            {{$destination->id}}
                          </td>
                          <td>
                            {{$destination->en_name}}
                          </td>
                          <td>
                            {{$destination->ar_name}}
                          </td>
                          <td>
                            @foreach($destination->universities as $key => $university)
                            {{$university->en_name}}
                              @if($key !== array_key_last($destination->universities->toArray()))
                              -
                              @endif
                            @endforeach
                          </td>
                          <td>
                            <img src="{{ asset('destinations/' . $destination->flag) }}" width="100px" height="100px">
                          </td>
                          <td>
                            <img src="{{ asset('destinations/' . $destination->featured_image) }}" width="100px" height="100px">
                          </td>
                          <td>
                            <img src="{{ asset('destinations/' . $destination->banner_image) }}" width="100px" height="100px">
                          </td>
                          <td class="td-actions row justify-content-center no-gutters py-5">
                            <div class="col-6">
                              <a href="{{ route('destinations.edit', $destination->id) }}">
                                    <button title="" class="btn btn-icon rounded-circle btn-info mr-3" type="button" data-original-title="Edit Destination" rel="tooltip">
                                    <i class="material-icons">edit</i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-6">
                              <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Destination" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="material-icons">close</i>
                                    </button>
                                </form>
                            </div>
                                
                                
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                    {{ $rows->links() }} 
                        @else
                        <h3 class="text-center">No Destinations Found</h3>
                    @endif
                  </div>
                </div>
              </div>
          </div>
        @else
         <h3>Access denied</h3>
        @endif 
    @endif
    
@endsection


