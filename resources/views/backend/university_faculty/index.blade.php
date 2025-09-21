@extends('backend.layouts.app')

@php $pageTitle = 'الكلية الجامعية'; @endphp

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
                          University name
                        </th>
                        <th>
                          Faculty name
                        </th>
                        <th>
                          Percentage
                      </th>
                      <th>
                          Majors
                        </th>
                        <th>
                          Control
                        </th>
                      </thead>
                      @foreach ($rows as $university_faculty)
                      <tbody>
                        <tr>
                          <td>
                            {{$university_faculty->id}}
                          </td>
                          <td>
                            {{$university_faculty->university_name}}
                          </td>
                          <td>
                            {{$university_faculty->faculty_name}}
                          </td>
                          <td>
                            @if($university_faculty->percentage !== NULL)
                              {{$university_faculty->percentage}} %                          
                            @endif
                          </td>
                          <td>
                              @foreach($university_faculty->majors as $key => $major)
                                {{$major->en_name}}
                                @if($key !== array_key_last($university_faculty->majors->toArray()))
                                -
                                @endif                    
                              @endforeach
                          </td>
                          <td class="td-actions row no-gutters justify-content-center">
                            <div class="col-6">
                              <a href="{{ route('university_faculty_percentage.edit', $university_faculty->id) }}">
                                    <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit University Faculty" rel="tooltip">
                                    <i class="material-icons">edit</i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-6">
                              <form action="{{ route('university_faculty_percentage.destroy', $university_faculty->id) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('delete') }}
                                  <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove University Faculty" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                        <h3 class="text-center">No Universites Found</h3>
                    @endif
                  </div>
                </div>
              </div>
        </div>     
    @endif
    @if (auth()->user()->role === 'admin')
        @if(auth()->user()->admin_status == 1)
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
                            University name
                          </th>
                          <th>
                            Faculty name
                          </th>
                          <th>
                            Percentage
                        </th>
                        <th>
                            Majors
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        @foreach ($rows as $university_faculty)
                        <tbody>
                          <tr>
                            <td>
                              {{$university_faculty->id}}
                            </td>
                            <td>
                              {{$university_faculty->university_name}}
                            </td>
                            <td>
                              {{$university_faculty->faculty_name}}
                            </td>
                            <td>
                              @if($university_faculty->percentage !== NULL)
                                {{$university_faculty->percentage}} %                          
                              @endif
                            </td>
                            <td>
                                @foreach($university_faculty->majors as $key => $major)
                                  {{$major->en_name}}
                                  @if($key !== array_key_last($university_faculty->majors->toArray()))
                                  -
                                  @endif                    
                                @endforeach
                            </td>
                            <td class="td-actions row no-gutters justify-content-center">
                              <div class="col-6">
                                <a href="{{ route('university_faculty_percentage.edit', $university_faculty->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit University Faculty" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('university_faculty_percentage.destroy', $university_faculty->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove University Faculty" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                          <h3 class="text-center">No Universites Found</h3>
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


