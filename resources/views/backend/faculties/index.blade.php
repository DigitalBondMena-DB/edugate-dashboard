@extends('backend.layouts.app')

@php $pageTitle = 'كلية'; @endphp

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
                            <a class="btn btn-white btn-round" href="{{ route('faculties.create') }}">اضف كلية</a>
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
                            University
                        </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        <tbody>
                        @foreach ($rows as $faculty)
                          <tr>
                            <td>
                              {{$faculty->id}}
                            </td>
                            <td>
                              {{$faculty->en_name}}
                            </td>
                            <td>
                              {{$faculty->ar_name}}
                            </td>
                            <td>
                              @foreach($faculty->universities as $key => $university)
                                {{$university->en_name}}
                                @if($key !== array_key_last($faculty->universities->toArray()))
                                -
                                @endif
                              @endforeach
                            </td>
                            <td class="td-actions row justify-content-center">
                              <div class="col-6">
                                <a href="{{ route('faculties.edit', $faculty->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit Faculty" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Faculty" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                          <h3 class="text-center">No Faculties Found</h3>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
          </div>  
    @endif

    @if (auth()->user()->role === 'admin')
        @if (auth()->user()->admin_status == 1)
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
                            <a class="btn btn-white btn-round" href="{{ route('faculties.create') }}">اضف كلية</a>
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
                            University
                        </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        <tbody>
                        @foreach ($rows as $faculty)
                          <tr>
                            <td>
                              {{$faculty->id}}
                            </td>
                            <td>
                              {{$faculty->en_name}}
                            </td>
                            <td>
                              {{$faculty->ar_name}}
                            </td>
                            <td>
                              @foreach($faculty->universities as $key => $university)
                                {{$university->en_name}}
                                @if($key !== array_key_last($faculty->universities->toArray()))
                                -
                                @endif
                              @endforeach
                            </td>
                            <td class="td-actions row no-gutters justify-content-center">
                              <div class="col-6">
                                <a href="{{ route('faculties.edit', $faculty->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit Faculty" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Faculty" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                          <h3 class="text-center">No Faculties Found</h3>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>  
        @else 
            <h3>Access Denied</h3>
        @endif
    @endif
@endsection