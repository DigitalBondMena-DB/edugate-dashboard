@if(app()->getLocale() == 'en')
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
                <label for="country-list">Faculty:</label>
                <select name="fac_uni_id" class="form-control" id="fac_uni_id">
                </select>
            </div>
            <div class="mb-20">
                <label for="country-list">Major:</label>
                <select name="fac_uni_major_id" class="form-control" id="fac_uni_major_id">
                </select>
            </div>
            <div class="form-group mb-3 text-center">
                <input class="btn-send" type="submit" value="Search">
            </div>       
        </form>
    </div>
@else
    <div class="col-lg-3 search-sidebar wow fadeInUp"data-wow-delay="100ms" data-wow-duration="2000ms">
        <form id="uni-search-form" action="{{ route('search') }}" method="POST">
            @csrf
            <div class="mb-20">
                <label for="country-list" style="float: right !important;"> البلد :</label>
                <br>
                <select name="destination_id" class="form-control" id="destination_id" required>
                    <option value="">اختر دولة</option>
                    @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->ar_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-20">
                <label for="country-list" style="float: right !important;"> الجامعة :</label>
                <br>
                <select name="university_id" class="form-control" id="university_id">
                </select>
            </div>
            <div class="mb-20">
                <label for="country-list" style="float: right !important;"> الكلية :</label>
                <br>
                <select name="fac_uni_id" class="form-control" id="fac_uni_id">
                </select>
            </div>
            <div class="mb-20">
                <label for="country-list" style="float: right !important;"> التخصص :</label>
                <br>
                <select name="fac_uni_major_id" class="form-control" id="fac_uni_major_id">
                </select>
            </div>
            <div class="form-group mb-3 text-center">
                <input class="btn-send" type="submit" value="بحث">
            </div>       
        </form>
    </div>
@endif