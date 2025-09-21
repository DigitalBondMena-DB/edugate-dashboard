@extends('academic_guide.layouts.app')

@php $pageTitle = 'Admission Forms Control'; @endphp

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
                       Country
                    </th>
                    <th>
                      University
                   </th>
                    <th>
                      Faculty
                    </th>
                    {{-- <th>
                      Major
                    </th>
                    <th>
                      Department
                    </th> --}}
                    <th>
                      Money Received
                    </th>
                    <th class="text-right">
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
                        {{$admissionForm->destination->en_name}}
                      </td>
                      <td>
                        {{$admissionForm->university->en_name}}
                      </td>
                      <td>
                        {{$admissionForm->faculty->en_name}}
                      </td>
                      {{-- <td>
                        {{$admissionForm->major->en_name}}
                      </td>
                      <td>
                        {{$admissionForm->department->en_name}}
                      </td> --}}
                      <td>
                        @if($admissionForm->money_received == 0)
                          Not Yet
                        @else
                          Received Successfully
                        @endif
                      </td>
                      <td class="td-actions row no-gutters justify-content-center">
                        <div class="col-6">
                          <a href="{{ route('academic-users.show', $admissionForm->id) }}">
                              <button title="" class="btn btn-success btn-icon btn-sm rounded-circle" type="button" data-original-title="Show User Information" rel="tooltip">
                              <i class="material-icons">zoom_in</i>
                              </button>
                          </a>
                        </div>
                        <div class="col-6">
                          <a href="{{ route('academic-users.edit', $admissionForm->id) }}">
                            <button title="" class="btn btn-info btn-icon btn-sm rounded-circle" type="button" data-original-title="Edit User Money Status" rel="tooltip">
                              <i class="material-icons">edit</i>
                            </button>
                          </a>
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
@endsection


