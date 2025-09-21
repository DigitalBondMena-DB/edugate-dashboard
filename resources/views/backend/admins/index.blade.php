@extends('backend.layouts.app')

@php $pageTitle = 'تحكم المشرفين'; @endphp

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
                      @if(auth()->user()->role === 'super-admin')
                        <div class="col-md-4 col-12 text-right">
                          <a class="btn btn-white btn-round" href="{{ route('admins.create') }}">اضف مشرف</a>
                        </div>
                      @endif
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
                        Role
                      </th>
                      @if(auth()->user()->role === 'super-admin')
                        <th class="text-right">
                          Control
                        </th>
                      @endif
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
                          {{$user->role}}
                        </td>
                        @if(auth()->user()->role === 'super-admin')
                          <td class="td-actions row no-gutters justify-content-center">
                                {{-- <a href="{{ route('admins.edit', $user->id) }}">
                                    <button title="" class="btn btn-white btn-link btn-sm" type="button" data-original-title="Edit Admin" rel="tooltip">
                                    <i class="material-icons">edit</i>
                                    </button>
                                </a> --}}
                                @if($user->id !== auth()->user()->id)
                                  @if($user->role !== 'super-admin')
                                  <div class="col-6">
                                    <form action="{{ route('admins.destroy', $user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Admin" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="material-icons">close</i>
                                        </button>
                                    </form>
                                  </div>
                                    
                                  @endif
                                @endif
                        </td>
                      @endif
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                  {{ $rows->links() }} 
                      @else
                      <h3 class="text-center">No Admins Found</h3>
                  @endif
                </div>
              </div>
            </div>
          </div>
      </div>
    @else 
      <h3>Access Denied</h3>  
    @endif
@endsection


