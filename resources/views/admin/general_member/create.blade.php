@extends('Front.Layout.master')
@section('content')

    <section class="content  card card-primary">
        <div class="">

            <div class="row">
                <div class="col-md-12">

                    <form role="form" action="{{ route('reg.bosot') }}" method="post" enctype="multipart/form-data"
                          name="form">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title m-0 h5"> বসতবাড়ী হোল্ডিং নিবন্ধন করুন</h3>
                            </div>

                            <div class="card-body">

                                <h5 class="text-success">{{ Session::get('messege') }}</h5>

                                <div class="website-form form-group">

                                    <h5 style="padding-top: 15px"><u>খানা প্রধানের তথ্য</u></h5>
                                    <div class="row ">

                                        <div class="col-sm-4">
                                            <label for="name" class="col-form-label">নাম <span
                                                    style="color: red">*</span></label>
                                            <input required type="text" name="name" value="{{ old('name') }}"
                                                   class="@error('name') is-invalid @enderror form-control" id="name"
                                                   placeholder="নাম">

                                            @error('name')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4" id="father_name">
                                            <label for="father_name" class="col-form-label">
                                                <select required id="gurdian_status" name="gurdian_status">
                                                    <option value="father">পিতার নাম</option>
                                                    <option value="husband">স্বামীর নাম</option>
                                                </select>
                                                <span style="color: red">*</span></label>
                                            <input required type="text" name="father_name"
                                                   value="{{ old('father_name') }}"
                                                   class="form-control gurdian_status  @error('father-name') is-invalid @enderror"
                                                   id="father_name" autocomplete="off" placeholder="পিতার নাম ">
                                            @error('father_name')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror

                                            @error('birth_certificate')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="mother_name" class="col-form-label">মাতার নাম <span
                                                    style="color: red">*</span></label>
                                            <input required type="text" name="mother_name"
                                                   value="{{ old('mother_name') }}"
                                                   class="form-control  @error('mother_name') is-invalid @enderror"
                                                   id="mother_name" placeholder="মায়ের নাম" autocomplete="off">
                                            @error('mother_name')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="gender" class="col-form-label">লিঙ্গ <span
                                                    style="color: red">*</span></label>
                                            <select required name="gender" id="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                <option value="" selected disabled>নির্বাচন করুন</option>
                                                <option value="1">পুরুষ</option>
                                                <option value="2">মহিলা</option>
                                                <option value="3">অন্যান্য</option>
                                            </select>

                                            @error('gender')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="inputPassword3" class="col-form-label">বৈবাহিক অবস্থা<span
                                                    style="color: red">*</span></label>
                                            <select required name="martial_status" id="martial_status"
                                                    class="form-control @error('martial_status') is-invalid @enderror">
                                                <option value="" selected disabled>নির্বাচন করুন</option>
                                                <option value="1">বিবাহিত</option>
                                                <option value="2">অবিবাহিত</option>
                                                <option value="3">বিধবা</option>
                                            </select>
                                            @error('martial_status')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>


                                        <div class="col-sm-4">
                                            <label for="Birthdatepicker" class="col-form-label">জন্ম তারিখ</label>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <select required name="day" id="day"
                                                            class="form-control @error('day') is-invalid @enderror">
                                                        <option selected disabled>Day</option>
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
                                                    @error('day')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <select required name="month" id="month"
                                                            class="form-control @error('month') is-invalid @enderror">
                                                        <option selected disabled>Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                    @error('month')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <select required name="year" id="year"
                                                            class="form-control @error('year') is-invalid @enderror">
                                                        <option selected disabled>Year</option>
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
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                        <option value="1969">1969</option>
                                                        <option value="1968">1968</option>
                                                        <option value="1967">1967</option>
                                                        <option value="1966">1966</option>
                                                        <option value="1965">1965</option>
                                                        <option value="1964">1964</option>
                                                        <option value="1963">1963</option>
                                                        <option value="1962">1962</option>
                                                        <option value="1961">1961</option>
                                                        <option value="1960">1960</option>
                                                        <option value="1959">1959</option>
                                                        <option value="1958">1958</option>
                                                        <option value="1957">1957</option>
                                                        <option value="1956">1956</option>
                                                        <option value="1955">1955</option>
                                                        <option value="1954">1954</option>
                                                        <option value="1953">1953</option>
                                                        <option value="1952">1952</option>
                                                        <option value="1951">1951</option>
                                                        <option value="1950">1950</option>
                                                        <option value="1949">1949</option>
                                                        <option value="1948">1948</option>
                                                        <option value="1947">1947</option>
                                                        <option value="1946">1946</option>
                                                        <option value="1945">1945</option>
                                                        <option value="1944">1944</option>
                                                        <option value="1943">1943</option>
                                                        <option value="1942">1942</option>
                                                        <option value="1941">1941</option>
                                                        <option value="1940">1940</option>
                                                        <option value="1939">1939</option>
                                                        <option value="1938">1938</option>
                                                        <option value="1937">1937</option>
                                                        <option value="1936">1936</option>
                                                        <option value="1935">1935</option>
                                                        <option value="1934">1934</option>
                                                        <option value="1933">1933</option>
                                                        <option value="1932">1932</option>
                                                        <option value="1931">1931</option>
                                                        <option value="1930">1930</option>
                                                        <option value="1929">1929</option>
                                                        <option value="1928">1928</option>
                                                        <option value="1927">1927</option>
                                                        <option value="1926">1926</option>
                                                        <option value="1925">1925</option>
                                                        <option value="1924">1924</option>
                                                        <option value="1923">1923</option>
                                                        <option value="1922">1922</option>
                                                        <option value="1921">1921</option>
                                                        <option value="1920">1920</option>
                                                        <option value="1919">1919</option>
                                                        <option value="1918">1918</option>
                                                        <option value="1917">1917</option>
                                                        <option value="1916">1916</option>
                                                        <option value="1915">1915</option>
                                                        <option value="1914">1914</option>
                                                        <option value="1913">1913</option>
                                                        <option value="1912">1912</option>
                                                        <option value="1911">1911</option>
                                                        <option value="1910">1910</option>
                                                        <option value="1909">1909</option>
                                                        <option value="1908">1908</option>
                                                        <option value="1907">1907</option>
                                                        <option value="1906">1906</option>
                                                        <option value="1905">1905</option>
                                                        <option value="1904">1904</option>
                                                        <option value="1903">1903</option>
                                                        <option value="1902">1902</option>
                                                        <option value="1901">1901</option>
                                                        <option value="1900">1900</option>
                                                    </select>
                                                    @error('year')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <label for="birth_nid" class="col-form-label">
                                                <select required id="birth_nid" name="birth_nid">
                                                    <option value="nid">এনআইডি নম্বর</option>
                                                    <option value="birth_id_no">জন্ম নিবন্ধন নম্বর</option>
                                                </select>

                                                <span style="color: red">*</span></label>

                                            <input required type="text" name="nid" value="{{ old('nid') }}"
                                                   class="form-control birth_nid" id="nid_birth" autocomplete="off"
                                                   placeholder="এনআইডি নম্বর">

                                            @error('nid')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                            @error('birth_certificate')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="mobile" class="col-form-label">মোবাইল<span
                                                    style="color: red">*</span></label>
                                            <input required type="text" name="mobile" value="{{ old('mobile') }}"
                                                   class="form-control @error('mobile') is-invalid @enderror"
                                                   id="mobile"
                                                   placeholder="মোবাইল" autocomplete="off">
                                            @error('mobile')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3">
                                            <label for="religion_id" class="col-form-label">Religion <span
                                                    style="color: red">*</span></label>
                                            <select required name="religion_id" id="religion_id"
                                                    class="form-control @error('religion_id') is-invalid @enderror">
                                                <option value="" selected="" disabled>Select</option>
                                                <option value="1">ইসলাম</option>
                                                <option value="2">হিন্দু</option>
                                                <option value="3">বৌদ্ধধর্ম</option>
                                                <option value="4">খ্রিস্টান</option>
                                            </select>
                                            @error('religion_id')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="col-sm-3" style="margin-top: 5px;">
                                            <div class="form-group">
                                                <label for="family_class">পরিবারের শ্রেণী</label>
                                                <select required id="family_class" name="family_class"
                                                        class="form-control @error('family_class') is-invalid @enderror">
                                                    <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                    <option value="1">উচ্চ ভিত্ত</option>
                                                    <option value="2">মধ্যবিত্ত</option>
                                                    <option value="3">দরিদ্র</option>
                                                    <option value="4">হতদরিদ্র</option>
                                                </select>
                                                @error('family_class')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-3" style="margin-top: 5px;">
                                            <div class="form-group">
                                                <label for="family_class">পরিবারের জনসংখ্যা (পুরুষ)</label>
                                                <input required name="member_male" type="number"
                                                       value="{{ old('member_male') }}"
                                                       class="form-control @error('member_male') is-invalid @enderror"
                                                       placeholder="পরিবারের জনসংখ্যা (পুরুষ)">
                                                @error('member_male')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-3" style="margin-top: 5px;">
                                            <div class="form-group">
                                                <label for="family_class">পরিবারের জনসংখ্যা (মহিলা)</label>
                                                <input required name="member_female" value="{{ old('member_female') }}"
                                                       type="number"
                                                       class="form-control @error('member_female') is-invalid @enderror"
                                                       placeholder="পরিবারের জনসংখ্যা (মহিলা)">

                                                @error('member_female')
                                                <small class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </small>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <br/>

                                    <div class="form-group">
                                        <!-- Addess Information -->
                                        <div class="form-group">
                                            <h5><u>ঠিকানার তথ্য</u></h5>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="ward_id" class="col-form-label">ওয়ার্ড নং</label>
                                                    <select required name="ward_id" id="ward_id"
                                                            class="form-control @error('ward_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                        @php
                                                            $wards = DB::table('wards')
                                                                ->orderBy('id', 'DESC')
                                                                ->get()
                                                        @endphp
                                                        @foreach ($wards as $ward)
                                                            <option value="{{ $ward->id }}">{{ $ward->ward_no }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('ward_id')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="village_id" class="col-form-label">গ্রাম </label>
                                                    <select required name="village_id" id="village_id"
                                                            class="form-control @error('village_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                        @php
                                                            $tmp = old('ward_id')
                                                        @endphp
                                                        @if (isset($tmp))
                                                            @php
                                                                $vill = DB::table('villages')
                                                                    ->where('ward_id', old('ward_id'))
                                                                    ->get()
                                                            @endphp
                                                            @foreach ($vill as $v)
                                                                <option value="{{ $v->id }}"
                                                                        @if ($v->id == old('village_id')) selected @endif>
                                                                    {{ $v->village_name }}
                                                                </option>
                                                            @endforeach
                                                        @endif


                                                    </select>

                                                    @error('village_id')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror

                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="holding_no" class="col-form-label">হোল্ডিং নং <span
                                                            style="color: red">*</span> </label>
                                                    <input required type="text" name="holding_no"
                                                           class="form-control @error('holding_no') is-invalid @enderror"
                                                           value="{{ old('holding_no') }}" id="holding_no"
                                                           placeholder="হোল্ডিং নং" autocomplete="off">

                                                    @error('holding_no')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="post_code_id" class="col-form-label">পোস্ট কোড</label>
                                                    <select required name="post_code_id" id="post_code_id"
                                                            class="form-control @error('post_code_id') is-invalid @enderror">
                                                        <option value="" selected="">--নির্বাচন করুন--</option>
                                                        @php
                                                            $post_code = DB::table('post_codes')
                                                                ->orderBy('id', 'DESC')
                                                                ->get()
                                                        @endphp
                                                        @foreach ($post_code as $row)
                                                            <option value="{{ $row->id }}">{{ $row->post_code }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('post_code_id')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="post_office_id" class="col-form-label">ডাক ঘর</label>
                                                    <select required name="post_office_id" id="post_office_id"
                                                            class="form-control @error('post_office_id') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">--নির্বাচন করুন--
                                                        </option>
                                                        @php
                                                            $post_office = DB::table('post_offices')
                                                                ->orderBy('id', 'DESC')
                                                                ->get()
                                                        @endphp
                                                        @foreach ($post_office as $row)
                                                            <option value="{{ $row->id }}">{{ $row->post_office }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('post_office_id')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="post_office_id" class="col-form-label">বিদ্যুৎ
                                                        সুবিধাভোগি
                                                        কিনা?</label>
                                                    <select required name="biddut"
                                                            class="form-control @error('biddut') is-invalid @enderror">
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="1">হ্যা</option>
                                                        <option value="2">না</option>
                                                    </select>
                                                    @error('biddut')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="post_office_id" class="col-form-label">স্যানিটেশনের
                                                        তথ্য</label>
                                                    <select required name="sanitation"
                                                            class="form-control @error('sanitation') is-invalid @enderror">
                                                        <option value="">নির্বাচন করুন</option>
                                                        <option value="1">পাকা</option>
                                                        <option value="2">কাচা</option>
                                                        <option value="3">অস্বাস্থ্যকর</option>
                                                    </select>
                                                    @error('sanitation')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Other Information -->
                                        <div class="form-group">
                                            <h5><u>অন্যান্য তথ্য</u></h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="type_house" class="col-form-label">বাড়ির ধরণ<span
                                                            style="color: red">*</span></label>
                                                    <input required type="hidden" name="house_tax_rate"
                                                           id="house_tax_rate">

                                                    <select required name="type_house" id="type_house"
                                                            class="form-control @error('type_house') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">নির্বাচন করুন</option>
                                                        <option value="1">পাকা</option>
                                                        <option value="2">আধা পাকা</option>
                                                        <option value="3">টিনশেড</option>
                                                        <option value="4">কাচা</option>
                                                    </select>
                                                    @error('type_house')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="number_room" class="col-form-label">রুম পরিমাণ<span
                                                            style="color: red">*</span></label>
                                                    <input required type="text" name="number_room"
                                                           class="form-control @error('number_room') is-invalid @enderror"
                                                           value="{{ old('number_room') }}" id="number_room"
                                                           placeholder="রুম পরিমাণ" autocomplete="off">
                                                    @error('number_room')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="" class="col-form-label">দৈর্ঘ<span
                                                            style="color: red">*</span></label>
                                                    <input required type="text" name="height" value=""
                                                           class="form-control @error('height') is-invalid @enderror"
                                                           id=""
                                                           placeholder="দৈর্ঘ" autocomplete="off"
                                                           value="{{ old('height') }}">
                                                    @error('height')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="" class="col-form-label">প্রস্থ<span
                                                            style="color: red">*</span></label>
                                                    <input required type="text" name="wide" value=""
                                                           class="form-control @error('wide') is-invalid @enderror"
                                                           id=""
                                                           placeholder="প্রস্থ" autocomplete="off"
                                                           value="{{ old('wide') }}">
                                                    @error('wide')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="house_year_value" class="col-form-label">বাড়ির বার্ষিক
                                                        মান</label>
                                                    <input required type="number" name="house_year_value" readonly
                                                           class="form-control house_year_value2 @error('house_year_value') is-invalid @enderror"
                                                           id="house_annual_val2" placeholder="বাড়ির বার্ষিক মান"
                                                           autocomplete="off" value="0">
                                                    @error('house_year_value')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="yearly_vat" class="col-form-label">বার্ষিক কর</label>
                                                    <input required type="number" name="yearly_vat"
                                                           class="form-control yearly_vat"
                                                           value="0" readonly="">
                                                    @error('yearly_vat')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror

                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="occupation_id" class="col-form-label">পেশা </label>
                                                    <select required name="occupation_id" id="occupation_id"
                                                            class="form-control @error('occupation_id') is-invalid @enderror">
                                                        @php
                                                            $occupation = DB::table('occupations')
                                                                ->where('status', 1)
                                                                ->get()
                                                        @endphp
                                                        @foreach ($occupation as $row)
                                                            <option value="{{ $row->id }}">{{ $row->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('occupation_id')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror

                                                </div>

                                                <div class="col-sm-4">
                                                    <label for="last_tax_year" class="col-form-label">সর্বশেষ ট্যাক্স
                                                        পরিশোধ
                                                        অর্থবছর</label>
                                                    <select required name="last_tax_year" id="last_tax_year"
                                                            class="form-control @error('last_tax_year') is-invalid @enderror">
                                                        <option value="" selected="" disabled="">নির্বাচন করুন</option>
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
                                                    </select>

                                                    @error('last_tax_year')
                                                    <small class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </small>
                                                    @enderror

                                                </div>

                                            </div>

                                            <!-- Other Information -->
                                            <br>
                                            <div class="form-group">
                                                <h5><u>পেমেন্ট সংগ্রহ করুন</u></h5>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="service_charge" class="col-form-label">নিবন্ধন
                                                            চার্জ<span style="color: red">*</span></label>
                                                        <input disabled type="text" value="160" class="form-control"
                                                               placeholder="নিবন্ধন চার্জ" autocomplete="off">
                                                        <input type="hidden" name="service_charge" value="160"
                                                               class="form-control">

                                                        @error('service_charge')
                                                        <small class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </small>
                                                        @enderror


                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="">
                                                            <label for="payment_type" class="col-form-label">পেমেন্ট
                                                                প্রকার
                                                                <span style="color: red">*</span></label>
                                                            <select required name="payment_type" id="payment_type"
                                                                    class="form-control  @error('payment_type') is-invalid @enderror">
                                                            <!--<option value="{{ old('payment_type') }}" selected="" disabled="">নির্বাচন করুন</option>-->
                                                                <option value="1">Cash</option>
                                                                <option value="4">Bank</option>
                                                                <option value="2">Bkash</option>
                                                                <option value="3">Nagad</option>
                                                            </select>
                                                            @error('payment_type')
                                                            <small class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </small>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div style="padding: 10px 0px 25px">
                                    <button type="submit" class="btn btn-primary save_data">সংরক্ষণ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $(document).on('change', "#gurdian_status", function () {
                var gurdian_status = $("#gurdian_status").val();
                if (gurdian_status == 'father') {
                    $(".gurdian_status").attr("name", "father_name");
                    $(".gurdian_status").attr("placeholder", "পিতার নাম");
                } else {
                    $(".gurdian_status").attr("name", "husband_name");
                    $(".gurdian_status").attr("placeholder", "স্বামীর নাম");
                }
            });

            $(document).on('change', "#birth_nid", function () {
                var birth_nid = $("#birth_nid").val();
                if (birth_nid == 'nid') {
                    $(".birth_nid").attr("name", "nid");
                    $(".birth_nid").attr("placeholder", "এনআইডি নম্বর");
                    $(".birth_nid").attr("value", "{{ old('nid') }}");
                } else {
                    $(".birth_nid").attr("name", "birth_certificate");
                    $(".birth_nid").attr("placeholder", "জন্ম নিবন্ধন নম্বর");
                    $(".birth_nid").attr("value", "{{ old('birth_certificate') }}");
                }
            });

            $(document).on('change', '#ward_id', function () {
                var id = $('#ward_id').val();
                $.ajax({
                    url: "{{ url('/get-village/') }}/" + id,
                    type: "GET",
                    dataType: "html",
                    success: function (data) {
                        if (data == 'no_data') {
                            toastr.error("Sorry, No Data Found");
                            $("#village_id").html(
                                '<option value="" selected="" disabled="">নির্বাচন করুন</option>'
                            );
                        } else {
                            $("#village_id").html(data);
                        }
                    },

                });
            });


            $(document).on('change', '#post_code_id', function () {
                var id = $('#post_code_id').val();
                $.ajax({
                    url: "{{ url('/get-post_office/') }}/" + id,
                    type: "GET",
                    dataType: "html",
                    success: function (data) {
                        if (data == 'no_data') {
                            toastr.error("Sorry, No Data Found");
                            $("#post_office_id").html(
                                '<option value="" selected="" disabled="">--নির্বাচন করুন--</option>'
                            );
                        } else {
                            $("#post_office_id").html(data);
                        }

                    },

                });
            });
            //house_tax_rate
            $(document).on('change', '#type_house', function () {
                var id = $("#type_house").val();
                var house_tax_rate = $("#house_tax_rate").val();
                $.ajax({
                    url: "{{ url('/get-house_tax_rate/') }}/" + id,

                    type: "GET",
                    dataType: "html",
                    success: function (data) {
                        $("#house_tax_rate").val(data);
                    },
                });
            });

            $(document).on('input', '.house_year_value', function () {
                var type_house = $("#type_house").val();
                var house_year_value = $('.house_year_value').val();

                var house_tax_rate = $("#house_tax_rate").val();
                var parse_house_tax_rate = parseInt(house_tax_rate);
                var parse_house_year_value = parseInt(house_year_value);
                var result = parse_house_year_value + parse_house_year_value * parse_house_tax_rate / 100;
                if (house_tax_rate == "") {
                    toastr.error("Please Select a House Type");
                    $('.house_year_value').val('');
                } else {
                    $(".yearly_vat").val(result);
                }


            });

            $(document).on('input', '#mobile', function () {
                var mobile = $('#mobile').val();
                $.ajax({
                    url: "{{ url('/check-mobile_number') }}",

                    type: "GET",
                    data: {
                        'mobile': mobile
                    },
                    dataType: "html",
                    success: function (data) {


                        // if (data == 'data_exist') {
                        //     toastr.error("Already, This Number has been exist");
                        //     $('.save_data').css('cursor', 'not-allowed');
                        // } else {
                        //     $('.save_data').css('cursor', 'pointer');
                        // }


                    },

                });
            });

            $(document).on('input', '.birth_nid', function () {
                var birth_nid = $('.birth_nid').val();
                var attr = $(this).attr('name');

                $.ajax({
                    url: "{{ url('/check-birth_nid') }}",

                    type: "GET",
                    data: {
                        'birth_nid': birth_nid,
                        'attr': attr
                    },
                    dataType: "html",
                    success: function (data) {

                        // if (birth_nid == "") {
                        //     $('.save_data').css('cursor', 'pointer');
                        // } else if (data == 'birth_exist') {
                        //     toastr.error("Already, This Birth Certificate Number has been exist");
                        //     $('.save_data').css('cursor', 'not-allowed');
                        // } else if (data == 'nid_exist') {
                        //     toastr.error("Already, This National ID Number has been exist");
                        //     $('.save_data').css('cursor', 'not-allowed');
                        // } else {
                        //     $('.save_data').css('cursor', 'pointer');
                        // }


                    },

                });
            });

        });
    </script>
    <script>
        document.forms['form'].elements['gender'].value = [{{ old('gender') }}]
        document.forms['form'].elements['day'].value = [{{ old('day') }}]
        document.forms['form'].elements['month'].value = [{{ old('month') }}]
        document.forms['form'].elements['year'].value = [{{ old('year') }}]
        document.forms['form'].elements['martial_status'].value = [{{ old('martial_status') }}]
        document.forms['form'].elements['religion_id'].value = [{{ old('religion_id') }}]
        document.forms['form'].elements['family_class'].value = [{{ old('family_class') }}]
        document.forms['form'].elements['village_id'].value = [{{ old('village_id') }}]
        document.forms['form'].elements['ward_id'].value = [{{ old('ward_id') }}]
        document.forms['form'].elements['post_code_id'].value = [{{ old('post_code_id') }}]
        document.forms['form'].elements['post_office_id'].value = [{{ old('post_office_id') }}]
        document.forms['form'].elements['biddut'].value = [{{ old('biddut') }}]
        document.forms['form'].elements['sanitation'].value = [{{ old('sanitation') }}]
        document.forms['form'].elements['type_house'].value = [{{ old('type_house') }}]
        document.forms['form'].elements['occupation_id'].value = [{{ old('occupation_id') }}]
        document.forms['form'].elements['last_tax_year'].value = [{{ old('last_tax_year') }}]
        document.forms['form'].elements['payment_type'].value = [{{ old('payment_type') }}]
        //document.forms['form'].elements['birth_nid'].value = [{{ old('birth_nid') }}]
    </script>

@stop
