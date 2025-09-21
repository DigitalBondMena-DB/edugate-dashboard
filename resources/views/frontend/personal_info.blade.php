@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | Personal Information
    @else
        EduGate | المعلومات الشخصية
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
                        <li>Personal Information</li>
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
                            <h2 class="title mb-10">Personal Information</h2>
                        </div>
                        
                        <div class="styled-form">
                            {{-- <div id="form-messages"></div> --}}
                            <form action="{{ route('submit-personal-info') }}" method="POST">
                                @csrf                               
                                <div class="row clearfix">
                                    
                                    <div class="form-group col-lg-6">
                                        <label>Full Name</label>
                                        <input type="text" id="full_name" name="full_name" value="{{ isset($userPersonalInfo) ? $userPersonalInfo->full_name : null }}" placeholder="Write full name" required>
                                        @if($errors->has('full_name'))
                                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Country of Residence</label>
                                        <select id="nation" name="nation" class="d-block" required>
                                            <option value="Afghanistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Afghanistan' ? 'selected' : null : null }}>Afghanistan</option>
                                            <option value="Åland Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Åland Islands' ? 'selected' : null : null }}>Åland Islands</option>
                                            <option value="Albania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Albania' ? 'selected' : null : null }}>Albania</option>
                                            <option value="Algeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Algeria' ? 'selected' : null : null }}>Algeria</option>
                                            <option value="American Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'American Samoa' ? 'selected' : null : null }}>American Samoa</option>
                                            <option value="Andorra" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Andorra' ? 'selected' : null : null }}>Andorra</option>
                                            <option value="Angola" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Angola' ? 'selected' : null : null }}>Angola</option>
                                            <option value="Anguilla" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Anguilla' ? 'selected' : null : null }}>Anguilla</option>
                                            <option value="Antarctica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Antarctica' ? 'selected' : null : null }}>Antarctica</option>
                                            <option value="Antigua and Barbuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Antigua and Barbuda' ? 'selected' : null : null }}>Antigua and Barbuda</option>
                                            <option value="Argentina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Argentina' ? 'selected' : null : null }}>Argentina</option>
                                            <option value="Armenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Armenia' ? 'selected' : null : null }}>Armenia</option>
                                            <option value="Aruba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Aruba' ? 'selected' : null : null }}>Aruba</option>
                                            <option value="Australia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Australia' ? 'selected' : null : null }}>Australia</option>
                                            <option value="Austria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Austria' ? 'selected' : null : null }}>Austria</option>
                                            <option value="Azerbaijan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Azerbaijan' ? 'selected' : null : null }}>Azerbaijan</option>
                                            <option value="Bahamas" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bahamas' ? 'selected' : null : null }}>Bahamas</option>
                                            <option value="Bahrain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bahrain' ? 'selected' : null : null }}>Bahrain</option>
                                            <option value="Bangladesh" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bangladesh' ? 'selected' : null : null }}>Bangladesh</option>
                                            <option value="Barbados" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Barbados' ? 'selected' : null : null }}>Barbados</option>
                                            <option value="Belarus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Belarus' ? 'selected' : null : null }}>Belarus</option>
                                            <option value="Belgium" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Belgium' ? 'selected' : null : null }}>Belgium</option>
                                            <option value="Belize" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Belize' ? 'selected' : null : null }}>Belize</option>
                                            <option value="Benin" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Benin' ? 'selected' : null : null }}>Benin</option>
                                            <option value="Bermuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bermuda' ? 'selected' : null : null }}>Bermuda</option>
                                            <option value="Bhutan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bhutan' ? 'selected' : null : null }}>Bhutan</option>
                                            <option value="Bolivia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bolivia' ? 'selected' : null : null }}>Bolivia</option>
                                            <option value="Bosnia and Herzegovina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bosnia and Herzegovina' ? 'selected' : null : null }}>Bosnia and Herzegovina</option>
                                            <option value="Botswana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Botswana' ? 'selected' : null : null }}>Botswana</option>
                                            <option value="Bouvet Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bouvet Island' ? 'selected' : null : null }}>Bouvet Island</option>
                                            <option value="Brazil" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Brazil' ? 'selected' : null : null }}>Brazil</option>
                                            <option value="British Indian Ocean Territory" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'British Indian Ocean Territory' ? 'selected' : null : null }}>British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Brunei Darussalam' ? 'selected' : null : null }}>Brunei Darussalam</option>
                                            <option value="Bulgaria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bulgaria' ? 'selected' : null : null }}>Bulgaria</option>
                                            <option value="Burkina Faso" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Burkina Faso' ? 'selected' : null : null }}>Burkina Faso</option>
                                            <option value="Burundi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Burundi' ? 'selected' : null : null }}>Burundi</option>
                                            <option value="Cambodia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cambodia' ? 'selected' : null : null }}>Cambodia</option>
                                            <option value="Cameroon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cameroon' ? 'selected' : null : null }}>Cameroon</option>
                                            <option value="Canada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Canada' ? 'selected' : null : null }}>Canada</option>
                                            <option value="Cape Verde" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cape Verde' ? 'selected' : null : null }}>Cape Verde</option>
                                            <option value="Cayman Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cayman Island' ? 'selected' : null : null }}>Cayman Islands</option>
                                            <option value="Central African Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Central African Republic' ? 'selected' : null : null }}>Central African Republic</option>
                                            <option value="Chad" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Chad' ? 'selected' : null : null }}>Chad</option>
                                            <option value="Chile" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Chile' ? 'selected' : null : null }}>Chile</option>
                                            <option value="China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'China' ? 'selected' : null : null }}>China</option>
                                            <option value="Christmas Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Christmas Island' ? 'selected' : null : null }}>Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cocos (Keeling) Islands' ? 'selected' : null : null }}>Cocos (Keeling) Islands</option>
                                            <option value="Colombia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Colombia' ? 'selected' : null : null }}>Colombia</option>
                                            <option value="Comoros" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Comoros' ? 'selected' : null : null }}>Comoros</option>
                                            <option value="Congo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Congo' ? 'selected' : null : null }}>Congo</option>
                                            <option value="Congo, The Democratic Republic of The" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Congo, The Democratic Republic of The' ? 'selected' : null : null }}>Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cook Islands' ? 'selected' : null : null }}>Cook Islands</option>
                                            <option value="Costa Rica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Costa Rica' ? 'selected' : null : null }}>Costa Rica</option>
                                            <option value="Cote D'ivoire" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == "Cote D'ivoire" ? 'selected' : null : null }}>Cote D'ivoire</option>
                                            <option value="Croatia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Croatia' ? 'selected' : null : null }}>Croatia</option>
                                            <option value="Cuba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cuba' ? 'selected' : null : null }}>Cuba</option>
                                            <option value="Cyprus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cyprus' ? 'selected' : null : null }}>Cyprus</option>
                                            <option value="Czech Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Czech Republic' ? 'selected' : null : null }}>Czech Republic</option>
                                            <option value="Denmark" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Denmark' ? 'selected' : null : null }}>Denmark</option>
                                            <option value="Djibouti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Djibouti' ? 'selected' : null : null }}>Djibouti</option>
                                            <option value="Dominica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Dominica' ? 'selected' : null : null }}>Dominica</option>
                                            <option value="Dominican Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Dominican Republic' ? 'selected' : null : null }}>Dominican Republic</option>
                                            <option value="Ecuador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ecuador' ? 'selected' : null : null }}>Ecuador</option>
                                            <option value="Egypt" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Egypt' ? 'selected' : null : null }}>Egypt</option>
                                            <option value="El Salvador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'El Salvador' ? 'selected' : null : null }}>El Salvador</option>
                                            <option value="Equatorial Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Equatorial Guinea' ? 'selected' : null : null }}>Equatorial Guinea</option>
                                            <option value="Eritrea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Eritrea' ? 'selected' : null : null }}>Eritrea</option>
                                            <option value="Estonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Estonia' ? 'selected' : null : null }}>Estonia</option>
                                            <option value="Ethiopia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ethiopia' ? 'selected' : null : null }}>Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas) {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Falkland Islands (Malvinas)' ? 'selected' : null : null }}">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Faroe Islands' ? 'selected' : null : null }}>Faroe Islands</option>
                                            <option value="Fiji" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Fiji' ? 'selected' : null : null }}>Fiji</option>
                                            <option value="Finland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Finland' ? 'selected' : null : null }}>Finland</option>
                                            <option value="France" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'France' ? 'selected' : null : null }}>France</option>
                                            <option value="French Guiana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'French Guiana' ? 'selected' : null : null }}>French Guiana</option>
                                            <option value="French Polynesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'French Polynesia' ? 'selected' : null : null }}>French Polynesia</option>
                                            <option value="French Southern Territories" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'French Southern Territories' ? 'selected' : null : null }}>French Southern Territories</option>
                                            <option value="Gabon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Gabon' ? 'selected' : null : null }}>Gabon</option>
                                            <option value="Gambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Gambia' ? 'selected' : null : null }}>Gambia</option>
                                            <option value="Georgia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Georgia' ? 'selected' : null : null }}>Georgia</option>
                                            <option value="Germany" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Germany' ? 'selected' : null : null }}>Germany</option>
                                            <option value="Ghana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ghana' ? 'selected' : null : null }}>Ghana</option>
                                            <option value="Gibraltar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Gibraltar' ? 'selected' : null : null }}>Gibraltar</option>
                                            <option value="Greece" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Greece' ? 'selected' : null : null }}>Greece</option>
                                            <option value="Greenland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Greenland' ? 'selected' : null : null }}>Greenland</option>
                                            <option value="Grenada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Grenada' ? 'selected' : null : null }}>Grenada</option>
                                            <option value="Guadeloupe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guadeloupe' ? 'selected' : null : null }}>Guadeloupe</option>
                                            <option value="Guam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guam' ? 'selected' : null : null }}>Guam</option>
                                            <option value="Guatemala" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guatemala' ? 'selected' : null : null }}>Guatemala</option>
                                            <option value="Guernsey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guernsey' ? 'selected' : null : null }}>Guernsey</option>
                                            <option value="Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guinea' ? 'selected' : null : null }}>Guinea</option>
                                            <option value="Guinea-bissau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guinea-bissau' ? 'selected' : null : null }}>Guinea-bissau</option>
                                            <option value="Guyana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guyana' ? 'selected' : null : null }}>Guyana</option>
                                            <option value="Haiti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Haiti' ? 'selected' : null : null }}>Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Heard Island and Mcdonald Islands' ? 'selected' : null : null }}>Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Holy See (Vatican City State)' ? 'selected' : null : null }}>Holy See (Vatican City State)</option>
                                            <option value="Honduras" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Honduras' ? 'selected' : null : null }}>Honduras</option>
                                            <option value="Hong Kong" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Hong Kong' ? 'selected' : null : null }}>Hong Kong</option>
                                            <option value="Hungary" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Hungary' ? 'selected' : null : null }}>Hungary</option>
                                            <option value="Iceland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Iceland' ? 'selected' : null : null }}>Iceland</option>
                                            <option value="India" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'India' ? 'selected' : null : null }}>India</option>
                                            <option value="Indonesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Indonesia' ? 'selected' : null : null }}>Indonesia</option>
                                            <option value="Iran, Islamic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Iran, Islamic Republic' ? 'selected' : null : null }}>Iran, Islamic Republic of</option>
                                            <option value="Iraq" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Iraq' ? 'selected' : null : null }}>Iraq</option>
                                            <option value="Ireland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ireland' ? 'selected' : null : null }}>Ireland</option>
                                            <option value="Isle of Man" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Isle of Man' ? 'selected' : null : null }}>Isle of Man</option>
                                            <option value="Israel" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Israel' ? 'selected' : null : null }}>Israel</option>
                                            <option value="Italy" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Italy' ? 'selected' : null : null }}>Italy</option>
                                            <option value="Jamaica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Jamaica' ? 'selected' : null : null }}>Jamaica</option>
                                            <option value="Japan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Japan' ? 'selected' : null : null }}>Japan</option>
                                            <option value="Jersey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Jersey' ? 'selected' : null : null }}>Jersey</option>
                                            <option value="Jordan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Jordan' ? 'selected' : null : null }}>Jordan</option>
                                            <option value="Kazakhstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kazakhstan' ? 'selected' : null : null }}>Kazakhstan</option>
                                            <option value="Kenya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kenya' ? 'selected' : null : null }}>Kenya</option>
                                            <option value="Kiribati" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kiribati' ? 'selected' : null : null }}>Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Korea, Democratic People\'s Republic of' ? 'selected' : null : null }}>Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Korea, Republic of' ? 'selected' : null : null }}>Korea, Republic of</option>
                                            <option value="Kuwait" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kuwait' ? 'selected' : null : null }}>Kuwait</option>
                                            <option value="Kyrgyzstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kyrgyzstan' ? 'selected' : null : null }}>Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lao People\'s Democratic Republic' ? 'selected' : null : null }}>Lao People's Democratic Republic</option>
                                            <option value="Latvia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Latvia' ? 'selected' : null : null }}>Latvia</option>
                                            <option value="Lebanon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lebanon' ? 'selected' : null : null }}>Lebanon</option>
                                            <option value="Lesotho" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lesotho' ? 'selected' : null : null }}>Lesotho</option>
                                            <option value="Liberia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Liberia' ? 'selected' : null : null }}>Liberia</option>
                                            <option value="Libyan Arab Jamahiriya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Libyan Arab Jamahiriya' ? 'selected' : null : null }}>Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Liechtenstein' ? 'selected' : null : null }}>Liechtenstein</option>
                                            <option value="Lithuania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lithuania' ? 'selected' : null : null }}>Lithuania</option>
                                            <option value="Luxembourg" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Luxembourg' ? 'selected' : null : null }}>Luxembourg</option>
                                            <option value="Macao" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Macao' ? 'selected' : null : null }}>Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : null : null }}>Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Madagascar' ? 'selected' : null : null }}>Madagascar</option>
                                            <option value="Malawi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Malawi' ? 'selected' : null : null }}>Malawi</option>
                                            <option value="Malaysia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Malaysia' ? 'selected' : null : null }}>Malaysia</option>
                                            <option value="Maldives" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Maldives' ? 'selected' : null : null }}>Maldives</option>
                                            <option value="Mali" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mali' ? 'selected' : null : null }}>Mali</option>
                                            <option value="Malta" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Malta' ? 'selected' : null : null }}>Malta</option>
                                            <option value="Marshall Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Marshall Islands' ? 'selected' : null : null }}>Marshall Islands</option>
                                            <option value="Martinique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Martinique' ? 'selected' : null : null }}>Martinique</option>
                                            <option value="Mauritania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mauritania' ? 'selected' : null : null }}>Mauritania</option>
                                            <option value="Mauritius" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mauritius' ? 'selected' : null : null }}>Mauritius</option>
                                            <option value="Mayotte" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mayotte' ? 'selected' : null : null }}>Mayotte</option>
                                            <option value="Mexico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mexico' ? 'selected' : null : null }}>Mexico</option>
                                            <option value="Micronesia, Federated States of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Micronesia, Federated States of' ? 'selected' : null : null }}>Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Moldova, Republic of' ? 'selected' : null : null }}>Moldova, Republic of</option>
                                            <option value="Monaco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Monaco' ? 'selected' : null : null }}>Monaco</option>
                                            <option value="Mongolia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mongolia' ? 'selected' : null : null }}>Mongolia</option>
                                            <option value="Montenegro" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Montenegro' ? 'selected' : null : null }}>Montenegro</option>
                                            <option value="Montserrat" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Montserrat' ? 'selected' : null : null }}>Montserrat</option>
                                            <option value="Morocco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Morocco' ? 'selected' : null : null }}>Morocco</option>
                                            <option value="Mozambique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mozambique' ? 'selected' : null : null }}>Mozambique</option>
                                            <option value="Myanmar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Myanmar' ? 'selected' : null : null }}>Myanmar</option>
                                            <option value="Namibia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Namibia' ? 'selected' : null : null }}>Namibia</option>
                                            <option value="Nauru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nauru' ? 'selected' : null : null }}>Nauru</option>
                                            <option value="Nepal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nepal' ? 'selected' : null : null }}>Nepal</option>
                                            <option value="Netherlands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Netherlands' ? 'selected' : null : null }}>Netherlands</option>
                                            <option value="Netherlands Antilles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Netherlands Antilles' ? 'selected' : null : null }}>Netherlands Antilles</option>
                                            <option value="New Caledonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'New Caledonia' ? 'selected' : null : null }}>New Caledonia</option>
                                            <option value="New Zealand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'New Zealand' ? 'selected' : null : null }}>New Zealand</option>
                                            <option value="Nicaragua" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nicaragua' ? 'selected' : null : null }}>Nicaragua</option>
                                            <option value="Niger" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Niger' ? 'selected' : null : null }}>Niger</option>
                                            <option value="Nigeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nigeria' ? 'selected' : null : null }}>Nigeria</option>
                                            <option value="Niue" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Niue' ? 'selected' : null : null }}>Niue</option>
                                            <option value="Norfolk Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Norfolk Island' ? 'selected' : null : null }}>Norfolk Island</option>
                                            <option value="Northern Mariana Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Northern Mariana Islands' ? 'selected' : null : null }}>Northern Mariana Islands</option>
                                            <option value="Norway" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Norway' ? 'selected' : null : null }}>Norway</option>
                                            <option value="Oman" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Oman' ? 'selected' : null : null }}>Oman</option>
                                            <option value="Pakistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Pakistan' ? 'selected' : null : null }}>Pakistan</option>
                                            <option value="Palau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Palau' ? 'selected' : null : null }}>Palau</option>
                                            <option value="Palestinian Territory, Occupied" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Palestinian Territory, Occupied' ? 'selected' : null : null }}>Palestinian Territory, Occupied</option>
                                            <option value="Panama" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Panama' ? 'selected' : null : null }}>Panama</option>
                                            <option value="Papua New Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Papua New Guinea' ? 'selected' : null : null }}>Papua New Guinea</option>
                                            <option value="Paraguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Paraguay' ? 'selected' : null : null }}>Paraguay</option>
                                            <option value="Peru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Peru' ? 'selected' : null : null }}>Peru</option>
                                            <option value="Philippines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Philippines' ? 'selected' : null : null }}>Philippines</option>
                                            <option value="Pitcairn" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Pitcairn' ? 'selected' : null : null }}>Pitcairn</option>
                                            <option value="Poland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Poland' ? 'selected' : null : null }}>Poland</option>
                                            <option value="Portugal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Portugal' ? 'selected' : null : null }}>Portugal</option>
                                            <option value="Puerto Rico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Puerto Rico' ? 'selected' : null : null }}>Puerto Rico</option>
                                            <option value="Qatar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Qatar' ? 'selected' : null : null }}>Qatar</option>
                                            <option value="Reunion" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Reunion' ? 'selected' : null : null }}>Reunion</option>
                                            <option value="Romania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Romania' ? 'selected' : null : null }}>Romania</option>
                                            <option value="Russian Federation" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Russian Federation' ? 'selected' : null : null }}>Russian Federation</option>
                                            <option value="Rwanda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Rwanda' ? 'selected' : null : null }}>Rwanda</option>
                                            <option value="Saint Helena" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Helena' ? 'selected' : null : null }}>Saint Helena</option>
                                            <option value="Saint Kitts and Nevis" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Kitts and Nevis' ? 'selected' : null : null }}>Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Lucia' ? 'selected' : null : null }}>Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Pierre and Miquelon' ? 'selected' : null : null }}>Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Vincent and The Grenadines' ? 'selected' : null : null }}>Saint Vincent and The Grenadines</option>
                                            <option value="Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Samoa' ? 'selected' : null : null }}>Samoa</option>
                                            <option value="San Marino" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'San Marino' ? 'selected' : null : null }}>San Marino</option>
                                            <option value="Sao Tome and Principe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sao Tome and Principe' ? 'selected' : null : null }}>Sao Tome and Principe</option>
                                            <option value="Saudi Arabia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saudi Arabia' ? 'selected' : null : null }}>Saudi Arabia</option>
                                            <option value="Senegal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Senegal' ? 'selected' : null : null }}>Senegal</option>
                                            <option value="Serbia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Serbia' ? 'selected' : null : null }}>Serbia</option>
                                            <option value="Seychelles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Seychelles' ? 'selected' : null : null }}>Seychelles</option>
                                            <option value="Sierra Leone" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sierra Leone' ? 'selected' : null : null }}>Sierra Leone</option>
                                            <option value="Singapore" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Singapore' ? 'selected' : null : null }}>Singapore</option>
                                            <option value="Slovakia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Slovakia' ? 'selected' : null : null }}>Slovakia</option>
                                            <option value="Slovenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Slovenia' ? 'selected' : null : null }}>Slovenia</option>
                                            <option value="Solomon Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Solomon Islands' ? 'selected' : null : null }}>Solomon Islands</option>
                                            <option value="Somalia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Somalia' ? 'selected' : null : null }}>Somalia</option>
                                            <option value="South Africa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'South Africa' ? 'selected' : null : null }}>South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'South Georgia and The South Sandwich Islands' ? 'selected' : null : null }}>South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Spain' ? 'selected' : null : null }}>Spain</option>
                                            <option value="Sri Lanka" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sri Lanka' ? 'selected' : null : null }}>Sri Lanka</option>
                                            <option value="Sudan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sudan' ? 'selected' : null : null }}>Sudan</option>
                                            <option value="Suriname" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Suriname' ? 'selected' : null : null }}>Suriname</option>
                                            <option value="Svalbard and Jan Mayen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Svalbard and Jan Mayen' ? 'selected' : null : null }}>Svalbard and Jan Mayen</option>
                                            <option value="Swaziland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Swaziland' ? 'selected' : null : null }}>Swaziland</option>
                                            <option value="Sweden" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sweden' ? 'selected' : null : null }}>Sweden</option>
                                            <option value="Switzerland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Switzerland' ? 'selected' : null : null }}>Switzerland</option>
                                            <option value="Syrian Arab Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Syrian Arab Republic' ? 'selected' : null : null }}>Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Taiwan, Province of China' ? 'selected' : null : null }}>Taiwan, Province of China</option>
                                            <option value="Tajikistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tajikistan' ? 'selected' : null : null }}>Tajikistan</option>
                                            <option value="Tanzania, United Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tanzania, United Republic of' ? 'selected' : null : null }}>Tanzania, United Republic of</option>
                                            <option value="Thailand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Thailand' ? 'selected' : null : null }}>Thailand</option>
                                            <option value="Timor-leste" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Timor-leste' ? 'selected' : null : null }}>Timor-leste</option>
                                            <option value="Togo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Togo' ? 'selected' : null : null }}>Togo</option>
                                            <option value="Tokelau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tokelau' ? 'selected' : null : null }}>Tokelau</option>
                                            <option value="Tonga" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tonga' ? 'selected' : null : null }}>Tonga</option>
                                            <option value="Trinidad and Tobago" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Trinidad and Tobago' ? 'selected' : null : null }}>Trinidad and Tobago</option>
                                            <option value="Tunisia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tunisia' ? 'selected' : null : null }}>Tunisia</option>
                                            <option value="Turkey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Turkey' ? 'selected' : null : null }}>Turkey</option>
                                            <option value="Turkmenistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Turkmenistan' ? 'selected' : null : null }}>Turkmenistan</option>
                                            <option value="Turks and Caicos Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Turks and Caicos Islands' ? 'selected' : null : null }}>Turks and Caicos Islands</option>
                                            <option value="Tuvalu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tuvalu' ? 'selected' : null : null }}>Tuvalu</option>
                                            <option value="Uganda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Uganda' ? 'selected' : null : null }}>Uganda</option>
                                            <option value="Ukraine" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ukraine' ? 'selected' : null : null }}>Ukraine</option>
                                            <option value="United Arab Emirates" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United Arab Emirates' ? 'selected' : null : null }}>United Arab Emirates</option>
                                            <option value="United Kingdom" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United Kingdom' ? 'selected' : null : null }}>United Kingdom</option>
                                            <option value="United States" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United States' ? 'selected' : null : null }}>United States</option>
                                            <option value="United States Minor Outlying Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United States Minor Outlying Islands' ? 'selected' : null : null }}>United States Minor Outlying Islands</option>
                                            <option value="Uruguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Uruguay' ? 'selected' : null : null }}>Uruguay</option>
                                            <option value="Uzbekistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Uzbekistan' ? 'selected' : null : null }}>Uzbekistan</option>
                                            <option value="Vanuatu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Vanuatu' ? 'selected' : null : null }}>Vanuatu</option>
                                            <option value="Venezuela" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Venezuela' ? 'selected' : null : null }}>Venezuela</option>
                                            <option value="Vietnam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Vietnam' ? 'selected' : null : null }}>Vietnam</option>
                                            <option value="Virgin Islands, British" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Virgin Islands, British' ? 'selected' : null : null }}>Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S." {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Virgin Islands, U.S.' ? 'selected' : null : null }}>Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Wallis and Futuna' ? 'selected' : null : null }}>Wallis and Futuna</option>
                                            <option value="Western Sahara" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Western Sahara' ? 'selected' : null : null }}>Western Sahara</option>
                                            <option value="Yemen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Yemen' ? 'selected' : null : null }}>Yemen</option>
                                            <option value="Zambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Zambia' ? 'selected' : null : null }}>Zambia</option>
                                            <option value="Zimbabwe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Zimbabwe' ? 'selected' : null : null }}>Zimbabwe</option>
                                        </select>
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <label>Nationality</label>
                                        <select id="nationality" name="nationality" class="d-block" required>
                                            <option value="Afghanistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Afghanistan' ? 'selected' : null : null }}>Afghanistan</option>
                                            <option value="Åland Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Åland Islands' ? 'selected' : null : null }}>Åland Islands</option>
                                            <option value="Albania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Albania' ? 'selected' : null : null }}>Albania</option>
                                            <option value="Algeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Algeria' ? 'selected' : null : null }}>Algeria</option>
                                            <option value="American Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'American Samoa' ? 'selected' : null : null }}>American Samoa</option>
                                            <option value="Andorra" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Andorra' ? 'selected' : null : null }}>Andorra</option>
                                            <option value="Angola" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Angola' ? 'selected' : null : null }}>Angola</option>
                                            <option value="Anguilla" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Anguilla' ? 'selected' : null : null }}>Anguilla</option>
                                            <option value="Antarctica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Antarctica' ? 'selected' : null : null }}>Antarctica</option>
                                            <option value="Antigua and Barbuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Antigua and Barbuda' ? 'selected' : null : null }}>Antigua and Barbuda</option>
                                            <option value="Argentina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Argentina' ? 'selected' : null : null }}>Argentina</option>
                                            <option value="Armenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Armenia' ? 'selected' : null : null }}>Armenia</option>
                                            <option value="Aruba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Aruba' ? 'selected' : null : null }}>Aruba</option>
                                            <option value="Australia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Australia' ? 'selected' : null : null }}>Australia</option>
                                            <option value="Austria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Austria' ? 'selected' : null : null }}>Austria</option>
                                            <option value="Azerbaijan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Azerbaijan' ? 'selected' : null : null }}>Azerbaijan</option>
                                            <option value="Bahamas" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bahamas' ? 'selected' : null : null }}>Bahamas</option>
                                            <option value="Bahrain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bahrain' ? 'selected' : null : null }}>Bahrain</option>
                                            <option value="Bangladesh" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bangladesh' ? 'selected' : null : null }}>Bangladesh</option>
                                            <option value="Barbados" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Barbados' ? 'selected' : null : null }}>Barbados</option>
                                            <option value="Belarus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Belarus' ? 'selected' : null : null }}>Belarus</option>
                                            <option value="Belgium" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Belgium' ? 'selected' : null : null }}>Belgium</option>
                                            <option value="Belize" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Belize' ? 'selected' : null : null }}>Belize</option>
                                            <option value="Benin" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Benin' ? 'selected' : null : null }}>Benin</option>
                                            <option value="Bermuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bermuda' ? 'selected' : null : null }}>Bermuda</option>
                                            <option value="Bhutan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bhutan' ? 'selected' : null : null }}>Bhutan</option>
                                            <option value="Bolivia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bolivia' ? 'selected' : null : null }}>Bolivia</option>
                                            <option value="Bosnia and Herzegovina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bosnia and Herzegovina' ? 'selected' : null : null }}>Bosnia and Herzegovina</option>
                                            <option value="Botswana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Botswana' ? 'selected' : null : null }}>Botswana</option>
                                            <option value="Bouvet Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bouvet Island' ? 'selected' : null : null }}>Bouvet Island</option>
                                            <option value="Brazil" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Brazil' ? 'selected' : null : null }}>Brazil</option>
                                            <option value="British Indian Ocean Territory" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'British Indian Ocean Territory' ? 'selected' : null : null }}>British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Brunei Darussalam' ? 'selected' : null : null }}>Brunei Darussalam</option>
                                            <option value="Bulgaria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bulgaria' ? 'selected' : null : null }}>Bulgaria</option>
                                            <option value="Burkina Faso" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Burkina Faso' ? 'selected' : null : null }}>Burkina Faso</option>
                                            <option value="Burundi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Burundi' ? 'selected' : null : null }}>Burundi</option>
                                            <option value="Cambodia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cambodia' ? 'selected' : null : null }}>Cambodia</option>
                                            <option value="Cameroon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cameroon' ? 'selected' : null : null }}>Cameroon</option>
                                            <option value="Canada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Canada' ? 'selected' : null : null }}>Canada</option>
                                            <option value="Cape Verde" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cape Verde' ? 'selected' : null : null }}>Cape Verde</option>
                                            <option value="Cayman Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cayman Island' ? 'selected' : null : null }}>Cayman Islands</option>
                                            <option value="Central African Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Central African Republic' ? 'selected' : null : null }}>Central African Republic</option>
                                            <option value="Chad" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Chad' ? 'selected' : null : null }}>Chad</option>
                                            <option value="Chile" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Chile' ? 'selected' : null : null }}>Chile</option>
                                            <option value="China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'China' ? 'selected' : null : null }}>China</option>
                                            <option value="Christmas Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Christmas Island' ? 'selected' : null : null }}>Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cocos (Keeling) Islands' ? 'selected' : null : null }}>Cocos (Keeling) Islands</option>
                                            <option value="Colombia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Colombia' ? 'selected' : null : null }}>Colombia</option>
                                            <option value="Comoros" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Comoros' ? 'selected' : null : null }}>Comoros</option>
                                            <option value="Congo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Congo' ? 'selected' : null : null }}>Congo</option>
                                            <option value="Congo, The Democratic Republic of The" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Congo, The Democratic Republic of The' ? 'selected' : null : null }}>Congo, The Democratic Republic of The</option>
                                            <option value="Cook Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cook Islands' ? 'selected' : null : null }}>Cook Islands</option>
                                            <option value="Costa Rica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Costa Rica' ? 'selected' : null : null }}>Costa Rica</option>
                                            <option value="Cote D'ivoire" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == "Cote D'ivoire" ? 'selected' : null : null }}>Cote D'ivoire</option>
                                            <option value="Croatia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Croatia' ? 'selected' : null : null }}>Croatia</option>
                                            <option value="Cuba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cuba' ? 'selected' : null : null }}>Cuba</option>
                                            <option value="Cyprus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cyprus' ? 'selected' : null : null }}>Cyprus</option>
                                            <option value="Czech Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Czech Republic' ? 'selected' : null : null }}>Czech Republic</option>
                                            <option value="Denmark" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Denmark' ? 'selected' : null : null }}>Denmark</option>
                                            <option value="Djibouti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Djibouti' ? 'selected' : null : null }}>Djibouti</option>
                                            <option value="Dominica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Dominica' ? 'selected' : null : null }}>Dominica</option>
                                            <option value="Dominican Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Dominican Republic' ? 'selected' : null : null }}>Dominican Republic</option>
                                            <option value="Ecuador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ecuador' ? 'selected' : null : null }}>Ecuador</option>
                                            <option value="Egypt" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Egypt' ? 'selected' : null : null }}>Egypt</option>
                                            <option value="El Salvador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'El Salvador' ? 'selected' : null : null }}>El Salvador</option>
                                            <option value="Equatorial Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Equatorial Guinea' ? 'selected' : null : null }}>Equatorial Guinea</option>
                                            <option value="Eritrea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Eritrea' ? 'selected' : null : null }}>Eritrea</option>
                                            <option value="Estonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Estonia' ? 'selected' : null : null }}>Estonia</option>
                                            <option value="Ethiopia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ethiopia' ? 'selected' : null : null }}>Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas) {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Falkland Islands (Malvinas)' ? 'selected' : null : null }}">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Faroe Islands' ? 'selected' : null : null }}>Faroe Islands</option>
                                            <option value="Fiji" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Fiji' ? 'selected' : null : null }}>Fiji</option>
                                            <option value="Finland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Finland' ? 'selected' : null : null }}>Finland</option>
                                            <option value="France" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'France' ? 'selected' : null : null }}>France</option>
                                            <option value="French Guiana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'French Guiana' ? 'selected' : null : null }}>French Guiana</option>
                                            <option value="French Polynesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'French Polynesia' ? 'selected' : null : null }}>French Polynesia</option>
                                            <option value="French Southern Territories" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'French Southern Territories' ? 'selected' : null : null }}>French Southern Territories</option>
                                            <option value="Gabon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Gabon' ? 'selected' : null : null }}>Gabon</option>
                                            <option value="Gambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Gambia' ? 'selected' : null : null }}>Gambia</option>
                                            <option value="Georgia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Georgia' ? 'selected' : null : null }}>Georgia</option>
                                            <option value="Germany" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Germany' ? 'selected' : null : null }}>Germany</option>
                                            <option value="Ghana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ghana' ? 'selected' : null : null }}>Ghana</option>
                                            <option value="Gibraltar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Gibraltar' ? 'selected' : null : null }}>Gibraltar</option>
                                            <option value="Greece" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Greece' ? 'selected' : null : null }}>Greece</option>
                                            <option value="Greenland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Greenland' ? 'selected' : null : null }}>Greenland</option>
                                            <option value="Grenada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Grenada' ? 'selected' : null : null }}>Grenada</option>
                                            <option value="Guadeloupe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guadeloupe' ? 'selected' : null : null }}>Guadeloupe</option>
                                            <option value="Guam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guam' ? 'selected' : null : null }}>Guam</option>
                                            <option value="Guatemala" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guatemala' ? 'selected' : null : null }}>Guatemala</option>
                                            <option value="Guernsey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guernsey' ? 'selected' : null : null }}>Guernsey</option>
                                            <option value="Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guinea' ? 'selected' : null : null }}>Guinea</option>
                                            <option value="Guinea-bissau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guinea-bissau' ? 'selected' : null : null }}>Guinea-bissau</option>
                                            <option value="Guyana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guyana' ? 'selected' : null : null }}>Guyana</option>
                                            <option value="Haiti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Haiti' ? 'selected' : null : null }}>Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Heard Island and Mcdonald Islands' ? 'selected' : null : null }}>Heard Island and Mcdonald Islands</option>
                                            <option value="Holy See (Vatican City State)" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Holy See (Vatican City State)' ? 'selected' : null : null }}>Holy See (Vatican City State)</option>
                                            <option value="Honduras" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Honduras' ? 'selected' : null : null }}>Honduras</option>
                                            <option value="Hong Kong" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Hong Kong' ? 'selected' : null : null }}>Hong Kong</option>
                                            <option value="Hungary" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Hungary' ? 'selected' : null : null }}>Hungary</option>
                                            <option value="Iceland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Iceland' ? 'selected' : null : null }}>Iceland</option>
                                            <option value="India" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'India' ? 'selected' : null : null }}>India</option>
                                            <option value="Indonesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Indonesia' ? 'selected' : null : null }}>Indonesia</option>
                                            <option value="Iran, Islamic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Iran, Islamic Republic' ? 'selected' : null : null }}>Iran, Islamic Republic of</option>
                                            <option value="Iraq" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Iraq' ? 'selected' : null : null }}>Iraq</option>
                                            <option value="Ireland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ireland' ? 'selected' : null : null }}>Ireland</option>
                                            <option value="Isle of Man" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Isle of Man' ? 'selected' : null : null }}>Isle of Man</option>
                                            <option value="Israel" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Israel' ? 'selected' : null : null }}>Israel</option>
                                            <option value="Italy" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Italy' ? 'selected' : null : null }}>Italy</option>
                                            <option value="Jamaica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Jamaica' ? 'selected' : null : null }}>Jamaica</option>
                                            <option value="Japan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Japan' ? 'selected' : null : null }}>Japan</option>
                                            <option value="Jersey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Jersey' ? 'selected' : null : null }}>Jersey</option>
                                            <option value="Jordan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Jordan' ? 'selected' : null : null }}>Jordan</option>
                                            <option value="Kazakhstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kazakhstan' ? 'selected' : null : null }}>Kazakhstan</option>
                                            <option value="Kenya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kenya' ? 'selected' : null : null }}>Kenya</option>
                                            <option value="Kiribati" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kiribati' ? 'selected' : null : null }}>Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Korea, Democratic People\'s Republic of' ? 'selected' : null : null }}>Korea, Democratic People's Republic of</option>
                                            <option value="Korea, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Korea, Republic of' ? 'selected' : null : null }}>Korea, Republic of</option>
                                            <option value="Kuwait" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kuwait' ? 'selected' : null : null }}>Kuwait</option>
                                            <option value="Kyrgyzstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kyrgyzstan' ? 'selected' : null : null }}>Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lao People\'s Democratic Republic' ? 'selected' : null : null }}>Lao People's Democratic Republic</option>
                                            <option value="Latvia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Latvia' ? 'selected' : null : null }}>Latvia</option>
                                            <option value="Lebanon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lebanon' ? 'selected' : null : null }}>Lebanon</option>
                                            <option value="Lesotho" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lesotho' ? 'selected' : null : null }}>Lesotho</option>
                                            <option value="Liberia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Liberia' ? 'selected' : null : null }}>Liberia</option>
                                            <option value="Libyan Arab Jamahiriya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Libyan Arab Jamahiriya' ? 'selected' : null : null }}>Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Liechtenstein' ? 'selected' : null : null }}>Liechtenstein</option>
                                            <option value="Lithuania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lithuania' ? 'selected' : null : null }}>Lithuania</option>
                                            <option value="Luxembourg" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Luxembourg' ? 'selected' : null : null }}>Luxembourg</option>
                                            <option value="Macao" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Macao' ? 'selected' : null : null }}>Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : null : null }}>Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Madagascar' ? 'selected' : null : null }}>Madagascar</option>
                                            <option value="Malawi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Malawi' ? 'selected' : null : null }}>Malawi</option>
                                            <option value="Malaysia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Malaysia' ? 'selected' : null : null }}>Malaysia</option>
                                            <option value="Maldives" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Maldives' ? 'selected' : null : null }}>Maldives</option>
                                            <option value="Mali" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mali' ? 'selected' : null : null }}>Mali</option>
                                            <option value="Malta" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Malta' ? 'selected' : null : null }}>Malta</option>
                                            <option value="Marshall Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Marshall Islands' ? 'selected' : null : null }}>Marshall Islands</option>
                                            <option value="Martinique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Martinique' ? 'selected' : null : null }}>Martinique</option>
                                            <option value="Mauritania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mauritania' ? 'selected' : null : null }}>Mauritania</option>
                                            <option value="Mauritius" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mauritius' ? 'selected' : null : null }}>Mauritius</option>
                                            <option value="Mayotte" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mayotte' ? 'selected' : null : null }}>Mayotte</option>
                                            <option value="Mexico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mexico' ? 'selected' : null : null }}>Mexico</option>
                                            <option value="Micronesia, Federated States of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Micronesia, Federated States of' ? 'selected' : null : null }}>Micronesia, Federated States of</option>
                                            <option value="Moldova, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Moldova, Republic of' ? 'selected' : null : null }}>Moldova, Republic of</option>
                                            <option value="Monaco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Monaco' ? 'selected' : null : null }}>Monaco</option>
                                            <option value="Mongolia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mongolia' ? 'selected' : null : null }}>Mongolia</option>
                                            <option value="Montenegro" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Montenegro' ? 'selected' : null : null }}>Montenegro</option>
                                            <option value="Montserrat" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Montserrat' ? 'selected' : null : null }}>Montserrat</option>
                                            <option value="Morocco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Morocco' ? 'selected' : null : null }}>Morocco</option>
                                            <option value="Mozambique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mozambique' ? 'selected' : null : null }}>Mozambique</option>
                                            <option value="Myanmar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Myanmar' ? 'selected' : null : null }}>Myanmar</option>
                                            <option value="Namibia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Namibia' ? 'selected' : null : null }}>Namibia</option>
                                            <option value="Nauru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nauru' ? 'selected' : null : null }}>Nauru</option>
                                            <option value="Nepal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nepal' ? 'selected' : null : null }}>Nepal</option>
                                            <option value="Netherlands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Netherlands' ? 'selected' : null : null }}>Netherlands</option>
                                            <option value="Netherlands Antilles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Netherlands Antilles' ? 'selected' : null : null }}>Netherlands Antilles</option>
                                            <option value="New Caledonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'New Caledonia' ? 'selected' : null : null }}>New Caledonia</option>
                                            <option value="New Zealand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'New Zealand' ? 'selected' : null : null }}>New Zealand</option>
                                            <option value="Nicaragua" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nicaragua' ? 'selected' : null : null }}>Nicaragua</option>
                                            <option value="Niger" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Niger' ? 'selected' : null : null }}>Niger</option>
                                            <option value="Nigeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nigeria' ? 'selected' : null : null }}>Nigeria</option>
                                            <option value="Niue" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Niue' ? 'selected' : null : null }}>Niue</option>
                                            <option value="Norfolk Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Norfolk Island' ? 'selected' : null : null }}>Norfolk Island</option>
                                            <option value="Northern Mariana Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Northern Mariana Islands' ? 'selected' : null : null }}>Northern Mariana Islands</option>
                                            <option value="Norway" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Norway' ? 'selected' : null : null }}>Norway</option>
                                            <option value="Oman" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Oman' ? 'selected' : null : null }}>Oman</option>
                                            <option value="Pakistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Pakistan' ? 'selected' : null : null }}>Pakistan</option>
                                            <option value="Palau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Palau' ? 'selected' : null : null }}>Palau</option>
                                            <option value="Palestinian Territory, Occupied" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Palestinian Territory, Occupied' ? 'selected' : null : null }}>Palestinian Territory, Occupied</option>
                                            <option value="Panama" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Panama' ? 'selected' : null : null }}>Panama</option>
                                            <option value="Papua New Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Papua New Guinea' ? 'selected' : null : null }}>Papua New Guinea</option>
                                            <option value="Paraguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Paraguay' ? 'selected' : null : null }}>Paraguay</option>
                                            <option value="Peru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Peru' ? 'selected' : null : null }}>Peru</option>
                                            <option value="Philippines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Philippines' ? 'selected' : null : null }}>Philippines</option>
                                            <option value="Pitcairn" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Pitcairn' ? 'selected' : null : null }}>Pitcairn</option>
                                            <option value="Poland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Poland' ? 'selected' : null : null }}>Poland</option>
                                            <option value="Portugal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Portugal' ? 'selected' : null : null }}>Portugal</option>
                                            <option value="Puerto Rico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Puerto Rico' ? 'selected' : null : null }}>Puerto Rico</option>
                                            <option value="Qatar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Qatar' ? 'selected' : null : null }}>Qatar</option>
                                            <option value="Reunion" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Reunion' ? 'selected' : null : null }}>Reunion</option>
                                            <option value="Romania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Romania' ? 'selected' : null : null }}>Romania</option>
                                            <option value="Russian Federation" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Russian Federation' ? 'selected' : null : null }}>Russian Federation</option>
                                            <option value="Rwanda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Rwanda' ? 'selected' : null : null }}>Rwanda</option>
                                            <option value="Saint Helena" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Helena' ? 'selected' : null : null }}>Saint Helena</option>
                                            <option value="Saint Kitts and Nevis" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Kitts and Nevis' ? 'selected' : null : null }}>Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Lucia' ? 'selected' : null : null }}>Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Pierre and Miquelon' ? 'selected' : null : null }}>Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Vincent and The Grenadines' ? 'selected' : null : null }}>Saint Vincent and The Grenadines</option>
                                            <option value="Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Samoa' ? 'selected' : null : null }}>Samoa</option>
                                            <option value="San Marino" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'San Marino' ? 'selected' : null : null }}>San Marino</option>
                                            <option value="Sao Tome and Principe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sao Tome and Principe' ? 'selected' : null : null }}>Sao Tome and Principe</option>
                                            <option value="Saudi Arabia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saudi Arabia' ? 'selected' : null : null }}>Saudi Arabia</option>
                                            <option value="Senegal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Senegal' ? 'selected' : null : null }}>Senegal</option>
                                            <option value="Serbia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Serbia' ? 'selected' : null : null }}>Serbia</option>
                                            <option value="Seychelles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Seychelles' ? 'selected' : null : null }}>Seychelles</option>
                                            <option value="Sierra Leone" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sierra Leone' ? 'selected' : null : null }}>Sierra Leone</option>
                                            <option value="Singapore" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Singapore' ? 'selected' : null : null }}>Singapore</option>
                                            <option value="Slovakia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Slovakia' ? 'selected' : null : null }}>Slovakia</option>
                                            <option value="Slovenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Slovenia' ? 'selected' : null : null }}>Slovenia</option>
                                            <option value="Solomon Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Solomon Islands' ? 'selected' : null : null }}>Solomon Islands</option>
                                            <option value="Somalia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Somalia' ? 'selected' : null : null }}>Somalia</option>
                                            <option value="South Africa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'South Africa' ? 'selected' : null : null }}>South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'South Georgia and The South Sandwich Islands' ? 'selected' : null : null }}>South Georgia and The South Sandwich Islands</option>
                                            <option value="Spain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Spain' ? 'selected' : null : null }}>Spain</option>
                                            <option value="Sri Lanka" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sri Lanka' ? 'selected' : null : null }}>Sri Lanka</option>
                                            <option value="Sudan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sudan' ? 'selected' : null : null }}>Sudan</option>
                                            <option value="Suriname" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Suriname' ? 'selected' : null : null }}>Suriname</option>
                                            <option value="Svalbard and Jan Mayen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Svalbard and Jan Mayen' ? 'selected' : null : null }}>Svalbard and Jan Mayen</option>
                                            <option value="Swaziland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Swaziland' ? 'selected' : null : null }}>Swaziland</option>
                                            <option value="Sweden" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sweden' ? 'selected' : null : null }}>Sweden</option>
                                            <option value="Switzerland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Switzerland' ? 'selected' : null : null }}>Switzerland</option>
                                            <option value="Syrian Arab Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Syrian Arab Republic' ? 'selected' : null : null }}>Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Taiwan, Province of China' ? 'selected' : null : null }}>Taiwan, Province of China</option>
                                            <option value="Tajikistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tajikistan' ? 'selected' : null : null }}>Tajikistan</option>
                                            <option value="Tanzania, United Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tanzania, United Republic of' ? 'selected' : null : null }}>Tanzania, United Republic of</option>
                                            <option value="Thailand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Thailand' ? 'selected' : null : null }}>Thailand</option>
                                            <option value="Timor-leste" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Timor-leste' ? 'selected' : null : null }}>Timor-leste</option>
                                            <option value="Togo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Togo' ? 'selected' : null : null }}>Togo</option>
                                            <option value="Tokelau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tokelau' ? 'selected' : null : null }}>Tokelau</option>
                                            <option value="Tonga" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tonga' ? 'selected' : null : null }}>Tonga</option>
                                            <option value="Trinidad and Tobago" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Trinidad and Tobago' ? 'selected' : null : null }}>Trinidad and Tobago</option>
                                            <option value="Tunisia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tunisia' ? 'selected' : null : null }}>Tunisia</option>
                                            <option value="Turkey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Turkey' ? 'selected' : null : null }}>Turkey</option>
                                            <option value="Turkmenistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Turkmenistan' ? 'selected' : null : null }}>Turkmenistan</option>
                                            <option value="Turks and Caicos Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Turks and Caicos Islands' ? 'selected' : null : null }}>Turks and Caicos Islands</option>
                                            <option value="Tuvalu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tuvalu' ? 'selected' : null : null }}>Tuvalu</option>
                                            <option value="Uganda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Uganda' ? 'selected' : null : null }}>Uganda</option>
                                            <option value="Ukraine" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ukraine' ? 'selected' : null : null }}>Ukraine</option>
                                            <option value="United Arab Emirates" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United Arab Emirates' ? 'selected' : null : null }}>United Arab Emirates</option>
                                            <option value="United Kingdom" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United Kingdom' ? 'selected' : null : null }}>United Kingdom</option>
                                            <option value="United States" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United States' ? 'selected' : null : null }}>United States</option>
                                            <option value="United States Minor Outlying Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United States Minor Outlying Islands' ? 'selected' : null : null }}>United States Minor Outlying Islands</option>
                                            <option value="Uruguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Uruguay' ? 'selected' : null : null }}>Uruguay</option>
                                            <option value="Uzbekistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Uzbekistan' ? 'selected' : null : null }}>Uzbekistan</option>
                                            <option value="Vanuatu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Vanuatu' ? 'selected' : null : null }}>Vanuatu</option>
                                            <option value="Venezuela" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Venezuela' ? 'selected' : null : null }}>Venezuela</option>
                                            <option value="Vietnam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Vietnam' ? 'selected' : null : null }}>Vietnam</option>
                                            <option value="Virgin Islands, British" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Virgin Islands, British' ? 'selected' : null : null }}>Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S." {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Virgin Islands, U.S.' ? 'selected' : null : null }}>Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Wallis and Futuna' ? 'selected' : null : null }}>Wallis and Futuna</option>
                                            <option value="Western Sahara" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Western Sahara' ? 'selected' : null : null }}>Western Sahara</option>
                                            <option value="Yemen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Yemen' ? 'selected' : null : null }}>Yemen</option>
                                            <option value="Zambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Zambia' ? 'selected' : null : null }}>Zambia</option>
                                            <option value="Zimbabwe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Zimbabwe' ? 'selected' : null : null }}>Zimbabwe</option>
                                        </select>
                                    </div>  
                                    <div class="form-group col-lg-6">
                                        <label>Address</label>
                                        <input type="text" id="address" name="address" value="{{ isset($userPersonalInfo) ? $userPersonalInfo->address : null }}" placeholder="Write Address" required>
                                        @if($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <label>Area</label>
                                        <input type="text" id="area" name="area" value="{{ isset($userPersonalInfo) ? $userPersonalInfo->area : null }}" placeholder="Write Area" required>
                                        @if($errors->has('area'))
                                            <span class="text-danger">{{ $errors->first('area') }}</span>
                                        @endif
                                    </div> 
                                    <div class="form-group col-lg-6">
                                        <label>Date of Birth</label>
                                        <input type="date" id="birthdate" name="birthdate" value="{{ isset($userPersonalInfo) ? $userPersonalInfo->birthdate : null }}" required>
                                        @if($errors->has('birthdate'))
                                            <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Gender</label>
                                        <select name="gender" id="gender" class="d-block" required>
                                            <option value="">Select</option>
                                            <option value="ذكر" {{ isset($userPersonalInfo) ? $userPersonalInfo->gender == 'ذكر' ? 'selected' : null : null }}>Male</option>
                                            <option value="انثي" {{ isset($userPersonalInfo) ? $userPersonalInfo->gender == 'انثي' ? 'selected' : null : null }}>Female</option>
                                        </select>
                                        @if($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Degree you are looking for</label>
                                        <select name="degree_needed" id="degree_needed" class="d-block" required>
                                            <option value="">Select</option>
                                            <option value="Bachelor" {{ isset($userPersonalInfo) ? $userPersonalInfo->degree_needed == 'Bachelor' ? 'selected' : null : null }}>Bachelor</option>
                                            <option value="Master" {{ isset($userPersonalInfo) ? $userPersonalInfo->degree_needed == 'Master' ? 'selected' : null : null }}>Master</option>
                                            <option value="PhD" {{ isset($userPersonalInfo) ? $userPersonalInfo->degree_needed == 'PhD' ? 'selected' : null : null }}>PhD</option>
                                        </select>
                                        @if($errors->has('degree_needed'))
                                            <span class="text-danger">{{ $errors->first('degree_needed') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                        <button type="submit" class="readon register-btn"><span class="txt">Continue</span></button>
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
                    <li><a>معلومات شخصية</a></li>
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
                        <h2 class="title mb-10">معلومات شخصية</h2>
                    </div>
                    
                    <div class="styled-form">
                        {{-- <div id="form-messages"></div> --}}
                        <form action="{{ route('submit-personal-info') }}" method="POST">
                            @csrf                               
                            <div class="row clearfix">
                                
                                <div class="form-group col-lg-6">
                                    <label style="float: right">الاسم بالكامل</label>
                                    <br>
                                    <input type="text" id="full_name" name="full_name" value="{{ isset($userPersonalInfo) ? $userPersonalInfo->full_name : null }}" placeholder="اكتب الاسم الكامل" required>
                                    @if($errors->has('full_name'))
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label style="float: right">بلد الإقامة</label>
                                    <br>
                                    <select id="nation" name="nation" class="d-block" required>
                                        <option value="Afghanistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Afghanistan' ? 'selected' : null : null }}>Afghanistan</option>
                                        <option value="Åland Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Åland Islands' ? 'selected' : null : null }}>Åland Islands</option>
                                        <option value="Albania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Albania' ? 'selected' : null : null }}>Albania</option>
                                        <option value="Algeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Algeria' ? 'selected' : null : null }}>Algeria</option>
                                        <option value="American Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'American Samoa' ? 'selected' : null : null }}>American Samoa</option>
                                        <option value="Andorra" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Andorra' ? 'selected' : null : null }}>Andorra</option>
                                        <option value="Angola" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Angola' ? 'selected' : null : null }}>Angola</option>
                                        <option value="Anguilla" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Anguilla' ? 'selected' : null : null }}>Anguilla</option>
                                        <option value="Antarctica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Antarctica' ? 'selected' : null : null }}>Antarctica</option>
                                        <option value="Antigua and Barbuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Antigua and Barbuda' ? 'selected' : null : null }}>Antigua and Barbuda</option>
                                        <option value="Argentina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Argentina' ? 'selected' : null : null }}>Argentina</option>
                                        <option value="Armenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Armenia' ? 'selected' : null : null }}>Armenia</option>
                                        <option value="Aruba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Aruba' ? 'selected' : null : null }}>Aruba</option>
                                        <option value="Australia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Australia' ? 'selected' : null : null }}>Australia</option>
                                        <option value="Austria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Austria' ? 'selected' : null : null }}>Austria</option>
                                        <option value="Azerbaijan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Azerbaijan' ? 'selected' : null : null }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bahamas' ? 'selected' : null : null }}>Bahamas</option>
                                        <option value="Bahrain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bahrain' ? 'selected' : null : null }}>Bahrain</option>
                                        <option value="Bangladesh" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bangladesh' ? 'selected' : null : null }}>Bangladesh</option>
                                        <option value="Barbados" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Barbados' ? 'selected' : null : null }}>Barbados</option>
                                        <option value="Belarus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Belarus' ? 'selected' : null : null }}>Belarus</option>
                                        <option value="Belgium" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Belgium' ? 'selected' : null : null }}>Belgium</option>
                                        <option value="Belize" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Belize' ? 'selected' : null : null }}>Belize</option>
                                        <option value="Benin" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Benin' ? 'selected' : null : null }}>Benin</option>
                                        <option value="Bermuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bermuda' ? 'selected' : null : null }}>Bermuda</option>
                                        <option value="Bhutan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bhutan' ? 'selected' : null : null }}>Bhutan</option>
                                        <option value="Bolivia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bolivia' ? 'selected' : null : null }}>Bolivia</option>
                                        <option value="Bosnia and Herzegovina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bosnia and Herzegovina' ? 'selected' : null : null }}>Bosnia and Herzegovina</option>
                                        <option value="Botswana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Botswana' ? 'selected' : null : null }}>Botswana</option>
                                        <option value="Bouvet Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bouvet Island' ? 'selected' : null : null }}>Bouvet Island</option>
                                        <option value="Brazil" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Brazil' ? 'selected' : null : null }}>Brazil</option>
                                        <option value="British Indian Ocean Territory" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'British Indian Ocean Territory' ? 'selected' : null : null }}>British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Brunei Darussalam' ? 'selected' : null : null }}>Brunei Darussalam</option>
                                        <option value="Bulgaria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Bulgaria' ? 'selected' : null : null }}>Bulgaria</option>
                                        <option value="Burkina Faso" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Burkina Faso' ? 'selected' : null : null }}>Burkina Faso</option>
                                        <option value="Burundi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Burundi' ? 'selected' : null : null }}>Burundi</option>
                                        <option value="Cambodia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cambodia' ? 'selected' : null : null }}>Cambodia</option>
                                        <option value="Cameroon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cameroon' ? 'selected' : null : null }}>Cameroon</option>
                                        <option value="Canada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Canada' ? 'selected' : null : null }}>Canada</option>
                                        <option value="Cape Verde" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cape Verde' ? 'selected' : null : null }}>Cape Verde</option>
                                        <option value="Cayman Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cayman Island' ? 'selected' : null : null }}>Cayman Islands</option>
                                        <option value="Central African Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Central African Republic' ? 'selected' : null : null }}>Central African Republic</option>
                                        <option value="Chad" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Chad' ? 'selected' : null : null }}>Chad</option>
                                        <option value="Chile" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Chile' ? 'selected' : null : null }}>Chile</option>
                                        <option value="China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'China' ? 'selected' : null : null }}>China</option>
                                        <option value="Christmas Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Christmas Island' ? 'selected' : null : null }}>Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cocos (Keeling) Islands' ? 'selected' : null : null }}>Cocos (Keeling) Islands</option>
                                        <option value="Colombia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Colombia' ? 'selected' : null : null }}>Colombia</option>
                                        <option value="Comoros" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Comoros' ? 'selected' : null : null }}>Comoros</option>
                                        <option value="Congo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Congo' ? 'selected' : null : null }}>Congo</option>
                                        <option value="Congo, The Democratic Republic of The" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Congo, The Democratic Republic of The' ? 'selected' : null : null }}>Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cook Islands' ? 'selected' : null : null }}>Cook Islands</option>
                                        <option value="Costa Rica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Costa Rica' ? 'selected' : null : null }}>Costa Rica</option>
                                        <option value="Cote D'ivoire" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == "Cote D'ivoire" ? 'selected' : null : null }}>Cote D'ivoire</option>
                                        <option value="Croatia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Croatia' ? 'selected' : null : null }}>Croatia</option>
                                        <option value="Cuba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cuba' ? 'selected' : null : null }}>Cuba</option>
                                        <option value="Cyprus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Cyprus' ? 'selected' : null : null }}>Cyprus</option>
                                        <option value="Czech Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Czech Republic' ? 'selected' : null : null }}>Czech Republic</option>
                                        <option value="Denmark" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Denmark' ? 'selected' : null : null }}>Denmark</option>
                                        <option value="Djibouti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Djibouti' ? 'selected' : null : null }}>Djibouti</option>
                                        <option value="Dominica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Dominica' ? 'selected' : null : null }}>Dominica</option>
                                        <option value="Dominican Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Dominican Republic' ? 'selected' : null : null }}>Dominican Republic</option>
                                        <option value="Ecuador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ecuador' ? 'selected' : null : null }}>Ecuador</option>
                                        <option value="Egypt" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Egypt' ? 'selected' : null : null }}>Egypt</option>
                                        <option value="El Salvador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'El Salvador' ? 'selected' : null : null }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Equatorial Guinea' ? 'selected' : null : null }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Eritrea' ? 'selected' : null : null }}>Eritrea</option>
                                        <option value="Estonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Estonia' ? 'selected' : null : null }}>Estonia</option>
                                        <option value="Ethiopia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ethiopia' ? 'selected' : null : null }}>Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas) {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Falkland Islands (Malvinas)' ? 'selected' : null : null }}">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Faroe Islands' ? 'selected' : null : null }}>Faroe Islands</option>
                                        <option value="Fiji" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Fiji' ? 'selected' : null : null }}>Fiji</option>
                                        <option value="Finland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Finland' ? 'selected' : null : null }}>Finland</option>
                                        <option value="France" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'France' ? 'selected' : null : null }}>France</option>
                                        <option value="French Guiana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'French Guiana' ? 'selected' : null : null }}>French Guiana</option>
                                        <option value="French Polynesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'French Polynesia' ? 'selected' : null : null }}>French Polynesia</option>
                                        <option value="French Southern Territories" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'French Southern Territories' ? 'selected' : null : null }}>French Southern Territories</option>
                                        <option value="Gabon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Gabon' ? 'selected' : null : null }}>Gabon</option>
                                        <option value="Gambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Gambia' ? 'selected' : null : null }}>Gambia</option>
                                        <option value="Georgia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Georgia' ? 'selected' : null : null }}>Georgia</option>
                                        <option value="Germany" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Germany' ? 'selected' : null : null }}>Germany</option>
                                        <option value="Ghana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ghana' ? 'selected' : null : null }}>Ghana</option>
                                        <option value="Gibraltar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Gibraltar' ? 'selected' : null : null }}>Gibraltar</option>
                                        <option value="Greece" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Greece' ? 'selected' : null : null }}>Greece</option>
                                        <option value="Greenland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Greenland' ? 'selected' : null : null }}>Greenland</option>
                                        <option value="Grenada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Grenada' ? 'selected' : null : null }}>Grenada</option>
                                        <option value="Guadeloupe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guadeloupe' ? 'selected' : null : null }}>Guadeloupe</option>
                                        <option value="Guam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guam' ? 'selected' : null : null }}>Guam</option>
                                        <option value="Guatemala" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guatemala' ? 'selected' : null : null }}>Guatemala</option>
                                        <option value="Guernsey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guernsey' ? 'selected' : null : null }}>Guernsey</option>
                                        <option value="Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guinea' ? 'selected' : null : null }}>Guinea</option>
                                        <option value="Guinea-bissau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guinea-bissau' ? 'selected' : null : null }}>Guinea-bissau</option>
                                        <option value="Guyana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Guyana' ? 'selected' : null : null }}>Guyana</option>
                                        <option value="Haiti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Haiti' ? 'selected' : null : null }}>Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Heard Island and Mcdonald Islands' ? 'selected' : null : null }}>Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Holy See (Vatican City State)' ? 'selected' : null : null }}>Holy See (Vatican City State)</option>
                                        <option value="Honduras" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Honduras' ? 'selected' : null : null }}>Honduras</option>
                                        <option value="Hong Kong" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Hong Kong' ? 'selected' : null : null }}>Hong Kong</option>
                                        <option value="Hungary" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Hungary' ? 'selected' : null : null }}>Hungary</option>
                                        <option value="Iceland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Iceland' ? 'selected' : null : null }}>Iceland</option>
                                        <option value="India" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'India' ? 'selected' : null : null }}>India</option>
                                        <option value="Indonesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Indonesia' ? 'selected' : null : null }}>Indonesia</option>
                                        <option value="Iran, Islamic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Iran, Islamic Republic' ? 'selected' : null : null }}>Iran, Islamic Republic of</option>
                                        <option value="Iraq" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Iraq' ? 'selected' : null : null }}>Iraq</option>
                                        <option value="Ireland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ireland' ? 'selected' : null : null }}>Ireland</option>
                                        <option value="Isle of Man" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Isle of Man' ? 'selected' : null : null }}>Isle of Man</option>
                                        <option value="Israel" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Israel' ? 'selected' : null : null }}>Israel</option>
                                        <option value="Italy" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Italy' ? 'selected' : null : null }}>Italy</option>
                                        <option value="Jamaica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Jamaica' ? 'selected' : null : null }}>Jamaica</option>
                                        <option value="Japan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Japan' ? 'selected' : null : null }}>Japan</option>
                                        <option value="Jersey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Jersey' ? 'selected' : null : null }}>Jersey</option>
                                        <option value="Jordan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Jordan' ? 'selected' : null : null }}>Jordan</option>
                                        <option value="Kazakhstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kazakhstan' ? 'selected' : null : null }}>Kazakhstan</option>
                                        <option value="Kenya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kenya' ? 'selected' : null : null }}>Kenya</option>
                                        <option value="Kiribati" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kiribati' ? 'selected' : null : null }}>Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Korea, Democratic People\'s Republic of' ? 'selected' : null : null }}>Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Korea, Republic of' ? 'selected' : null : null }}>Korea, Republic of</option>
                                        <option value="Kuwait" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kuwait' ? 'selected' : null : null }}>Kuwait</option>
                                        <option value="Kyrgyzstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Kyrgyzstan' ? 'selected' : null : null }}>Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lao People\'s Democratic Republic' ? 'selected' : null : null }}>Lao People's Democratic Republic</option>
                                        <option value="Latvia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Latvia' ? 'selected' : null : null }}>Latvia</option>
                                        <option value="Lebanon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lebanon' ? 'selected' : null : null }}>Lebanon</option>
                                        <option value="Lesotho" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lesotho' ? 'selected' : null : null }}>Lesotho</option>
                                        <option value="Liberia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Liberia' ? 'selected' : null : null }}>Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Libyan Arab Jamahiriya' ? 'selected' : null : null }}>Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Liechtenstein' ? 'selected' : null : null }}>Liechtenstein</option>
                                        <option value="Lithuania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Lithuania' ? 'selected' : null : null }}>Lithuania</option>
                                        <option value="Luxembourg" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Luxembourg' ? 'selected' : null : null }}>Luxembourg</option>
                                        <option value="Macao" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Macao' ? 'selected' : null : null }}>Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : null : null }}>Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Madagascar' ? 'selected' : null : null }}>Madagascar</option>
                                        <option value="Malawi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Malawi' ? 'selected' : null : null }}>Malawi</option>
                                        <option value="Malaysia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Malaysia' ? 'selected' : null : null }}>Malaysia</option>
                                        <option value="Maldives" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Maldives' ? 'selected' : null : null }}>Maldives</option>
                                        <option value="Mali" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mali' ? 'selected' : null : null }}>Mali</option>
                                        <option value="Malta" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Malta' ? 'selected' : null : null }}>Malta</option>
                                        <option value="Marshall Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Marshall Islands' ? 'selected' : null : null }}>Marshall Islands</option>
                                        <option value="Martinique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Martinique' ? 'selected' : null : null }}>Martinique</option>
                                        <option value="Mauritania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mauritania' ? 'selected' : null : null }}>Mauritania</option>
                                        <option value="Mauritius" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mauritius' ? 'selected' : null : null }}>Mauritius</option>
                                        <option value="Mayotte" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mayotte' ? 'selected' : null : null }}>Mayotte</option>
                                        <option value="Mexico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mexico' ? 'selected' : null : null }}>Mexico</option>
                                        <option value="Micronesia, Federated States of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Micronesia, Federated States of' ? 'selected' : null : null }}>Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Moldova, Republic of' ? 'selected' : null : null }}>Moldova, Republic of</option>
                                        <option value="Monaco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Monaco' ? 'selected' : null : null }}>Monaco</option>
                                        <option value="Mongolia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mongolia' ? 'selected' : null : null }}>Mongolia</option>
                                        <option value="Montenegro" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Montenegro' ? 'selected' : null : null }}>Montenegro</option>
                                        <option value="Montserrat" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Montserrat' ? 'selected' : null : null }}>Montserrat</option>
                                        <option value="Morocco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Morocco' ? 'selected' : null : null }}>Morocco</option>
                                        <option value="Mozambique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Mozambique' ? 'selected' : null : null }}>Mozambique</option>
                                        <option value="Myanmar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Myanmar' ? 'selected' : null : null }}>Myanmar</option>
                                        <option value="Namibia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Namibia' ? 'selected' : null : null }}>Namibia</option>
                                        <option value="Nauru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nauru' ? 'selected' : null : null }}>Nauru</option>
                                        <option value="Nepal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nepal' ? 'selected' : null : null }}>Nepal</option>
                                        <option value="Netherlands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Netherlands' ? 'selected' : null : null }}>Netherlands</option>
                                        <option value="Netherlands Antilles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Netherlands Antilles' ? 'selected' : null : null }}>Netherlands Antilles</option>
                                        <option value="New Caledonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'New Caledonia' ? 'selected' : null : null }}>New Caledonia</option>
                                        <option value="New Zealand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'New Zealand' ? 'selected' : null : null }}>New Zealand</option>
                                        <option value="Nicaragua" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nicaragua' ? 'selected' : null : null }}>Nicaragua</option>
                                        <option value="Niger" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Niger' ? 'selected' : null : null }}>Niger</option>
                                        <option value="Nigeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Nigeria' ? 'selected' : null : null }}>Nigeria</option>
                                        <option value="Niue" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Niue' ? 'selected' : null : null }}>Niue</option>
                                        <option value="Norfolk Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Norfolk Island' ? 'selected' : null : null }}>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Northern Mariana Islands' ? 'selected' : null : null }}>Northern Mariana Islands</option>
                                        <option value="Norway" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Norway' ? 'selected' : null : null }}>Norway</option>
                                        <option value="Oman" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Oman' ? 'selected' : null : null }}>Oman</option>
                                        <option value="Pakistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Pakistan' ? 'selected' : null : null }}>Pakistan</option>
                                        <option value="Palau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Palau' ? 'selected' : null : null }}>Palau</option>
                                        <option value="Palestinian Territory, Occupied" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Palestinian Territory, Occupied' ? 'selected' : null : null }}>Palestinian Territory, Occupied</option>
                                        <option value="Panama" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Panama' ? 'selected' : null : null }}>Panama</option>
                                        <option value="Papua New Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Papua New Guinea' ? 'selected' : null : null }}>Papua New Guinea</option>
                                        <option value="Paraguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Paraguay' ? 'selected' : null : null }}>Paraguay</option>
                                        <option value="Peru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Peru' ? 'selected' : null : null }}>Peru</option>
                                        <option value="Philippines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Philippines' ? 'selected' : null : null }}>Philippines</option>
                                        <option value="Pitcairn" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Pitcairn' ? 'selected' : null : null }}>Pitcairn</option>
                                        <option value="Poland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Poland' ? 'selected' : null : null }}>Poland</option>
                                        <option value="Portugal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Portugal' ? 'selected' : null : null }}>Portugal</option>
                                        <option value="Puerto Rico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Puerto Rico' ? 'selected' : null : null }}>Puerto Rico</option>
                                        <option value="Qatar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Qatar' ? 'selected' : null : null }}>Qatar</option>
                                        <option value="Reunion" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Reunion' ? 'selected' : null : null }}>Reunion</option>
                                        <option value="Romania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Romania' ? 'selected' : null : null }}>Romania</option>
                                        <option value="Russian Federation" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Russian Federation' ? 'selected' : null : null }}>Russian Federation</option>
                                        <option value="Rwanda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Rwanda' ? 'selected' : null : null }}>Rwanda</option>
                                        <option value="Saint Helena" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Helena' ? 'selected' : null : null }}>Saint Helena</option>
                                        <option value="Saint Kitts and Nevis" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Kitts and Nevis' ? 'selected' : null : null }}>Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Lucia' ? 'selected' : null : null }}>Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Pierre and Miquelon' ? 'selected' : null : null }}>Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saint Vincent and The Grenadines' ? 'selected' : null : null }}>Saint Vincent and The Grenadines</option>
                                        <option value="Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Samoa' ? 'selected' : null : null }}>Samoa</option>
                                        <option value="San Marino" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'San Marino' ? 'selected' : null : null }}>San Marino</option>
                                        <option value="Sao Tome and Principe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sao Tome and Principe' ? 'selected' : null : null }}>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Saudi Arabia' ? 'selected' : null : null }}>Saudi Arabia</option>
                                        <option value="Senegal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Senegal' ? 'selected' : null : null }}>Senegal</option>
                                        <option value="Serbia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Serbia' ? 'selected' : null : null }}>Serbia</option>
                                        <option value="Seychelles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Seychelles' ? 'selected' : null : null }}>Seychelles</option>
                                        <option value="Sierra Leone" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sierra Leone' ? 'selected' : null : null }}>Sierra Leone</option>
                                        <option value="Singapore" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Singapore' ? 'selected' : null : null }}>Singapore</option>
                                        <option value="Slovakia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Slovakia' ? 'selected' : null : null }}>Slovakia</option>
                                        <option value="Slovenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Slovenia' ? 'selected' : null : null }}>Slovenia</option>
                                        <option value="Solomon Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Solomon Islands' ? 'selected' : null : null }}>Solomon Islands</option>
                                        <option value="Somalia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Somalia' ? 'selected' : null : null }}>Somalia</option>
                                        <option value="South Africa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'South Africa' ? 'selected' : null : null }}>South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'South Georgia and The South Sandwich Islands' ? 'selected' : null : null }}>South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Spain' ? 'selected' : null : null }}>Spain</option>
                                        <option value="Sri Lanka" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sri Lanka' ? 'selected' : null : null }}>Sri Lanka</option>
                                        <option value="Sudan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sudan' ? 'selected' : null : null }}>Sudan</option>
                                        <option value="Suriname" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Suriname' ? 'selected' : null : null }}>Suriname</option>
                                        <option value="Svalbard and Jan Mayen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Svalbard and Jan Mayen' ? 'selected' : null : null }}>Svalbard and Jan Mayen</option>
                                        <option value="Swaziland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Swaziland' ? 'selected' : null : null }}>Swaziland</option>
                                        <option value="Sweden" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Sweden' ? 'selected' : null : null }}>Sweden</option>
                                        <option value="Switzerland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Switzerland' ? 'selected' : null : null }}>Switzerland</option>
                                        <option value="Syrian Arab Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Syrian Arab Republic' ? 'selected' : null : null }}>Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Taiwan, Province of China' ? 'selected' : null : null }}>Taiwan, Province of China</option>
                                        <option value="Tajikistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tajikistan' ? 'selected' : null : null }}>Tajikistan</option>
                                        <option value="Tanzania, United Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tanzania, United Republic of' ? 'selected' : null : null }}>Tanzania, United Republic of</option>
                                        <option value="Thailand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Thailand' ? 'selected' : null : null }}>Thailand</option>
                                        <option value="Timor-leste" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Timor-leste' ? 'selected' : null : null }}>Timor-leste</option>
                                        <option value="Togo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Togo' ? 'selected' : null : null }}>Togo</option>
                                        <option value="Tokelau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tokelau' ? 'selected' : null : null }}>Tokelau</option>
                                        <option value="Tonga" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tonga' ? 'selected' : null : null }}>Tonga</option>
                                        <option value="Trinidad and Tobago" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Trinidad and Tobago' ? 'selected' : null : null }}>Trinidad and Tobago</option>
                                        <option value="Tunisia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tunisia' ? 'selected' : null : null }}>Tunisia</option>
                                        <option value="Turkey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Turkey' ? 'selected' : null : null }}>Turkey</option>
                                        <option value="Turkmenistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Turkmenistan' ? 'selected' : null : null }}>Turkmenistan</option>
                                        <option value="Turks and Caicos Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Turks and Caicos Islands' ? 'selected' : null : null }}>Turks and Caicos Islands</option>
                                        <option value="Tuvalu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Tuvalu' ? 'selected' : null : null }}>Tuvalu</option>
                                        <option value="Uganda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Uganda' ? 'selected' : null : null }}>Uganda</option>
                                        <option value="Ukraine" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Ukraine' ? 'selected' : null : null }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United Arab Emirates' ? 'selected' : null : null }}>United Arab Emirates</option>
                                        <option value="United Kingdom" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United Kingdom' ? 'selected' : null : null }}>United Kingdom</option>
                                        <option value="United States" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United States' ? 'selected' : null : null }}>United States</option>
                                        <option value="United States Minor Outlying Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'United States Minor Outlying Islands' ? 'selected' : null : null }}>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Uruguay' ? 'selected' : null : null }}>Uruguay</option>
                                        <option value="Uzbekistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Uzbekistan' ? 'selected' : null : null }}>Uzbekistan</option>
                                        <option value="Vanuatu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Vanuatu' ? 'selected' : null : null }}>Vanuatu</option>
                                        <option value="Venezuela" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Venezuela' ? 'selected' : null : null }}>Venezuela</option>
                                        <option value="Vietnam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Vietnam' ? 'selected' : null : null }}>Vietnam</option>
                                        <option value="Virgin Islands, British" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Virgin Islands, British' ? 'selected' : null : null }}>Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S." {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Virgin Islands, U.S.' ? 'selected' : null : null }}>Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Wallis and Futuna' ? 'selected' : null : null }}>Wallis and Futuna</option>
                                        <option value="Western Sahara" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Western Sahara' ? 'selected' : null : null }}>Western Sahara</option>
                                        <option value="Yemen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Yemen' ? 'selected' : null : null }}>Yemen</option>
                                        <option value="Zambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Zambia' ? 'selected' : null : null }}>Zambia</option>
                                        <option value="Zimbabwe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nation == 'Zimbabwe' ? 'selected' : null : null }}>Zimbabwe</option>
                                    </select>
                                </div> 
                                <div class="form-group col-lg-6">
                                    <label style="float: right">الجنسية</label>
                                    <br>
                                    <select id="nationality" name="nationality" class="d-block" required>
                                        <option value="Afghanistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Afghanistan' ? 'selected' : null : null }}>Afghanistan</option>
                                        <option value="Åland Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Åland Islands' ? 'selected' : null : null }}>Åland Islands</option>
                                        <option value="Albania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Albania' ? 'selected' : null : null }}>Albania</option>
                                        <option value="Algeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Algeria' ? 'selected' : null : null }}>Algeria</option>
                                        <option value="American Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'American Samoa' ? 'selected' : null : null }}>American Samoa</option>
                                        <option value="Andorra" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Andorra' ? 'selected' : null : null }}>Andorra</option>
                                        <option value="Angola" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Angola' ? 'selected' : null : null }}>Angola</option>
                                        <option value="Anguilla" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Anguilla' ? 'selected' : null : null }}>Anguilla</option>
                                        <option value="Antarctica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Antarctica' ? 'selected' : null : null }}>Antarctica</option>
                                        <option value="Antigua and Barbuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Antigua and Barbuda' ? 'selected' : null : null }}>Antigua and Barbuda</option>
                                        <option value="Argentina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Argentina' ? 'selected' : null : null }}>Argentina</option>
                                        <option value="Armenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Armenia' ? 'selected' : null : null }}>Armenia</option>
                                        <option value="Aruba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Aruba' ? 'selected' : null : null }}>Aruba</option>
                                        <option value="Australia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Australia' ? 'selected' : null : null }}>Australia</option>
                                        <option value="Austria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Austria' ? 'selected' : null : null }}>Austria</option>
                                        <option value="Azerbaijan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Azerbaijan' ? 'selected' : null : null }}>Azerbaijan</option>
                                        <option value="Bahamas" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bahamas' ? 'selected' : null : null }}>Bahamas</option>
                                        <option value="Bahrain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bahrain' ? 'selected' : null : null }}>Bahrain</option>
                                        <option value="Bangladesh" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bangladesh' ? 'selected' : null : null }}>Bangladesh</option>
                                        <option value="Barbados" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Barbados' ? 'selected' : null : null }}>Barbados</option>
                                        <option value="Belarus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Belarus' ? 'selected' : null : null }}>Belarus</option>
                                        <option value="Belgium" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Belgium' ? 'selected' : null : null }}>Belgium</option>
                                        <option value="Belize" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Belize' ? 'selected' : null : null }}>Belize</option>
                                        <option value="Benin" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Benin' ? 'selected' : null : null }}>Benin</option>
                                        <option value="Bermuda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bermuda' ? 'selected' : null : null }}>Bermuda</option>
                                        <option value="Bhutan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bhutan' ? 'selected' : null : null }}>Bhutan</option>
                                        <option value="Bolivia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bolivia' ? 'selected' : null : null }}>Bolivia</option>
                                        <option value="Bosnia and Herzegovina" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bosnia and Herzegovina' ? 'selected' : null : null }}>Bosnia and Herzegovina</option>
                                        <option value="Botswana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Botswana' ? 'selected' : null : null }}>Botswana</option>
                                        <option value="Bouvet Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bouvet Island' ? 'selected' : null : null }}>Bouvet Island</option>
                                        <option value="Brazil" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Brazil' ? 'selected' : null : null }}>Brazil</option>
                                        <option value="British Indian Ocean Territory" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'British Indian Ocean Territory' ? 'selected' : null : null }}>British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Brunei Darussalam' ? 'selected' : null : null }}>Brunei Darussalam</option>
                                        <option value="Bulgaria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Bulgaria' ? 'selected' : null : null }}>Bulgaria</option>
                                        <option value="Burkina Faso" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Burkina Faso' ? 'selected' : null : null }}>Burkina Faso</option>
                                        <option value="Burundi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Burundi' ? 'selected' : null : null }}>Burundi</option>
                                        <option value="Cambodia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cambodia' ? 'selected' : null : null }}>Cambodia</option>
                                        <option value="Cameroon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cameroon' ? 'selected' : null : null }}>Cameroon</option>
                                        <option value="Canada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Canada' ? 'selected' : null : null }}>Canada</option>
                                        <option value="Cape Verde" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cape Verde' ? 'selected' : null : null }}>Cape Verde</option>
                                        <option value="Cayman Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cayman Island' ? 'selected' : null : null }}>Cayman Islands</option>
                                        <option value="Central African Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Central African Republic' ? 'selected' : null : null }}>Central African Republic</option>
                                        <option value="Chad" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Chad' ? 'selected' : null : null }}>Chad</option>
                                        <option value="Chile" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Chile' ? 'selected' : null : null }}>Chile</option>
                                        <option value="China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'China' ? 'selected' : null : null }}>China</option>
                                        <option value="Christmas Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Christmas Island' ? 'selected' : null : null }}>Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cocos (Keeling) Islands' ? 'selected' : null : null }}>Cocos (Keeling) Islands</option>
                                        <option value="Colombia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Colombia' ? 'selected' : null : null }}>Colombia</option>
                                        <option value="Comoros" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Comoros' ? 'selected' : null : null }}>Comoros</option>
                                        <option value="Congo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Congo' ? 'selected' : null : null }}>Congo</option>
                                        <option value="Congo, The Democratic Republic of The" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Congo, The Democratic Republic of The' ? 'selected' : null : null }}>Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cook Islands' ? 'selected' : null : null }}>Cook Islands</option>
                                        <option value="Costa Rica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Costa Rica' ? 'selected' : null : null }}>Costa Rica</option>
                                        <option value="Cote D'ivoire" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == "Cote D'ivoire" ? 'selected' : null : null }}>Cote D'ivoire</option>
                                        <option value="Croatia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Croatia' ? 'selected' : null : null }}>Croatia</option>
                                        <option value="Cuba" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cuba' ? 'selected' : null : null }}>Cuba</option>
                                        <option value="Cyprus" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Cyprus' ? 'selected' : null : null }}>Cyprus</option>
                                        <option value="Czech Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Czech Republic' ? 'selected' : null : null }}>Czech Republic</option>
                                        <option value="Denmark" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Denmark' ? 'selected' : null : null }}>Denmark</option>
                                        <option value="Djibouti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Djibouti' ? 'selected' : null : null }}>Djibouti</option>
                                        <option value="Dominica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Dominica' ? 'selected' : null : null }}>Dominica</option>
                                        <option value="Dominican Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Dominican Republic' ? 'selected' : null : null }}>Dominican Republic</option>
                                        <option value="Ecuador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ecuador' ? 'selected' : null : null }}>Ecuador</option>
                                        <option value="Egypt" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Egypt' ? 'selected' : null : null }}>Egypt</option>
                                        <option value="El Salvador" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'El Salvador' ? 'selected' : null : null }}>El Salvador</option>
                                        <option value="Equatorial Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Equatorial Guinea' ? 'selected' : null : null }}>Equatorial Guinea</option>
                                        <option value="Eritrea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Eritrea' ? 'selected' : null : null }}>Eritrea</option>
                                        <option value="Estonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Estonia' ? 'selected' : null : null }}>Estonia</option>
                                        <option value="Ethiopia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ethiopia' ? 'selected' : null : null }}>Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas) {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Falkland Islands (Malvinas)' ? 'selected' : null : null }}">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Faroe Islands' ? 'selected' : null : null }}>Faroe Islands</option>
                                        <option value="Fiji" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Fiji' ? 'selected' : null : null }}>Fiji</option>
                                        <option value="Finland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Finland' ? 'selected' : null : null }}>Finland</option>
                                        <option value="France" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'France' ? 'selected' : null : null }}>France</option>
                                        <option value="French Guiana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'French Guiana' ? 'selected' : null : null }}>French Guiana</option>
                                        <option value="French Polynesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'French Polynesia' ? 'selected' : null : null }}>French Polynesia</option>
                                        <option value="French Southern Territories" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'French Southern Territories' ? 'selected' : null : null }}>French Southern Territories</option>
                                        <option value="Gabon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Gabon' ? 'selected' : null : null }}>Gabon</option>
                                        <option value="Gambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Gambia' ? 'selected' : null : null }}>Gambia</option>
                                        <option value="Georgia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Georgia' ? 'selected' : null : null }}>Georgia</option>
                                        <option value="Germany" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Germany' ? 'selected' : null : null }}>Germany</option>
                                        <option value="Ghana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ghana' ? 'selected' : null : null }}>Ghana</option>
                                        <option value="Gibraltar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Gibraltar' ? 'selected' : null : null }}>Gibraltar</option>
                                        <option value="Greece" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Greece' ? 'selected' : null : null }}>Greece</option>
                                        <option value="Greenland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Greenland' ? 'selected' : null : null }}>Greenland</option>
                                        <option value="Grenada" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Grenada' ? 'selected' : null : null }}>Grenada</option>
                                        <option value="Guadeloupe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guadeloupe' ? 'selected' : null : null }}>Guadeloupe</option>
                                        <option value="Guam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guam' ? 'selected' : null : null }}>Guam</option>
                                        <option value="Guatemala" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guatemala' ? 'selected' : null : null }}>Guatemala</option>
                                        <option value="Guernsey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guernsey' ? 'selected' : null : null }}>Guernsey</option>
                                        <option value="Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guinea' ? 'selected' : null : null }}>Guinea</option>
                                        <option value="Guinea-bissau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guinea-bissau' ? 'selected' : null : null }}>Guinea-bissau</option>
                                        <option value="Guyana" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Guyana' ? 'selected' : null : null }}>Guyana</option>
                                        <option value="Haiti" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Haiti' ? 'selected' : null : null }}>Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Heard Island and Mcdonald Islands' ? 'selected' : null : null }}>Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Holy See (Vatican City State)' ? 'selected' : null : null }}>Holy See (Vatican City State)</option>
                                        <option value="Honduras" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Honduras' ? 'selected' : null : null }}>Honduras</option>
                                        <option value="Hong Kong" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Hong Kong' ? 'selected' : null : null }}>Hong Kong</option>
                                        <option value="Hungary" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Hungary' ? 'selected' : null : null }}>Hungary</option>
                                        <option value="Iceland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Iceland' ? 'selected' : null : null }}>Iceland</option>
                                        <option value="India" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'India' ? 'selected' : null : null }}>India</option>
                                        <option value="Indonesia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Indonesia' ? 'selected' : null : null }}>Indonesia</option>
                                        <option value="Iran, Islamic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Iran, Islamic Republic' ? 'selected' : null : null }}>Iran, Islamic Republic of</option>
                                        <option value="Iraq" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Iraq' ? 'selected' : null : null }}>Iraq</option>
                                        <option value="Ireland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ireland' ? 'selected' : null : null }}>Ireland</option>
                                        <option value="Isle of Man" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Isle of Man' ? 'selected' : null : null }}>Isle of Man</option>
                                        <option value="Israel" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Israel' ? 'selected' : null : null }}>Israel</option>
                                        <option value="Italy" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Italy' ? 'selected' : null : null }}>Italy</option>
                                        <option value="Jamaica" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Jamaica' ? 'selected' : null : null }}>Jamaica</option>
                                        <option value="Japan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Japan' ? 'selected' : null : null }}>Japan</option>
                                        <option value="Jersey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Jersey' ? 'selected' : null : null }}>Jersey</option>
                                        <option value="Jordan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Jordan' ? 'selected' : null : null }}>Jordan</option>
                                        <option value="Kazakhstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kazakhstan' ? 'selected' : null : null }}>Kazakhstan</option>
                                        <option value="Kenya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kenya' ? 'selected' : null : null }}>Kenya</option>
                                        <option value="Kiribati" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kiribati' ? 'selected' : null : null }}>Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Korea, Democratic People\'s Republic of' ? 'selected' : null : null }}>Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Korea, Republic of' ? 'selected' : null : null }}>Korea, Republic of</option>
                                        <option value="Kuwait" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kuwait' ? 'selected' : null : null }}>Kuwait</option>
                                        <option value="Kyrgyzstan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Kyrgyzstan' ? 'selected' : null : null }}>Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lao People\'s Democratic Republic' ? 'selected' : null : null }}>Lao People's Democratic Republic</option>
                                        <option value="Latvia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Latvia' ? 'selected' : null : null }}>Latvia</option>
                                        <option value="Lebanon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lebanon' ? 'selected' : null : null }}>Lebanon</option>
                                        <option value="Lesotho" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lesotho' ? 'selected' : null : null }}>Lesotho</option>
                                        <option value="Liberia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Liberia' ? 'selected' : null : null }}>Liberia</option>
                                        <option value="Libyan Arab Jamahiriya" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Libyan Arab Jamahiriya' ? 'selected' : null : null }}>Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Liechtenstein' ? 'selected' : null : null }}>Liechtenstein</option>
                                        <option value="Lithuania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Lithuania' ? 'selected' : null : null }}>Lithuania</option>
                                        <option value="Luxembourg" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Luxembourg' ? 'selected' : null : null }}>Luxembourg</option>
                                        <option value="Macao" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Macao' ? 'selected' : null : null }}>Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Macedonia, The Former Yugoslav Republic of' ? 'selected' : null : null }}>Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Madagascar' ? 'selected' : null : null }}>Madagascar</option>
                                        <option value="Malawi" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Malawi' ? 'selected' : null : null }}>Malawi</option>
                                        <option value="Malaysia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Malaysia' ? 'selected' : null : null }}>Malaysia</option>
                                        <option value="Maldives" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Maldives' ? 'selected' : null : null }}>Maldives</option>
                                        <option value="Mali" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mali' ? 'selected' : null : null }}>Mali</option>
                                        <option value="Malta" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Malta' ? 'selected' : null : null }}>Malta</option>
                                        <option value="Marshall Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Marshall Islands' ? 'selected' : null : null }}>Marshall Islands</option>
                                        <option value="Martinique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Martinique' ? 'selected' : null : null }}>Martinique</option>
                                        <option value="Mauritania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mauritania' ? 'selected' : null : null }}>Mauritania</option>
                                        <option value="Mauritius" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mauritius' ? 'selected' : null : null }}>Mauritius</option>
                                        <option value="Mayotte" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mayotte' ? 'selected' : null : null }}>Mayotte</option>
                                        <option value="Mexico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mexico' ? 'selected' : null : null }}>Mexico</option>
                                        <option value="Micronesia, Federated States of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Micronesia, Federated States of' ? 'selected' : null : null }}>Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Moldova, Republic of' ? 'selected' : null : null }}>Moldova, Republic of</option>
                                        <option value="Monaco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Monaco' ? 'selected' : null : null }}>Monaco</option>
                                        <option value="Mongolia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mongolia' ? 'selected' : null : null }}>Mongolia</option>
                                        <option value="Montenegro" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Montenegro' ? 'selected' : null : null }}>Montenegro</option>
                                        <option value="Montserrat" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Montserrat' ? 'selected' : null : null }}>Montserrat</option>
                                        <option value="Morocco" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Morocco' ? 'selected' : null : null }}>Morocco</option>
                                        <option value="Mozambique" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Mozambique' ? 'selected' : null : null }}>Mozambique</option>
                                        <option value="Myanmar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Myanmar' ? 'selected' : null : null }}>Myanmar</option>
                                        <option value="Namibia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Namibia' ? 'selected' : null : null }}>Namibia</option>
                                        <option value="Nauru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nauru' ? 'selected' : null : null }}>Nauru</option>
                                        <option value="Nepal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nepal' ? 'selected' : null : null }}>Nepal</option>
                                        <option value="Netherlands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Netherlands' ? 'selected' : null : null }}>Netherlands</option>
                                        <option value="Netherlands Antilles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Netherlands Antilles' ? 'selected' : null : null }}>Netherlands Antilles</option>
                                        <option value="New Caledonia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'New Caledonia' ? 'selected' : null : null }}>New Caledonia</option>
                                        <option value="New Zealand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'New Zealand' ? 'selected' : null : null }}>New Zealand</option>
                                        <option value="Nicaragua" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nicaragua' ? 'selected' : null : null }}>Nicaragua</option>
                                        <option value="Niger" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Niger' ? 'selected' : null : null }}>Niger</option>
                                        <option value="Nigeria" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Nigeria' ? 'selected' : null : null }}>Nigeria</option>
                                        <option value="Niue" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Niue' ? 'selected' : null : null }}>Niue</option>
                                        <option value="Norfolk Island" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Norfolk Island' ? 'selected' : null : null }}>Norfolk Island</option>
                                        <option value="Northern Mariana Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Northern Mariana Islands' ? 'selected' : null : null }}>Northern Mariana Islands</option>
                                        <option value="Norway" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Norway' ? 'selected' : null : null }}>Norway</option>
                                        <option value="Oman" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Oman' ? 'selected' : null : null }}>Oman</option>
                                        <option value="Pakistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Pakistan' ? 'selected' : null : null }}>Pakistan</option>
                                        <option value="Palau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Palau' ? 'selected' : null : null }}>Palau</option>
                                        <option value="Palestinian Territory, Occupied" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Palestinian Territory, Occupied' ? 'selected' : null : null }}>Palestinian Territory, Occupied</option>
                                        <option value="Panama" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Panama' ? 'selected' : null : null }}>Panama</option>
                                        <option value="Papua New Guinea" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Papua New Guinea' ? 'selected' : null : null }}>Papua New Guinea</option>
                                        <option value="Paraguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Paraguay' ? 'selected' : null : null }}>Paraguay</option>
                                        <option value="Peru" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Peru' ? 'selected' : null : null }}>Peru</option>
                                        <option value="Philippines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Philippines' ? 'selected' : null : null }}>Philippines</option>
                                        <option value="Pitcairn" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Pitcairn' ? 'selected' : null : null }}>Pitcairn</option>
                                        <option value="Poland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Poland' ? 'selected' : null : null }}>Poland</option>
                                        <option value="Portugal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Portugal' ? 'selected' : null : null }}>Portugal</option>
                                        <option value="Puerto Rico" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Puerto Rico' ? 'selected' : null : null }}>Puerto Rico</option>
                                        <option value="Qatar" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Qatar' ? 'selected' : null : null }}>Qatar</option>
                                        <option value="Reunion" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Reunion' ? 'selected' : null : null }}>Reunion</option>
                                        <option value="Romania" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Romania' ? 'selected' : null : null }}>Romania</option>
                                        <option value="Russian Federation" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Russian Federation' ? 'selected' : null : null }}>Russian Federation</option>
                                        <option value="Rwanda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Rwanda' ? 'selected' : null : null }}>Rwanda</option>
                                        <option value="Saint Helena" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Helena' ? 'selected' : null : null }}>Saint Helena</option>
                                        <option value="Saint Kitts and Nevis" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Kitts and Nevis' ? 'selected' : null : null }}>Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Lucia' ? 'selected' : null : null }}>Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Pierre and Miquelon' ? 'selected' : null : null }}>Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saint Vincent and The Grenadines' ? 'selected' : null : null }}>Saint Vincent and The Grenadines</option>
                                        <option value="Samoa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Samoa' ? 'selected' : null : null }}>Samoa</option>
                                        <option value="San Marino" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'San Marino' ? 'selected' : null : null }}>San Marino</option>
                                        <option value="Sao Tome and Principe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sao Tome and Principe' ? 'selected' : null : null }}>Sao Tome and Principe</option>
                                        <option value="Saudi Arabia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Saudi Arabia' ? 'selected' : null : null }}>Saudi Arabia</option>
                                        <option value="Senegal" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Senegal' ? 'selected' : null : null }}>Senegal</option>
                                        <option value="Serbia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Serbia' ? 'selected' : null : null }}>Serbia</option>
                                        <option value="Seychelles" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Seychelles' ? 'selected' : null : null }}>Seychelles</option>
                                        <option value="Sierra Leone" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sierra Leone' ? 'selected' : null : null }}>Sierra Leone</option>
                                        <option value="Singapore" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Singapore' ? 'selected' : null : null }}>Singapore</option>
                                        <option value="Slovakia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Slovakia' ? 'selected' : null : null }}>Slovakia</option>
                                        <option value="Slovenia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Slovenia' ? 'selected' : null : null }}>Slovenia</option>
                                        <option value="Solomon Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Solomon Islands' ? 'selected' : null : null }}>Solomon Islands</option>
                                        <option value="Somalia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Somalia' ? 'selected' : null : null }}>Somalia</option>
                                        <option value="South Africa" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'South Africa' ? 'selected' : null : null }}>South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'South Georgia and The South Sandwich Islands' ? 'selected' : null : null }}>South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Spain' ? 'selected' : null : null }}>Spain</option>
                                        <option value="Sri Lanka" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sri Lanka' ? 'selected' : null : null }}>Sri Lanka</option>
                                        <option value="Sudan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sudan' ? 'selected' : null : null }}>Sudan</option>
                                        <option value="Suriname" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Suriname' ? 'selected' : null : null }}>Suriname</option>
                                        <option value="Svalbard and Jan Mayen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Svalbard and Jan Mayen' ? 'selected' : null : null }}>Svalbard and Jan Mayen</option>
                                        <option value="Swaziland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Swaziland' ? 'selected' : null : null }}>Swaziland</option>
                                        <option value="Sweden" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Sweden' ? 'selected' : null : null }}>Sweden</option>
                                        <option value="Switzerland" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Switzerland' ? 'selected' : null : null }}>Switzerland</option>
                                        <option value="Syrian Arab Republic" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Syrian Arab Republic' ? 'selected' : null : null }}>Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Taiwan, Province of China' ? 'selected' : null : null }}>Taiwan, Province of China</option>
                                        <option value="Tajikistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tajikistan' ? 'selected' : null : null }}>Tajikistan</option>
                                        <option value="Tanzania, United Republic of" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tanzania, United Republic of' ? 'selected' : null : null }}>Tanzania, United Republic of</option>
                                        <option value="Thailand" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Thailand' ? 'selected' : null : null }}>Thailand</option>
                                        <option value="Timor-leste" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Timor-leste' ? 'selected' : null : null }}>Timor-leste</option>
                                        <option value="Togo" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Togo' ? 'selected' : null : null }}>Togo</option>
                                        <option value="Tokelau" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tokelau' ? 'selected' : null : null }}>Tokelau</option>
                                        <option value="Tonga" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tonga' ? 'selected' : null : null }}>Tonga</option>
                                        <option value="Trinidad and Tobago" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Trinidad and Tobago' ? 'selected' : null : null }}>Trinidad and Tobago</option>
                                        <option value="Tunisia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tunisia' ? 'selected' : null : null }}>Tunisia</option>
                                        <option value="Turkey" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Turkey' ? 'selected' : null : null }}>Turkey</option>
                                        <option value="Turkmenistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Turkmenistan' ? 'selected' : null : null }}>Turkmenistan</option>
                                        <option value="Turks and Caicos Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Turks and Caicos Islands' ? 'selected' : null : null }}>Turks and Caicos Islands</option>
                                        <option value="Tuvalu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Tuvalu' ? 'selected' : null : null }}>Tuvalu</option>
                                        <option value="Uganda" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Uganda' ? 'selected' : null : null }}>Uganda</option>
                                        <option value="Ukraine" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Ukraine' ? 'selected' : null : null }}>Ukraine</option>
                                        <option value="United Arab Emirates" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United Arab Emirates' ? 'selected' : null : null }}>United Arab Emirates</option>
                                        <option value="United Kingdom" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United Kingdom' ? 'selected' : null : null }}>United Kingdom</option>
                                        <option value="United States" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United States' ? 'selected' : null : null }}>United States</option>
                                        <option value="United States Minor Outlying Islands" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'United States Minor Outlying Islands' ? 'selected' : null : null }}>United States Minor Outlying Islands</option>
                                        <option value="Uruguay" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Uruguay' ? 'selected' : null : null }}>Uruguay</option>
                                        <option value="Uzbekistan" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Uzbekistan' ? 'selected' : null : null }}>Uzbekistan</option>
                                        <option value="Vanuatu" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Vanuatu' ? 'selected' : null : null }}>Vanuatu</option>
                                        <option value="Venezuela" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Venezuela' ? 'selected' : null : null }}>Venezuela</option>
                                        <option value="Vietnam" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Vietnam' ? 'selected' : null : null }}>Vietnam</option>
                                        <option value="Virgin Islands, British" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Virgin Islands, British' ? 'selected' : null : null }}>Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S." {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Virgin Islands, U.S.' ? 'selected' : null : null }}>Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Wallis and Futuna' ? 'selected' : null : null }}>Wallis and Futuna</option>
                                        <option value="Western Sahara" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Western Sahara' ? 'selected' : null : null }}>Western Sahara</option>
                                        <option value="Yemen" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Yemen' ? 'selected' : null : null }}>Yemen</option>
                                        <option value="Zambia" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Zambia' ? 'selected' : null : null }}>Zambia</option>
                                        <option value="Zimbabwe" {{ isset($userPersonalInfo) ? $userPersonalInfo->nationality == 'Zimbabwe' ? 'selected' : null : null }}>Zimbabwe</option>
                                    </select>
                                </div>   
                                <div class="form-group col-lg-6">
                                    <label style="float: right">تاريخ الولادة</label>
                                    <br>
                                    <input type="date" id="birthdate" name="birthdate" value="{{ isset($userPersonalInfo) ? $userPersonalInfo->birthdate : null }}" required>
                                    @if($errors->has('birthdate'))
                                        <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label style="float: right">الجنس</label>
                                    <br>
                                    <select name="gender" id="gender" class="d-block" required>
                                        <option value="">اختر</option>
                                        <option value="ذكر" {{ isset($userPersonalInfo) ? $userPersonalInfo->gender == 'ذكر' ? 'selected' : null : null }}>ذكر</option>
                                        <option value="انثي" {{ isset($userPersonalInfo) ? $userPersonalInfo->gender == 'انثي' ? 'selected' : null : null }}>أنثى</option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6">
                                    <label style="float: right">الدرجة التي تبحث عنها</label>
                                    <br>
                                    <select name="degree_needed" id="degree_needed" class="d-block" required>
                                        <option value="">اختر</option>
                                        <option value="Bachelor" {{ isset($userPersonalInfo) ? $userPersonalInfo->degree_needed == 'Bachelor' ? 'selected' : null : null }}>بكالوريوس</option>
                                        <option value="Master" {{ isset($userPersonalInfo) ? $userPersonalInfo->degree_needed == 'Master' ? 'selected' : null : null }}>ماسترز</option>
                                        <option value="PhD" {{ isset($userPersonalInfo) ? $userPersonalInfo->degree_needed == 'PhD' ? 'selected' : null : null }}>دكتوراه</option>
                                    </select>
                                    @if($errors->has('degree_needed'))
                                        <span class="text-danger">{{ $errors->first('degree_needed') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="readon register-btn"><span class="txt">اكمل</span></button>
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