@extends('backend.layouts.app')

@php $pageTitle = 'The Doctors'; @endphp

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
                    @if(auth()->user()->role === 'super-admin')
                        <div class="col-md-4 col-8 text-right">
                          <a class="btn btn-white btn-round" href="{{ route('academic-guides.create') }}">Add Doctor</a>
                        </div>
                      @endif
                      
                      
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
                    <tbody>
                    @foreach ($rows as $academicGuide)
                      <tr>
                        <td>
                          {{$academicGuide->id}}
                        </td>
                        <td>
                          {{$academicGuide->ar_name}}
                        </td>
                        <td>
                          {{$academicGuide->email}}
                        </td>
                        <td>
                          {{$academicGuide->phone}}
                        </td>
                          <td class="td-actions row no-gutters justify-content-center">
                            <div class="col-6">
                                <a href="{{ route('academic-guides.edit', $academicGuide->id) }}">
                                    <button title="" class="btn btn-icon btn-success" type="button" data-original-title="Edit Academic Guide" rel="tooltip">
                                    <i class="material-icons">edit</i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('academic-guides.destroy', $academicGuide->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button title="" class="btn btn-icon btn-danger" type="submit" data-original-title="Remove Academic Guide" rel="tooltip" onclick="return confirm('Are you sure you want to delete this doctor?');">
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
                      <h3 class="text-center">No Academic Guides Found</h3>
                  @endif
                </div>
              </div>
            </div>
          </div>
      </div>



    


@endsection


