@extends('backend.layouts.app')

@php $pageTitle = 'الإدارات'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')


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
                        <a class="btn btn-white btn-round" href="{{ route('departments.create') }}">اضف الإدارات
                        </a>
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
                      Specializations
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
                  <tbody>
                  @foreach ($rows as $department)
                    <tr>
                      <td>
                        {{$department->id}}
                      </td>
                      <td>
                        {{$department->en_name}}
                      </td>
                      <td>
                        {{$department->ar_name}}
                      </td>
                      <td>
                        @foreach($department->specializations as $key => $specialization)
                          {{$specialization->en_name}}
                          @if($key !== array_key_last($department->specializations->toArray()))
                            -
                          @endif   
                        @endforeach
                      </td>
                      <td>
                        <img src="{{ asset('departments/' . $department->featured_image) }}" width="100px" height="100px">
                      </td>
                      <td>
                        <img src="{{ asset('departments/' . $department->banner_image) }}" width="100px" height="100px">
                      </td>
                      <td class="td-actions row justify-content-center no-gutters align-items-center py-5">
                        <div class="col-6">
                            <a href="{{ route('departments.edit', $department->id) }}">
                                <button title="" class="btn btn-icon  btn-success " type="button" data-original-title="Edit Department" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                        </div>
                        <div class="col-6">
                          <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button title="" class="btn btn-icon  btn-danger" type="submit" data-original-title="Remove Department" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                    <h3 class="text-center">No Departments Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection