@extends('backend.layouts.app')

@php $pageTitle = 'شعبة'; @endphp

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
                              <a class="btn btn-white btn-round" href="{{ route('specializations.create') }}">اضافة شعبة</a>
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
                            Department
                        </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Banner
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        @foreach ($rows as $specialization)
                        <tbody>
                          <tr>
                            <td>
                              {{$specialization->id}}
                            </td>
                            <td>
                              {{$specialization->en_name}}
                            </td>
                            <td>
                              {{$specialization->ar_name}}
                            </td>
                            <td>
                              {{$specialization->department->en_name}}
                            </td>
                            <td>
                              <img src="{{ asset('specializations/' . $specialization->featured_image) }}" width="100px" height="100px">
                            </td>
                            <td>
                              <img src="{{ asset('specializations/' . $specialization->banner_image) }}" width="100px" height="100px">
                            </td>
                            <td class="td-actions row no-gutters justify-content-center py-5">
                              <div class="col-6">
                                <a href="{{ route('specializations.edit', $specialization->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info mr-3" type="button" data-original-title="Edit Specialization" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('specializations.destroy', $specialization->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Specialization" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                          <h3 class="text-center">No Specializations Found</h3>
                      @endif
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
                              <a class="btn btn-white btn-round" href="{{ route('specializations.create') }}">اضافة شعبة</a>
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
                            Department
                        </th>
                          <th>
                            Image
                          </th>
                          <th>
                            Banner
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        @foreach ($rows as $specialization)
                        <tbody>
                          <tr>
                            <td>
                              {{$specialization->id}}
                            </td>
                            <td>
                              {{$specialization->en_name}}
                            </td>
                            <td>
                              {{$specialization->ar_name}}
                            </td>
                            <td>
                              {{$specialization->department->en_name}}
                            </td>
                            <td>
                              <img src="{{ asset('specializations/' . $specialization->featured_image) }}" width="100px" height="100px">
                            </td>
                            <td>
                              <img src="{{ asset('specializations/' . $specialization->banner_image) }}" width="100px" height="100px">
                            </td>
                            <td class="td-actions row no-gutters justify-content-center py-5">
                              <div class="col-6">
                                <a href="{{ route('specializations.edit', $specialization->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info mr-3" type="button" data-original-title="Edit Specialization" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('specializations.destroy', $specialization->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Specialization" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                          <h3 class="text-center">No Specializations Found</h3>
                      @endif
                    </div>
                  </div>
                </div>
            </div> 
        @else 
            <h3>Access Denied</h3>
        @endif
    @endif

@endsection


