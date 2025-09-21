@extends('backend.layouts.app')

@php $pageTitle = 'مراقبة استمارات القبول
'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')

    @if (auth()->user()->role === 'super_admin')

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
                        <div class="col-md-8">
                            <h4 class="card-title text-white">{{ $pageTitle }} </h4>
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
                          Username
                        </th>
                        <th>
                          Academic Guide name
                        </th>
                        {{-- <th>
                          Country
                        </th>
                        <th>
                          University
                      </th>
                        <th>
                          Faculty
                        </th> --}}
                        {{-- <th>
                          Major
                        </th>
                        <th>
                          Department
                        </th> --}}
                        <th>
                          Control
                        </th>
                      </thead>
                      @foreach ($rows as $admissionForm)
                      <tbody>
                        <tr>
                          <td>
                            {{$admissionForm->id}}
                          </td>
                          <td>
                            {{$admissionForm->user->name}}
                          </td>
                          <td>
                            @if($admissionForm->academic_guide_id !== NULL)
                            {{$admissionForm->academic_guide->name}}
                            @endif
                          </td>
                          {{-- <td>
                            {{$admissionForm->destination->en_name}}
                          </td>
                          <td>
                            {{$admissionForm->university->en_name}}
                          </td>
                          <td>
                            {{$admissionForm->faculty->en_name}}
                          </td> --}}
                          <td class="td-actions row no-gutters justify-content-center">
                            <div class="col-6">
                              <a href="{{ route('admin-academic-users.edit', $admissionForm->id) }}">
                                    <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit Admission Form" rel="tooltip">
                                    <i class="material-icons">edit</i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-6">
                              <form action="{{ route('admin-academic-users.destroy', $admissionForm->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Admission Form" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                        <h3 class="text-center">No Admission Forms Found</h3>
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
                      <div class="row">
                          <div class="col-md-8">
                              <h4 class="card-title text-white">{{ $pageTitle }} </h4>
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
                            Username
                          </th>
                          <th>
                            Academic Guide name
                          </th>
                          {{-- <th>
                            Country
                          </th>
                          <th>
                            University
                        </th>
                          <th>
                            Faculty
                          </th> --}}
                          {{-- <th>
                            Major
                          </th>
                          <th>
                            Department
                          </th> --}}
                          <th>
                            Control
                          </th>
                        </thead>
                        @foreach ($rows as $admissionForm)
                        <tbody>
                          <tr>
                            <td>
                              {{$admissionForm->id}}
                            </td>
                            <td>
                              {{$admissionForm->user->name}}
                            </td>
                            <td>
                              @if($admissionForm->academic_guide_id !== NULL)
                              {{$admissionForm->academic_guide->name}}
                              @endif
                            </td>
                            {{-- <td>
                              {{$admissionForm->destination->en_name}}
                            </td>
                            <td>
                              {{$admissionForm->university->en_name}}
                            </td>
                            <td>
                              {{$admissionForm->faculty->en_name}}
                            </td> --}}
                            <td class="td-actions row no-gutters justify-content-center">
                              <div class="col-6">
                                <a href="{{ route('admin-academic-users.edit', $admissionForm->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit Admission Form" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('admin-academic-users.destroy', $admissionForm->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Admission Form" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                          <h3 class="text-center">No Admission Forms Found</h3>
                      @endif
                    </div>
                  </div>
                </div>
          </div>
          
        @endif    
    @endif    
@endsection


