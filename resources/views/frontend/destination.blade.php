@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | {{ $country->en_name }} 
    @else
        EduGate | {{ $country->ar_name }} 
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

        <!-- Main content Start -->
        @if(app()->getLocale() == 'en')
            <div class="main-content">
                <div class="inner-hdr" style="background-image:url({{ '/edugate/destinations/'. $country->banner_image }} )">
                    <!--small-banner-->
                    <div class="small-banner">
                        <div class="container">
                            <!--title-->
                            <div class="title">
                                <h3>{{ $country->en_name }}</h3>
                            </div>
                            <!--End title-->
            
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="">{{ $country->en_name }}</a></li>
                                        {{-- <li class="breadcrumb-item active" aria-current="page"> Faculty </li> --}}
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--End small-banner-->
                </div>

                <div class="search-page">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 search-sidebar wow fadeInUp"data-wow-delay="100ms" data-wow-duration="2000ms">
                                <form id="uni-search-form" action="{{ route('search') }}" method="POST">
                                    @csrf
                                    <div class="mb-20">
                                        <label for="country-list">Country:</label>
                                        <select name="destination_id" class="form-control" id="destination_id" required>
                                            <option value="">Select a Country</option>
                                            @foreach($destinations as $destination)
                                                <option value="{{ $destination->id }}">{{ $destination->en_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-20">
                                        <label for="country-list">University:</label>
                                        <select name="university_id" class="form-control" id="university_id">
                                        </select>
                                    </div>
                                    <div class="mb-20">
                                        <label for="country-list">College:</label>
                                        <select name="fac_uni_id" class="form-control" id="fac_uni_id">
                                        </select>
                                    </div>
                                    <div class="mb-20">
                                        <label for="country-list">Major:</label>
                                        <select name="major_id" class="form-control" id="major_id">
                                        </select>
                                    </div>
                                    <div class="form-group mb-3 text-center">
                                        <input class="btn-send" type="submit" value="Search">
                                    </div>       
                                </form>
                            </div>
                            <div class="col-lg-9 result-section wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                <div class="row">
                                    @foreach($country->universities as $university)
                                        <div class="col-md-6 mb-30">
                                            <a class="university-item" href="{{ route('university', [$country->en_slug, $university->en_slug]) }}">
                                                <div class="uni-img">
                                                    <img src="{{ asset('universities/' . $university->logo) }}" alt="">
                                                </div>
                                                <div class="content-part">
                                                    <h4 class="title">{{ $university->en_name }}</h4>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @else
            <div class="main-content">
                <div class="inner-hdr" style="background-image:url({{ '/edugate/destinations/'. $country->banner_image }} )">
                    <!--small-banner-->
                    <div class="small-banner">
                        <div class="container">
                            <!--title-->
                            <div class="title">
                                <h3>{{ $country->ar_name }}</h3>
                            </div>
                            <!--End title-->
            
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="{{ route('home') }}">الرئيسية</a></li>
                                    <li class="breadcrumb-item"><a style="color: #8cc63f" href="">{{ $country->ar_name }}</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--End small-banner-->
                </div>

                <div class="search-page">
                    <div class="container">
                        <div class="row">
                            @include('frontend.layouts.search')
                            <div class="col-lg-9 result-section wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                <div class="row">
                                    @foreach($country->universities as $university)
                                        <div class="col-md-6  mb-30">
                                            <a class="university-item" href="{{ route('university', [$country->ar_slug, $university->ar_slug]) }}">
                                                <div class="uni-img">
                                                    <img src="{{ asset('universities/' . $university->logo) }}" alt="">
                                                </div>
                                                <div class="content-part">
                                                    <h4 class="title">{{ $university->ar_name }}</h4>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        @endif
        <!-- Main content End --> 

    @include('frontend.layouts.footer')
@endsection

@section('scripts')
    <script>
        $('#destination_id').change(function() {
          var destination_id = $('#destination_id').val();
          $.ajax({
            url: "{{ url('/filterUniversities') }}",
            method: 'GET',
            data: {destination_id:destination_id},
            success:function(data) {
              $('#university_id option').remove();
              $('#fac_uni_id option').remove();
              $('#major_id option').remove();
              $('#university_id').append("<option value=''>Select a University</option>");
                data.forEach(d => {
                  for($i = 0; $i < d['id'].length; $i++) {
                    $("#university_id").append("<option value=" + d['id'][$i] + ">"+ d['name'][$i] +"</option>");
                  }
                });
            }
          })
        });

        $('#university_id').change(function() {
          var university_id = $('#university_id').val();
          $.ajax({
            url: "{{ url('/filterColleges') }}",
            method: 'GET',
            data: {university_id:university_id},
            success:function(data) {
              $('#fac_uni_id option').remove();
              $('#major_id option').remove();
              $('#fac_uni_id').append("<option value=''>Select a College</option>");
                data.forEach(d => {
                  for($i = 0; $i < d['id'].length; $i++) {
                    $("#fac_uni_id").append("<option value=" + d['id'][$i] + ">"+ d['name'][$i] + " (" + d['university_name'] +")</option>");
                  }
                });
            }
          })
        });

        $('#fac_uni_id').change(function() {
          var fac_uni_id = $('#fac_uni_id').val();
          $.ajax({
            url: "{{ url('/filterMajors') }}",
            method: 'GET',
            data: {fac_uni_id:fac_uni_id},
            success:function(data) {
              $('#major_id option').remove();
              $('#major_id').append("<option value=''>Select a Major</option>");
                data.forEach(d => {
                  for($i = 0; $i < d['id'].length; $i++) {
                    $("#major_id").append("<option value=" + d['id'][$i] + ">"+ d['name'][$i] +" (" + d['faculty_name'] +" - "+ d['university_name'] +")</option>");
                  }
                });
            }
          })
        });
    </script>
@endsection