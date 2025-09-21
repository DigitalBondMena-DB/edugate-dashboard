@extends('academic_guide.layouts.app')

@php $pageTitle = 'حركه ملفات الدكتوراه'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    <div class="card px-2">
        <div class="card-header card-header-primary mb-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                </div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-border-right" id="movement-phd-users-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="mw-120px">جواز سفر</th>
                        <th class="mw-120px">حاله جواز سفر</th>
                        <th class="mw-120px">شهاده الثانويه</th>
                        <th class="mw-120px">حاله شهاده الثانويه</th>
                        <th class="mw-120px">شهاده الميلاد</th>
                        <th class="mw-120px">حاله شهاده الميلاد</th>
                        <th class="mw-120px">الماستر</th>
                        <th class="mw-120px">حاله الماستر</th>
                        <th class="mw-120px">توكيل</th>
                        <th class="mw-120px">حاله التوكيل</th>
                        <th class="mw-120px">صوره</th>
                        <th class="mw-120px">حاله الصوره</th>
                        <th class="mw-120px">اخر مستند</th>
                        <th class="mw-120px">حاله اخر مستند</th>
                        <th class="mw-120px">القدارات</th>
                        <th class="mw-120px">اخرى</th>
                        <th class="mw-120px">يوم</th>
                        <th class="mw-120px">شهر</th>
                        <th class="mw-120px">سنه</th>
                        <th class="mw-120px">يوم بدايه المندوب</th>
                        <th class="mw-120px">شهر بدايه المندوب</th>
                        <th class="mw-120px">سنه بدايه المندوب</th>
                        <th class="mw-120px">الاجراء المطلوب</th>
                        <th class="mw-120px">حاله المندوب</th>
                        <th class="mw-120px">تاريخ تقديم المعادلة</th>
                        <th class="mw-120px">تاريخ الوصول للقاهرة</th>
                        <th class="mw-120px">ملاحظات</th>
                        <th class="mw-120px">التحكم</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th class="mw-120px">جواز سفر</th>
                        <th class="mw-120px">حاله جواز سفر</th>
                        <th class="mw-120px">شهاده الثانويه</th>
                        <th class="mw-120px">حاله شهاده الثانويه</th>
                        <th class="mw-120px">شهاده الميلاد</th>
                        <th class="mw-120px">حاله شهاده الميلاد</th>
                        <th class="mw-120px">الماستر</th>
                        <th class="mw-120px">حاله الماستر</th>
                        <th class="mw-120px">توكيل</th>
                        <th class="mw-120px">حاله التوكيل</th>
                        <th class="mw-120px">صوره</th>
                        <th class="mw-120px">حاله الصوره</th>
                        <th class="mw-120px">اخر مستند</th>
                        <th class="mw-120px">حاله اخر مستند</th>
                        <th class="mw-120px">القدارات</th>
                        <th class="mw-120px">اخرى</th>
                        <th class="mw-120px">يوم</th>
                        <th class="mw-120px">شهر</th>
                        <th class="mw-120px">سنه</th>
                        <th class="mw-120px">يوم بدايه المندوب</th>
                        <th class="mw-120px">شهر بدايه المندوب</th>
                        <th class="mw-120px">سنه بدايه المندوب</th>
                        <th class="mw-120px">الاجراء المطلوب</th>
                        <th class="mw-120px">حاله المندوب</th>
                        <th class="mw-120px">تاريخ تقديم المعادلة</th>
                        <th class="mw-120px">تاريخ الوصول للقاهرة</th>
                        <th class="mw-120px">ملاحظات</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div id="formModalMovementPhd" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-movement-phd mb-0">Add New Record</h4>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_result_movement_phd"></span>
                    <form method="POST" id="movement-phd-form" class="form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">جواز سفر : </label>
                                    <div id="passport">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label"> حالة جواز سفر : </label>
                                    <select class="form-control" name="passport_status" id="passport_status">
                                        <option value="">اختر الحاله</option>
                                        <option value="0">لم يتم القبول</option>
                                        <option value="1">تم القبول</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">شهاده الثانوية : </label>
                                    <div id="secondary_certificate">

                                    </div>                                
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label"> حالة شهاده الثانوية : </label>
                                    <select class="form-control" name="secondary_certificate_status" id="secondary_certificate_status">
                                        <option value="">اختر الحاله</option>
                                        <option value="0">لم يتم القبول</option>
                                        <option value="1">تم القبول</option>
                                    </select>                               
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label" >شهاده الميلاد : </label>
                                    <div id="birth_certificate">

                                    </div> 
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label"> حالة شهاده الميلاد : </label>
                                    <select class="form-control" name="birth_certificate_status" id="birth_certificate_status">
                                        <option value="">اختر الحاله</option>
                                        <option value="0">لم يتم القبول</option>
                                        <option value="1">تم القبول</option>
                                    </select>                               
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">الماستر : </label>
                                    <div id="master">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label"> حالة الماستر : </label>
                                    <select class="form-control" name="master_status" id="master_status">
                                        <option value="">اختر الحاله</option>
                                        <option value="0">لم يتم القبول</option>
                                        <option value="1">تم القبول</option>
                                    </select>                               
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label" >توكيل : </label>
                                    <div id="authorization">

                                    </div>  
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label"> حالة التوكيل : </label>
                                    <select class="form-control" name="authorization_status" id="authorization_status">
                                        <option value="">اختر الحاله</option>
                                        <option value="0">لم يتم القبول</option>
                                        <option value="1">تم القبول</option>
                                    </select>                               
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">صوره : </label>
                                    <div id="image">

                                    </div>  
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label"> حالة صوره : </label>
                                    <select class="form-control" name="image_status" id="image_status">
                                        <option value="">اختر الحاله</option>
                                        <option value="0">لم يتم القبول</option>
                                        <option value="1">تم القبول</option>
                                    </select>                               
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label" >اخر مستند: </label>
                                    <div id="last_document">

                                    </div>                                  
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label"> حالة اخر مستند: </label>
                                    <select class="form-control" name="last_document_status" id="last_document_status">
                                        <option value="">اختر الحاله</option>
                                        <option value="0">لم يتم القبول</option>
                                        <option value="1">تم القبول</option>
                                    </select>                                  
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label" >القدرات : </label>
                                <input type="text" name="capabilities" id="capabilities" class="form-control" />
                            </div>
                            </div>
                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label">اخرى : </label>
                                <input type="text" name="other" id="other" class="form-control" />
                            </div>
                            </div>
                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label" >يوم : </label>
                                <input type="text" name="day" id="day" class="form-control" readonly />
                            </div>
                            </div>

                            <div class="col-md-6 col-12">    
                            <div class="form-group">
                                <label class="control-label">شهر : </label>
                                <input type="text" name="month" id="month" class="form-control" readonly />
                            </div>
                            </div>

                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label" >سنه : </label>
                                <input type="text" name="year" id="year" class="form-control" readonly />
                            </div>
                            </div>

                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label">يوم بدايه المندوب : </label>
                                <select class="form-control" name="delegate_day" id="delegate_day">
                                    <option value="">اختر يوم</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label" >شهر بدايه المندوب : </label>
                                <select class="form-control" name="delegate_month" id="delegate_month">
                                    <option value="">اختر شهر</option>
                                    <option value="January">يناير </option>
                                    <option value="February">فبراير</option>
                                    <option value="March">مارس</option>
                                    <option value="April">ابريل</option>
                                    <option value="May">مايو</option>
                                    <option value="June">يونيو</option>
                                    <option value="July">يوليو</option>
                                    <option value="August">اغسطس</option>
                                    <option value="September">سبتمبر</option>
                                    <option value="October">اكتوبر</option>
                                    <option value="November">نوفمبر</option>
                                    <option value="December">ديسمبر</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label">سنه بدايه المندوب : </label>
                                <select class="form-control" name="delegate_year" id="delegate_year">
                                    <option value="">اختر سنة</option>
                                    <option value="2020">2020 </option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                    <option value="2032">2032</option>
                                    <option value="2033">2033</option>
                                    <option value="2034">2034</option>
                                    <option value="2035">2035</option>
                                    <option value="2036">2036</option>
                                    <option value="2037">2037</option>
                                    <option value="2038">2038</option>
                                    <option value="2039">2039</option>
                                    <option value="2040">2040</option>
                                    <option value="2041">2041</option>
                                    <option value="2042">2042</option>
                                    <option value="2043">2043</option>
                                    <option value="2044">2044</option>
                                    <option value="2045">2045</option>
                                    <option value="2046">2046</option>
                                    <option value="2047">2047</option>
                                    <option value="2048">2048</option>
                                    <option value="2049">2049</option>
                                    <option value="2050">2050</option>
                                    <option value="2051">2051</option>
                                    <option value="2052">2052</option>
                                    <option value="2053">2053</option>
                                    <option value="2054">2054</option>
                                    <option value="2055">2055</option>
                                    <option value="2056">2056</option>
                                    <option value="2057">2057</option>
                                    <option value="2058">2058</option>
                                    <option value="2059">2059</option>
                                    <option value="2060">2060</option>
                                    <option value="2061">2061</option>
                                    <option value="2062">2062</option>
                                    <option value="2063">2063</option>
                                    <option value="2064">2064</option>
                                    <option value="2065">2065</option>
                                    <option value="2066">2066</option>
                                    <option value="2067">2067</option>
                                    <option value="2068">2068</option>
                                    <option value="2069">2069</option>
                                    <option value="2070">2070</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label" >الاجراء المطلوب: </label>
                                <select name="steps" id="steps" class="form-control" >
                                    <option value="">اختر الاجراء المطلوب</option>
                                    <option value="استخراج افاده من الجامعه">استخراج افاده من الجامعه</option>
                                    <option value="استلام افاده من الجامعه">استلام افاده من الجامعه</option>
                                    <option value="سحب ملف">سحب ملف</option>
                                    <option value="ارسال مذكرات ارامكس">ارسال مذكرات ارامكس</option>
                                    <option value="ارسال الاوراق لصاحب الشان">ارسال الاوراق لصاحب الشان</option>
                                    <option value="كنسل">كنسل</option>
                                    <option value="استلام شهاده المعادله">استلام شهاده المعادله</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="control-label">حاله المندوب: </label>
                                <select name="delegate_status" id="delegate_status" class="form-control">
                                    <option value="">اختر حاله المندوب</option>
                                    <option value="خالص">خالص</option>
                                    <option value="كنسل">كنسل</option>
                                    <option value="انتظار">انتظار</option>
                                    <option value="تاجيل">تاجيل</option>
                                    <option value="ناقص">ناقص</option>
                                    <option value="معلق">معلق</option>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">تاريخ تقديم المعادلة: </label>
                                    <input type="date" name="equation_date" id="equation_date" class="form-control" />
                                </div>
                                </div>
    
                                <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="control-label">تاريخ الوصول للقاهرة: </label>
                                    <input type="date" name="egypt_arrival" id="egypt_arrival" class="form-control" />
                                </div>
                                </div>
    
    
                                <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label class="control-label" >ملاحظات: </label>
                                    <textarea name="comment" id="comment" class="form-control" rows="5" cols="10"></textarea>
                                </div>
                                </div>

                        </div>
                        <br />
                        <div class="form-group" align="center">
                            <input type="hidden" name="action_movement_phd" id="action_movement_phd" value="Add" />
                            <input type="hidden" name="hidden_id_movement_phd" id="hidden_id_movement_phd" />
                            <input type="submit" name="action_button_movement_phd" id="action_button_movement_phd" class="btn btn-warning" value="Add" />
                        </div>
                    </form>
                </div>
                </div>
        </div>
    </div>  
    
    <div id="confirmModalMovementPhd" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-movement-phd mb-0">Confirmation</h4>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">هل أنت متأكد أنك تريد إزالة هذا السجل؟</h4>
                </div>
                <div class="modal-footer">
                 <button type="button" name="ok_button_movement_phd" id="ok_button_movement_phd" class="btn btn-danger">نعم</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
                </div>
            </div>
        </div>
    </div>

@endsection