
@extends('frontend.layouts.app')

@section('title')
	@if(app()->getLocale() == 'en')
        EduGate | Contact Us 
    @else
        EduGate | تواصل معنا
	@endif
@endsection

@section('egec')
    @include('frontend.layouts.loader')

    @include('frontend.layouts.header')

    @if(app()->getLocale() == 'en')
        
        <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(assets/img/banner/banner5.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>Admission Request</h1>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end section bread crumb -->
    
		<!-- Main content Start -->
        <div class="main-content my-5">
            <div class="container">
                <div class="row shadow no-gutters">
                    <div class="col-md-6">
                        <div class="row no-gutters">
                            <img src="assets/img/university.png" class="image-beautiful h-200px w-100" alt="">
                            
                        </div>
                        <div class="card-description px-4 pt-4 ">
                            <h3 class="text-center text-main">To get a suitable opportunity for studying abroad besides attending international exhibitions, please fill the following registration form</h3>

                            <p>EDUGATE is the perfect solution to get a suitable opportunity to study abroad, and it offers international exhibitions for education "especially the higher education" that brings together schools and universities in addition to scholars to meet students who are looking for educational opportunities.
                            </p>
                        </div>
                    </div>
                </div>    

                    <div class="col-md-6 ">
                        <div class="box">
                            <div class="register-box">
                                                
                                                <div class="styled-form">
                                                    
                                                    <form id="form" action="" method="get">        
                                                        <div class="row clearfix align-items-center">

                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Full Name</label>
                                                                <input type="text" id="full_name" name="full_name" placeholder="Full name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Email</label>
                                                                <input type="email" id="email" name="email" placeholder="Email">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-12">
                                                                <label>Phone Number</label>
                                                                <input type="number" id="phone" class="tel-input w-100" name="phone" pattern="^[0-9]+$">
                                                                <span id="valid-msg" class="hide">✓ Valid</span>
                                                                <span id="error-msg" class="hide"></span>
                                                                <i class="fa fa-check-circle" style="top: 44%;"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>   
                                                            
                                                            </div>                                                       
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Area</label>
                                                                <select id="area" name="area">
                                                                    <option value="">Choose Area</option>
                                                                    <option value="Dubai">Dubai	</option>
                                                                    <option value="Abu Dhabi">Abu Dhabi</option>
                                                                    <option value="Sharjah">Sharjah</option>
                                                                    <option value="Al Ain">Al Ain	</option>
                                                                    <option value="Ajman">Ajman	</option>
                                                                    <option value="RAK City">RAK City</option>
                                                                    <option value="Fujairah">Fujairah</option>
                                                                    <option value="Umm al-Quwain">Umm al-Quwain</option>
                                                                    <option value="Khor Fakkan">Khor Fakkan</option>
                                                                    <option value="Kalba">Kalba	</option>
                                                                    <option value="Jebel Ali">Jebel Ali	</option>
                                                                    <option value="Dibba Al-Fujairah">Dibba Al-Fujairah	</option>
                                                                    <option value="Madinat Zayed">Madinat Zayed	</option>
                                                                    <option value="Ruwais">Ruwais</option>
                                                                    <option value="Liwa Oasis">Liwa Oasis	</option>
                                                                    <option value="Dhaid">Dhaid	</option>
                                                                    <option value="Ghayathi">Ghayathi	</option>
                                                                    <option value="Ar-Rams">Ar-Rams	</option>
                                                                    <option value="Dibba Al-Hisn">Dibba Al-Hisn	</option>
                                                                    <option value="Hatta">Hatta	</option>
                                                                    <option value="Al Madam">Al Madam</option>
                                                                </select>   
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                                                                            
                                                                                                                </div> 
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Date of Birth</label>
                                                                <input type="date" id="birthdate" name="birthdate" >
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            
                                                            </div>
                                                            
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Place of Residence</label>
                                                                <select id="nation" name="nation">
                                                                    
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>                                            
                                                            
                                                            </div> 
                                                            
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Nationality</label>
                                                                <select id="nationality" name="nationality">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            
                                                            </div>
            
                                                            
                                                            
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Required Qualification</label>
                                                                <br>
                                                                <select name="degree_needed" id="degree_needed" class="d-block" >
                                                                    <option value="" >Choose</option>
                                                                    <option value="Bachelor">Bachelor</option>
                                                                    <option value="Master">M.A.</option>
                                                                    <option value="PhD">PhD</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row align-items-end clearfix" id="show-bachelor-form" style="display:none">
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Pre-university academic qualification</label>
                                                                <select  id="school_degree_name" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Intermediate Diploma">Intermediate Secondary Diploma</option>
                                                                    <option value="Diploma above average">Upper Intermediate Secondary  Diploma</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>  
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Graduation Year</label>
                                                                <select  id="school_degree_year" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Academic Country before University</label>
                                                                <select id="school_degree_country" name="school_degree_country">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>

                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Percentage %</label>
                                                                <input type="number" class="d-block" id="percentage"  step=".01" placeholder="Percentage">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>                                                
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Educational System</label>
                                                                <select class="d-block"  id="education_system">
                                                                    <option value="">Choose</option>
                                                                    <option value="Scientific Section">Scientific Section</option>
                                                                    <option value="Mathematical Section">Mathematical Section</option>
                                                                    <option value="Literary Section">Literary Section</option>
                                                                    
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                        </div>
            
                                                        <div class="row align-items-end clearfix" id="show-master-form" style="display:none">
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Qualification</label>
                                                                <select  id="bachelor_degree_name" class="d-block">
                                                                    <option value="" selected="">Choose</option>
                                                                    <option value="Bachelor">Bachelor</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>   
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Graduation Year</label>
                                                                <select  id="bachelor_degree_year" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Country</label>
                                                                <select id="bachelor_degree_country"  class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University</label>
                                                                <input type="text"  id="bachelor_university_name" class="d-block" placeholder="University Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Collage</label>
                                                                <input type="text"  id="bachelor_faculty_name" class="d-block" placeholder="College Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>

                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>GPA</label>
                                                                <input type="number" class="d-block" id="bachelor_gpa_precentage" placeholder="Gpa"  step=".01">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Educational System</label>
                                                                <select class="d-block" id="bachelor_education_system">
                                                                    <option value="">Choose</option>
                                                                    <option value="Internal Education">Internal Education</option>
                                                                    <option value="External Education">External Education</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                        </div>
            
                                                        <div class="row align-items-end clearfix" id="show-phd-form" style="display:none">
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Qualification</label>
                                                                <select  id="master_degree_name" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Master">Master</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>   
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Graduation Year</label>
                                                                <select  id="master_degree_year" class="d-block">
                                                                    <option value=""> Choose</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Country</label>
                                                                <select id="master_degree_country"  class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University</label>
                                                                <input type="text"  id="master_university_name" class="d-block" placeholder="University Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Collage</label>
                                                                <input type="text"  id="master_faculty_name" class="d-block" placeholder="College Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Department</label>
                                                                <input type="text"  id="master_name" class="d-block" placeholder="Department Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>GPA</label>
                                                                <input type="number" class="d-block" id="master_gpa_precentage"  step=".01" placeholder="Gpa">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>


                                                            </div>
                                                        
                                                        </div>
            

                                                        
                                                        <div class="col-12">
                                                            <button class="btn btn-success w-100" name="" type="submit">Send</button>
                                                        </div>
                                                    
                                                    
                                                    </form>
                                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div> 
        
        
        
        <script>

        $(document).ready(function () {

            
            
                        $("#degree_needed").change(function () {
                            var val = $(this).val();
                            if (val == "Bachelor") {

                                $("#show-bachelor-form").show();
                                $("#show-phd-form").hide();
                                $("#show-master-form").hide();
                                $("#degree_needed option").attr("disabled","disabled");
                                $("#degree_needed option:selected").removeAttr("disabled");
                                // $("#degree_needed option:seleted").removeAttr("disabled");
                                let schoolDegreeName = document.getElementById("school_degree_name");
                                let schoolDegreeYear = document.getElementById("school_degree_year");
                                let schoolDegreeCountry = document.getElementById("school_degree_country");
                                let percentage = document.getElementById("percentage");
                                let educationSystem = document.getElementById("education_system");
                                schoolDegreeName.setAttribute("name","school_degree_name");
                                schoolDegreeYear.setAttribute("name","school_degree_year");
                                schoolDegreeCountry.setAttribute("name","school_degree_country");
                                percentage.setAttribute("name","percentage");
                                educationSystem.setAttribute("name","education_system");
                                var formErrors = [];
                                 
                                form.addEventListener('submit', e => {
                                    checkInputsSchool();
                                    if(formErrors.length) {
                                        e.preventDefault();
                                    }
                                });


                                function checkInputsSchool() {
                                    formErrors = [];
                                    
                                    let schoolDegreeNameValue = schoolDegreeName.value.trim();
                                    let schoolDegreeYearValue = schoolDegreeYear.value.trim();
                                    let schoolDegreeCountryValue = schoolDegreeCountry.value.trim();
                                    let percentageValue = percentage.value.trim();
                                    let educationSystemValue = educationSystem.value.trim();
                                                    
                                    
                                    
                                    if (schoolDegreeNameValue === "") {
                                        formErrors.push("Pre-university is required");
                                        setErrorForSchool(schoolDegreeName, "Pre-university is required");
                                    } else {
                                        setSuccessForSchool(schoolDegreeName);
                                    }
                                    if (schoolDegreeYearValue === "") {
                                        formErrors.push("Graduation Year is required");
                                        setErrorForSchool(schoolDegreeYear, "Graduation Year is required");
                                    } else {
                                        setSuccessForSchool(schoolDegreeYear);
                                    }
                                    if (schoolDegreeCountryValue === "") {
                                        formErrors.push("Academic is required");
                                        setErrorForSchool(schoolDegreeCountry, "Academic is required");
                                    } else {
                                        setSuccessForSchool(schoolDegreeCountry);
                                    }

                                    if (percentageValue === "") {
                                        formErrors.push("Percentage is required");
                                        setErrorForSchool(percentage, "Percentage is required");
                                    } else {
                                        setSuccessForSchool(percentage);
                                    }
                                    if (educationSystemValue === "") {
                                        formErrors.push("Educational System is required");
                                        setErrorForSchool(educationSystem, "Educational System is required");
                                    } else {
                                        setSuccessForSchool(educationSystem);
                                    }
                                }

                                function setErrorForSchool(input, message) {
                                    const formControl = input.parentElement;
                                    const small = formControl.querySelector('small');
                                    formControl.className = 'form-group form-control-validation error  col-lg-6';
                                    small.innerText = message;
                                }

                                function setSuccessForSchool(input) {
                                    const formControl = input.parentElement;
                                    formControl.className = 'form-group  form-control-validation success col-lg-6';
                                }

                            }
                             else if (val == "Master") {
                                $("#show-bachelor-form").hide();
                                $("#show-phd-form").hide();
                                $("#show-master-form").show();
                                $("#degree_needed option").attr("disabled","disabled");
                                $("#degree_needed option:selected").removeAttr("disabled");
                                // $("#degree_needed option").attr("disabled","disabled");
                                // $("#degree_needed option:seleted").removeAttr("disabled");      
                              
                                let bachelor_degree_name = document.getElementById("bachelor_degree_name");
                                let bachelor_degree_year = document.getElementById("bachelor_degree_year");
                                let bachelor_degree_country = document.getElementById("bachelor_degree_country");
                                let bachelor_university_name = document.getElementById("bachelor_university_name");
                                let bachelor_faculty_name = document.getElementById("bachelor_faculty_name");
                                let bachelor_gpa_precentage = document.getElementById("bachelor_gpa_precentage");
                                let bachelor_education_system = document.getElementById("bachelor_education_system");
                                bachelor_degree_name.setAttribute("name","bachelor_degree_name");
                                bachelor_degree_year.setAttribute("name","bachelor_degree_year");
                                bachelor_degree_country.setAttribute("name","bachelor_degree_country");
                                bachelor_university_name.setAttribute("name","bachelor_university_name");
                                bachelor_faculty_name.setAttribute("name","bachelor_faculty_name");
                                bachelor_gpa_precentage.setAttribute("name","bachelor_gpa_precentage");
                                bachelor_education_system.setAttribute("name","bachelor_education_system");
                                var formErrors = [];

                                form.addEventListener('submit', e => {
                                    checkInputs();
                                    if(formErrors.length) {
                                        e.preventDefault();
                                    }
                                });

                                function checkInputs() 
                                {
                                    formErrors = [];
                                    
                                    let bachelor_degree_nameValue = bachelor_degree_name.value.trim();
                                    let bachelor_degree_yearValue = bachelor_degree_year.value.trim();
                                    let bachelor_degree_countryValue = bachelor_degree_country.value.trim();
                                    let bachelor_university_nameValue = bachelor_university_name.value.trim();
                                    let bachelor_faculty_nameValue = bachelor_faculty_name.value.trim();
                                    let bachelor_gpa_precentageValue = bachelor_gpa_precentage.value.trim();
                                    let bachelor_education_systemValue =bachelor_education_system.value.trim();
                                                    
                                    
                                    
                                        if (bachelor_degree_nameValue === "") {
                                            formErrors.push("University Qualification is required");
                                            setErrorFor(bachelor_degree_name, "University Qualification is required");
                                        } else {
                                            setSuccessFor(bachelor_degree_name);
                                        }
                                        if (bachelor_degree_yearValue === "") {
                                            formErrors.push("Graduation Year is required");
                                            setErrorFor(bachelor_degree_year, "Graduation Year is required");
                                        } else {
                                            setSuccessFor(bachelor_degree_year);
                                        }
                                        if (bachelor_degree_countryValue === "") {
                                            formErrors.push("University Country is required");
                                            setErrorFor(bachelor_degree_country, "University Country is required");
                                        } else {
                                            setSuccessFor(bachelor_degree_country);
                                        }
                                        if (bachelor_university_nameValue === "") {
                                            formErrors.push("University is required");
                                            setErrorFor(bachelor_university_name, "University is required");
                                        } else {
                                            setSuccessFor(bachelor_university_name);
                                        }
                                        if (bachelor_faculty_nameValue === "") {
                                            formErrors.push("Collage is required");
                                            setErrorFor(bachelor_faculty_name, "Collage is required");
                                        } else {
                                            setSuccessFor(bachelor_faculty_name);
                                        }

                                        if (bachelor_gpa_precentageValue === "") {
                                            formErrors.push("Gpa is required");
                                            setErrorFor(bachelor_gpa_precentage, "Gpa is required");
                                        } else {
                                            setSuccessFor(bachelor_gpa_precentage);
                                        }
                                        if (bachelor_education_systemValue === "") {
                                            formErrors.push("Educational System is required");
                                            setErrorFor(bachelor_education_system, "Educational System is required");
                                        } else {
                                            setSuccessFor(bachelor_education_system);
                                        }
                                    
                                    }
                                    
                                    

                                function setErrorFor(input, message) {
                                    const formControl = input.parentElement;
                                    const small = formControl.querySelector('small');
                                    formControl.className = 'form-group form-control-validation error  col-lg-6';
                                    small.innerText = message;
                                }

                                function setSuccessFor(input) {
                                    const formControl = input.parentElement;
                                    formControl.className = 'form-group  form-control-validation success col-lg-6';
                                }
                                    
                                    
                                
                                }
                            else if (val == "PhD") {
                                $("#show-bachelor-form").hide();
                                $("#show-phd-form").show();
                                $("#show-master-form").hide();
                                $("#degree_needed option").attr("disabled","disabled");
                                $("#degree_needed option:selected").removeAttr("disabled");
                             
                                let master_degree_name = document.getElementById("master_degree_name");
                                let master_degree_year = document.getElementById("master_degree_year");
                                let master_degree_country = document.getElementById("master_degree_country");
                                let master_university_name = document.getElementById("master_university_name");
                                let master_faculty_name = document.getElementById("master_faculty_name");
                                let master_name = document.getElementById("master_name");
                                let master_gpa_precentage = document.getElementById("master_gpa_precentage");
                                master_degree_name.setAttribute("name","master_degree_name");
                                master_degree_year.setAttribute("name","master_degree_year");
                                master_degree_country.setAttribute("name","master_degree_country");
                                master_university_name.setAttribute("name","master_university_name");
                                master_faculty_name.setAttribute("name","master_faculty_name");
                                master_name.setAttribute("name","master_name");
                                master_gpa_precentage.setAttribute("name","master_gpa_precentage");
                              var formErrors = [];

                              form.addEventListener('submit', e => {
                                  checkInputsPhd();
                                  if(formErrors.length) {
                                      e.preventDefault();
                                  }
                              });

                              function checkInputsPhd() 
                              {
                                  formErrors = [];
                                  
                                  let master_degree_nameValue = master_degree_name.value.trim();
                                  let master_degree_yearValue = master_degree_year.value.trim();
                                  let master_degree_countryValue = master_degree_country.value.trim();
                                  let master_university_nameValue = master_university_name.value.trim();
                                  let master_faculty_nameValue = master_faculty_name.value.trim();
                                  let master_nameValue = master_name.value.trim();
                                  let master_gpa_precentageValue = master_gpa_precentage.value.trim();
                                  
                                  
                                    if (master_degree_nameValue === "") {
                                        formErrors.push("University Qualification is required");
                                        setErrorForPhd(master_degree_name, "University Qualification is required");
                                    } else {
                                        setSuccessForPhd(master_degree_name);
                                    }
                                    if (master_degree_yearValue === "") {
                                        formErrors.push("Graduation Year is required");
                                        setErrorForPhd(master_degree_year, "Graduation Year is required");
                                    } else {
                                        setSuccessForPhd(master_degree_year);
                                    }
                                    if (master_degree_countryValue === "") {
                                        formErrors.push("University Country is required");
                                        setErrorForPhd(master_degree_country, "University Country is required");
                                    } else {
                                        setSuccessForPhd(master_degree_country);
                                    }
                                    if (master_university_nameValue === "") {
                                        formErrors.push("University is required");
                                        setErrorForPhd(master_university_name, "University is required");
                                    } else {
                                        setSuccessForPhd(master_university_name);
                                    }
                                    if (master_faculty_nameValue === "") {
                                        formErrors.push("Collage is required");
                                        setErrorForPhd(master_faculty_name, "Collage is required");
                                    } else {
                                        setSuccessForPhd(master_faculty_name);
                                    }
                                    if (master_nameValue === "") {
                                        formErrors.push("Departement is required");
                                        setErrorForPhd(master_name, "Departement is required");
                                    } else {
                                        setSuccessForPhd(master_name);
                                    }
                                    if (master_gpa_precentageValue === "") {
                                        formErrors.push("Gpa is required");
                                        setErrorForPhd(master_gpa_precentage, " Gpa is required");
                                    } else {
                                        setSuccessForPhd(master_gpa_precentage);
                                    }



                                  
                              }

                              function setErrorForPhd(input, message) {
                                  const formControl = input.parentElement;
                                  const small = formControl.querySelector('small');
                                  formControl.className = 'form-group form-control-validation error  col-lg-6';
                                  small.innerText = message;
                              }

                              function setSuccessForPhd(input) {
                                  const formControl = input.parentElement;
                                  formControl.className = 'form-group  form-control-validation success col-lg-6';
                              }
                               
                                

                            }else if(val == ""){
                                $("#show-bachelor-form").hide();
                                $("#show-phd-form").hide();
                                $("#show-master-form").hide();
                            }
                        });
                    });
    </script>
  
    <script>
       
      
        var input = document.querySelector("#phone"),
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg");
      // initialise plugin
      var iti = window.intlTelInput(input, {
        preferredCountries: ['ae','eg', 'sa','qa','kw','jo'],
        separateDialCode: true,
        utilsScript: "assets/js/utils.js",
      });
      // here, the index maps to the error code returned from getValidationError - see readme
      var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

      // initialise plugin


      var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        errorMsg.classList.add("text-danger");
        validMsg.classList.add("hide");
        validMsg.classList.add("text-success");
        
      };
      
      // on blur: validate
      input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
          if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
            
          } else {
            input.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
          }
        }
        const form = document.getElementById('form');

        



        var formErrors = [];

        form.addEventListener('submit', e => {
            checkInputs();
            if(formErrors.length) {
                e.preventDefault();
            }
        });

        function checkInputs() {
            formErrors = [];
            // trim to remove the whitespaces
            
            const phoneValue = input.value.trim();
            
            
            
            if(phoneValue === '') {
                formErrors.push('Phone number is required');
                setErrorFor(input, 'Phone number is required');
            } else {
                setSuccessFor(input);
            }
            
        }

        function setErrorFor(input, message) {
            const formControl = input.parentElement.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-group form-control-validation error  col-lg-12';
            small.innerText = message;
        }

        function setSuccessFor(input) {
            const formControl = input.parentElement.parentElement;
            formControl.className = 'form-group  form-control-validation success col-lg-12';
        }
      });

      // on keyup / change flag: reset
      input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
      //phone melsh da3wa

          const form = document.getElementById('form');
          const fullName = document.getElementById('full_name');
          
          const area = document.getElementById('area');
          const birthdate = document.getElementById('birthdate');
          const nation = document.getElementById('nation');
          const nationality = document.getElementById('nationality');
          const degreeNeeded = document.getElementById('degree_needed');
           
        var formErrors = [];

        form.addEventListener('submit', e => {
            checkInputs();
            if(formErrors.length) {
                e.preventDefault();
            }
        });

        function checkInputs() 
        {
            formErrors = [];
            // trim to remove the whitespaces
            const fullNameValue = fullName.value.trim();
           
            const emailValue = email.value.trim();
            const areaValue = area.value.trim();
            const birthdateValue = birthdate.value.trim();
            const nationValue = nation.value.trim();
            const nationalityValue = nationality.value.trim();

            const degreeNeededValue = degreeNeeded.value.trim();

            if(fullNameValue === '') {
                formErrors.push('Full name is required');
                setErrorFor(fullName, 'Full name is required');
            } else {
                setSuccessFor(fullName);
            }
            
            if(emailValue === '') {
                formErrors.push('Email is required');
                setErrorFor(email, 'Email is required');
            } else if (!isEmail(emailValue)) {
                formErrors.push('Email is invalid');
                setErrorFor(email, 'Email is invalid');
            } else {
                setSuccessFor(email);
            }
            if(areaValue === '') {
                formErrors.push('Area is required');
                setErrorFor(area, 'Area is required');
            } else {
                setSuccessFor(area);
            }
            if(birthdateValue === '') {
                formErrors.push('Birthdate is required');
                setErrorFor(birthdate, 'Birthdate is required');
            } else {
                setSuccessFor(birthdate);
            }
            if(nationValue === '') {
                formErrors.push('Country is required');
                setErrorFor(nation, 'Country is required');
            } else {
                setSuccessFor(nation);
            }
            if(nationalityValue === '') {
                formErrors.push('Nationality is required');
                setErrorFor(nationality, 'Nationality is required');
            } else {
                setSuccessFor(nationality);
            }

            if(degreeNeededValue === '') {
                formErrors.push('Qualification is required');
                setErrorFor(degreeNeeded, 'Qualification is required');
            } else {
                setSuccessFor(degreeNeeded);
                
            }
            
            
            
        }
        
        function setErrorFor(input, message) {
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-group form-control-validation error  col-lg-6';
            small.innerText = message;
        }
        
        function setSuccessFor(input) {
            const formControl = input.parentElement;
            formControl.className = 'form-group  form-control-validation success col-lg-6';
        }
        
        function isEmail(email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }
        
                       
        </script>
        
    @else
    
    
    <div class="breadcrumb-area bg-gray text-center shadow dark text-light bg-cover" style="background-image: url(assets/img/banner/banner5.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>Admission Request</h1>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end section bread crumb -->
    
		<!-- Main content Start -->
        <div class="main-content my-5">
            <div class="container">
                <div class="row shadow no-gutters">
                    <div class="col-md-6">
                        <div class="row no-gutters">
                            <img src="assets/img/university.png" class="image-beautiful h-200px w-100" alt="">
                            
                        </div>
                        <div class="card-description px-4 pt-4 ">
                            <h3 class="text-center text-main">To get a suitable opportunity for studying abroad besides attending international exhibitions, please fill the following registration form</h3>

                            <p>EDUGATE is the perfect solution to get a suitable opportunity to study abroad, and it offers international exhibitions for education "especially the higher education" that brings together schools and universities in addition to scholars to meet students who are looking for educational opportunities.
                            </p>
                        </div>
                    </div>
                </div>    

                    <div class="col-md-6 ">
                        <div class="box">
                            <div class="register-box">
                                                
                                                <div class="styled-form">
                                                    
                                                    <form id="form" action="" method="get">        
                                                        <div class="row clearfix align-items-center">

                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Full Name</label>
                                                                <input type="text" id="full_name" name="full_name" placeholder="Full name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Email</label>
                                                                <input type="email" id="email" name="email" placeholder="Email">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-12">
                                                                <label>Phone Number</label>
                                                                <input type="number" id="phone" class="tel-input w-100" name="phone" pattern="^[0-9]+$">
                                                                <span id="valid-msg" class="hide">✓ Valid</span>
                                                                <span id="error-msg" class="hide"></span>
                                                                <i class="fa fa-check-circle" style="top: 44%;"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>   
                                                            
                                                            </div>                                                       
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Area</label>
                                                                <select id="area" name="area">
                                                                    <option value="">Choose Area</option>
                                                                    <option value="Dubai">Dubai	</option>
                                                                    <option value="Abu Dhabi">Abu Dhabi</option>
                                                                    <option value="Sharjah">Sharjah</option>
                                                                    <option value="Al Ain">Al Ain	</option>
                                                                    <option value="Ajman">Ajman	</option>
                                                                    <option value="RAK City">RAK City</option>
                                                                    <option value="Fujairah">Fujairah</option>
                                                                    <option value="Umm al-Quwain">Umm al-Quwain</option>
                                                                    <option value="Khor Fakkan">Khor Fakkan</option>
                                                                    <option value="Kalba">Kalba	</option>
                                                                    <option value="Jebel Ali">Jebel Ali	</option>
                                                                    <option value="Dibba Al-Fujairah">Dibba Al-Fujairah	</option>
                                                                    <option value="Madinat Zayed">Madinat Zayed	</option>
                                                                    <option value="Ruwais">Ruwais</option>
                                                                    <option value="Liwa Oasis">Liwa Oasis	</option>
                                                                    <option value="Dhaid">Dhaid	</option>
                                                                    <option value="Ghayathi">Ghayathi	</option>
                                                                    <option value="Ar-Rams">Ar-Rams	</option>
                                                                    <option value="Dibba Al-Hisn">Dibba Al-Hisn	</option>
                                                                    <option value="Hatta">Hatta	</option>
                                                                    <option value="Al Madam">Al Madam</option>
                                                                </select>   
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                                                                            
                                                                                                                </div> 
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Date of Birth</label>
                                                                <input type="date" id="birthdate" name="birthdate" >
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            
                                                            </div>
                                                            
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Place of Residence</label>
                                                                <select id="nation" name="nation">
                                                                    
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>                                            
                                                            
                                                            </div> 
                                                            
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Nationality</label>
                                                                <select id="nationality" name="nationality">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            
                                                            </div>
            
                                                            
                                                            
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Required Qualification</label>
                                                                <br>
                                                                <select name="degree_needed" id="degree_needed" class="d-block" >
                                                                    <option value="" >Choose</option>
                                                                    <option value="Bachelor">Bachelor</option>
                                                                    <option value="Master">M.A.</option>
                                                                    <option value="PhD">PhD</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row align-items-end clearfix" id="show-bachelor-form" style="display:none">
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Pre-university academic qualification</label>
                                                                <select  id="school_degree_name" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Intermediate Diploma">Intermediate Secondary Diploma</option>
                                                                    <option value="Diploma above average">Upper Intermediate Secondary  Diploma</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>  
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Graduation Year</label>
                                                                <select  id="school_degree_year" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Academic Country before University</label>
                                                                <select id="school_degree_country" name="school_degree_country">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>

                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Percentage %</label>
                                                                <input type="number" class="d-block" id="percentage"  step=".01" placeholder="Percentage">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>                                                
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Educational System</label>
                                                                <select class="d-block"  id="education_system">
                                                                    <option value="">Choose</option>
                                                                    <option value="Scientific Section">Scientific Section</option>
                                                                    <option value="Mathematical Section">Mathematical Section</option>
                                                                    <option value="Literary Section">Literary Section</option>
                                                                    
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                        </div>
            
                                                        <div class="row align-items-end clearfix" id="show-master-form" style="display:none">
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Qualification</label>
                                                                <select  id="bachelor_degree_name" class="d-block">
                                                                    <option value="" selected="">Choose</option>
                                                                    <option value="Bachelor">Bachelor</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>   
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Graduation Year</label>
                                                                <select  id="bachelor_degree_year" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Country</label>
                                                                <select id="bachelor_degree_country"  class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University</label>
                                                                <input type="text"  id="bachelor_university_name" class="d-block" placeholder="University Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Collage</label>
                                                                <input type="text"  id="bachelor_faculty_name" class="d-block" placeholder="College Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>

                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>GPA</label>
                                                                <input type="number" class="d-block" id="bachelor_gpa_precentage" placeholder="Gpa"  step=".01">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Educational System</label>
                                                                <select class="d-block" id="bachelor_education_system">
                                                                    <option value="">Choose</option>
                                                                    <option value="Internal Education">Internal Education</option>
                                                                    <option value="External Education">External Education</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                        </div>
            
                                                        <div class="row align-items-end clearfix" id="show-phd-form" style="display:none">
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Qualification</label>
                                                                <select  id="master_degree_name" class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Master">Master</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>   
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Graduation Year</label>
                                                                <select  id="master_degree_year" class="d-block">
                                                                    <option value=""> Choose</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University Country</label>
                                                                <select id="master_degree_country"  class="d-block">
                                                                    <option value="">Choose</option>
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Ter">French Southern Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                                                    <option value="United States of America">United States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>University</label>
                                                                <input type="text"  id="master_university_name" class="d-block" placeholder="University Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Collage</label>
                                                                <input type="text"  id="master_faculty_name" class="d-block" placeholder="College Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>Department</label>
                                                                <input type="text"  id="master_name" class="d-block" placeholder="Department Name">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>
                                                            <div class="form-group form-control-validation col-lg-6">
                                                                <label>GPA</label>
                                                                <input type="number" class="d-block" id="master_gpa_precentage"  step=".01" placeholder="Gpa">
                                                                <i class="fa fa-check-circle"></i>
                                                                <i class="fa fa-exclamation-circle"></i>
                                                                <small>Error message</small>
                                                            </div>


                                                            </div>
                                                        
                                                        </div>
            

                                                        
                                                        <div class="col-12">
                                                            <button class="btn btn-success w-100" name="" type="submit">Send</button>
                                                        </div>
                                                    
                                                    
                                                    </form>
                                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div> 
        
        
        
        <script>

        $(document).ready(function () {

            
            
                        $("#degree_needed").change(function () {
                            var val = $(this).val();
                            if (val == "Bachelor") {

                                $("#show-bachelor-form").show();
                                $("#show-phd-form").hide();
                                $("#show-master-form").hide();
                                $("#degree_needed option").attr("disabled","disabled");
                                $("#degree_needed option:selected").removeAttr("disabled");
                                // $("#degree_needed option:seleted").removeAttr("disabled");
                                let schoolDegreeName = document.getElementById("school_degree_name");
                                let schoolDegreeYear = document.getElementById("school_degree_year");
                                let schoolDegreeCountry = document.getElementById("school_degree_country");
                                let percentage = document.getElementById("percentage");
                                let educationSystem = document.getElementById("education_system");
                                schoolDegreeName.setAttribute("name","school_degree_name");
                                schoolDegreeYear.setAttribute("name","school_degree_year");
                                schoolDegreeCountry.setAttribute("name","school_degree_country");
                                percentage.setAttribute("name","percentage");
                                educationSystem.setAttribute("name","education_system");
                                var formErrors = [];
                                 
                                form.addEventListener('submit', e => {
                                    checkInputsSchool();
                                    if(formErrors.length) {
                                        e.preventDefault();
                                    }
                                });


                                function checkInputsSchool() {
                                    formErrors = [];
                                    
                                    let schoolDegreeNameValue = schoolDegreeName.value.trim();
                                    let schoolDegreeYearValue = schoolDegreeYear.value.trim();
                                    let schoolDegreeCountryValue = schoolDegreeCountry.value.trim();
                                    let percentageValue = percentage.value.trim();
                                    let educationSystemValue = educationSystem.value.trim();
                                                    
                                    
                                    
                                    if (schoolDegreeNameValue === "") {
                                        formErrors.push("Pre-university is required");
                                        setErrorForSchool(schoolDegreeName, "Pre-university is required");
                                    } else {
                                        setSuccessForSchool(schoolDegreeName);
                                    }
                                    if (schoolDegreeYearValue === "") {
                                        formErrors.push("Graduation Year is required");
                                        setErrorForSchool(schoolDegreeYear, "Graduation Year is required");
                                    } else {
                                        setSuccessForSchool(schoolDegreeYear);
                                    }
                                    if (schoolDegreeCountryValue === "") {
                                        formErrors.push("Academic is required");
                                        setErrorForSchool(schoolDegreeCountry, "Academic is required");
                                    } else {
                                        setSuccessForSchool(schoolDegreeCountry);
                                    }

                                    if (percentageValue === "") {
                                        formErrors.push("Percentage is required");
                                        setErrorForSchool(percentage, "Percentage is required");
                                    } else {
                                        setSuccessForSchool(percentage);
                                    }
                                    if (educationSystemValue === "") {
                                        formErrors.push("Educational System is required");
                                        setErrorForSchool(educationSystem, "Educational System is required");
                                    } else {
                                        setSuccessForSchool(educationSystem);
                                    }
                                }

                                function setErrorForSchool(input, message) {
                                    const formControl = input.parentElement;
                                    const small = formControl.querySelector('small');
                                    formControl.className = 'form-group form-control-validation error  col-lg-6';
                                    small.innerText = message;
                                }

                                function setSuccessForSchool(input) {
                                    const formControl = input.parentElement;
                                    formControl.className = 'form-group  form-control-validation success col-lg-6';
                                }

                            }
                             else if (val == "Master") {
                                $("#show-bachelor-form").hide();
                                $("#show-phd-form").hide();
                                $("#show-master-form").show();
                                $("#degree_needed option").attr("disabled","disabled");
                                $("#degree_needed option:selected").removeAttr("disabled");
                                // $("#degree_needed option").attr("disabled","disabled");
                                // $("#degree_needed option:seleted").removeAttr("disabled");      
                              
                                let bachelor_degree_name = document.getElementById("bachelor_degree_name");
                                let bachelor_degree_year = document.getElementById("bachelor_degree_year");
                                let bachelor_degree_country = document.getElementById("bachelor_degree_country");
                                let bachelor_university_name = document.getElementById("bachelor_university_name");
                                let bachelor_faculty_name = document.getElementById("bachelor_faculty_name");
                                let bachelor_gpa_precentage = document.getElementById("bachelor_gpa_precentage");
                                let bachelor_education_system = document.getElementById("bachelor_education_system");
                                bachelor_degree_name.setAttribute("name","bachelor_degree_name");
                                bachelor_degree_year.setAttribute("name","bachelor_degree_year");
                                bachelor_degree_country.setAttribute("name","bachelor_degree_country");
                                bachelor_university_name.setAttribute("name","bachelor_university_name");
                                bachelor_faculty_name.setAttribute("name","bachelor_faculty_name");
                                bachelor_gpa_precentage.setAttribute("name","bachelor_gpa_precentage");
                                bachelor_education_system.setAttribute("name","bachelor_education_system");
                                var formErrors = [];

                                form.addEventListener('submit', e => {
                                    checkInputs();
                                    if(formErrors.length) {
                                        e.preventDefault();
                                    }
                                });

                                function checkInputs() 
                                {
                                    formErrors = [];
                                    
                                    let bachelor_degree_nameValue = bachelor_degree_name.value.trim();
                                    let bachelor_degree_yearValue = bachelor_degree_year.value.trim();
                                    let bachelor_degree_countryValue = bachelor_degree_country.value.trim();
                                    let bachelor_university_nameValue = bachelor_university_name.value.trim();
                                    let bachelor_faculty_nameValue = bachelor_faculty_name.value.trim();
                                    let bachelor_gpa_precentageValue = bachelor_gpa_precentage.value.trim();
                                    let bachelor_education_systemValue =bachelor_education_system.value.trim();
                                                    
                                    
                                    
                                        if (bachelor_degree_nameValue === "") {
                                            formErrors.push("University Qualification is required");
                                            setErrorFor(bachelor_degree_name, "University Qualification is required");
                                        } else {
                                            setSuccessFor(bachelor_degree_name);
                                        }
                                        if (bachelor_degree_yearValue === "") {
                                            formErrors.push("Graduation Year is required");
                                            setErrorFor(bachelor_degree_year, "Graduation Year is required");
                                        } else {
                                            setSuccessFor(bachelor_degree_year);
                                        }
                                        if (bachelor_degree_countryValue === "") {
                                            formErrors.push("University Country is required");
                                            setErrorFor(bachelor_degree_country, "University Country is required");
                                        } else {
                                            setSuccessFor(bachelor_degree_country);
                                        }
                                        if (bachelor_university_nameValue === "") {
                                            formErrors.push("University is required");
                                            setErrorFor(bachelor_university_name, "University is required");
                                        } else {
                                            setSuccessFor(bachelor_university_name);
                                        }
                                        if (bachelor_faculty_nameValue === "") {
                                            formErrors.push("Collage is required");
                                            setErrorFor(bachelor_faculty_name, "Collage is required");
                                        } else {
                                            setSuccessFor(bachelor_faculty_name);
                                        }

                                        if (bachelor_gpa_precentageValue === "") {
                                            formErrors.push("Gpa is required");
                                            setErrorFor(bachelor_gpa_precentage, "Gpa is required");
                                        } else {
                                            setSuccessFor(bachelor_gpa_precentage);
                                        }
                                        if (bachelor_education_systemValue === "") {
                                            formErrors.push("Educational System is required");
                                            setErrorFor(bachelor_education_system, "Educational System is required");
                                        } else {
                                            setSuccessFor(bachelor_education_system);
                                        }
                                    
                                    }
                                    
                                    

                                function setErrorFor(input, message) {
                                    const formControl = input.parentElement;
                                    const small = formControl.querySelector('small');
                                    formControl.className = 'form-group form-control-validation error  col-lg-6';
                                    small.innerText = message;
                                }

                                function setSuccessFor(input) {
                                    const formControl = input.parentElement;
                                    formControl.className = 'form-group  form-control-validation success col-lg-6';
                                }
                                    
                                    
                                
                                }
                            else if (val == "PhD") {
                                $("#show-bachelor-form").hide();
                                $("#show-phd-form").show();
                                $("#show-master-form").hide();
                                $("#degree_needed option").attr("disabled","disabled");
                                $("#degree_needed option:selected").removeAttr("disabled");
                             
                                let master_degree_name = document.getElementById("master_degree_name");
                                let master_degree_year = document.getElementById("master_degree_year");
                                let master_degree_country = document.getElementById("master_degree_country");
                                let master_university_name = document.getElementById("master_university_name");
                                let master_faculty_name = document.getElementById("master_faculty_name");
                                let master_name = document.getElementById("master_name");
                                let master_gpa_precentage = document.getElementById("master_gpa_precentage");
                                master_degree_name.setAttribute("name","master_degree_name");
                                master_degree_year.setAttribute("name","master_degree_year");
                                master_degree_country.setAttribute("name","master_degree_country");
                                master_university_name.setAttribute("name","master_university_name");
                                master_faculty_name.setAttribute("name","master_faculty_name");
                                master_name.setAttribute("name","master_name");
                                master_gpa_precentage.setAttribute("name","master_gpa_precentage");
                              var formErrors = [];

                              form.addEventListener('submit', e => {
                                  checkInputsPhd();
                                  if(formErrors.length) {
                                      e.preventDefault();
                                  }
                              });

                              function checkInputsPhd() 
                              {
                                  formErrors = [];
                                  
                                  let master_degree_nameValue = master_degree_name.value.trim();
                                  let master_degree_yearValue = master_degree_year.value.trim();
                                  let master_degree_countryValue = master_degree_country.value.trim();
                                  let master_university_nameValue = master_university_name.value.trim();
                                  let master_faculty_nameValue = master_faculty_name.value.trim();
                                  let master_nameValue = master_name.value.trim();
                                  let master_gpa_precentageValue = master_gpa_precentage.value.trim();
                                  
                                  
                                    if (master_degree_nameValue === "") {
                                        formErrors.push("University Qualification is required");
                                        setErrorForPhd(master_degree_name, "University Qualification is required");
                                    } else {
                                        setSuccessForPhd(master_degree_name);
                                    }
                                    if (master_degree_yearValue === "") {
                                        formErrors.push("Graduation Year is required");
                                        setErrorForPhd(master_degree_year, "Graduation Year is required");
                                    } else {
                                        setSuccessForPhd(master_degree_year);
                                    }
                                    if (master_degree_countryValue === "") {
                                        formErrors.push("University Country is required");
                                        setErrorForPhd(master_degree_country, "University Country is required");
                                    } else {
                                        setSuccessForPhd(master_degree_country);
                                    }
                                    if (master_university_nameValue === "") {
                                        formErrors.push("University is required");
                                        setErrorForPhd(master_university_name, "University is required");
                                    } else {
                                        setSuccessForPhd(master_university_name);
                                    }
                                    if (master_faculty_nameValue === "") {
                                        formErrors.push("Collage is required");
                                        setErrorForPhd(master_faculty_name, "Collage is required");
                                    } else {
                                        setSuccessForPhd(master_faculty_name);
                                    }
                                    if (master_nameValue === "") {
                                        formErrors.push("Departement is required");
                                        setErrorForPhd(master_name, "Departement is required");
                                    } else {
                                        setSuccessForPhd(master_name);
                                    }
                                    if (master_gpa_precentageValue === "") {
                                        formErrors.push("Gpa is required");
                                        setErrorForPhd(master_gpa_precentage, " Gpa is required");
                                    } else {
                                        setSuccessForPhd(master_gpa_precentage);
                                    }



                                  
                              }

                              function setErrorForPhd(input, message) {
                                  const formControl = input.parentElement;
                                  const small = formControl.querySelector('small');
                                  formControl.className = 'form-group form-control-validation error  col-lg-6';
                                  small.innerText = message;
                              }

                              function setSuccessForPhd(input) {
                                  const formControl = input.parentElement;
                                  formControl.className = 'form-group  form-control-validation success col-lg-6';
                              }
                               
                                

                            }else if(val == ""){
                                $("#show-bachelor-form").hide();
                                $("#show-phd-form").hide();
                                $("#show-master-form").hide();
                            }
                        });
                    });
    </script>
  
    <script>
       
      
        var input = document.querySelector("#phone"),
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg");
      // initialise plugin
      var iti = window.intlTelInput(input, {
        preferredCountries: ['ae','eg', 'sa','qa','kw','jo'],
        separateDialCode: true,
        utilsScript: "assets/js/utils.js",
      });
      // here, the index maps to the error code returned from getValidationError - see readme
      var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

      // initialise plugin


      var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        errorMsg.classList.add("text-danger");
        validMsg.classList.add("hide");
        validMsg.classList.add("text-success");
        
      };
      
      // on blur: validate
      input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
          if (iti.isValidNumber()) {
            validMsg.classList.remove("hide");
            
          } else {
            input.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide");
          }
        }
        const form = document.getElementById('form');

        



        var formErrors = [];

        form.addEventListener('submit', e => {
            checkInputs();
            if(formErrors.length) {
                e.preventDefault();
            }
        });

        function checkInputs() {
            formErrors = [];
            // trim to remove the whitespaces
            
            const phoneValue = input.value.trim();
            
            
            
            if(phoneValue === '') {
                formErrors.push('Phone number is required');
                setErrorFor(input, 'Phone number is required');
            } else {
                setSuccessFor(input);
            }
            
        }

        function setErrorFor(input, message) {
            const formControl = input.parentElement.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-group form-control-validation error  col-lg-12';
            small.innerText = message;
        }

        function setSuccessFor(input) {
            const formControl = input.parentElement.parentElement;
            formControl.className = 'form-group  form-control-validation success col-lg-12';
        }
      });

      // on keyup / change flag: reset
      input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
      //phone melsh da3wa

          const form = document.getElementById('form');
          const fullName = document.getElementById('full_name');
          
          const area = document.getElementById('area');
          const birthdate = document.getElementById('birthdate');
          const nation = document.getElementById('nation');
          const nationality = document.getElementById('nationality');
          const degreeNeeded = document.getElementById('degree_needed');
           
        var formErrors = [];

        form.addEventListener('submit', e => {
            checkInputs();
            if(formErrors.length) {
                e.preventDefault();
            }
        });

        function checkInputs() 
        {
            formErrors = [];
            // trim to remove the whitespaces
            const fullNameValue = fullName.value.trim();
           
            const emailValue = email.value.trim();
            const areaValue = area.value.trim();
            const birthdateValue = birthdate.value.trim();
            const nationValue = nation.value.trim();
            const nationalityValue = nationality.value.trim();

            const degreeNeededValue = degreeNeeded.value.trim();

            if(fullNameValue === '') {
                formErrors.push('Full name is required');
                setErrorFor(fullName, 'Full name is required');
            } else {
                setSuccessFor(fullName);
            }
            
            if(emailValue === '') {
                formErrors.push('Email is required');
                setErrorFor(email, 'Email is required');
            } else if (!isEmail(emailValue)) {
                formErrors.push('Email is invalid');
                setErrorFor(email, 'Email is invalid');
            } else {
                setSuccessFor(email);
            }
            if(areaValue === '') {
                formErrors.push('Area is required');
                setErrorFor(area, 'Area is required');
            } else {
                setSuccessFor(area);
            }
            if(birthdateValue === '') {
                formErrors.push('Birthdate is required');
                setErrorFor(birthdate, 'Birthdate is required');
            } else {
                setSuccessFor(birthdate);
            }
            if(nationValue === '') {
                formErrors.push('Country is required');
                setErrorFor(nation, 'Country is required');
            } else {
                setSuccessFor(nation);
            }
            if(nationalityValue === '') {
                formErrors.push('Nationality is required');
                setErrorFor(nationality, 'Nationality is required');
            } else {
                setSuccessFor(nationality);
            }

            if(degreeNeededValue === '') {
                formErrors.push('Qualification is required');
                setErrorFor(degreeNeeded, 'Qualification is required');
            } else {
                setSuccessFor(degreeNeeded);
                
            }
            
            
            
        }
        
        function setErrorFor(input, message) {
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'form-group form-control-validation error  col-lg-6';
            small.innerText = message;
        }
        
        function setSuccessFor(input) {
            const formControl = input.parentElement;
            formControl.className = 'form-group  form-control-validation success col-lg-6';
        }
        
        function isEmail(email) {
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }
        
                       
        </script>
        
        
    @endif

    @include('frontend.layouts.footer')
    <script>
            const Contactform = document.getElementById('contactForm');
            const name = document.getElementById('name');
            const email = document.getElementById('email');
            const phone = document.getElementById('phone');
            const message = document.getElementById('message');
            const requestType = document.getElementById('request_type');
            

            var formErrors = [];

            Contactform.addEventListener('submit', e => {
                checkInputs();
                if(formErrors.length) {
                    e.preventDefault();
                }
            });

            function checkInputs() {
                formErrors = [];
                // trim to remove the whitespaces
                const nameValue = name.value.trim();
                const emailValue = email.value.trim();
                const phoneValue = phone.value.trim();
                const messageValue = message.value.trim();
                const requestTypeValue = requestType.value.trim();
                
                
                
                
                
                if(phoneValue === '') {
                    formErrors.push('Phone required');
                    setErrorFor(phone, 'Phone required');
                } else {
                    setSuccessFor(phone);
                }
                if(nameValue === '') {
                    formErrors.push('Name required');
                    setErrorFor(name, 'Name required');
                } else {
                    setSuccessFor(name);
                }
                if(messageValue === '') {
                    formErrors.push('Message required');
                    setErrorFor(message, 'Message required');
                } else {
                    setSuccessFor(message);
                }
                if(requestTypeValue === '') {
                    formErrors.push('Request Type required');
                    setErrorFor(requestType, 'Request Type required');
                } else {
                    setSuccessFor(requestType);
                }
                
                if(emailValue === '') {
                    formErrors.push('Email is required');
                    setErrorFor(email, 'Email is required');
                } else if (!isEmail(emailValue)) {
                    formErrors.push('Email is not valid required');
                    setErrorFor(email, 'Email is not valid required');
                } else {
                    setSuccessFor(email);
                }
                function setErrorFor(input, message) {
                    const formControl = input.parentElement;
                    const small = formControl.querySelector('small');
                    formControl.className = 'form-group form-control-validation error';
                    small.innerText = message;
                }

                function setSuccessFor(input) {
                    const formControl = input.parentElement;
                    formControl.className = 'form-group  form-control-validation success';
                }
                function isEmail(email) {
                    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
                }
            }
</script>
@endsection

