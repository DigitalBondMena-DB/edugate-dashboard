@extends('academic_guide.layouts.app')

@php $pageTitle = 'كشف تسجيل الماجستير'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    <div class="card px-2">
        <div class="card-header card-header-primary mb-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table" id="register-master-users-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="mw-120px">الاسم</th>
                        <th class="mw-120px">البريد الالكتروني</th>
                        <th class="mw-120px">رقم الهاتف</th>
                        <th class="mw-120px">تاريخ الميلاد</th>
                        <th class="mw-120px">النوع</th>
                        <th class="mw-120px">الجنسيه</th>
                        <th class="mw-120px">البلد</th>
                        <th class="mw-120px">العنوان</th>
                        <th class="mw-120px">المنطقه</th>
                        <th class="mw-120px">الدريجه العلميه المطلوبه</th>
                        <th class="mw-120px">اسم الدرجه العلميه</th>
                        <th class="mw-120px">سنه الدرجه العلميه</th>
                        <th class="mw-120px">بلد الدرجه العلميه</th>
                        <th class="mw-120px">اسم الكليه</th>
                        <th class="mw-120px">اسم الجامعه</th>
                        <th class="mw-120px">اسم القسم</th>
                        <th class="mw-120px">المجموع التاركمي</th>
                        <th class="mw-120px">نظام الدراسه</th>
                        <th class="mw-120px">المكان المطلوب</th>
                        <th class="mw-120px">الجامعه المطلوبه</th>
                        <th class="mw-120px">الكليه المطلوبه</th>
                        <th class="mw-120px">التخصص المطلوب</th>
                        <th class="mw-120px">القسم المطلوب</th>
                        <th class="mw-120px">الحاله بعد التسجيل</th>
                        <th class="mw-120px">حاله الورق</th>
                        <th class="mw-120px">الاتفاق</th>

                        <th class="mw-120px">الدفعه الاولى</th>
                        <th class="mw-120px">مبلغ الدفعه الاولى</th>
                        <th class="mw-120px">حاله الدفعه الاولى</th>

                        <th class="mw-120px">دفعه المتابعه</th>
                        <th class="mw-120px">مبلغ دفعه المتابعه</th>
                        <th class="mw-120px">حاله دفعه المتابعه</th>

                        <th class="mw-120px">دفعه قدم وفتح ملف</th>
                        <th class="mw-120px">مبلغ دفعه قدم وفتح ملف</th>
                        <th class="mw-120px">حاله دفعه قدم وفتح ملف</th>

                        <th class="mw-120px">دفعه غلق ملف</th>
                        <th class="mw-120px">مبلغ دفعه غلق ملف</th>
                        <th class="mw-120px">حاله دفعه غلق ملف</th>
                       
                        <th class="mw-120px">حاله الحسابات</th>
                        <th class="mw-120px">مراسلات</th>
                        <th class="mw-120px">يوم القبول</th>
                        <th class="mw-120px">شهر القبول </th>
                        <th class="mw-120px">سنه القبول</th>
                        <th class="mw-120px">يوم التسجيل</th>
                        <th class="mw-120px">شهر التسجيل</th>
                        <th class="mw-120px">سنه التسجيل</th>
                        <th class="mw-120px">المرشد الاكاديمي</th>
                        <th class="mw-120px">رقم النموذج</th>
                        <th class="mw-120px">التحكم</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th class="mw-120px">الاسم</th>
                        <th class="mw-120px">البريد الالكتروني</th>
                        <th class="mw-120px">رقم الهاتف</th>
                        <th class="mw-120px">تاريخ الميلاد</th>
                        <th class="mw-120px">النوع</th>
                        <th class="mw-120px">الجنسيه</th>
                        <th class="mw-120px">البلد</th>
                        <th class="mw-120px">العنوان</th>
                        <th class="mw-120px">المنطقه</th>
                        <th class="mw-120px">الدريجه العلميه المطلوبه</th>
                        <th class="mw-120px">اسم الدرجه العلميه</th>
                        <th class="mw-120px">سنه الدرجه العلميه</th>
                        <th class="mw-120px">بلد الدرجه العلميه</th>
                        <th class="mw-120px">اسم الكليه</th>
                        <th class="mw-120px">اسم الجامعه</th>
                        <th class="mw-120px">اسم القسم</th>
                        <th class="mw-120px">المجموع التاركمي</th>
                        <th class="mw-120px">نظام الدراسه</th>
                        <th class="mw-120px">المكان المطلوب</th>
                        <th class="mw-120px">الجامعه المطلوبه</th>
                        <th class="mw-120px">الكليه المطلوبه</th>
                        <th class="mw-120px">التخصص المطلوب</th>
                        <th class="mw-120px">القسم المطلوب</th>
                        <th class="mw-120px">الحاله بعد التسجيل</th>
                        <th class="mw-120px">حاله الورق</th>
                        <th class="mw-120px">الاتفاق</th>

                        <th class="mw-120px">الدفعه الاولى</th>
                        <th class="mw-120px">مبلغ الدفعه الاولى</th>
                        <th class="mw-120px">حاله الدفعه الاولى</th>

                        <th class="mw-120px">دفعه المتابعه</th>
                        <th class="mw-120px">مبلغ دفعه المتابعه</th>
                        <th class="mw-120px">حاله دفعه المتابعه</th>

                        <th class="mw-120px">دفعه قدم وفتح ملف</th>
                        <th class="mw-120px">مبلغ دفعه قدم وفتح ملف</th>
                        <th class="mw-120px">حاله دفعه قدم وفتح ملف</th>

                        <th class="mw-120px">دفعه غلق ملف</th>
                        <th class="mw-120px">مبلغ دفعه غلق ملف</th>
                        <th class="mw-120px">حاله دفعه غلق ملف</th>
                       
                        <th class="mw-120px">حاله الحسابات</th>
                        <th class="mw-120px">مراسلات</th>
                        <th class="mw-120px">يوم القبول</th>
                        <th class="mw-120px">شهر القبول </th>
                        <th class="mw-120px">سنه القبول</th>
                        <th class="mw-120px">يوم التسجيل</th>
                        <th class="mw-120px">شهر التسجيل</th>
                        <th class="mw-120px">سنه التسجيل</th>
                        <th class="mw-120px">المرشد الاكاديمي</th>
                        <th class="mw-120px">رقم النموذج</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div id="formModalRegisterMaster" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-register-master mb-0">Add New Record</h4>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_result_register_master"></span>
                    <form method="POST" id="register-master-form" class="form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">الاسم : </label>
                                    <input type="text" name="name" id="name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">البريد الالكتروني : </label>
                                    <input type="email" name="email" id="email" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label" >رقم الهاتف : </label>
                                    <input type="number" name="phone" id="phone" class="form-control" />
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">تاريخ الميلاد : </label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control" />
                                </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >النوع : </label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">اختر النوع</option>
                                            <option value="ذكر">ذكر</option>
                                            <option value="انثي">انثي</option>
                                        </select>
                                    </div>
                                    </div>
    
                                <div class="col-md-6 col-12">    
                                <div class="form-group">
                                    <label class="control-label">الجنسيه : </label>
                                    <select id="nationality" name="nationality" class="form-control" >
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
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
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label" >البلد : </label>
                                    <select id="nation" name="nation" class="form-control" >
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
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
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">العنوان : </label>
                                    <input type="text" name="address" id="address" class="form-control" />
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label" >المنطقه : </label>
                                    <input type="text" name="area" id="area" class="form-control" />
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">الدرجه العلميه المطلوبه : </label>
                                    <input type="text" name="degree_needed" id="degree_needed" class="form-control" value="Bachelor" readonly />
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">اسم الدرجه العلمية : </label>
                                    <input type="text" name="degree_name" id="degree_name" class="form-control" />
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">سنه الدرجه العلمية : </label>
                                    <input type="text" name="degree_year" id="degree_year" class="form-control" />
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">بلد الدرجه العلمية : </label>
                                    <select id="degree_country" name="degree_country" class="form-control" >
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antartica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                        <option value="Cuba">Cuba</option>
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
                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="France Metropolitan">France, Metropolitan</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                        <option value="Moldova">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                        <option value="Span">Spain</option>
                                        <option value="SriLanka">Sri Lanka</option>
                                        <option value="St. Helena">St. Helena</option>
                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Viet Nam</option>
                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >اسم الجامعه : </label>
                                        <input type="text" name="university_name" id="university_name" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >اسم الكليه : </label>
                                        <input type="text" name="faculty_name" id="faculty_name" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >اسم القسم : </label>
                                        <input type="text" name="department_name" id="department_name" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >المجموع التراكمي : </label>
                                        <input type="text" name="gpa_precentage" id="gpa_precentage" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label">نظام الدراسه : </label>
                                        <select name="education_system" id="education_system" class="form-control">
                                            <option value="">اختر النظام</option>
                                            <option value="انتظام">انتظام</option>
                                            <option value="انتساب">انتساب</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >المكان المطلوب : </label>
                                        <input type="text" name="destination" id="destination" class="form-control" />
                                    </div>
                                    </div>
        
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >الجامعه المطلوبة : </label>
                                        <input type="text" name="university" id="university" class="form-control" />
                                    </div>
                                    </div>
        
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >الكليه المطلوبة : </label>
                                        <input type="text" name="faculty" id="faculty" class="form-control" />
                                    </div>
                                    </div>
        
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >التخصص المطلوب : </label>
                                        <input type="text" name="major" id="major" class="form-control" />
                                    </div>
                                    </div>
        
                                    <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="control-label" >القسم المطلوب : </label>
                                        <input type="text" name="department" id="department" class="form-control" />
                                    </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label" >الحاله بعد التسجيل : </label>
                                            <select name="status_after_register" id="status_after_register" class="form-control">
                                                <option value="">اختر الحاله</option>
                                                <option value="خالص">خالص</option>
                                                <option value="انتظار قبول">انتظار قبول</option>
                                                <option value="عام قادم">عام قادم</option>
                                                <option value="م اتصال">م اتصال</option>
                                                <option value="انتظار رد">انتظار رد</option>
                                                <option value="يرد خبر">يرد خبر</option>
                                                <option value="ج المكتب">ج المكتب</option>
                                                <option value="الترم الثاني">الترم الثاني</option>
                                                <option value="معادله">معادله</option>
                                                <option value="كنسل وسجل ببلده">كنسل وسجل ببلده</option>
                                                <option value="كنسل">كنسل</option>
                                                <option value="مؤجل">مؤجل</option>
                                                <option value="تم الرفض">تم الرفض</option>
                                            </select>
                                        </div>
                                        </div>
            
                                        <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label" >حاله الورق : </label>
                                            <select name="paper_status" id="paper_status" class="form-control text-dark">
                                                <option value="">اختر حالة</option>
                                                <option value="حركة ملفات البكالوريس">حركة ملفات البكالوريس</option>
                                                <option value="ناقص">ناقص</option>
                                                <option value="مقبول">مقبول</option>
                                            </select>
                                        </div>
                                        </div>
            
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="control-label" >الاتفاق : </label>
                                                <input type="number" name="deal" id="deal" class="form-control" />
                                            </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" > صوره اول دفعه : </label>
                                                    <div id="account_finance_first_image">
                
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" >مبلغ اول دفعة : </label>
                                                    <input type="number" name="account_finance_first_number" id="account_finance_first_number" class="form-control" />
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label"> حالة اول دفعه : </label>
                                                    <select class="form-control" name="account_finance_first_status" id="account_finance_first_status">
                                                        <option value="">اختر الحاله</option>
                                                        <option value="0">لم يتم القبول</option>
                                                        <option value="1">تم القبول</option>
                                                    </select>                                  
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" > صوره دفعه تسجيل متابعه : </label>
                                                    <div id="account_finance_second_image">
                
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" >مبلغ دفعة تسجيل متابعه : </label>
                                                    <input type="number" name="account_finance_second_number" id="account_finance_second_number" class="form-control" />
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label"> حالة دفعه تسجيل متابعه : </label>
                                                    <select class="form-control" name="account_finance_second_status" id="account_finance_second_status">
                                                        <option value="">اختر الحاله</option>
                                                        <option value="0">لم يتم القبول</option>
                                                        <option value="1">تم القبول</option>
                                                    </select>                                  
                                                </div>
                                            </div>
                
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" >  دفعه قدم وفتح ملف : </label>
                                                    <div id="account_finance_third_image">
                
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" >مبلغ دفعه قدم وفتح ملف : </label>
                                                    <input type="number" name="account_finance_third_number" id="account_finance_third_number" class="form-control" />
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label"> حالة دفعه قدم وفتح ملف : </label>
                                                    <select class="form-control" name="account_finance_third_status" id="account_finance_third_status">
                                                        <option value="">اختر الحاله</option>
                                                        <option value="0">لم يتم القبول</option>
                                                        <option value="1">تم القبول</option>
                                                    </select>                                  
                                                </div>
                                            </div>
                
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" >  دفعه غلف الملف : </label>
                                                    <div id="account_finance_fourth_image">
                
                                                    </div>
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" >مبلغ دفعه غلف الملف : </label>
                                                    <input type="number" name="account_finance_fourth_number" id="account_finance_fourth_number" class="form-control" />
                                                </div>
                                            </div>
                
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label class="control-label"> حالة دفعه غلق الملف : </label>
                                                    <select class="form-control" name="account_finance_fourth_status" id="account_finance_fourth_status">
                                                        <option value="">اختر الحاله</option>
                                                        <option value="0">لم يتم القبول</option>
                                                        <option value="1">تم القبول</option>
                                                    </select>                                  
                                                </div>
                                            </div>
    
                
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" > حاله الحسابات : </label>
                                                    <select name="accounts_status" id="accounts_status" class="form-control">
                                                        <option value="">اختر الحاله</option>
                                                        <option value="تم السداد">تم السداد</option>
                                                        <option value="مجاني">مجاني</option>
                                                        <option value="باقي">باقي</option>
                                                        <option value="لن يتم السداد">لن يتم السداد</option>
                                                        <option value="معلق">معلق</option>
                                                        <option value="انتظار اولى">انتظار اولى</option>
                                                    </select>
                                                </div>
                                            </div>
            
                                        <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="control-label" >مراسلات : </label>
                                            <input type="text" name="correspondence" id="correspondence" class="form-control" />
                                        </div>
                                        </div>
            
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label class="control-label" >رقم النموذج : </label>
                                                <input type="text" name="model_number" id="model_number" class="form-control">
                                            </div>
                                            </div>

                        </div>
                        <br />
                        <div class="form-group" align="center">
                            <input type="hidden" name="action_register_master" id="action_register_master" value="Add" />
                            <input type="hidden" name="hidden_id_register_master" id="hidden_id_register_master" />
                            <input type="submit" name="action_button_register_master" id="action_button_register_master" class="btn btn-warning" value="Add" />
                        </div>
                    </form>
                </div>
                </div>
        </div>
    </div>  
    
    <div id="confirmModalRegisterMaster" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-register-master mb-0">Confirmation</h4>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">هل أنت متأكد أنك تريد إزالة هذا السجل؟</h4>
                </div>
                <div class="modal-footer">
                 <button type="button" name="ok_button_register_master" id="ok_button_register_master" class="btn btn-danger">نعم</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
                </div>
            </div>
        </div>
    </div>


@endsection