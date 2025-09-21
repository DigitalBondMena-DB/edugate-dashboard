@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EGEC | Academic Information
    @else
        EGEC | المعلومات الأكاديمية
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    <!-- Main content Start -->
    @if(app()->getLocale() == 'en')
        <div class="main-content">
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-text ">
                    <h1 class="page-title">My Account</h1>
                    <ul>
                        <li>
                            <a class="active" href="index.html">Home</a>
                        </li>
                        <li>Academic Information</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumbs End -->

            @if(Session::has('flash_message'))
                <div class="container">
                    <div class="{{ Session::get('flash_class') }}">
                        {{ Session::get('flash_message') }}
                    </div>
                </div>
            @endif

            <!-- Register Section -->
            <section class="register-section pt-100 pb-100">
                <div class="container">
                    <div class="register-box">
                        
                        <div class="sec-title text-center mb-30">
                            <h2 class="title mb-10">Academic Information</h2>
                        </div>
                        
                        <div class="styled-form">
                            {{-- <div id="form-messages"></div> --}}
                            <form action="{{ route('submit-academic-info') }}" method="POST" enctype="multipart/form-data">    
                                @csrf                           
                                <div class="row clearfix">
                                    <div class="form-group col-lg-6">
                                        <label>Pre-university academic qualification</label>
                                        <select name="degree_name" id="degree_name" class="d-block" required>
                                            <option value="">Select</option>
                                            <option value="دبلوم متوسط" {{ isset($academicInfo) ? $academicInfo->degree_name == 'دبلوم متوسط' ? 'selected' : null : null }}>Intermediate Diploma</option>
                                            <option value="دبلوم فوق المتوسط" {{ isset($academicInfo) ? $academicInfo->degree_name == 'دبلوم فوق المتوسط' ? 'selected' : null : null }}>Diploma above average</option>
                                        </select>
                                        @if($errors->has('degree_name'))
                                            <span class="text-danger">{{ $errors->first('degree_name') }}</span>
                                        @endif
                                    </div>   
                                    <div class="form-group col-lg-6">
                                        <label>Graduation Year</label>
                                        <select name="degree_year" id="degree_year" class="d-block" required>
                                            <option value="">Select</option>
                                            <option value="2020" {{ isset($academicInfo) ? $academicInfo->degree_year == '2020' ? 'selected' : null : null }}>2020</option>
                                            <option value="2019" {{ isset($academicInfo) ? $academicInfo->degree_year == '2019' ? 'selected' : null : null }}>2019</option>
                                            <option value="2018" {{ isset($academicInfo) ? $academicInfo->degree_year == '2018' ? 'selected' : null : null }}>2018</option>
                                            <option value="2017" {{ isset($academicInfo) ? $academicInfo->degree_year == '2017' ? 'selected' : null : null }}>2017</option>
                                            <option value="2016" {{ isset($academicInfo) ? $academicInfo->degree_year == '2016' ? 'selected' : null : null }}>2016</option>
                                            <option value="2015" {{ isset($academicInfo) ? $academicInfo->degree_year == '2015' ? 'selected' : null : null }}>2015</option>
                                            <option value="2014" {{ isset($academicInfo) ? $academicInfo->degree_year == '2014' ? 'selected' : null : null }}>2014</option>
                                            <option value="2013" {{ isset($academicInfo) ? $academicInfo->degree_year == '2013' ? 'selected' : null : null }}>2013</option>
                                            <option value="2012" {{ isset($academicInfo) ? $academicInfo->degree_year == '2012' ? 'selected' : null : null }}>2012</option>
                                            <option value="2011" {{ isset($academicInfo) ? $academicInfo->degree_year == '2011' ? 'selected' : null : null }}>2011</option>
                                            <option value="2010" {{ isset($academicInfo) ? $academicInfo->degree_year == '2010' ? 'selected' : null : null }}>2010</option>
                                            <option value="2009" {{ isset($academicInfo) ? $academicInfo->degree_year == '2009' ? 'selected' : null : null }}>2009</option>
                                            <option value="2008" {{ isset($academicInfo) ? $academicInfo->degree_year == '2008' ? 'selected' : null : null }}>2008</option>
                                            <option value="2007" {{ isset($academicInfo) ? $academicInfo->degree_year == '2007' ? 'selected' : null : null }}>2007</option>
                                            <option value="2006" {{ isset($academicInfo) ? $academicInfo->degree_year == '2006' ? 'selected' : null : null }}>2006</option>
                                            <option value="2005" {{ isset($academicInfo) ? $academicInfo->degree_year == '2005' ? 'selected' : null : null }}>2005</option>
                                            <option value="2004" {{ isset($academicInfo) ? $academicInfo->degree_year == '2004' ? 'selected' : null : null }}>2004</option>
                                            <option value="2003" {{ isset($academicInfo) ? $academicInfo->degree_year == '2003' ? 'selected' : null : null }}>2003</option>
                                            <option value="2002" {{ isset($academicInfo) ? $academicInfo->degree_year == '2002' ? 'selected' : null : null }}>2002</option>
                                            <option value="2001" {{ isset($academicInfo) ? $academicInfo->degree_year == '2001' ? 'selected' : null : null }}>2001</option>
                                            <option value="2000" {{ isset($academicInfo) ? $academicInfo->degree_year == '2000' ? 'selected' : null : null }}>2000</option>
                                        </select>
                                        @if($errors->has('degree_year'))
                                            <span class="text-danger">{{ $errors->first('degree_year') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Pre-university academic country</label>
                                        <select id="degree_country" name="degree_country" class="d-block" required>
                                            <option value="Afghanistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Afghanistan' ? 'selected' : null : null }}>Afghanistan</option>
                                            <option value="Åland Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Åland Islands' ? 'selected' : null : null }}>Åland Islands</option>
                                            <option value="Albania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Albania' ? 'selected' : null : null }}>Albania</option>
                                            <option value="Algeria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Algeria' ? 'selected' : null : null }}>Algeria</option>
                                            <option value="American Samoa" {{ isset($academicInfo) ? $academicInfo->degree_country == 'American Samoa' ? 'selected' : null : null }}>American Samoa</option>
                                            <option value="Andorra" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Andorra' ? 'selected' : null : null }}>Andorra</option>
                                            <option value="Angola" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Angola' ? 'selected' : null : null }}>Angola</option>
                                            <option value="Anguilla" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Anguilla' ? 'selected' : null : null }}>Anguilla</option>
                                            <option value="Antarctica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Antarctica' ? 'selected' : null : null }}>Antarctica</option>
                                            <option value="Antigua and Barbuda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Antigua and Barbuda' ? 'selected' : null : null }}>Antigua and Barbuda</option>
                                            <option value="Argentina" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Argentina' ? 'selected' : null : null }}>Argentina</option>
                                            <option value="Armenia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Armenia' ? 'selected' : null : null }}>Armenia</option>
                                            <option value="Aruba" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Aruba' ? 'selected' : null : null }}>Aruba</option>
                                            <option value="Australia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Australia' ? 'selected' : null : null }}>Australia</option>
                                            <option value="Austria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Austria' ? 'selected' : null : null }}>Austria</option>
                                            <option value="Azerbaijan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Azerbaijan' ? 'selected' : null : null }}>Azerbaijan</option>
                                            <option value="Bahamas" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bahamas' ? 'selected' : null : null }}>Bahamas</option>
                                            <option value="Bahrain" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bahrain' ? 'selected' : null : null }}>Bahrain</option>
                                            <option value="Bangladesh" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bangladesh' ? 'selected' : null : null }}>Bangladesh</option>
                                            <option value="Barbados" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Barbados' ? 'selected' : null : null }}>Barbados</option>
                                            <option value="Belarus" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Belarus' ? 'selected' : null : null }}>Belarus</option>
                                            <option value="Belgium" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Belgium' ? 'selected' : null : null }}>Belgium</option>
                                            <option value="Belize" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Belize' ? 'selected' : null : null }}>Belize</option>
                                            <option value="Benin" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Benin' ? 'selected' : null : null }}>Benin</option>
                                            <option value="Bermuda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bermuda' ? 'selected' : null : null }}>Bermuda</option>
                                            <option value="Bhutan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bhutan' ? 'selected' : null : null }}>Bhutan</option>
                                            <option value="Bolivia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bolivia' ? 'selected' : null : null }}>Bolivia</option>
                                            <option value="Bosnia and Herzegovina" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bosnia and Herzegovina' ? 'selected' : null : null }}>Bosnia and Herzegovina</option>
                                            <option value="Botswana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Botswana' ? 'selected' : null : null }}>Botswana</option>
                                            <option value="Bouvet Island" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bouvet Island' ? 'selected' : null : null }}>Bouvet Island</option>
                                            <option value="Brazil" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Brazil' ? 'selected' : null : null }}>Brazil</option>
                                            <option value="British Indian Ocean Territory" {{ isset($academicInfo) ? $academicInfo->degree_country == 'British Indian Ocean Territory' ? 'selected' : null : null }}>British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Brunei Darussalam' ? 'selected' : null : null }}>Brunei Darussalam</option>
                                            <option value="Bulgaria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bulgaria' ? 'selected' : null : null }}>Bulgaria</option>
                                            <option value="Burkina Faso" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Burkina Faso' ? 'selected' : null : null }}>Burkina Faso</option>
                                            <option value="Burundi" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Burundi' ? 'selected' : null : null }}>Burundi</option>
                                            <option value="Cambodia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cambodia' ? 'selected' : null : null }}>Cambodia</option>
                                            <option value="Cameroon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cameroon' ? 'selected' : null : null }}>Cameroon</option>
                                            <option value="Canada" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Canada' ? 'selected' : null : null }}>Canada</option>
                                            <option value="Cape Verde" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cape Verde' ? 'selected' : null : null }}>Cape Verde</option>
                                            <option value="Cayman Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cayman Island' ? 'selected' : null : null }}>Cayman Islands</option>
                                            <option value="Central African Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Central African Republic' ? 'selected' : null : null }}>Central African Republic</option>
                                            <option value="Chad" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Chad' ? 'selected' : null : null }}>Chad</option>
                                            <option value="Chile" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Chile' ? 'selected' : null : null }}>Chile</option>
                                            <option value="China" {{ isset($academicInfo) ? $academicInfo->degree_country == 'China' ? 'selected' : null : null }}>China</option>
                                            <option value="Christmas Island" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Christmas Island' ? 'selected' : null : null }}>Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cocos (Keeling) Islands' ? 'selected' : null : null }}>Cocos (Keeling) Islands</option>
                                            <option value="Colombia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Colombia' ? 'selected' : null : null }}>Colombia</option>
                                            <option value="Comoros" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Comoros' ? 'selected' : null : null }}>Comoros</option>
                                            <option value="Congo" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Congo' ? 'selected' : null : null }}>Congo</option>
                                            <option value="Congo, The Democratic Republic of The" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Congo, The Democratic Republic of The' ? 'selected' : null : null }}>Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cook Islands' ? 'selected' : null : null }}>Cook Islands</option>
                                            <option value="Costa Rica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Costa Rica' ? 'selected' : null : null }}>Costa Rica</option>
                                            <option value="Cote D'ivoire" {{ isset($academicInfo) ? $academicInfo->degree_country == "Cote D'ivoire" ? 'selected' : null : null }}>Cote D'ivoire</option>
                                            <option value="Croatia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Croatia' ? 'selected' : null : null }}>Croatia</option>
                                            <option value="Cuba" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cuba' ? 'selected' : null : null }}>Cuba</option>
                                            <option value="Cyprus" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cyprus' ? 'selected' : null : null }}>Cyprus</option>
                                            <option value="Czech Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Czech Republic' ? 'selected' : null : null }}>Czech Republic</option>
                                            <option value="Denmark" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Denmark' ? 'selected' : null : null }}>Denmark</option>
                                            <option value="Djibouti" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Djibouti' ? 'selected' : null : null }}>Djibouti</option>
                                            <option value="Dominica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Dominica' ? 'selected' : null : null }}>Dominica</option>
                                            <option value="Dominican Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Dominican Republic' ? 'selected' : null : null }}>Dominican Republic</option>
                                            <option value="Ecuador" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ecuador' ? 'selected' : null : null }}>Ecuador</option>
                                            <option value="Egypt" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Egypt' ? 'selected' : null : null }}>Egypt</option>
                                            <option value="El Salvador" {{ isset($academicInfo) ? $academicInfo->degree_country == 'El Salvador' ? 'selected' : null : null }}>El Salvador</option>
                                            <option value="Equatorial Guinea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Equatorial Guinea' ? 'selected' : null : null }}>Equatorial Guinea</option>
                                            <option value="Eritrea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Eritrea' ? 'selected' : null : null }}>Eritrea</option>
                                            <option value="Estonia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Estonia' ? 'selected' : null : null }}>Estonia</option>
                                            <option value="Ethiopia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ethiopia' ? 'selected' : null : null }}>Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas) {{ isset($academicInfo) ? $academicInfo->degree_country == 'Falkland Islands (Malvinas)' ? 'selected' : null : null }}">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Faroe Islands' ? 'selected' : null : null }}>Faroe Islands</option>
                                            <option value="Fiji" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Fiji' ? 'selected' : null : null }}>Fiji</option>
                                            <option value="Finland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Finland' ? 'selected' : null : null }}>Finland</option>
                                            <option value="France" {{ isset($academicInfo) ? $academicInfo->degree_country == 'France' ? 'selected' : null : null }}>France</option>
                                            <option value="French Guiana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'French Guiana' ? 'selected' : null : null }}>French Guiana</option>
                                            <option value="French Polynesia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'French Polynesia' ? 'selected' : null : null }}>French Polynesia</option>
                                            <option value="French Southern Territories" {{ isset($academicInfo) ? $academicInfo->degree_country == 'French Southern Territories' ? 'selected' : null : null }}>French Southern Territories</option>
                                            <option value="Gabon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Gabon' ? 'selected' : null : null }}>Gabon</option>
                                            <option value="Gambia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Gambia' ? 'selected' : null : null }}>Gambia</option>
                                            <option value="Georgia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Georgia' ? 'selected' : null : null }}>Georgia</option>
                                            <option value="Germany" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Germany' ? 'selected' : null : null }}>Germany</option>
                                            <option value="Ghana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ghana' ? 'selected' : null : null }}>Ghana</option>
                                            <option value="Gibraltar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Gibraltar' ? 'selected' : null : null }}>Gibraltar</option>
                                            <option value="Greece" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Greece' ? 'selected' : null : null }}>Greece</option>
                                            <option value="Greenland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Greenland' ? 'selected' : null : null }}>Greenland</option>
                                            <option value="Grenada" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Grenada' ? 'selected' : null : null }}>Grenada</option>
                                            <option value="Guadeloupe" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guadeloupe' ? 'selected' : null : null }}>Guadeloupe</option>
                                            <option value="Guam" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guam' ? 'selected' : null : null }}>Guam</option>
                                            <option value="Guatemala" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guatemala' ? 'selected' : null : null }}>Guatemala</option>
                                            <option value="Guernsey" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guernsey' ? 'selected' : null : null }}>Guernsey</option>
                                            <option value="Guinea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guinea' ? 'selected' : null : null }}>Guinea</option>
                                            <option value="Guinea-bissau" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guinea-bissau' ? 'selected' : null : null }}>Guinea-bissau</option>
                                            <option value="Guyana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guyana' ? 'selected' : null : null }}>Guyana</option>
                                            <option value="Haiti" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Haiti' ? 'selected' : null : null }}>Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Heard Island and Mcdonald Islands' ? 'selected' : null : null }}>Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Holy See (Vatican City State)' ? 'selected' : null : null }}>Holy See (Vatican City State)</option>
                                            <option value="Honduras" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Honduras' ? 'selected' : null : null }}>Honduras</option>
                                            <option value="Hong Kong" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Hong Kong' ? 'selected' : null : null }}>Hong Kong</option>
                                            <option value="Hungary" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Hungary' ? 'selected' : null : null }}>Hungary</option>
                                            <option value="Iceland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Iceland' ? 'selected' : null : null }}>Iceland</option>
                                            <option value="India" {{ isset($academicInfo) ? $academicInfo->degree_country == 'India' ? 'selected' : null : null }}>India</option>
                                            <option value="Indonesia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Indonesia' ? 'selected' : null : null }}>Indonesia</option>
                                            <option value="Iran, Islamic Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Iran, Islamic Republic' ? 'selected' : null : null }}>Iran, Islamic Republic of</option>
                                            <option value="Iraq" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Iraq' ? 'selected' : null : null }}>Iraq</option>
                                            <option value="Ireland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ireland' ? 'selected' : null : null }}>Ireland</option>
                                            <option value="Isle of Man" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Isle of Man' ? 'selected' : null : null }}>Isle of Man</option>
                                            <option value="Israel" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Israel' ? 'selected' : null : null }}>Israel</option>
                                            <option value="Italy" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Italy' ? 'selected' : null : null }}>Italy</option>
                                            <option value="Jamaica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Jamaica' ? 'selected' : null : null }}>Jamaica</option>
                                            <option value="Japan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Japan' ? 'selected' : null : null }}>Japan</option>
                                            <option value="Jersey" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Jersey' ? 'selected' : null : null }}>Jersey</option>
                                            <option value="Jordan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Jordan' ? 'selected' : null : null }}>Jordan</option>
                                            <option value="Kazakhstan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kazakhstan' ? 'selected' : null : null }}>Kazakhstan</option>
                                            <option value="Kenya" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kenya' ? 'selected' : null : null }}>Kenya</option>
                                            <option value="Kiribati" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kiribati' ? 'selected' : null : null }}>Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Korea, Democratic People\'s Republic of' ? 'selected' : null : null }}>Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Korea, Republic of' ? 'selected' : null : null }}>Korea, Republic of</option>
                                            <option value="Kuwait" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kuwait' ? 'selected' : null : null }}>Kuwait</option>
                                            <option value="Kyrgyzstan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kyrgyzstan' ? 'selected' : null : null }}>Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lao People\'s Democratic Republic' ? 'selected' : null : null }}>Lao People's Democratic Republic</option>
                                            <option value="Latvia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Latvia' ? 'selected' : null : null }}>Latvia</option>
                                            <option value="Lebanon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lebanon' ? 'selected' : null : null }}>Lebanon</option>
                                            <option value="Lesotho" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lesotho' ? 'selected' : null : null }}>Lesotho</option>
                                            <option value="Liberia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Liberia' ? 'selected' : null : null }}>Liberia</option>
                                            <option value="Libyan Arab Jamahiriya" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Libyan Arab Jamahiriya' ? 'selected' : null : null }}>Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Liechtenstein' ? 'selected' : null : null }}>Liechtenstein</option>
                                            <option value="Lithuania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lithuania' ? 'selected' : null : null }}>Lithuania</option>
                                            <option value="Luxembourg" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Luxembourg' ? 'selected' : null : null }}>Luxembourg</option>
                                            <option value="Macao" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Macao' ? 'selected' : null : null }}>Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : null : null }}>Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Madagascar' ? 'selected' : null : null }}>Madagascar</option>
                                            <option value="Malawi" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Malawi' ? 'selected' : null : null }}>Malawi</option>
                                            <option value="Malaysia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Malaysia' ? 'selected' : null : null }}>Malaysia</option>
                                            <option value="Maldives" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Maldives' ? 'selected' : null : null }}>Maldives</option>
                                            <option value="Mali" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mali' ? 'selected' : null : null }}>Mali</option>
                                            <option value="Malta" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Malta' ? 'selected' : null : null }}>Malta</option>
                                            <option value="Marshall Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Marshall Islands' ? 'selected' : null : null }}>Marshall Islands</option>
                                            <option value="Martinique" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Martinique' ? 'selected' : null : null }}>Martinique</option>
                                            <option value="Mauritania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mauritania' ? 'selected' : null : null }}>Mauritania</option>
                                            <option value="Mauritius" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mauritius' ? 'selected' : null : null }}>Mauritius</option>
                                            <option value="Mayotte" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mayotte' ? 'selected' : null : null }}>Mayotte</option>
                                            <option value="Mexico" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mexico' ? 'selected' : null : null }}>Mexico</option>
                                            <option value="Micronesia, Federated States of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Micronesia, Federated States of' ? 'selected' : null : null }}>Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Moldova, Republic of' ? 'selected' : null : null }}>Moldova, Republic of</option>
                                            <option value="Monaco" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Monaco' ? 'selected' : null : null }}>Monaco</option>
                                            <option value="Mongolia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mongolia' ? 'selected' : null : null }}>Mongolia</option>
                                            <option value="Montenegro" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Montenegro' ? 'selected' : null : null }}>Montenegro</option>
                                            <option value="Montserrat" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Montserrat' ? 'selected' : null : null }}>Montserrat</option>
                                            <option value="Morocco" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Morocco' ? 'selected' : null : null }}>Morocco</option>
                                            <option value="Mozambique" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mozambique' ? 'selected' : null : null }}>Mozambique</option>
                                            <option value="Myanmar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Myanmar' ? 'selected' : null : null }}>Myanmar</option>
                                            <option value="Namibia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Namibia' ? 'selected' : null : null }}>Namibia</option>
                                            <option value="Nauru" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nauru' ? 'selected' : null : null }}>Nauru</option>
                                            <option value="Nepal" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nepal' ? 'selected' : null : null }}>Nepal</option>
                                            <option value="Netherlands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Netherlands' ? 'selected' : null : null }}>Netherlands</option>
                                            <option value="Netherlands Antilles" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Netherlands Antilles' ? 'selected' : null : null }}>Netherlands Antilles</option>
                                            <option value="New Caledonia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'New Caledonia' ? 'selected' : null : null }}>New Caledonia</option>
                                            <option value="New Zealand" {{ isset($academicInfo) ? $academicInfo->degree_country == 'New Zealand' ? 'selected' : null : null }}>New Zealand</option>
                                            <option value="Nicaragua" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nicaragua' ? 'selected' : null : null }}>Nicaragua</option>
                                            <option value="Niger" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Niger' ? 'selected' : null : null }}>Niger</option>
                                            <option value="Nigeria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nigeria' ? 'selected' : null : null }}>Nigeria</option>
                                            <option value="Niue" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Niue' ? 'selected' : null : null }}>Niue</option>
                                            <option value="Norfolk Island" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Norfolk Island' ? 'selected' : null : null }}>Norfolk Island</option>
                                            <option value="Northern Mariana Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Northern Mariana Islands' ? 'selected' : null : null }}>Northern Mariana Islands</option>
                                            <option value="Norway" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Norway' ? 'selected' : null : null }}>Norway</option>
                                            <option value="Oman" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Oman' ? 'selected' : null : null }}>Oman</option>
                                            <option value="Pakistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Pakistan' ? 'selected' : null : null }}>Pakistan</option>
                                            <option value="Palau" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Palau' ? 'selected' : null : null }}>Palau</option>
                                            <option value="Palestinian Territory, Occupied" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Palestinian Territory, Occupied' ? 'selected' : null : null }}>Palestinian Territory, Occupied</option>
                                            <option value="Panama" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Panama' ? 'selected' : null : null }}>Panama</option>
                                            <option value="Papua New Guinea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Papua New Guinea' ? 'selected' : null : null }}>Papua New Guinea</option>
                                            <option value="Paraguay" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Paraguay' ? 'selected' : null : null }}>Paraguay</option>
                                            <option value="Peru" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Peru' ? 'selected' : null : null }}>Peru</option>
                                            <option value="Philippines" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Philippines' ? 'selected' : null : null }}>Philippines</option>
                                            <option value="Pitcairn" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Pitcairn' ? 'selected' : null : null }}>Pitcairn</option>
                                            <option value="Poland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Poland' ? 'selected' : null : null }}>Poland</option>
                                            <option value="Portugal" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Portugal' ? 'selected' : null : null }}>Portugal</option>
                                            <option value="Puerto Rico" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Puerto Rico' ? 'selected' : null : null }}>Puerto Rico</option>
                                            <option value="Qatar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Qatar' ? 'selected' : null : null }}>Qatar</option>
                                            <option value="Reunion" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Reunion' ? 'selected' : null : null }}>Reunion</option>
                                            <option value="Romania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Romania' ? 'selected' : null : null }}>Romania</option>
                                            <option value="Russian Federation" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Russian Federation' ? 'selected' : null : null }}>Russian Federation</option>
                                            <option value="Rwanda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Rwanda' ? 'selected' : null : null }}>Rwanda</option>
                                            <option value="Saint Helena" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Helena' ? 'selected' : null : null }}>Saint Helena</option>
                                            <option value="Saint Kitts and Nevis" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Kitts and Nevis' ? 'selected' : null : null }}>Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Lucia' ? 'selected' : null : null }}>Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Pierre and Miquelon' ? 'selected' : null : null }}>Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Vincent and The Grenadines' ? 'selected' : null : null }}>Saint Vincent and The Grenadines</option>
                                            <option value="Samoa" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Samoa' ? 'selected' : null : null }}>Samoa</option>
                                            <option value="San Marino" {{ isset($academicInfo) ? $academicInfo->degree_country == 'San Marino' ? 'selected' : null : null }}>San Marino</option>
                                            <option value="Sao Tome and Principe" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sao Tome and Principe' ? 'selected' : null : null }}>Sao Tome and Principe</option>
                                            <option value="Saudi Arabia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saudi Arabia' ? 'selected' : null : null }}>Saudi Arabia</option>
                                            <option value="Senegal" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Senegal' ? 'selected' : null : null }}>Senegal</option>
                                            <option value="Serbia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Serbia' ? 'selected' : null : null }}>Serbia</option>
                                            <option value="Seychelles" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Seychelles' ? 'selected' : null : null }}>Seychelles</option>
                                            <option value="Sierra Leone" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sierra Leone' ? 'selected' : null : null }}>Sierra Leone</option>
                                            <option value="Singapore" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Singapore' ? 'selected' : null : null }}>Singapore</option>
                                            <option value="Slovakia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Slovakia' ? 'selected' : null : null }}>Slovakia</option>
                                            <option value="Slovenia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Slovenia' ? 'selected' : null : null }}>Slovenia</option>
                                            <option value="Solomon Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Solomon Islands' ? 'selected' : null : null }}>Solomon Islands</option>
                                            <option value="Somalia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Somalia' ? 'selected' : null : null }}>Somalia</option>
                                            <option value="South Africa" {{ isset($academicInfo) ? $academicInfo->degree_country == 'South Africa' ? 'selected' : null : null }}>South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'South Georgia and The South Sandwich Islands' ? 'selected' : null : null }}>South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Spain' ? 'selected' : null : null }}>Spain</option>
                                            <option value="Sri Lanka" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sri Lanka' ? 'selected' : null : null }}>Sri Lanka</option>
                                            <option value="Sudan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sudan' ? 'selected' : null : null }}>Sudan</option>
                                            <option value="Suriname" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Suriname' ? 'selected' : null : null }}>Suriname</option>
                                            <option value="Svalbard and Jan Mayen" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Svalbard and Jan Mayen' ? 'selected' : null : null }}>Svalbard and Jan Mayen</option>
                                            <option value="Swaziland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Swaziland' ? 'selected' : null : null }}>Swaziland</option>
                                            <option value="Sweden" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sweden' ? 'selected' : null : null }}>Sweden</option>
                                            <option value="Switzerland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Switzerland' ? 'selected' : null : null }}>Switzerland</option>
                                            <option value="Syrian Arab Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Syrian Arab Republic' ? 'selected' : null : null }}>Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Taiwan, Province of China' ? 'selected' : null : null }}>Taiwan, Province of China</option>
                                            <option value="Tajikistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tajikistan' ? 'selected' : null : null }}>Tajikistan</option>
                                            <option value="Tanzania, United Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tanzania, United Republic of' ? 'selected' : null : null }}>Tanzania, United Republic of</option>
                                            <option value="Thailand" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Thailand' ? 'selected' : null : null }}>Thailand</option>
                                            <option value="Timor-leste" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Timor-leste' ? 'selected' : null : null }}>Timor-leste</option>
                                            <option value="Togo" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Togo' ? 'selected' : null : null }}>Togo</option>
                                            <option value="Tokelau" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tokelau' ? 'selected' : null : null }}>Tokelau</option>
                                            <option value="Tonga" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tonga' ? 'selected' : null : null }}>Tonga</option>
                                            <option value="Trinidad and Tobago" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Trinidad and Tobago' ? 'selected' : null : null }}>Trinidad and Tobago</option>
                                            <option value="Tunisia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tunisia' ? 'selected' : null : null }}>Tunisia</option>
                                            <option value="Turkey" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Turkey' ? 'selected' : null : null }}>Turkey</option>
                                            <option value="Turkmenistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Turkmenistan' ? 'selected' : null : null }}>Turkmenistan</option>
                                            <option value="Turks and Caicos Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Turks and Caicos Islands' ? 'selected' : null : null }}>Turks and Caicos Islands</option>
                                            <option value="Tuvalu" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tuvalu' ? 'selected' : null : null }}>Tuvalu</option>
                                            <option value="Uganda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Uganda' ? 'selected' : null : null }}>Uganda</option>
                                            <option value="Ukraine" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ukraine' ? 'selected' : null : null }}>Ukraine</option>
                                            <option value="United Arab Emirates" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United Arab Emirates' ? 'selected' : null : null }}>United Arab Emirates</option>
                                            <option value="United Kingdom" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United Kingdom' ? 'selected' : null : null }}>United Kingdom</option>
                                            <option value="United States" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United States' ? 'selected' : null : null }}>United States</option>
                                            <option value="United States Minor Outlying Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United States Minor Outlying Islands' ? 'selected' : null : null }}>United States Minor Outlying Islands</option>
                                            <option value="Uruguay" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Uruguay' ? 'selected' : null : null }}>Uruguay</option>
                                            <option value="Uzbekistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Uzbekistan' ? 'selected' : null : null }}>Uzbekistan</option>
                                            <option value="Vanuatu" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Vanuatu' ? 'selected' : null : null }}>Vanuatu</option>
                                            <option value="Venezuela" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Venezuela' ? 'selected' : null : null }}>Venezuela</option>
                                            <option value="Vietnam" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Vietnam' ? 'selected' : null : null }}>Vietnam</option>
                                            <option value="Virgin Islands, British" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Virgin Islands, British' ? 'selected' : null : null }}>Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S." {{ isset($academicInfo) ? $academicInfo->degree_country == 'Virgin Islands, U.S.' ? 'selected' : null : null }}>Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Wallis and Futuna' ? 'selected' : null : null }}>Wallis and Futuna</option>
                                            <option value="Western Sahara" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Western Sahara' ? 'selected' : null : null }}>Western Sahara</option>
                                            <option value="Yemen" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Yemen' ? 'selected' : null : null }}>Yemen</option>
                                            <option value="Zambia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Zambia' ? 'selected' : null : null }}>Zambia</option>
                                            <option value="Zimbabwe" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Zimbabwe' ? 'selected' : null : null }}>Zimbabwe</option>
                                        </select>
                                        @if($errors->has('degree_country'))
                                            <span class="text-danger">{{ $errors->first('degree_country') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>School Name</label>
                                        <input type="text" id="school_name" name="school_name" value="{{ isset($academicInfo) ? $academicInfo->school_name : null }}" placeholder="Write your school name" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Percentage %</label>
                                        <input type="number" id="gpa_precentage" name="gpa_precentage" step=".01" value="{{ isset($academicInfo) ? $academicInfo->gpa_precentage : null }}" placeholder="Write your percentage" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Education System</label>
                                        <select class="d-block" name="education_system" id="education_system" required>
                                            <option value="">Select</option>
                                            <option value="علمي علوم" {{ isset($academicInfo) ? $academicInfo->education_system == 'علمي علوم' ? 'selected' : null : null }}>3lm 3loom</option>
                                            <option value="علمي رياضة" {{ isset($academicInfo) ? $academicInfo->education_system == 'علمي رياضة' ? 'selected' : null : null }}>3lm ryada</option>
                                            <option value="ادبي" {{ isset($academicInfo) ? $academicInfo->education_system == 'ادبي' ? 'selected' : null : null }}>Adby</option>
                                        </select>
                                        @if($errors->has('education_system'))
                                            <span class="text-danger">{{ $errors->first('education_system') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="readon register-btn"><span class="txt">Start Now</span></button>
                                    </div>
                                    
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- End Register Section --> 
        </div> 
    @else
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-text ">
                <h1 class="page-title">حسابي</h1>
                <ul>
                    <li>
                        الرئيسية
                    </li>
                    <li><a>المعلومات الأكاديمية</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        @if(Session::has('flash_message'))
            <div class="container">
                <div class="{{ Session::get('flash_class') }}" style="text-align: right">
                    {{ Session::get('flash_message') }}
                </div>
            </div>
        @endif

        <!-- Register Section -->
        <section class="register-section pt-100 pb-100">
            <div class="container">
                <div class="register-box">
                    
                    <div class="sec-title text-center mb-30">
                        <h2 class="title mb-10">المعلومات الأكاديمية</h2>
                    </div>
                    
                    <div class="styled-form">
                        {{-- <div id="form-messages"></div> --}}
                        <form action="{{ route('submit-academic-info') }}" method="POST" enctype="multipart/form-data">    
                            @csrf                           
                            <div class="row clearfix">
                                <div class="form-group col-lg-6">
                                    <label style="float: right">المؤهل الأكاديمي قبل الجامعي</label>
                                    <br>
                                    <select name="degree_name" id="degree_name" class="d-block" required>
                                        <option value="">اختر</option>
                                        <option value="دبلوم متوسط" {{ isset($academicInfo) ? $academicInfo->degree_name == 'دبلوم متوسط' ? 'selected' : null : null }}>دبلوم متوسط</option>
                                        <option value="دبلوم فوق المتوسط" {{ isset($academicInfo) ? $academicInfo->degree_name == 'دبلوم فوق المتوسط' ? 'selected' : null : null }}>دبلوم فوق المتوسط</option>
                                    </select>
                                    @if($errors->has('degree_name'))
                                        <span class="text-danger">{{ $errors->first('degree_name') }}</span>
                                    @endif
                                </div>   
                                <div class="form-group col-lg-6">
                                    <label style="float: right">سنة التخرج</label>
                                    <br>
                                    <select name="degree_year" id="degree_year" class="d-block" required>
                                        <option value="">Select</option>
                                        <option value="2020" {{ isset($academicInfo) ? $academicInfo->degree_year == '2020' ? 'selected' : null : null }}>2020</option>
                                        <option value="2019" {{ isset($academicInfo) ? $academicInfo->degree_year == '2019' ? 'selected' : null : null }}>2019</option>
                                        <option value="2018" {{ isset($academicInfo) ? $academicInfo->degree_year == '2018' ? 'selected' : null : null }}>2018</option>
                                        <option value="2017" {{ isset($academicInfo) ? $academicInfo->degree_year == '2017' ? 'selected' : null : null }}>2017</option>
                                        <option value="2016" {{ isset($academicInfo) ? $academicInfo->degree_year == '2016' ? 'selected' : null : null }}>2016</option>
                                        <option value="2015" {{ isset($academicInfo) ? $academicInfo->degree_year == '2015' ? 'selected' : null : null }}>2015</option>
                                        <option value="2014" {{ isset($academicInfo) ? $academicInfo->degree_year == '2014' ? 'selected' : null : null }}>2014</option>
                                        <option value="2013" {{ isset($academicInfo) ? $academicInfo->degree_year == '2013' ? 'selected' : null : null }}>2013</option>
                                        <option value="2012" {{ isset($academicInfo) ? $academicInfo->degree_year == '2012' ? 'selected' : null : null }}>2012</option>
                                        <option value="2011" {{ isset($academicInfo) ? $academicInfo->degree_year == '2011' ? 'selected' : null : null }}>2011</option>
                                        <option value="2010" {{ isset($academicInfo) ? $academicInfo->degree_year == '2010' ? 'selected' : null : null }}>2010</option>
                                        <option value="2009" {{ isset($academicInfo) ? $academicInfo->degree_year == '2009' ? 'selected' : null : null }}>2009</option>
                                        <option value="2008" {{ isset($academicInfo) ? $academicInfo->degree_year == '2008' ? 'selected' : null : null }}>2008</option>
                                        <option value="2007" {{ isset($academicInfo) ? $academicInfo->degree_year == '2007' ? 'selected' : null : null }}>2007</option>
                                        <option value="2006" {{ isset($academicInfo) ? $academicInfo->degree_year == '2006' ? 'selected' : null : null }}>2006</option>
                                        <option value="2005" {{ isset($academicInfo) ? $academicInfo->degree_year == '2005' ? 'selected' : null : null }}>2005</option>
                                        <option value="2004" {{ isset($academicInfo) ? $academicInfo->degree_year == '2004' ? 'selected' : null : null }}>2004</option>
                                        <option value="2003" {{ isset($academicInfo) ? $academicInfo->degree_year == '2003' ? 'selected' : null : null }}>2003</option>
                                        <option value="2002" {{ isset($academicInfo) ? $academicInfo->degree_year == '2002' ? 'selected' : null : null }}>2002</option>
                                        <option value="2001" {{ isset($academicInfo) ? $academicInfo->degree_year == '2001' ? 'selected' : null : null }}>2001</option>
                                        <option value="2000" {{ isset($academicInfo) ? $academicInfo->degree_year == '2000' ? 'selected' : null : null }}>2000</option>
                                    </select>
                                    @if($errors->has('degree_year'))
                                        <span class="text-danger">{{ $errors->first('degree_year') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label style="float: right">بلد المؤهل الأكاديمي قبل الجامعي</label>
                                    <br>
                                    <select id="degree_country" name="degree_country" class="d-block" required>
                                        <option value="Afghanistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Afghanistan' ? 'selected' : null : null }}>Afghanistan</option>
                                        <option value="Åland Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Åland Islands' ? 'selected' : null : null }}>Åland Islands</option>
                                        <option value="Albania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Albania' ? 'selected' : null : null }}>Albania</option>
                                        <option value="Algeria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Algeria' ? 'selected' : null : null }}>Algeria</option>
                                        <option value="American Samoa" {{ isset($academicInfo) ? $academicInfo->degree_country == 'American Samoa' ? 'selected' : null : null }}>American Samoa</option>
                                        <option value="Andorra" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Andorra' ? 'selected' : null : null }}>Andorra</option>
                                        <option value="Angola" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Angola' ? 'selected' : null : null }}>Angola</option>
                                        <option value="Anguilla" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Anguilla' ? 'selected' : null : null }}>Anguilla</option>
                                        <option value="Antarctica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Antarctica' ? 'selected' : null : null }}>Antarctica</option>
                                        <option value="Antigua and Barbuda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Antigua and Barbuda' ? 'selected' : null : null }}>Antigua and Barbuda</option>
                                        <option value="Argentina" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Argentina' ? 'selected' : null : null }}>Argentina</option>
                                        <option value="Armenia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Armenia' ? 'selected' : null : null }}>Armenia</option>
                                        <option value="Aruba" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Aruba' ? 'selected' : null : null }}>Aruba</option>
                                        <option value="Australia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Australia' ? 'selected' : null : null }}>Australia</option>
                                        <option value="Austria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Austria' ? 'selected' : null : null }}>Austria</option>
                                        <option value="Azerbaijan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Azerbaijan' ? 'selected' : null : null }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bahamas' ? 'selected' : null : null }}>Bahamas</option>
                                        <option value="Bahrain" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bahrain' ? 'selected' : null : null }}>Bahrain</option>
                                        <option value="Bangladesh" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bangladesh' ? 'selected' : null : null }}>Bangladesh</option>
                                        <option value="Barbados" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Barbados' ? 'selected' : null : null }}>Barbados</option>
                                        <option value="Belarus" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Belarus' ? 'selected' : null : null }}>Belarus</option>
                                        <option value="Belgium" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Belgium' ? 'selected' : null : null }}>Belgium</option>
                                        <option value="Belize" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Belize' ? 'selected' : null : null }}>Belize</option>
                                        <option value="Benin" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Benin' ? 'selected' : null : null }}>Benin</option>
                                        <option value="Bermuda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bermuda' ? 'selected' : null : null }}>Bermuda</option>
                                        <option value="Bhutan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bhutan' ? 'selected' : null : null }}>Bhutan</option>
                                        <option value="Bolivia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bolivia' ? 'selected' : null : null }}>Bolivia</option>
                                        <option value="Bosnia and Herzegovina" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bosnia and Herzegovina' ? 'selected' : null : null }}>Bosnia and Herzegovina</option>
                                        <option value="Botswana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Botswana' ? 'selected' : null : null }}>Botswana</option>
                                        <option value="Bouvet Island" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bouvet Island' ? 'selected' : null : null }}>Bouvet Island</option>
                                        <option value="Brazil" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Brazil' ? 'selected' : null : null }}>Brazil</option>
                                        <option value="British Indian Ocean Territory" {{ isset($academicInfo) ? $academicInfo->degree_country == 'British Indian Ocean Territory' ? 'selected' : null : null }}>British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Brunei Darussalam' ? 'selected' : null : null }}>Brunei Darussalam</option>
                                        <option value="Bulgaria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Bulgaria' ? 'selected' : null : null }}>Bulgaria</option>
                                        <option value="Burkina Faso" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Burkina Faso' ? 'selected' : null : null }}>Burkina Faso</option>
                                        <option value="Burundi" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Burundi' ? 'selected' : null : null }}>Burundi</option>
                                        <option value="Cambodia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cambodia' ? 'selected' : null : null }}>Cambodia</option>
                                        <option value="Cameroon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cameroon' ? 'selected' : null : null }}>Cameroon</option>
                                        <option value="Canada" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Canada' ? 'selected' : null : null }}>Canada</option>
                                        <option value="Cape Verde" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cape Verde' ? 'selected' : null : null }}>Cape Verde</option>
                                        <option value="Cayman Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cayman Island' ? 'selected' : null : null }}>Cayman Islands</option>
                                        <option value="Central African Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Central African Republic' ? 'selected' : null : null }}>Central African Republic</option>
                                        <option value="Chad" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Chad' ? 'selected' : null : null }}>Chad</option>
                                        <option value="Chile" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Chile' ? 'selected' : null : null }}>Chile</option>
                                        <option value="China" {{ isset($academicInfo) ? $academicInfo->degree_country == 'China' ? 'selected' : null : null }}>China</option>
                                        <option value="Christmas Island" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Christmas Island' ? 'selected' : null : null }}>Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cocos (Keeling) Islands' ? 'selected' : null : null }}>Cocos (Keeling) Islands</option>
                                        <option value="Colombia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Colombia' ? 'selected' : null : null }}>Colombia</option>
                                        <option value="Comoros" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Comoros' ? 'selected' : null : null }}>Comoros</option>
                                        <option value="Congo" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Congo' ? 'selected' : null : null }}>Congo</option>
                                        <option value="Congo, The Democratic Republic of The" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Congo, The Democratic Republic of The' ? 'selected' : null : null }}>Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cook Islands' ? 'selected' : null : null }}>Cook Islands</option>
                                        <option value="Costa Rica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Costa Rica' ? 'selected' : null : null }}>Costa Rica</option>
                                        <option value="Cote D'ivoire" {{ isset($academicInfo) ? $academicInfo->degree_country == "Cote D'ivoire" ? 'selected' : null : null }}>Cote D'ivoire</option>
                                        <option value="Croatia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Croatia' ? 'selected' : null : null }}>Croatia</option>
                                        <option value="Cuba" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cuba' ? 'selected' : null : null }}>Cuba</option>
                                        <option value="Cyprus" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Cyprus' ? 'selected' : null : null }}>Cyprus</option>
                                        <option value="Czech Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Czech Republic' ? 'selected' : null : null }}>Czech Republic</option>
                                        <option value="Denmark" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Denmark' ? 'selected' : null : null }}>Denmark</option>
                                        <option value="Djibouti" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Djibouti' ? 'selected' : null : null }}>Djibouti</option>
                                        <option value="Dominica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Dominica' ? 'selected' : null : null }}>Dominica</option>
                                        <option value="Dominican Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Dominican Republic' ? 'selected' : null : null }}>Dominican Republic</option>
                                        <option value="Ecuador" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ecuador' ? 'selected' : null : null }}>Ecuador</option>
                                        <option value="Egypt" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Egypt' ? 'selected' : null : null }}>Egypt</option>
                                        <option value="El Salvador" {{ isset($academicInfo) ? $academicInfo->degree_country == 'El Salvador' ? 'selected' : null : null }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Equatorial Guinea' ? 'selected' : null : null }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Eritrea' ? 'selected' : null : null }}>Eritrea</option>
                                        <option value="Estonia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Estonia' ? 'selected' : null : null }}>Estonia</option>
                                        <option value="Ethiopia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ethiopia' ? 'selected' : null : null }}>Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas) {{ isset($academicInfo) ? $academicInfo->degree_country == 'Falkland Islands (Malvinas)' ? 'selected' : null : null }}">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Faroe Islands' ? 'selected' : null : null }}>Faroe Islands</option>
                                        <option value="Fiji" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Fiji' ? 'selected' : null : null }}>Fiji</option>
                                        <option value="Finland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Finland' ? 'selected' : null : null }}>Finland</option>
                                        <option value="France" {{ isset($academicInfo) ? $academicInfo->degree_country == 'France' ? 'selected' : null : null }}>France</option>
                                        <option value="French Guiana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'French Guiana' ? 'selected' : null : null }}>French Guiana</option>
                                        <option value="French Polynesia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'French Polynesia' ? 'selected' : null : null }}>French Polynesia</option>
                                        <option value="French Southern Territories" {{ isset($academicInfo) ? $academicInfo->degree_country == 'French Southern Territories' ? 'selected' : null : null }}>French Southern Territories</option>
                                        <option value="Gabon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Gabon' ? 'selected' : null : null }}>Gabon</option>
                                        <option value="Gambia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Gambia' ? 'selected' : null : null }}>Gambia</option>
                                        <option value="Georgia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Georgia' ? 'selected' : null : null }}>Georgia</option>
                                        <option value="Germany" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Germany' ? 'selected' : null : null }}>Germany</option>
                                        <option value="Ghana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ghana' ? 'selected' : null : null }}>Ghana</option>
                                        <option value="Gibraltar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Gibraltar' ? 'selected' : null : null }}>Gibraltar</option>
                                        <option value="Greece" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Greece' ? 'selected' : null : null }}>Greece</option>
                                        <option value="Greenland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Greenland' ? 'selected' : null : null }}>Greenland</option>
                                        <option value="Grenada" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Grenada' ? 'selected' : null : null }}>Grenada</option>
                                        <option value="Guadeloupe" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guadeloupe' ? 'selected' : null : null }}>Guadeloupe</option>
                                        <option value="Guam" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guam' ? 'selected' : null : null }}>Guam</option>
                                        <option value="Guatemala" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guatemala' ? 'selected' : null : null }}>Guatemala</option>
                                        <option value="Guernsey" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guernsey' ? 'selected' : null : null }}>Guernsey</option>
                                        <option value="Guinea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guinea' ? 'selected' : null : null }}>Guinea</option>
                                        <option value="Guinea-bissau" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guinea-bissau' ? 'selected' : null : null }}>Guinea-bissau</option>
                                        <option value="Guyana" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Guyana' ? 'selected' : null : null }}>Guyana</option>
                                        <option value="Haiti" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Haiti' ? 'selected' : null : null }}>Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Heard Island and Mcdonald Islands' ? 'selected' : null : null }}>Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Holy See (Vatican City State)' ? 'selected' : null : null }}>Holy See (Vatican City State)</option>
                                        <option value="Honduras" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Honduras' ? 'selected' : null : null }}>Honduras</option>
                                        <option value="Hong Kong" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Hong Kong' ? 'selected' : null : null }}>Hong Kong</option>
                                        <option value="Hungary" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Hungary' ? 'selected' : null : null }}>Hungary</option>
                                        <option value="Iceland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Iceland' ? 'selected' : null : null }}>Iceland</option>
                                        <option value="India" {{ isset($academicInfo) ? $academicInfo->degree_country == 'India' ? 'selected' : null : null }}>India</option>
                                        <option value="Indonesia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Indonesia' ? 'selected' : null : null }}>Indonesia</option>
                                        <option value="Iran, Islamic Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Iran, Islamic Republic' ? 'selected' : null : null }}>Iran, Islamic Republic of</option>
                                        <option value="Iraq" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Iraq' ? 'selected' : null : null }}>Iraq</option>
                                        <option value="Ireland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ireland' ? 'selected' : null : null }}>Ireland</option>
                                        <option value="Isle of Man" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Isle of Man' ? 'selected' : null : null }}>Isle of Man</option>
                                        <option value="Israel" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Israel' ? 'selected' : null : null }}>Israel</option>
                                        <option value="Italy" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Italy' ? 'selected' : null : null }}>Italy</option>
                                        <option value="Jamaica" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Jamaica' ? 'selected' : null : null }}>Jamaica</option>
                                        <option value="Japan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Japan' ? 'selected' : null : null }}>Japan</option>
                                        <option value="Jersey" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Jersey' ? 'selected' : null : null }}>Jersey</option>
                                        <option value="Jordan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Jordan' ? 'selected' : null : null }}>Jordan</option>
                                        <option value="Kazakhstan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kazakhstan' ? 'selected' : null : null }}>Kazakhstan</option>
                                        <option value="Kenya" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kenya' ? 'selected' : null : null }}>Kenya</option>
                                        <option value="Kiribati" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kiribati' ? 'selected' : null : null }}>Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Korea, Democratic People\'s Republic of' ? 'selected' : null : null }}>Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Korea, Republic of' ? 'selected' : null : null }}>Korea, Republic of</option>
                                        <option value="Kuwait" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kuwait' ? 'selected' : null : null }}>Kuwait</option>
                                        <option value="Kyrgyzstan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Kyrgyzstan' ? 'selected' : null : null }}>Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lao People\'s Democratic Republic' ? 'selected' : null : null }}>Lao People's Democratic Republic</option>
                                        <option value="Latvia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Latvia' ? 'selected' : null : null }}>Latvia</option>
                                        <option value="Lebanon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lebanon' ? 'selected' : null : null }}>Lebanon</option>
                                        <option value="Lesotho" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lesotho' ? 'selected' : null : null }}>Lesotho</option>
                                        <option value="Liberia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Liberia' ? 'selected' : null : null }}>Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Libyan Arab Jamahiriya' ? 'selected' : null : null }}>Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Liechtenstein' ? 'selected' : null : null }}>Liechtenstein</option>
                                        <option value="Lithuania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Lithuania' ? 'selected' : null : null }}>Lithuania</option>
                                        <option value="Luxembourg" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Luxembourg' ? 'selected' : null : null }}>Luxembourg</option>
                                        <option value="Macao" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Macao' ? 'selected' : null : null }}>Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : null : null }}>Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Madagascar' ? 'selected' : null : null }}>Madagascar</option>
                                        <option value="Malawi" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Malawi' ? 'selected' : null : null }}>Malawi</option>
                                        <option value="Malaysia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Malaysia' ? 'selected' : null : null }}>Malaysia</option>
                                        <option value="Maldives" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Maldives' ? 'selected' : null : null }}>Maldives</option>
                                        <option value="Mali" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mali' ? 'selected' : null : null }}>Mali</option>
                                        <option value="Malta" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Malta' ? 'selected' : null : null }}>Malta</option>
                                        <option value="Marshall Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Marshall Islands' ? 'selected' : null : null }}>Marshall Islands</option>
                                        <option value="Martinique" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Martinique' ? 'selected' : null : null }}>Martinique</option>
                                        <option value="Mauritania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mauritania' ? 'selected' : null : null }}>Mauritania</option>
                                        <option value="Mauritius" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mauritius' ? 'selected' : null : null }}>Mauritius</option>
                                        <option value="Mayotte" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mayotte' ? 'selected' : null : null }}>Mayotte</option>
                                        <option value="Mexico" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mexico' ? 'selected' : null : null }}>Mexico</option>
                                        <option value="Micronesia, Federated States of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Micronesia, Federated States of' ? 'selected' : null : null }}>Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Moldova, Republic of' ? 'selected' : null : null }}>Moldova, Republic of</option>
                                        <option value="Monaco" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Monaco' ? 'selected' : null : null }}>Monaco</option>
                                        <option value="Mongolia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mongolia' ? 'selected' : null : null }}>Mongolia</option>
                                        <option value="Montenegro" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Montenegro' ? 'selected' : null : null }}>Montenegro</option>
                                        <option value="Montserrat" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Montserrat' ? 'selected' : null : null }}>Montserrat</option>
                                        <option value="Morocco" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Morocco' ? 'selected' : null : null }}>Morocco</option>
                                        <option value="Mozambique" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Mozambique' ? 'selected' : null : null }}>Mozambique</option>
                                        <option value="Myanmar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Myanmar' ? 'selected' : null : null }}>Myanmar</option>
                                        <option value="Namibia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Namibia' ? 'selected' : null : null }}>Namibia</option>
                                        <option value="Nauru" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nauru' ? 'selected' : null : null }}>Nauru</option>
                                        <option value="Nepal" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nepal' ? 'selected' : null : null }}>Nepal</option>
                                        <option value="Netherlands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Netherlands' ? 'selected' : null : null }}>Netherlands</option>
                                        <option value="Netherlands Antilles" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Netherlands Antilles' ? 'selected' : null : null }}>Netherlands Antilles</option>
                                        <option value="New Caledonia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'New Caledonia' ? 'selected' : null : null }}>New Caledonia</option>
                                        <option value="New Zealand" {{ isset($academicInfo) ? $academicInfo->degree_country == 'New Zealand' ? 'selected' : null : null }}>New Zealand</option>
                                        <option value="Nicaragua" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nicaragua' ? 'selected' : null : null }}>Nicaragua</option>
                                        <option value="Niger" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Niger' ? 'selected' : null : null }}>Niger</option>
                                        <option value="Nigeria" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Nigeria' ? 'selected' : null : null }}>Nigeria</option>
                                        <option value="Niue" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Niue' ? 'selected' : null : null }}>Niue</option>
                                        <option value="Norfolk Island" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Norfolk Island' ? 'selected' : null : null }}>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Northern Mariana Islands' ? 'selected' : null : null }}>Northern Mariana Islands</option>
                                        <option value="Norway" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Norway' ? 'selected' : null : null }}>Norway</option>
                                        <option value="Oman" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Oman' ? 'selected' : null : null }}>Oman</option>
                                        <option value="Pakistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Pakistan' ? 'selected' : null : null }}>Pakistan</option>
                                        <option value="Palau" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Palau' ? 'selected' : null : null }}>Palau</option>
                                        <option value="Palestinian Territory, Occupied" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Palestinian Territory, Occupied' ? 'selected' : null : null }}>Palestinian Territory, Occupied</option>
                                        <option value="Panama" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Panama' ? 'selected' : null : null }}>Panama</option>
                                        <option value="Papua New Guinea" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Papua New Guinea' ? 'selected' : null : null }}>Papua New Guinea</option>
                                        <option value="Paraguay" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Paraguay' ? 'selected' : null : null }}>Paraguay</option>
                                        <option value="Peru" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Peru' ? 'selected' : null : null }}>Peru</option>
                                        <option value="Philippines" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Philippines' ? 'selected' : null : null }}>Philippines</option>
                                        <option value="Pitcairn" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Pitcairn' ? 'selected' : null : null }}>Pitcairn</option>
                                        <option value="Poland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Poland' ? 'selected' : null : null }}>Poland</option>
                                        <option value="Portugal" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Portugal' ? 'selected' : null : null }}>Portugal</option>
                                        <option value="Puerto Rico" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Puerto Rico' ? 'selected' : null : null }}>Puerto Rico</option>
                                        <option value="Qatar" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Qatar' ? 'selected' : null : null }}>Qatar</option>
                                        <option value="Reunion" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Reunion' ? 'selected' : null : null }}>Reunion</option>
                                        <option value="Romania" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Romania' ? 'selected' : null : null }}>Romania</option>
                                        <option value="Russian Federation" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Russian Federation' ? 'selected' : null : null }}>Russian Federation</option>
                                        <option value="Rwanda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Rwanda' ? 'selected' : null : null }}>Rwanda</option>
                                        <option value="Saint Helena" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Helena' ? 'selected' : null : null }}>Saint Helena</option>
                                        <option value="Saint Kitts and Nevis" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Kitts and Nevis' ? 'selected' : null : null }}>Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Lucia' ? 'selected' : null : null }}>Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Pierre and Miquelon' ? 'selected' : null : null }}>Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saint Vincent and The Grenadines' ? 'selected' : null : null }}>Saint Vincent and The Grenadines</option>
                                        <option value="Samoa" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Samoa' ? 'selected' : null : null }}>Samoa</option>
                                        <option value="San Marino" {{ isset($academicInfo) ? $academicInfo->degree_country == 'San Marino' ? 'selected' : null : null }}>San Marino</option>
                                        <option value="Sao Tome and Principe" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sao Tome and Principe' ? 'selected' : null : null }}>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Saudi Arabia' ? 'selected' : null : null }}>Saudi Arabia</option>
                                        <option value="Senegal" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Senegal' ? 'selected' : null : null }}>Senegal</option>
                                        <option value="Serbia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Serbia' ? 'selected' : null : null }}>Serbia</option>
                                        <option value="Seychelles" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Seychelles' ? 'selected' : null : null }}>Seychelles</option>
                                        <option value="Sierra Leone" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sierra Leone' ? 'selected' : null : null }}>Sierra Leone</option>
                                        <option value="Singapore" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Singapore' ? 'selected' : null : null }}>Singapore</option>
                                        <option value="Slovakia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Slovakia' ? 'selected' : null : null }}>Slovakia</option>
                                        <option value="Slovenia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Slovenia' ? 'selected' : null : null }}>Slovenia</option>
                                        <option value="Solomon Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Solomon Islands' ? 'selected' : null : null }}>Solomon Islands</option>
                                        <option value="Somalia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Somalia' ? 'selected' : null : null }}>Somalia</option>
                                        <option value="South Africa" {{ isset($academicInfo) ? $academicInfo->degree_country == 'South Africa' ? 'selected' : null : null }}>South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'South Georgia and The South Sandwich Islands' ? 'selected' : null : null }}>South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Spain' ? 'selected' : null : null }}>Spain</option>
                                        <option value="Sri Lanka" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sri Lanka' ? 'selected' : null : null }}>Sri Lanka</option>
                                        <option value="Sudan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sudan' ? 'selected' : null : null }}>Sudan</option>
                                        <option value="Suriname" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Suriname' ? 'selected' : null : null }}>Suriname</option>
                                        <option value="Svalbard and Jan Mayen" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Svalbard and Jan Mayen' ? 'selected' : null : null }}>Svalbard and Jan Mayen</option>
                                        <option value="Swaziland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Swaziland' ? 'selected' : null : null }}>Swaziland</option>
                                        <option value="Sweden" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Sweden' ? 'selected' : null : null }}>Sweden</option>
                                        <option value="Switzerland" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Switzerland' ? 'selected' : null : null }}>Switzerland</option>
                                        <option value="Syrian Arab Republic" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Syrian Arab Republic' ? 'selected' : null : null }}>Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Taiwan, Province of China' ? 'selected' : null : null }}>Taiwan, Province of China</option>
                                        <option value="Tajikistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tajikistan' ? 'selected' : null : null }}>Tajikistan</option>
                                        <option value="Tanzania, United Republic of" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tanzania, United Republic of' ? 'selected' : null : null }}>Tanzania, United Republic of</option>
                                        <option value="Thailand" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Thailand' ? 'selected' : null : null }}>Thailand</option>
                                        <option value="Timor-leste" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Timor-leste' ? 'selected' : null : null }}>Timor-leste</option>
                                        <option value="Togo" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Togo' ? 'selected' : null : null }}>Togo</option>
                                        <option value="Tokelau" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tokelau' ? 'selected' : null : null }}>Tokelau</option>
                                        <option value="Tonga" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tonga' ? 'selected' : null : null }}>Tonga</option>
                                        <option value="Trinidad and Tobago" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Trinidad and Tobago' ? 'selected' : null : null }}>Trinidad and Tobago</option>
                                        <option value="Tunisia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tunisia' ? 'selected' : null : null }}>Tunisia</option>
                                        <option value="Turkey" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Turkey' ? 'selected' : null : null }}>Turkey</option>
                                        <option value="Turkmenistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Turkmenistan' ? 'selected' : null : null }}>Turkmenistan</option>
                                        <option value="Turks and Caicos Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Turks and Caicos Islands' ? 'selected' : null : null }}>Turks and Caicos Islands</option>
                                        <option value="Tuvalu" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Tuvalu' ? 'selected' : null : null }}>Tuvalu</option>
                                        <option value="Uganda" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Uganda' ? 'selected' : null : null }}>Uganda</option>
                                        <option value="Ukraine" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Ukraine' ? 'selected' : null : null }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United Arab Emirates' ? 'selected' : null : null }}>United Arab Emirates</option>
                                        <option value="United Kingdom" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United Kingdom' ? 'selected' : null : null }}>United Kingdom</option>
                                        <option value="United States" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United States' ? 'selected' : null : null }}>United States</option>
                                        <option value="United States Minor Outlying Islands" {{ isset($academicInfo) ? $academicInfo->degree_country == 'United States Minor Outlying Islands' ? 'selected' : null : null }}>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Uruguay' ? 'selected' : null : null }}>Uruguay</option>
                                        <option value="Uzbekistan" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Uzbekistan' ? 'selected' : null : null }}>Uzbekistan</option>
                                        <option value="Vanuatu" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Vanuatu' ? 'selected' : null : null }}>Vanuatu</option>
                                        <option value="Venezuela" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Venezuela' ? 'selected' : null : null }}>Venezuela</option>
                                        <option value="Vietnam" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Vietnam' ? 'selected' : null : null }}>Vietnam</option>
                                        <option value="Virgin Islands, British" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Virgin Islands, British' ? 'selected' : null : null }}>Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S." {{ isset($academicInfo) ? $academicInfo->degree_country == 'Virgin Islands, U.S.' ? 'selected' : null : null }}>Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Wallis and Futuna' ? 'selected' : null : null }}>Wallis and Futuna</option>
                                        <option value="Western Sahara" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Western Sahara' ? 'selected' : null : null }}>Western Sahara</option>
                                        <option value="Yemen" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Yemen' ? 'selected' : null : null }}>Yemen</option>
                                        <option value="Zambia" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Zambia' ? 'selected' : null : null }}>Zambia</option>
                                        <option value="Zimbabwe" {{ isset($academicInfo) ? $academicInfo->degree_country == 'Zimbabwe' ? 'selected' : null : null }}>Zimbabwe</option>
                                    </select>
                                    @if($errors->has('degree_country'))
                                        <span class="text-danger">{{ $errors->first('degree_country') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label style="float: right">اسم المدرسة</label>
                                    <br>
                                    <input type="text" id="school_name" name="school_name" value="{{ isset($academicInfo) ? $academicInfo->school_name : null }}" placeholder="اكتب اسم مدرستك" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label style="float: right">النسبة المئوية %</label>
                                    <br>
                                    <input type="number" id="gpa_precentage" name="gpa_precentage" step=".01" value="{{ isset($academicInfo) ? $academicInfo->gpa_precentage : null }}" placeholder="اكتب النسبة المئوية الخاصة بك" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>النظام التعليمي</label>
                                    <select class="d-block" name="education_system" id="education_system" required>
                                        <option value="">اختر</option>
                                        <option value="علمي علوم" {{ isset($academicInfo) ? $academicInfo->education_system == 'علمي علوم' ? 'selected' : null : null }}>علمي علوم</option>
                                        <option value="علمي رياضة" {{ isset($academicInfo) ? $academicInfo->education_system == 'علمي رياضة' ? 'selected' : null : null }}>علمي رياضة</option>
                                        <option value="ادبي" {{ isset($academicInfo) ? $academicInfo->education_system == 'ادبي' ? 'selected' : null : null }}>ادبي</option>
                                    </select>
                                    @if($errors->has('education_system'))
                                        <span class="text-danger">{{ $errors->first('education_system') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="readon register-btn"><span class="txt">ابدا الان</span></button>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Register Section --> 
    </div>
    @endif
    <!-- Main content End --> 

    @include('frontend.layouts.footer')
@endsection