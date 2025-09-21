@extends('academic_guide.layouts.app')

@php $pageTitle = 'User Information'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('academic_guide.layouts.header', ['navTitle' => ''])
        
    @endcomponent
   
    <h3 style="color:wheat;">User Personal Information:</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
                <th scope="col">Full name</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Gender</th>
                <th scope="col">Nationality</th>
                <th scope="col">Nation</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $personalInfo->full_name }}</td>
                    <td>{{ $personalInfo->birthdate }}</td>
                    <td>{{ $personalInfo->gender }}</td>
                    <td>{{ $personalInfo->nationality }}</td>
                    <td>{{ $personalInfo->nation }}</td>
                </tr>
        </tbody>
    </table>

    <hr>
    
    <h3 style="color:wheat">User Academic Information:</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Degree Name</th>
                <th scope="col">Degree Year</th>
                <th scope="col">Degree Country</th>
                <th scope="col">Degree Image</th>
                @if($academicInfo->school_name === NULL)
                    <th scope="col">University</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Department</th>
                @else
                    <th scope="col">School Name</th>
                    <th scope="col">Percentage</th>
                @endif
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $academicInfo->degree_name }}</td>
                    <td>{{ $academicInfo->degree_year }}</td>
                    <td>{{ $academicInfo->degree_country }}</td>
                    <td><img src="{{ asset('degrees/'.$academicInfo->degree_image) }}" width="100px" height="100px"></td>
                    @if($academicInfo->school_name === NULL)
                        <td>{{ $academicInfo->university_name }}</td>
                        <td>{{ $academicInfo->faculty_name }}</td>
                        <td>{{ $academicInfo->department_name }}</td>
                    @else
                        <td>{{ $academicInfo->school_name }}</td>
                        <td>{{ $academicInfo->percentage }}</td>
                    @endif
                </tr>
        </tbody>
    </table>

    <h3 style="color:wheat">User Admission Form Information:</h3>
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Country</th>
                <th scope="col">University</th>
                <th scope="col">Faculty</th>
                @if(isset($admissionForm->major->en_name))
                  <th scope="col">Major</th>
                @endif
                @if(isset($admissionForm->department->en_name))
                  <th scope="col">Department</th>
                @endif
                <th scope="col">Degree needed</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $admissionForm->destination->en_name }}</td>
                    <td>{{ $admissionForm->university->en_name }}</td>
                    <td>{{ $admissionForm->faculty->en_name }}</td>
                    @if(isset($admissionForm->major->en_name))
                      <td>{{ $admissionForm->major->en_name }}</td>
                    @endif
                    @if(isset($admissionForm->department->en_name))
                      <td>{{ $admissionForm->department->en_name }}</td>
                    @endif
                    <td>{{ $admissionForm->degree_needed }}</td>
                </tr>
        </tbody>
    </table>

@endsection