@extends('backend.layouts.app')

@php $pageTitle = 'المستحدمين'; @endphp

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
                      <div class="row">
                          <div class="col-12">
                              <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                          </div>
                          {{-- <div class="col-md-4 text-right">
                            <a class="btn btn-white btn-round" href="{{ route('users.create') }}">Add User</a>
                          </div> --}}
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
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        @foreach ($rows as $user)
                        <tbody>
                          <tr>
                            <td>
                              {{$user->id}}
                            </td>
                            <td>
                              {{$user->name}}
                            </td>
                            <td>
                              {{$user->email}}
                            </td>
                            <td>
                              {{$user->phone}}
                            </td>
                            <td class="td-actions row no-gutters justify-content-center">
                              <div class="col-6">
                                <a href="{{ route('users.show', $user->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-success" type="button" data-original-title="Show User" rel="tooltip">
                                      <i class="material-icons">zoom_in</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                @if(auth()->user()->role === 'super-admin' || auth()->user()->role === 'admin')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove User" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="material-icons">close</i>
                                        </button>
                                    </form>
                                  @endif
                              </div>
                                  
                                  
                          </td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                      {{ $rows->links() }} 
                          @else
                          <h3 class="text-center">No Users Found</h3>
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
                          <div class="row">
                              <div class="col-12">
                                  <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                              </div>
                              {{-- <div class="col-md-4 text-right">
                                <a class="btn btn-white btn-round" href="{{ route('users.create') }}">Add User</a>
                              </div> --}}
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
                                Name
                              </th>
                              <th>
                                Email
                              </th>
                              <th>
                                Phone
                              </th>
                              <th>
                                Control
                              </th>
                            </thead>
                            @foreach ($rows as $user)
                            <tbody>
                              <tr>
                                <td>
                                  {{$user->id}}
                                </td>
                                <td>
                                  {{$user->name}}
                                </td>
                                <td>
                                  {{$user->email}}
                                </td>
                                <td>
                                  {{$user->phone}}
                                </td>
                                <td class="td-actions row no-gutters justify-content-center">
                                  <div class="col-6">
                                    <a href="{{ route('users.show', $user->id) }}">
                                          <button title="" class="btn btn-icon rounded-circle btn-success" type="button" data-original-title="Show User" rel="tooltip">
                                          <i class="material-icons">zoom_in</i>
                                          </button>
                                      </a>
                                  </div>
                                  <div class="col-6">
                                    @if(auth()->user()->role === 'super-admin' || auth()->user()->role === 'admin')
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove User" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                      @endif
                                  </div>
                                      
                                      
                              </td>
                              </tr>
                            </tbody>
                            @endforeach
                          </table>
                          {{ $rows->links() }} 
                              @else
                              <h3 class="text-center">No Users Found</h3>
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


