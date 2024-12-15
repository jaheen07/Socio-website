@extends('frontend.master')

@section('content2')
<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
           <div class="col-lg-12">
                <div class="central-meta">
                    <div class="about">
                        <div class="personal">
                            <h5 class="f-title"><i class="ti-info-alt"></i> Account settings</h5>
                            <h6>
                                Dear {{Auth::guard('local')->user()->user_name}},<br>
                                You can change your account privacy and all other settings in this page. Change your setings carefully.If face any trouble please contact our Help & support team. For further details call 927194.
                            </h6>
                        </div>
                        <div class="d-flex flex-row mt-2">
                            <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                <li class="nav-item">
                                    <a href="#basic" class="nav-link active" data-toggle="tab" >Basic info</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#work" class="nav-link" data-toggle="tab" >Work and Education</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#interest" class="nav-link" data-toggle="tab" >My Interests</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#additional" class="nav-link" data-toggle="tab"  >Additional settings</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#security" class="nav-link" data-toggle="tab" >Security settings</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="basic" >
                                    <ul class="basics">
                                        <div class="col-lg-8 ms-5">
                                            <h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>
                                            <form action="{{url('/edit_profile')}}" method="POST">
                                                @csrf
                                                @foreach(App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->get() as $info)
                                                <div class="form-group half">
                                                  <input type="text" id="input" name="f_name" value="{{App\Models\user_account::where('id',$info->user_id)->first()->first_name}}"/>
                                                  <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group half">
                                                  <input type="text" name="l_name" value="{{App\Models\user_account::where('id',$info->user_id)->first()->last_name}}"/>
                                                  <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" readonly name="email" value="{{App\Models\user_account::where('id',$info->user_id)->first()->email}}"/>
                                                  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                                                </div>

                                                <div class="dob form-group">
                                                    @if($info->DoB != NULL)
                                                    <input type="date" class="form-control" name="DOB" value="{{ date('Y-m-d', strtotime($info->DoB)) }}">
                                                    @else
                                                    <input type="date" class="form-control" name="DOB">
                                                    @endif
                                                    <label class="control-label" for="input">DOB</label><i class="mtrl-select"></i>
                                                </div>
                                                {{-- <div class="form-radio">
                                                  <div class="radio">
                                                    <label>
                                                      <input type="radio" checked="checked" name="radio"><i class="check-box"></i>Male
                                                    </label>
                                                  </div>
                                                  <div class="radio">
                                                    <label>
                                                      <input type="radio" name="radio"><i class="check-box"></i>Female
                                                    </label>
                                                  </div>
                                                </div> --}}
                                                <div class="form-group">
                                                  <input type="text" name="location" value="{{$info->lives_at}}"/>
                                                  <label class="control-label" for="input">Location</label><i class="mtrl-select"></i>
                                                </div>
                                                {{-- <div class="form-group">
                                                  <select name="">
                                                    <option value="country">Country</option>
                                                      <option value="AFG">Afghanistan</option>
                                                      <option value="ALA">Ƭand Islands</option>
                                                      <option value="ALB">Albania</option>
                                                      <option value="DZA">Algeria</option>
                                                      <option value="ASM">American Samoa</option>
                                                      <option value="AND">Andorra</option>
                                                      <option value="AGO">Angola</option>
                                                      <option value="AIA">Anguilla</option>
                                                      <option value="ATA">Antarctica</option>
                                                      <option value="ATG">Antigua and Barbuda</option>
                                                      <option value="ARG">Argentina</option>
                                                      <option value="ARM">Armenia</option>
                                                      <option value="ABW">Aruba</option>
                                                      <option value="AUS">Australia</option>
                                                      <option value="AUT">Austria</option>
                                                      <option value="AZE">Azerbaijan</option>
                                                      <option value="BHS">Bahamas</option>
                                                      <option value="BHR">Bahrain</option>
                                                      <option value="BGD">Bangladesh</option>
                                                      <option value="BRB">Barbados</option>
                                                      <option value="BLR">Belarus</option>
                                                      <option value="BEL">Belgium</option>
                                                      <option value="BLZ">Belize</option>
                                                      <option value="BEN">Benin</option>
                                                      <option value="BMU">Bermuda</option>
                                                      <option value="BTN">Bhutan</option>
                                                      <option value="BOL">Bolivia, Plurinational State of</option>
                                                      <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                                      <option value="BIH">Bosnia and Herzegovina</option>
                                                      <option value="BWA">Botswana</option>
                                                      <option value="BVT">Bouvet Island</option>
                                                      <option value="BRA">Brazil</option>
                                                      <option value="IOT">British Indian Ocean Territory</option>
                                                      <option value="BRN">Brunei Darussalam</option>
                                                      <option value="BGR">Bulgaria</option>
                                                      <option value="BFA">Burkina Faso</option>
                                                      <option value="BDI">Burundi</option>
                                                      <option value="KHM">Cambodia</option>
                                                      <option value="CMR">Cameroon</option>
                                                      <option value="CAN">Canada</option>
                                                      <option value="CPV">Cape Verde</option>
                                                      <option value="CYM">Cayman Islands</option>
                                                      <option value="CAF">Central African Republic</option>
                                                      <option value="TCD">Chad</option>
                                                      <option value="CHL">Chile</option>
                                                      <option value="CHN">China</option>
                                                      <option value="CXR">Christmas Island</option>
                                                      <option value="CCK">Cocos (Keeling) Islands</option>
                                                      <option value="COL">Colombia</option>
                                                      <option value="COM">Comoros</option>
                                                      <option value="COG">Congo</option>
                                                      <option value="COD">Congo, the Democratic Republic of the</option>
                                                      <option value="COK">Cook Islands</option>
                                                      <option value="CRI">Costa Rica</option>
                                                      <option value="CIV">C𴥠d'Ivoire</option>
                                                      <option value="HRV">Croatia</option>
                                                      <option value="CUB">Cuba</option>
                                                      <option value="CUW">Cura袯</option>
                                                      <option value="CYP">Cyprus</option>
                                                      <option value="CZE">Czech Republic</option>
                                                      <option value="DNK">Denmark</option>
                                                      <option value="DJI">Djibouti</option>
                                                      <option value="DMA">Dominica</option>
                                                      <option value="DOM">Dominican Republic</option>
                                                      <option value="ECU">Ecuador</option>
                                                      <option value="EGY">Egypt</option>
                                                      <option value="SLV">El Salvador</option>
                                                      <option value="GNQ">Equatorial Guinea</option>
                                                      <option value="ERI">Eritrea</option>
                                                      <option value="EST">Estonia</option>
                                                      <option value="ETH">Ethiopia</option>
                                                      <option value="FLK">Falkland Islands (Malvinas)</option>
                                                      <option value="FRO">Faroe Islands</option>
                                                      <option value="FJI">Fiji</option>
                                                      <option value="FIN">Finland</option>
                                                      <option value="FRA">France</option>
                                                      <option value="GUF">French Guiana</option>
                                                      <option value="PYF">French Polynesia</option>
                                                      <option value="ATF">French Southern Territories</option>
                                                      <option value="GAB">Gabon</option>
                                                      <option value="GMB">Gambia</option>
                                                      <option value="GEO">Georgia</option>
                                                      <option value="DEU">Germany</option>
                                                      <option value="GHA">Ghana</option>
                                                      <option value="GIB">Gibraltar</option>
                                                      <option value="GRC">Greece</option>
                                                      <option value="GRL">Greenland</option>
                                                      <option value="GRD">Grenada</option>
                                                      <option value="GLP">Guadeloupe</option>
                                                      <option value="GUM">Guam</option>
                                                      <option value="GTM">Guatemala</option>
                                                      <option value="GGY">Guernsey</option>
                                                      <option value="GIN">Guinea</option>
                                                      <option value="GNB">Guinea-Bissau</option>
                                                      <option value="GUY">Guyana</option>
                                                      <option value="HTI">Haiti</option>
                                                      <option value="HMD">Heard Island and McDonald Islands</option>
                                                      <option value="VAT">Holy See (Vatican City State)</option>
                                                      <option value="HND">Honduras</option>
                                                      <option value="HKG">Hong Kong</option>
                                                      <option value="HUN">Hungary</option>
                                                      <option value="ISL">Iceland</option>
                                                      <option value="IND">India</option>
                                                      <option value="IDN">Indonesia</option>
                                                      <option value="IRN">Iran, Islamic Republic of</option>
                                                      <option value="IRQ">Iraq</option>
                                                      <option value="IRL">Ireland</option>
                                                      <option value="IMN">Isle of Man</option>
                                                      <option value="ISR">Israel</option>
                                                      <option value="ITA">Italy</option>
                                                      <option value="JAM">Jamaica</option>
                                                      <option value="JPN">Japan</option>
                                                      <option value="JEY">Jersey</option>
                                                      <option value="JOR">Jordan</option>
                                                      <option value="KAZ">Kazakhstan</option>
                                                      <option value="KEN">Kenya</option>
                                                      <option value="KIR">Kiribati</option>
                                                      <option value="PRK">Korea, Democratic People's Republic of</option>
                                                      <option value="KOR">Korea, Republic of</option>
                                                      <option value="KWT">Kuwait</option>
                                                      <option value="KGZ">Kyrgyzstan</option>
                                                      <option value="LAO">Lao People's Democratic Republic</option>
                                                      <option value="LVA">Latvia</option>
                                                      <option value="LBN">Lebanon</option>
                                                      <option value="LSO">Lesotho</option>
                                                      <option value="LBR">Liberia</option>
                                                      <option value="LBY">Libya</option>
                                                      <option value="LIE">Liechtenstein</option>
                                                      <option value="LTU">Lithuania</option>
                                                      <option value="LUX">Luxembourg</option>
                                                      <option value="MAC">Macao</option>
                                                      <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                                                      <option value="MDG">Madagascar</option>
                                                      <option value="MWI">Malawi</option>
                                                      <option value="MYS">Malaysia</option>
                                                      <option value="MDV">Maldives</option>
                                                      <option value="MLI">Mali</option>
                                                      <option value="MLT">Malta</option>
                                                      <option value="MHL">Marshall Islands</option>
                                                      <option value="MTQ">Martinique</option>
                                                      <option value="MRT">Mauritania</option>
                                                      <option value="MUS">Mauritius</option>
                                                      <option value="MYT">Mayotte</option>
                                                      <option value="MEX">Mexico</option>
                                                      <option value="FSM">Micronesia, Federated States of</option>
                                                      <option value="MDA">Moldova, Republic of</option>
                                                      <option value="MCO">Monaco</option>
                                                      <option value="MNG">Mongolia</option>
                                                      <option value="MNE">Montenegro</option>
                                                      <option value="MSR">Montserrat</option>
                                                      <option value="MAR">Morocco</option>
                                                      <option value="MOZ">Mozambique</option>
                                                      <option value="MMR">Myanmar</option>
                                                      <option value="NAM">Namibia</option>
                                                      <option value="NRU">Nauru</option>
                                                      <option value="NPL">Nepal</option>
                                                      <option value="NLD">Netherlands</option>
                                                      <option value="NCL">New Caledonia</option>
                                                      <option value="NZL">New Zealand</option>
                                                      <option value="NIC">Nicaragua</option>
                                                      <option value="NER">Niger</option>
                                                      <option value="NGA">Nigeria</option>
                                                      <option value="NIU">Niue</option>
                                                      <option value="NFK">Norfolk Island</option>
                                                      <option value="MNP">Northern Mariana Islands</option>
                                                      <option value="NOR">Norway</option>
                                                      <option value="OMN">Oman</option>
                                                      <option value="PAK">Pakistan</option>
                                                      <option value="PLW">Palau</option>
                                                      <option value="PSE">Palestinian Territory, Occupied</option>
                                                      <option value="PAN">Panama</option>
                                                      <option value="PNG">Papua New Guinea</option>
                                                      <option value="PRY">Paraguay</option>
                                                      <option value="PER">Peru</option>
                                                      <option value="PHL">Philippines</option>
                                                      <option value="PCN">Pitcairn</option>
                                                      <option value="POL">Poland</option>
                                                      <option value="PRT">Portugal</option>
                                                      <option value="PRI">Puerto Rico</option>
                                                      <option value="QAT">Qatar</option>
                                                      <option value="REU">R궮ion</option>
                                                      <option value="ROU">Romania</option>
                                                      <option value="RUS">Russian Federation</option>
                                                      <option value="RWA">Rwanda</option>
                                                      <option value="BLM">Saint Barthꭥmy</option>
                                                      <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                                      <option value="KNA">Saint Kitts and Nevis</option>
                                                      <option value="LCA">Saint Lucia</option>
                                                      <option value="MAF">Saint Martin (French part)</option>
                                                      <option value="SPM">Saint Pierre and Miquelon</option>
                                                      <option value="VCT">Saint Vincent and the Grenadines</option>
                                                      <option value="WSM">Samoa</option>
                                                      <option value="SMR">San Marino</option>
                                                      <option value="STP">Sao Tome and Principe</option>
                                                      <option value="SAU">Saudi Arabia</option>
                                                      <option value="SEN">Senegal</option>
                                                      <option value="SRB">Serbia</option>
                                                      <option value="SYC">Seychelles</option>
                                                      <option value="SLE">Sierra Leone</option>
                                                      <option value="SGP">Singapore</option>
                                                      <option value="SXM">Sint Maarten (Dutch part)</option>
                                                      <option value="SVK">Slovakia</option>
                                                      <option value="SVN">Slovenia</option>
                                                      <option value="SLB">Solomon Islands</option>
                                                      <option value="SOM">Somalia</option>
                                                      <option value="ZAF">South Africa</option>
                                                      <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                                      <option value="SSD">South Sudan</option>
                                                      <option value="ESP">Spain</option>
                                                      <option value="LKA">Sri Lanka</option>
                                                      <option value="SDN">Sudan</option>
                                                      <option value="SUR">Suriname</option>
                                                      <option value="SJM">Svalbard and Jan Mayen</option>
                                                      <option value="SWZ">Swaziland</option>
                                                      <option value="SWE">Sweden</option>
                                                      <option value="CHE">Switzerland</option>
                                                      <option value="SYR">Syrian Arab Republic</option>
                                                      <option value="TWN">Taiwan, Province of China</option>
                                                      <option value="TJK">Tajikistan</option>
                                                      <option value="TZA">Tanzania, United Republic of</option>
                                                      <option value="THA">Thailand</option>
                                                      <option value="TLS">Timor-Leste</option>
                                                      <option value="TGO">Togo</option>
                                                      <option value="TKL">Tokelau</option>
                                                      <option value="TON">Tonga</option>
                                                      <option value="TTO">Trinidad and Tobago</option>
                                                      <option value="TUN">Tunisia</option>
                                                      <option value="TUR">Turkey</option>
                                                      <option value="TKM">Turkmenistan</option>
                                                      <option value="TCA">Turks and Caicos Islands</option>
                                                      <option value="TUV">Tuvalu</option>
                                                      <option value="UGA">Uganda</option>
                                                      <option value="UKR">Ukraine</option>
                                                      <option value="ARE">United Arab Emirates</option>
                                                      <option value="GBR">United Kingdom</option>
                                                      <option value="USA" selected>United States</option>
                                                      <option value="UMI">United States Minor Outlying Islands</option>
                                                      <option value="URY">Uruguay</option>
                                                      <option value="UZB">Uzbekistan</option>
                                                      <option value="VUT">Vanuatu</option>
                                                      <option value="VEN">Venezuela, Bolivarian Republic of</option>
                                                      <option value="VNM">Viet Nam</option>
                                                      <option value="VGB">Virgin Islands, British</option>
                                                      <option value="VIR">Virgin Islands, U.S.</option>
                                                      <option value="WLF">Wallis and Futuna</option>
                                                      <option value="ESH">Western Sahara</option>
                                                      <option value="YEM">Yemen</option>
                                                      <option value="ZMB">Zambia</option>
                                                      <option value="ZWE">Zimbabwe</option>
                                                  </select>
                                                </div> --}}
                                                <div class="form-group">
                                                  <textarea rows="4" id="textarea" name="bio">{{$info->bio}}</textarea>
                                                  <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
                                                </div>
                                                @endforeach
                                                <div class="submit-btns">

                                                    <button type="submit" class="mtr-btn"><span>Update</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="work" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5 class="f-title"><i class="ti-info-alt"></i> Edit Education</h5>

                                            <form method="POST" action="{{url('/edit_edu')}}">
                                                @csrf
                                                <div class="form-group">
                                                  <input type="text" id="input" name="institute" />
                                                  <label class="control-label" for="input">Studying at</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group half">
                                                  <input type="date" name="from"/>
                                                  <label class="control-label" for="input">From</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group half">
                                                  <input type="date" name="to"/>
                                                  <label class="control-label" for="input">To</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group">
                                                     <div class="checkbox">
                                                    <label>
                                                      <input type="checkbox" name="studying"><i class="check-box"></i>Currently studying in
                                                    </label>
                                                    </div>
                                                </div>

                                                <div class="submit-btns">
                                                    <button type="submit" class="mtr-btn"><span>Update</span></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 class="f-title"><i class="ti-info-alt"></i> Edit work</h5>

                                            <form method="POST" action="{{url('/edit_work')}}">
                                                @csrf
                                                <div class="form-group">
                                                  <input type="text" id="input" name="institute" />
                                                  <label class="control-label" for="input">working at</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="input" name="position" />
                                                    <label class="control-label" for="input">designation</label><i class="mtrl-select"></i>
                                                  </div>
                                                <div class="form-group half">
                                                  <input type="date" name="from"/>
                                                  <label class="control-label" for="input">From</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group half">
                                                  <input type="date" name="to"/>
                                                  <label class="control-label" for="input">To</label><i class="mtrl-select"></i>
                                                </div>
                                                <div class="form-group">
                                                     <div class="checkbox">
                                                    <label>
                                                      <input type="checkbox" name="working"><i class="check-box"></i>Currently working in
                                                    </label>
                                                    </div>
                                                </div>

                                                <div class="submit-btns">
                                                    <button type="submit" class="mtr-btn"><span>Update</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="interest" role="tabpanel">
                                    <div class="basics">
                                        <div class="col-lg-10 editing-interest">
                                            <h5 class="f-title"><i class="ti-heart"></i>My interests</h5>
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                                            <form method="post">
                                                <label>Add interests: </label>
                                                <input type="text" placeholder="Photography, Cycling, traveling.">
                                                <button type="submit">Add</button>
                                                <ol class="interest-added">
                                                    <li><a href="#" title="">bycicling</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
                                                    <li><a href="#" title="">traveling</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
                                                    <li><a href="#" title="">photography</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
                                                    <li><a href="#" title="">shopping</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
                                                    <li><a href="#" title="">eating</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
                                                    <li><a href="#" title="">hoteling</a><span class="remove" title="remove"><i class="fa fa-close"></i></span></li>
                                                </ol>
                                                <div class="submit-btns">
                                                    <button type="button" class="mtr-btn"><span>Cancel</span></button>
                                                    <button type="button" class="mtr-btn"><span>Update</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="additional" role="tabpanel">
                                    <div class="basics">
                                        <div class="col-lg-12 onoff-options">
                                            <h5 class="f-title"><i class="ti-settings"></i>Additional setting</h5>
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                                            <form method="post">
                                                <div class="setting-row">
                                                    <span>Sub users</span>
                                                    <p>Enable this if you want people to follow you</p>
                                                    <input type="checkbox" id="switch00" />
                                                    <label for="switch00" data-on-label="ON" data-off-label="OFF"></label>
                                                </div>
                                                <div class="setting-row">
                                                    <span>Enable follow me</span>
                                                    <p>Enable this if you want people to follow you</p>
                                                    <input type="checkbox" id="switch01" />
                                                    <label for="switch01" data-on-label="ON" data-off-label="OFF"></label>
                                                </div>
                                                <div class="setting-row">
                                                    <span>Send me notifications</span>
                                                    <p>Send me notification emails my friends like, share or message me</p>
                                                    <input type="checkbox" id="switch02" />
                                                    <label for="switch02" data-on-label="ON" data-off-label="OFF"></label>
                                                </div>
                                                <div class="setting-row">
                                                    <span>Text messages</span>
                                                    <p>Send me messages to my cell phone</p>
                                                    <input type="checkbox" id="switch03" />
                                                    <label for="switch03" data-on-label="ON" data-off-label="OFF"></label>
                                                </div>
                                                <div class="setting-row">
                                                    <span>Enable tagging</span>
                                                    <p>Enable my friends to tag me on their posts</p>
                                                    <input type="checkbox" id="switch04" />
                                                    <label for="switch04" data-on-label="ON" data-off-label="OFF"></label>
                                                </div>
                                                <div class="setting-row">
                                                    <span>Enable sound Notification</span>
                                                    <p>You'll hear notification sound when someone sends you a private message</p>
                                                    <input type="checkbox" id="switch05" checked=""/>
                                                    <label for="switch05" data-on-label="ON" data-off-label="OFF"></label>
                                                </div>
                                                <div class="submit-btns">
                                                    <button type="button" class="mtr-btn"><span>Cancel</span></button>
                                                    <button type="button" class="mtr-btn"><span>Update</span></button>
                                                </div>
                                            </form>
									    </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="security" role="tabpanel">
                                    <div class="basics">
                                        <div class="col-lg-8 editing-info">
											<h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>

                                            <span class="msg" style="color:red"></span></span>
                                            <span class="logout" hidden><a href="{{url('/logout')}}">Log out</a></span>


                                            <div class="form-group">
                                                <input type="password" name="c_pass" class="c_pass"/>
                                                <label class="control-label" for="input">Current password</label><i class="mtrl-select"></i>
                                                <span class="msg1" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <input type="password" id="input" name="n_pass" class="n_pass" />
                                                <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>

                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="re_pass" class="re_pass" />
                                                <label class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
                                                <span class="msg2" style="color:red"></span>
                                            </div>

                                            <a class="forgot-pwd underline" title="" href="#">Forgot Password?</a>
                                            <div class="submit-btns">
                                                <button type="submit" class="mtr-btn pass_btn"><span>Update</span></button>
                                            </div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

<script>
    $('.pass_btn').click(function(){
        var check = $('.c_pass').val();
        var check1 = $('.n_pass').val();
        var check2 = $('.re_pass').val();

        if(check !='' && check1 !='' && check2 != ''){
            $('.msg').html('');
            if(check1 === check2){
                $('.msg2').html('');
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });


                $.ajax({
                type:'POST',
                url:'/change_pass',
                data:{c_pass:check,n_pass:check1,re_pass:check2},
                success:function(data){
                    $('.msg').html(data);
                    $('.logout').removeAttr('hidden');
                    $('.c_pass').val('');
                    $('.n_pass').val('');
                    $('.re_pass').val('');
                }
                });
            }
            else{
                $('.msg2').html('password not matching');
            }

           


        }
        else{
          $('.msg').html('you have to fill up all fields');
        }






    })
</script>

@endsection
