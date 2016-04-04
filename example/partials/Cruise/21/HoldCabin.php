<?php $prices_info = getPricesInfo($book_data); ?>
<div>
    <div class="invoice_wrapper">
        <div class="payment_details">
            <h4>Payment Details</h4>

            <div class="more_info prices_details" style="">
                <h4>Prices Details</h4>

                <div class="table-responsive">
                    <table class="guests_price_table table table-condensed table-striped-alt">
                        <?php foreach ($prices_info['guests'] as $guest_number => $guest_price): ?>
                            <tr>
                                <th colspan="3">
                                    Guest <?php echo $guest_number; ?>
                                </th>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <th>Description</th>
                                <th width="150px">Amount (EUR)</th>
                            </tr>
                            <?php foreach ($guest_price as $price_code => $price): ?>
                                <?php if ($price_code !== 'TOT'): ?>
                                    <tr>
                                        <td><?php echo $price->Code; ?></td>
                                        <td><?php echo $price->Description; ?></td>
                                        <td><?php echo $price->Amount; ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="2">Total price per Guest <?php echo $guest_number; ?></th>
                                <th><?php echo $guest_price['TOT']->Amount; ?></th>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th colspan="2">Total price for cabins</th>
                            <th><?php echo $prices_info['guests_total']['CAB']->Amount; ?></th>
                        </tr>
                        <tr>
                            <th colspan="2">Total gross price</th>
                            <th><?php echo $prices_info['agent']['GRS']->Amount; ?></th>
                        </tr>
                        <!--                    <tr>-->
                        <!--                        <th colspan="3">Agent info:</th>-->
                        <!--                    </tr>-->
                        <!--                    <tr>-->
                        <!--                        <th colspan="2">Commission</th>-->
                        <!--                        <th>-->
                        <?php //echo $prices_info['agent']['COM']->Amount; ?><!--</th>-->
                        <!--                    </tr>-->
                        <tr>
                            <th colspan="2">Net total</th>
                            <th><?php echo $prices_info['agent']['NET']->Amount; ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="guest_outer_wrapper">
            <h4>Guest form:</h4>

            <form role="form" data-type="Cruise" data-step="Book" data-container="booking" data-webservice="21">
                <input type="hidden" name="cruise-code" value="<?php echo $_COOKIE['cruise-code']; ?>">
                <div id="guest_list" class="tabs">
                    <ul class="nav nav-pills" data-tabs="tabs">
                        <?php foreach (json_decode($_COOKIE['cruise-guests']) as $key => $guest): ?>
                            <li class="<?php echo ($key == 0) ? 'active' : false; ?>">
                                <a href="#guest-<?php echo $key + 1; ?>" data-toggle="tab">
                                    Guest <?php echo $key + 1; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach (json_decode($_COOKIE['cruise-guests']) as $key => $guest): ?>
                            <div class="tab-pane fade in <?php echo ($key == 0) ? 'active' : false; ?>"
                                 id="guest-<?php echo $key + 1; ?>">
                                <div class="row">
                                    <label class="col-md-3">
                                        First name*:
                                    </label>

                                    <div class="col-md-3">
                                        <input class="first_name name form-control input-sm" required="" type="text"
                                               autocomplete="off"
                                               name="guest_data[<?php echo $key; ?>][first_name]" value="Luca"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3">
                                        Last name*:
                                    </label>

                                    <div class="col-md-3">
                                        <input class="last_name name form-control input-sm" required="" type="text"
                                               autocomplete="off"
                                               name="guest_data[<?php echo $key; ?>][last_name]" value="Pellegrino"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3">
                                        Known as:
                                    </label>

                                    <div class="col-md-3">
                                        <input class="localized_name name form-control input-sm" type="text"
                                               autocomplete="off"
                                               name="guest_data[<?php echo $key; ?>][localized_name]" value="Luca"/>
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-md-3">
                                        Nationality*:
                                    </label>

                                    <div class="col-md-3">
                                        <select required="" name="guest_data[<?php echo $key; ?>][nationality]"
                                                class="form-control input-sm">
                                            <option value="AF">Afghan</option>
                                            <option value="AL">Albanian</option>
                                            <option value="DZ">Algerian</option>
                                            <option value="US">American</option>
                                            <option value="AN">Andorra</option>
                                            <option value="AR">Argentinian</option>
                                            <option value="AM">Armenian</option>
                                            <option value="AU">Australian</option>
                                            <option value="AT">Austrian</option>
                                            <option value="BH">Bahrein</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BE">Belgian</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BO">Bolvian</option>
                                            <option value="BA">Bosniac</option>
                                            <option value="BR">Brazilian</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgarian</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CA">Canadian</option>
                                            <option value="TD">Chad</option>
                                            <option value="RCH">Chilean</option>
                                            <option value="CN">Chinese</option>
                                            <option value="CO">Columbian</option>
                                            <option value="CR">Costa Rican</option>
                                            <option value="HR">Croatian</option>
                                            <option value="CU">Cuban</option>
                                            <option value="CY">Cyprian</option>
                                            <option value="DK">Danish</option>
                                            <option value="DO">Dominican</option>
                                            <option value="NL">Dutch</option>
                                            <option value="EC">Ecuadorian</option>
                                            <option value="EG">Egyptian</option>
                                            <option value="EE">Estonian</option>
                                            <option value="ET">Ethiopian</option>
                                            <option value="FI">Finnish</option>
                                            <option value="FR">French</option>
                                            <option value="DE">German</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GD">Granada</option>
                                            <option value="GR">Greek</option>
                                            <option value="GT">Guatemalan</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">HongKong</option>
                                            <option value="HU">Hungarian</option>
                                            <option value="IS">Icelander</option>
                                            <option value="IN">Indian</option>
                                            <option value="ID">Indonesian</option>
                                            <option value="IR">Iranian</option>
                                            <option value="IQ">Iraqi</option>
                                            <option value="IE">Irish</option>
                                            <option value="IL">Israeli</option>
                                            <option value="IT" selected>Italiana</option>
                                            <option value="JM">Jamaican</option>
                                            <option value="JP">Japanese</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kasac</option>
                                            <option value="KR">Korean</option>
                                            <option value="KW">Kuwaitian</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanese</option>
                                            <option value="LR">Liberian</option>
                                            <option value="LI">Lichtenstein</option>
                                            <option value="LT">Lithuanian</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="LY">Lybian</option>
                                            <option value="MK">Macedonian</option>
                                            <option value="NG">Madagascar</option>
                                            <option value="MY">Malaysian</option>
                                            <option value="MV">Maldive Islands</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Maltese</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MU">Mauritus</option>
                                            <option value="MX">Mexican</option>
                                            <option value="MD">Moldavian</option>
                                            <option value="MC">Monegasque</option>
                                            <option value="MN">Monogolian</option>
                                            <option value="MA">Moroccan</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NP">Napalese</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaraguan</option>
                                            <option value="NO">Norwegian</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistani</option>
                                            <option value="PY">Paraguayan</option>
                                            <option value="PE">Peruvian</option>
                                            <option value="PH">Philippine</option>
                                            <option value="PL">Polish</option>
                                            <option value="PT">Portoguese</option>
                                            <option value="PR">Puerto Rican</option>
                                            <option value="QA">Quartar</option>
                                            <option value="CZ">Rep. Czechoslavak</option>
                                            <option value="RO">Rumenian</option>
                                            <option value="RU">Russian</option>
                                            <option value="SM">San Marino</option>
                                            <option value="SA">Saudi</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SI">Slovenian</option>
                                            <option value="ZA">South African</option>
                                            <option value="ES">Spanish</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SE">Swedish</option>
                                            <option value="CH">Swiss</option>
                                            <option value="SY">Syrian</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TH">Thai</option>
                                            <option value="TN">Tunisian</option>
                                            <option value="TR">Turkish</option>
                                            <option value="UA">Ukrainian</option>
                                            <option value="AE">Unit Arabe Emirate</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="UY">Uruguayan</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VE">Venezuelan</option>
                                            <option value="VN">Vietnamese</option>
                                            <option value="YE">Yemenite</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-md-3">
                                        Gender*:
                                    </label>

                                    <div class="col-md-3">
                                        <select class="form-control input-sm"
                                                name="guest_data[<?php echo $key; ?>][gender]" required="">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="NotAvailable">Not Available</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-md-3">
                                        Birth date* (DD/MM/YYYY):
                                    </label>

                                    <div class="col-md-3">
                                        <input type="text" autocomplete="off" required=""
                                               class="birth_date form-control input-sm"
                                               name="guest_data[<?php echo $key; ?>][birth_date]"
                                               value="20/10/1970"
                                        />
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-md-3">
                                        Place of birth:
                                    </label>

                                    <div class="col-md-3">
                                        <input class="form-control input-sm" type="text" autocomplete="off"
                                               name="guest_data[<?php echo $key; ?>][place_of_birth]"
                                               value="Caserta"/>
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-md-3">
                                        Language*:
                                    </label>

                                    <div class="col-md-3">
                                        <select required="" name="guest_data[<?php echo $key; ?>][language_code]"
                                                class="form-control input-sm">
                                            <option value="AL">Albanian</option>
                                            <option value="USA">American</option>
                                            <option value="ARS">Arabian</option>
                                            <option value="RA">Argentina</option>
                                            <option value="A">Australian</option>
                                            <option value="B">Belgian</option>
                                            <option value="BR">Brazilian</option>
                                            <option value="BG">Bulgarian</option>
                                            <option value="C">Chinese</option>
                                            <option value="CR">Croatia</option>
                                            <option value="CP">Cypriot</option>
                                            <option value="CSZ">Czech Rep.</option>
                                            <option value="DK">Danish</option>
                                            <option value="NL">Dutch</option>
                                            <option value="ET">Egyptian</option>
                                            <option selected="selected" value="GB">English</option>
                                            <option value="SF">Finnish</option>
                                            <option value="F">French</option>
                                            <option value="D">German</option>
                                            <option value="GR">Greek</option>
                                            <option value="HUN">Hungarian</option>
                                            <option value="I">Italian</option>
                                            <option value="J">Japanese</option>
                                            <option value="KOR">Korean</option>
                                            <option value="L">Lebanese</option>
                                            <option value="LT">Lithuanian</option>
                                            <option value="MAL">Malaysian</option>
                                            <option value="NO">Norwegian</option>
                                            <option value="PL">Polish</option>
                                            <option value="P">Portuguese</option>
                                            <option value="RO">Romanian</option>
                                            <option value="RUS">Russian</option>
                                            <option value="SLO">Slovenian</option>
                                            <option value="E">Spanish</option>
                                            <option value="SW">Swedish</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TR">Turkish</option>
                                            <option value="YU">Yugoslavian</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-md-3">
                                        Home phone* (+xxxxxxxxxxx):
                                    </label>

                                    <div class="col-md-3">
                                        <input type="text" required="" autocomplete="off"
                                               class="home_phone phone_number form-control input-sm"
                                               name="guest_data[<?php echo $key; ?>][home_phone]"
                                               value="+35699344966"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-md-3">
                                        Mobile phone (+xxxxxxxxxxx):
                                    </label>

                                    <div class="col-md-3">
                                        <input type="text" autocomplete="off"
                                               class="mobile_phone phone_number form-control input-sm"
                                               name="guest_data[<?php echo $key; ?>][mobile_phone]"
                                               value="+35699344966"/>
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-md-3">
                                        Email:
                                    </label>

                                    <div class="col-md-3">
                                        <input type="email" autocomplete="off" class="email form-control input-sm"
                                               name="guest_data[<?php echo $key; ?>][email]"
                                        value="iciric@smsgroup.com.mt"/>
                                    </div>
                                </div>

                                <h4 style="cursor: pointer" class="toggle_next_div">Residence Information <span>-</span>
                                </h4>

                                <div class="residence_item" style="display: block">
                                    <div class="row">
                                        <label class="col-md-3">
                                            Address*:
                                        </label>

                                        <div class="col-md-3">
                                            <input class="residence_address form-control input-sm" type="text"
                                                   required=""
                                                   autocomplete="off"
                                                   name="guest_data[<?php echo $key; ?>][residence_address]"
                                            value="Triq Moroni, Alessandro, Fl 9"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-3">
                                            City*:
                                        </label>

                                        <div class="col-md-3">
                                            <input class="residence_city form-control input-sm" type="text"
                                                   required=""
                                                   autocomplete="off"
                                                   name="guest_data[<?php echo $key; ?>][residence_city]"
                                            value="Il-gzira"/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            State*:
                                        </label>

                                        <div class="col-md-3">
                                            <input class="form-control input-sm" type="text" required=""
                                                   autocomplete="off"
                                                   name="guest_data[<?php echo $key; ?>][residence_state]"
                                            value="Gzira"/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            Country*:
                                        </label>

                                        <div class="col-md-3">
                                            <select name="guest_data[<?php echo $key; ?>][residence_country]"
                                                    required="" class="residence_country form-control input-sm">
                                                <option crawler_value="AT" value="A">Austria</option>
                                                <option crawler_value="AE" value="AE">United Arab Emirates</option>
                                                <option crawler_value="AF" value="AFG">Afghanistan</option>
                                                <option crawler_value="AG" value="AG">Antigua and Barbuda</option>
                                                <option crawler_value="AI" value="AI">Anguilla</option>
                                                <option crawler_value="AL" value="AL">Albania</option>
                                                <option crawler_value="AM" value="AM">Armenia</option>
                                                <option crawler_value="AN" value="AN">Netherlands Antilles</option>
                                                <option crawler_value="AD" value="AND">Andorra</option>
                                                <option crawler_value="AO" value="ANG">Angola</option>
                                                <option crawler_value="SA" value="ARS">Saudi Arabia</option>
                                                <option crawler_value="AS" value="AS">American Samoa</option>
                                                <option crawler_value="AU" value="AUS">Australia</option>
                                                <option crawler_value="AW" value="AW">Aruba</option>
                                                <option crawler_value="AZ" value="AZ">Azerbaijan</option>
                                                <option crawler_value="BE" value="B">Belgium</option>
                                                <option crawler_value="BA" value="BA">Bosnia</option>
                                                <option crawler_value="BD" value="BD">Bangladesh</option>
                                                <option crawler_value="BB" value="BDS">Barbados</option>
                                                <option crawler_value="BM" value="BER">The Bermudas</option>
                                                <option crawler_value="BF" value="BF">Burkina Faso</option>
                                                <option crawler_value="BG" value="BG">Bulgaria</option>
                                                <option crawler_value="BZ" value="BH">Belize</option>
                                                <option crawler_value="MM" value="BIR">Birmania</option>
                                                <option crawler_value="BN" value="BN">Brunel Darussalam</option>
                                                <option crawler_value="BO" value="BOL">Bolivia</option>
                                                <option crawler_value="0" value="BON">Bonaire Netherlands Antille
                                                </option>
                                                <option crawler_value="BR" value="BR">Brasil</option>
                                                <option crawler_value="BH" value="BRN">Bahrain</option>
                                                <option crawler_value="BN" value="BRU">Brunei</option>
                                                <option crawler_value="BS" value="BS">Bahamas</option>
                                                <option crawler_value="BT" value="BT">Bhutan</option>
                                                <option crawler_value="BI" value="BUR">Burundi</option>
                                                <option crawler_value="BY" value="BY">Byelorussian SSR</option>
                                                <option crawler_value="CU" value="C">Cuba</option>
                                                <option crawler_value="0" value="CA">Caribbean Islands</option>
                                                <option crawler_value="CM" value="CAM">Cameroon</option>
                                                <option crawler_value="CC" value="CC">Cocos Kelling Islands</option>
                                                <option crawler_value="CA" value="CDN">Canada</option>
                                                <option crawler_value="CH" value="CH">Switzerland</option>
                                                <option crawler_value="TD" value="CHA">Chad</option>
                                                <option crawler_value="CI" value="CI">Ivory Coast</option>
                                                <option crawler_value="CK" value="CK">Cook Islands</option>
                                                <option crawler_value="CO" value="CO">Colombia</option>
                                                <option crawler_value="KM" value="COM">Comore</option>
                                                <option crawler_value="CR" value="CR">Costa Rica</option>
                                                <option crawler_value="HR" value="CRO">Croatia</option>
                                                <option crawler_value="AN" value="CUR">Curacao Netherlands Antille
                                                </option>
                                                <option crawler_value="CV" value="CVD">Cape Verde</option>
                                                <option crawler_value="CX" value="CX">Christmas Islands</option>
                                                <option crawler_value="CY" value="CY">Cyprus</option>
                                                <option crawler_value="CZ" value="CZ">Czech Republic</option>
                                                <option crawler_value="DE" value="D">Germany</option>
                                                <option crawler_value="DK" value="DK">Denmark</option>
                                                <option crawler_value="DM" value="DM">Dominica</option>
                                                <option crawler_value="DO" value="DO">Dominican Republic</option>
                                                <option crawler_value="BJ" value="DY">Benin</option>
                                                <option crawler_value="DZ" value="DZ">Algeria</option>
                                                <option crawler_value="ES" value="E">Espana</option>
                                                <option crawler_value="KE" value="EAK">Kenya</option>
                                                <option crawler_value="EC" value="EC">Ecuador</option>
                                                <option crawler_value="AE" value="EMU">United Arab Emirates</option>
                                                <option crawler_value="ER" value="ER">Eritrea</option>
                                                <option crawler_value="EE" value="EST">Estonia</option>
                                                <option crawler_value="EG" value="ET">Egypt</option>
                                                <option crawler_value="ET" value="ETH">Ethiopia</option>
                                                <option crawler_value="0" value="EU">International</option>
                                                <option crawler_value="FR" value="F">France</option>
                                                <option crawler_value="GF" value="FG">French Guiana</option>
                                                <option crawler_value="FI" value="FI">Finland</option>
                                                <option crawler_value="FJ" value="FJI">Fiji</option>
                                                <option crawler_value="FK" value="FK">Falkland Islands Malvin</option>
                                                <option crawler_value="LI" value="FL">Lichtenstein</option>
                                                <option crawler_value="FM" value="FM">Micronesia</option>
                                                <option crawler_value="FO" value="FO">Faeroe Islands</option>
                                                <option crawler_value="GA" value="GAB">Gabon</option>
                                                <option crawler_value="GB" value="GB">Great Britain</option>
                                                <option crawler_value="GI" value="GBZ">Gibraltar</option>
                                                <option crawler_value="GT" value="GCA">Guatemala</option>
                                                <option crawler_value="GD" value="GD">Grenada</option>
                                                <option crawler_value="GE" value="GE">Georgia</option>
                                                <option crawler_value="GF" value="GF">Guyana Fr.</option>
                                                <option crawler_value="GH" value="GH">Ghana</option>
                                                <option crawler_value="DJ" value="GIB">Djibouti</option>
                                                <option crawler_value="GP" value="GP">Guadeloupe/French West</option>
                                                <option crawler_value="GR" value="GR">Greece</option>
                                                <option crawler_value="GL" value="GRO">Greenland</option>
                                                <option crawler_value="GU" value="GU">Guam</option>
                                                <option crawler_value="GW" value="GUB">Guinea Bissau</option>
                                                <option crawler_value="GQ" value="GUE">Guana Equatoriale</option>
                                                <option crawler_value="GN" value="GUI">Guinea</option>
                                                <option crawler_value="GY" value="GUY">Guyana</option>
                                                <option crawler_value="HU" value="H">Hungary</option>
                                                <option crawler_value="HK" value="HK">Hong Kong</option>
                                                <option crawler_value="HN" value="HON">Honduras</option>
                                                <option crawler_value="IT" value="I">Italy</option>
                                                <option crawler_value="IL" value="IL">Israel</option>
                                                <option crawler_value="IN" value="IND">India</option>
                                                <option crawler_value="IR" value="IR">Iran</option>
                                                <option crawler_value="IE" value="IRL">Ireland</option>
                                                <option crawler_value="IQ" value="IRQ">Iraq</option>
                                                <option crawler_value="IS" value="IS">Iceland</option>
                                                <option crawler_value="JP" value="J">Japan</option>
                                                <option crawler_value="JM" value="JA">Jamaica</option>
                                                <option crawler_value="JO" value="JOR">Jordan</option>
                                                <option crawler_value="KE" value="K">Kenya</option>
                                                <option crawler_value="KG" value="KG">Kyrgystan</option>
                                                <option crawler_value="KH" value="KH">Cambodia</option>
                                                <option crawler_value="KI" value="KI">Kiribati</option>
                                                <option crawler_value="KN" value="KN">Saint Kitts and Nevis</option>
                                                <option crawler_value="0" value="KO">Kosovo</option>
                                                <option crawler_value="0" value="KP">Korea Dem. People Rep.</option>
                                                <option crawler_value="KR" value="KR">Republic of Korea</option>
                                                <option crawler_value="KW" value="KWT">Kuwait</option>
                                                <option crawler_value="KY" value="KY">Cayman Islands</option>
                                                <option crawler_value="KZ" value="KZ">Kazakhstan</option>
                                                <option crawler_value="LU" value="L"> Luxembourg</option>
                                                <option crawler_value="LA" value="LA">Lao People Dem. Republic</option>
                                                <option crawler_value="LY" value="LAR">Libya</option>
                                                <option crawler_value="LV" value="LET">Latvia</option>
                                                <option crawler_value="LR" value="LIB">Liberia</option>
                                                <option crawler_value="LT" value="LIT">Lithuania</option>
                                                <option crawler_value="LK" value="LK">Sri Lanka</option>
                                                <option crawler_value="LS" value="LS">Lesotho</option>
                                                <option crawler_value="LV" value="LV">Latvia</option>
                                                <option crawler_value="MT" value="M" selected>Malta</option>
                                                <option crawler_value="MA" value="MA">Morocco</option>
                                                <option crawler_value="MK" value="MAC">Macedonia</option>
                                                <option crawler_value="MY" value="MAL">Malaysia</option>
                                                <option crawler_value="MC" value="MC">Monaco</option>
                                                <option crawler_value="MD" value="MD">Moldova Republic Of</option>
                                                <option crawler_value="MX" value="MEX">Mexico</option>
                                                <option crawler_value="MH" value="MH">Marshall Islands</option>
                                                <option crawler_value="MV" value="MLD">Maldive Islands</option>
                                                <option crawler_value="MM" value="MM">Myanmar</option>
                                                <option crawler_value="ME" value="MNE">Montenegro</option>
                                                <option crawler_value="MO" value="MO">Macao</option>
                                                <option crawler_value="MN" value="MON">Mongolia</option>
                                                <option crawler_value="MZ" value="MOZ">Mozambique</option>
                                                <option crawler_value="MP" value="MP">Northern Mariana Island</option>
                                                <option crawler_value="MQ" value="MQ">Martinique</option>
                                                <option crawler_value="MU" value="MRU">Mauritius Islands</option>
                                                <option crawler_value="MS" value="MS">Montserrat</option>
                                                <option crawler_value="MW" value="MW">Malawi</option>
                                                <option crawler_value="MY" value="MY">Malaysia</option>
                                                <option crawler_value="NO" value="NO">Norway</option>
                                                <option crawler_value="NA" value="NA">Namibia</option>
                                                <option crawler_value="NC" value="NC">New Caledonia</option>
                                                <option crawler_value="NP" value="NEP">Nepal</option>
                                                <option crawler_value="NF" value="NF">Norfolk Island</option>
                                                <option crawler_value="NI" value="NIC">Nicaragua</option>
                                                <option crawler_value="NL" value="NL">Netherlands</option>
                                                <option crawler_value="NR" value="NR">Nauru</option>
                                                <option crawler_value="NU" value="NU">Niue</option>
                                                <option crawler_value="NZ" value="NZ">New Zealand</option>
                                                <option crawler_value="OM" value="OMA">Oman</option>
                                                <option crawler_value="PT" value="P">Portugal</option>
                                                <option crawler_value="PA" value="PA">Panama</option>
                                                <option crawler_value="PK" value="PAK">Pakistan</option>
                                                <option crawler_value="PE" value="PE">Peru</option>
                                                <option crawler_value="PF" value="PF">French Polynesia</option>
                                                <option crawler_value="PG" value="PG">Papua New Guinea</option>
                                                <option crawler_value="PH" value="PH">Philippines</option>
                                                <option crawler_value="PL" value="PL">Poland</option>
                                                <option crawler_value="PM" value="PM">St. Pierreand Miquelon</option>
                                                <option crawler_value="PS" value="PN">Palestine</option>
                                                <option crawler_value="PR" value="PR">Puerto Rico</option>
                                                <option crawler_value="PW" value="PW">Palau Islands</option>
                                                <option crawler_value="PY" value="PY">Paraguay</option>
                                                <option crawler_value="QA" value="QUA">Qatar</option>
                                                <option crawler_value="AR" value="RA">Argentina</option>
                                                <option crawler_value="BW" value="RB">Botswana</option>
                                                <option crawler_value="CN" value="RC">People's Republic of China
                                                </option>
                                                <option crawler_value="CF" value="RCA">Central African Republic</option>
                                                <option crawler_value="CG" value="RCB">Congo</option>
                                                <option crawler_value="CL" value="RCH">Chile</option>
                                                <option crawler_value="RE" value="RE">Reunion</option>
                                                <option crawler_value="HT" value="RH">Haiti</option>
                                                <option crawler_value="ID" value="RI">Indonesia</option>
                                                <option crawler_value="MR" value="RIM">Mauritania</option>
                                                <option crawler_value="LB" value="RL">Lebanon</option>
                                                <option crawler_value="MG" value="RM">Madagascar</option>
                                                <option crawler_value="ML" value="RMM">Mali</option>
                                                <option crawler_value="NE" value="RN">Niger</option>
                                                <option crawler_value="RO" value="RO">Romania</option>
                                                <option crawler_value="UY" value="ROU">Uruguay</option>
                                                <option crawler_value="PH" value="RP">Philippines</option>
                                                <option crawler_value="SM" value="RSM">San Marino</option>
                                                <option crawler_value="RU" value="RUS">Russia</option>
                                                <option crawler_value="RW" value="RWA">Rwanda</option>
                                                <option crawler_value="SE" value="SE">Sweden</option>
                                                <option crawler_value="SB" value="SB">Solomon Islands</option>
                                                <option crawler_value="SZ" value="SD">Swaziland</option>
                                                <option crawler_value="RS" value="SER">Serbia</option>
                                                <option crawler_value="FI" value="SF">Finland</option>
                                                <option crawler_value="SG" value="SG">Singapore</option>
                                                <option crawler_value="SH" value="SH">St.Helena</option>
                                                <option crawler_value="SK" value="SK">Slovakia</option>
                                                <option crawler_value="0" value="SL">Stateless</option>
                                                <option crawler_value="SI" value="SLO">Slovenia</option>
                                                <option crawler_value="LC" value="SLU">St. Lucia</option>
                                                <option crawler_value="SR" value="SME">Suriname</option>
                                                <option crawler_value="SN" value="SN">Senegal</option>
                                                <option crawler_value="SO" value="SP">Somalia</option>
                                                <option crawler_value="LK" value="SRI">Sri Lanka</option>
                                                <option crawler_value="ST" value="ST">Sao Tome and Principe</option>
                                                <option crawler_value="SD" value="SUD">Sudan</option>
                                                <option crawler_value="SV" value="SV">El Salvador</option>
                                                <option crawler_value="SC" value="SY">Seychelles</option>
                                                <option crawler_value="SY" value="SYR">Syria</option>
                                                <option crawler_value="TH" value="T">Thailand</option>
                                                <option crawler_value="TW" value="TAI">Taiwan</option>
                                                <option crawler_value="TZ" value="TAN">Tanzania</option>
                                                <option crawler_value="TG" value="TG">Togo</option>
                                                <option crawler_value="TM" value="TM">Turkmenistan</option>
                                                <option crawler_value="TN" value="TN">Tunis</option>
                                                <option crawler_value="TO" value="TON">Tonga</option>
                                                <option crawler_value="TR" value="TR">Turkey</option>
                                                <option crawler_value="TT" value="TT">Trinidad e Tobago</option>
                                                <option crawler_value="TC" value="TUC">Turks e Caicos Isole</option>
                                                <option crawler_value="TV" value="TV">Tuvalu</option>
                                                <option crawler_value="TW" value="TW">Taiwan</option>
                                                <option crawler_value="UA" value="UA">Ukraine</option>
                                                <option crawler_value="UG" value="UGA">Uganda</option>
                                                <option crawler_value="UM" value="UM">US Minor Outlying Island</option>
                                                <option crawler_value="US" value="USA">USA</option>
                                                <option crawler_value="UZ" value="UZ">Uzbekistan</option>
                                                <option crawler_value="VC" value="VC">St. Vincent and The Grenadines
                                                </option>
                                                <option crawler_value="VG" value="VG">British Virgin Islands</option>
                                                <option crawler_value="VI" value="VI">Virgin Islands US</option>
                                                <option crawler_value="VN" value="VN">Vietnam</option>
                                                <option crawler_value="VU" value="VU">Vanuatu</option>
                                                <option crawler_value="GM" value="WAG">Gambia</option>
                                                <option crawler_value="SL" value="WAL">Sierra Leone</option>
                                                <option crawler_value="NG" value="WAN">Nigeria</option>
                                                <option crawler_value="WF" value="WF">Wallis and Futuna Islands</option>
                                                <option crawler_value="US" value="WK">Wake Island</option>
                                                <option crawler_value="WS" value="WS">Samoa</option>
                                                <option crawler_value="YE" value="YEM">Yemen</option>
                                                <option crawler_value="0" value="YUG">Yugoslavia</option>
                                                <option crawler_value="VE" value="YV">Venezuela</option>
                                                <option crawler_value="ZM" value="Z">Zambia</option>
                                                <option crawler_value="ZA" value="ZA">South Africa</option>
                                                <option crawler_value="0" value="ZRE">Zaire</option>
                                                <option crawler_value="ZW" value="ZW">Zimbabwe</option>
                                            </select>
                                            <br/>
                                        </div>
                                    </div>
                                </div>

                                <h4 style="cursor: pointer" class="toggle_next_div">Document Information <span>-</span>
                                </h4>

                                <div class="document_item" style="display: block">

                                    <div class="row">
                                        <label class="col-md-3">
                                            Type*:
                                        </label>

                                        <div class="col-md-3">
                                            <select class="form-control input-sm" required=""
                                                    name="guest_data[<?php echo $key; ?>][document_type]">
                                                <option value="id_card" selected>ID Card</option>
                                                <option value="passport" >Passport</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-3">
                                            Number*:
                                        </label>

                                        <div class="col-md-3">
                                            <input class="document_number form-control input-sm" type="text"
                                                   required=""
                                                   autocomplete="off"
                                                   name="guest_data[<?php echo $key; ?>][document_number]"
                                            value="0038070A"/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            Issue date* (DD/MM/YYYY):
                                        </label>

                                        <div class="col-md-3">
                                            <input type="text" required=""
                                                   autocomplete="off"
                                                   class="passport_date_issue form-control input-sm"
                                                   name="guest_data[<?php echo $key; ?>][document_issue_date]"
                                            value="12/05/2014"/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            Exp. date* (DD/MM/YYYY):
                                        </label>

                                        <div class="col-md-3">
                                            <input type="text" required=""
                                                   autocomplete="off"
                                                   class="passport_date_exp form-control input-sm"
                                                   name="guest_data[<?php echo $key; ?>][document_expiration_date]"
                                                   value="12/05/2024"/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            Issued in city*:
                                        </label>

                                        <div class="col-md-3">
                                            <input type="text" required=""
                                                   autocomplete="off" class="form-control input-sm"
                                                   name="guest_data[<?php echo $key; ?>][document_issued_in_city]"
                                                   value="VAlletta"/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            Issued in country*:
                                        </label>

                                        <div class="col-md-3">
                                            <select name="guest_data[<?php echo $key; ?>][document_issued_in_country]"
                                                    required="" class="residence_country form-control input-sm">
                                                <option crawler_value="AT" value="A">Austria</option>
                                                <option crawler_value="AE" value="AE">United Arab Emirates</option>
                                                <option crawler_value="AF" value="AFG">Afghanistan</option>
                                                <option crawler_value="AG" value="AG">Antigua and Barbuda</option>
                                                <option crawler_value="AI" value="AI">Anguilla</option>
                                                <option crawler_value="AL" value="AL">Albania</option>
                                                <option crawler_value="AM" value="AM">Armenia</option>
                                                <option crawler_value="AN" value="AN">Netherlands Antilles</option>
                                                <option crawler_value="AD" value="AND">Andorra</option>
                                                <option crawler_value="AO" value="ANG">Angola</option>
                                                <option crawler_value="SA" value="ARS">Saudi Arabia</option>
                                                <option crawler_value="AS" value="AS">American Samoa</option>
                                                <option crawler_value="AU" value="AUS">Australia</option>
                                                <option crawler_value="AW" value="AW">Aruba</option>
                                                <option crawler_value="AZ" value="AZ">Azerbaijan</option>
                                                <option crawler_value="BE" value="B">Belgium</option>
                                                <option crawler_value="BA" value="BA">Bosnia</option>
                                                <option crawler_value="BD" value="BD">Bangladesh</option>
                                                <option crawler_value="BB" value="BDS">Barbados</option>
                                                <option crawler_value="BM" value="BER">The Bermudas</option>
                                                <option crawler_value="BF" value="BF">Burkina Faso</option>
                                                <option crawler_value="BG" value="BG">Bulgaria</option>
                                                <option crawler_value="BZ" value="BH">Belize</option>
                                                <option crawler_value="MM" value="BIR">Birmania</option>
                                                <option crawler_value="BN" value="BN">Brunel Darussalam</option>
                                                <option crawler_value="BO" value="BOL">Bolivia</option>
                                                <option crawler_value="0" value="BON">Bonaire Netherlands Antille
                                                </option>
                                                <option crawler_value="BR" value="BR">Brasil</option>
                                                <option crawler_value="BH" value="BRN">Bahrain</option>
                                                <option crawler_value="BN" value="BRU">Brunei</option>
                                                <option crawler_value="BS" value="BS">Bahamas</option>
                                                <option crawler_value="BT" value="BT">Bhutan</option>
                                                <option crawler_value="BI" value="BUR">Burundi</option>
                                                <option crawler_value="BY" value="BY">Byelorussian SSR</option>
                                                <option crawler_value="CU" value="C">Cuba</option>
                                                <option crawler_value="0" value="CA">Caribbean Islands</option>
                                                <option crawler_value="CM" value="CAM">Cameroon</option>
                                                <option crawler_value="CC" value="CC">Cocos Kelling Islands</option>
                                                <option crawler_value="CA" value="CDN">Canada</option>
                                                <option crawler_value="CH" value="CH">Switzerland</option>
                                                <option crawler_value="TD" value="CHA">Chad</option>
                                                <option crawler_value="CI" value="CI">Ivory Coast</option>
                                                <option crawler_value="CK" value="CK">Cook Islands</option>
                                                <option crawler_value="CO" value="CO">Colombia</option>
                                                <option crawler_value="KM" value="COM">Comore</option>
                                                <option crawler_value="CR" value="CR">Costa Rica</option>
                                                <option crawler_value="HR" value="CRO">Croatia</option>
                                                <option crawler_value="AN" value="CUR">Curacao Netherlands Antille
                                                </option>
                                                <option crawler_value="CV" value="CVD">Cape Verde</option>
                                                <option crawler_value="CX" value="CX">Christmas Islands</option>
                                                <option crawler_value="CY" value="CY">Cyprus</option>
                                                <option crawler_value="CZ" value="CZ">Czech Republic</option>
                                                <option crawler_value="DE" value="D">Germany</option>
                                                <option crawler_value="DK" value="DK">Denmark</option>
                                                <option crawler_value="DM" value="DM">Dominica</option>
                                                <option crawler_value="DO" value="DO">Dominican Republic</option>
                                                <option crawler_value="BJ" value="DY">Benin</option>
                                                <option crawler_value="DZ" value="DZ">Algeria</option>
                                                <option crawler_value="ES" value="E">Espana</option>
                                                <option crawler_value="KE" value="EAK">Kenya</option>
                                                <option crawler_value="EC" value="EC">Ecuador</option>
                                                <option crawler_value="AE" value="EMU">United Arab Emirates</option>
                                                <option crawler_value="ER" value="ER">Eritrea</option>
                                                <option crawler_value="EE" value="EST">Estonia</option>
                                                <option crawler_value="EG" value="ET">Egypt</option>
                                                <option crawler_value="ET" value="ETH">Ethiopia</option>
                                                <option crawler_value="0" value="EU">International</option>
                                                <option crawler_value="FR" value="F">France</option>
                                                <option crawler_value="GF" value="FG">French Guiana</option>
                                                <option crawler_value="FI" value="FI">Finland</option>
                                                <option crawler_value="FJ" value="FJI">Fiji</option>
                                                <option crawler_value="FK" value="FK">Falkland Islands Malvin</option>
                                                <option crawler_value="LI" value="FL">Lichtenstein</option>
                                                <option crawler_value="FM" value="FM">Micronesia</option>
                                                <option crawler_value="FO" value="FO">Faeroe Islands</option>
                                                <option crawler_value="GA" value="GAB">Gabon</option>
                                                <option crawler_value="GB" value="GB">Great Britain</option>
                                                <option crawler_value="GI" value="GBZ">Gibraltar</option>
                                                <option crawler_value="GT" value="GCA">Guatemala</option>
                                                <option crawler_value="GD" value="GD">Grenada</option>
                                                <option crawler_value="GE" value="GE">Georgia</option>
                                                <option crawler_value="GF" value="GF">Guyana Fr.</option>
                                                <option crawler_value="GH" value="GH">Ghana</option>
                                                <option crawler_value="DJ" value="GIB">Djibouti</option>
                                                <option crawler_value="GP" value="GP">Guadeloupe/French West</option>
                                                <option crawler_value="GR" value="GR">Greece</option>
                                                <option crawler_value="GL" value="GRO">Greenland</option>
                                                <option crawler_value="GU" value="GU">Guam</option>
                                                <option crawler_value="GW" value="GUB">Guinea Bissau</option>
                                                <option crawler_value="GQ" value="GUE">Guana Equatoriale</option>
                                                <option crawler_value="GN" value="GUI">Guinea</option>
                                                <option crawler_value="GY" value="GUY">Guyana</option>
                                                <option crawler_value="HU" value="H">Hungary</option>
                                                <option crawler_value="HK" value="HK">Hong Kong</option>
                                                <option crawler_value="HN" value="HON">Honduras</option>
                                                <option crawler_value="IT" value="I">Italy</option>
                                                <option crawler_value="IL" value="IL">Israel</option>
                                                <option crawler_value="IN" value="IND">India</option>
                                                <option crawler_value="IR" value="IR">Iran</option>
                                                <option crawler_value="IE" value="IRL">Ireland</option>
                                                <option crawler_value="IQ" value="IRQ">Iraq</option>
                                                <option crawler_value="IS" value="IS">Iceland</option>
                                                <option crawler_value="JP" value="J">Japan</option>
                                                <option crawler_value="JM" value="JA">Jamaica</option>
                                                <option crawler_value="JO" value="JOR">Jordan</option>
                                                <option crawler_value="KE" value="K">Kenya</option>
                                                <option crawler_value="KG" value="KG">Kyrgystan</option>
                                                <option crawler_value="KH" value="KH">Cambodia</option>
                                                <option crawler_value="KI" value="KI">Kiribati</option>
                                                <option crawler_value="KN" value="KN">Saint Kitts and Nevis</option>
                                                <option crawler_value="0" value="KO">Kosovo</option>
                                                <option crawler_value="0" value="KP">Korea Dem. People Rep.</option>
                                                <option crawler_value="KR" value="KR">Republic of Korea</option>
                                                <option crawler_value="KW" value="KWT">Kuwait</option>
                                                <option crawler_value="KY" value="KY">Cayman Islands</option>
                                                <option crawler_value="KZ" value="KZ">Kazakhstan</option>
                                                <option crawler_value="LU" value="L"> Luxembourg</option>
                                                <option crawler_value="LA" value="LA">Lao People Dem. Republic</option>
                                                <option crawler_value="LY" value="LAR">Libya</option>
                                                <option crawler_value="LV" value="LET">Latvia</option>
                                                <option crawler_value="LR" value="LIB">Liberia</option>
                                                <option crawler_value="LT" value="LIT">Lithuania</option>
                                                <option crawler_value="LK" value="LK">Sri Lanka</option>
                                                <option crawler_value="LS" value="LS">Lesotho</option>
                                                <option crawler_value="LV" value="LV">Latvia</option>
                                                <option crawler_value="MT" value="M" selected>Malta</option>
                                                <option crawler_value="MA" value="MA">Morocco</option>
                                                <option crawler_value="MK" value="MAC">Macedonia</option>
                                                <option crawler_value="MY" value="MAL">Malaysia</option>
                                                <option crawler_value="MC" value="MC">Monaco</option>
                                                <option crawler_value="MD" value="MD">Moldova Republic Of</option>
                                                <option crawler_value="MX" value="MEX">Mexico</option>
                                                <option crawler_value="MH" value="MH">Marshall Islands</option>
                                                <option crawler_value="MV" value="MLD">Maldive Islands</option>
                                                <option crawler_value="MM" value="MM">Myanmar</option>
                                                <option crawler_value="ME" value="MNE">Montenegro</option>
                                                <option crawler_value="MO" value="MO">Macao</option>
                                                <option crawler_value="MN" value="MON">Mongolia</option>
                                                <option crawler_value="MZ" value="MOZ">Mozambique</option>
                                                <option crawler_value="MP" value="MP">Northern Mariana Island</option>
                                                <option crawler_value="MQ" value="MQ">Martinique</option>
                                                <option crawler_value="MU" value="MRU">Mauritius Islands</option>
                                                <option crawler_value="MS" value="MS">Montserrat</option>
                                                <option crawler_value="MW" value="MW">Malawi</option>
                                                <option crawler_value="MY" value="MY">Malaysia</option>
                                                <option crawler_value="NO" value="NO">Norway</option>
                                                <option crawler_value="NA" value="NA">Namibia</option>
                                                <option crawler_value="NC" value="NC">New Caledonia</option>
                                                <option crawler_value="NP" value="NEP">Nepal</option>
                                                <option crawler_value="NF" value="NF">Norfolk Island</option>
                                                <option crawler_value="NI" value="NIC">Nicaragua</option>
                                                <option crawler_value="NL" value="NL">Netherlands</option>
                                                <option crawler_value="NR" value="NR">Nauru</option>
                                                <option crawler_value="NU" value="NU">Niue</option>
                                                <option crawler_value="NZ" value="NZ">New Zealand</option>
                                                <option crawler_value="OM" value="OMA">Oman</option>
                                                <option crawler_value="PT" value="P">Portugal</option>
                                                <option crawler_value="PA" value="PA">Panama</option>
                                                <option crawler_value="PK" value="PAK">Pakistan</option>
                                                <option crawler_value="PE" value="PE">Peru</option>
                                                <option crawler_value="PF" value="PF">French Polynesia</option>
                                                <option crawler_value="PG" value="PG">Papua New Guinea</option>
                                                <option crawler_value="PH" value="PH">Philippines</option>
                                                <option crawler_value="PL" value="PL">Poland</option>
                                                <option crawler_value="PM" value="PM">St. Pierreand Miquelon</option>
                                                <option crawler_value="PS" value="PN">Palestine</option>
                                                <option crawler_value="PR" value="PR">Puerto Rico</option>
                                                <option crawler_value="PW" value="PW">Palau Islands</option>
                                                <option crawler_value="PY" value="PY">Paraguay</option>
                                                <option crawler_value="QA" value="QUA">Qatar</option>
                                                <option crawler_value="AR" value="RA">Argentina</option>
                                                <option crawler_value="BW" value="RB">Botswana</option>
                                                <option crawler_value="CN" value="RC">People's Republic of China
                                                </option>
                                                <option crawler_value="CF" value="RCA">Central African Republic</option>
                                                <option crawler_value="CG" value="RCB">Congo</option>
                                                <option crawler_value="CL" value="RCH">Chile</option>
                                                <option crawler_value="RE" value="RE">Reunion</option>
                                                <option crawler_value="HT" value="RH">Haiti</option>
                                                <option crawler_value="ID" value="RI">Indonesia</option>
                                                <option crawler_value="MR" value="RIM">Mauritania</option>
                                                <option crawler_value="LB" value="RL">Lebanon</option>
                                                <option crawler_value="MG" value="RM">Madagascar</option>
                                                <option crawler_value="ML" value="RMM">Mali</option>
                                                <option crawler_value="NE" value="RN">Niger</option>
                                                <option crawler_value="RO" value="RO">Romania</option>
                                                <option crawler_value="UY" value="ROU">Uruguay</option>
                                                <option crawler_value="PH" value="RP">Philippines</option>
                                                <option crawler_value="SM" value="RSM">San Marino</option>
                                                <option crawler_value="RU" value="RUS">Russia</option>
                                                <option crawler_value="RW" value="RWA">Rwanda</option>
                                                <option crawler_value="SE" value="SE">Sweden</option>
                                                <option crawler_value="SB" value="SB">Solomon Islands</option>
                                                <option crawler_value="SZ" value="SD">Swaziland</option>
                                                <option crawler_value="RS" value="SER" >Serbia</option>
                                                <option crawler_value="FI" value="SF">Finland</option>
                                                <option crawler_value="SG" value="SG">Singapore</option>
                                                <option crawler_value="SH" value="SH">St.Helena</option>
                                                <option crawler_value="SK" value="SK">Slovakia</option>
                                                <option crawler_value="0" value="SL">Stateless</option>
                                                <option crawler_value="SI" value="SLO">Slovenia</option>
                                                <option crawler_value="LC" value="SLU">St. Lucia</option>
                                                <option crawler_value="SR" value="SME">Suriname</option>
                                                <option crawler_value="SN" value="SN">Senegal</option>
                                                <option crawler_value="SO" value="SP">Somalia</option>
                                                <option crawler_value="LK" value="SRI">Sri Lanka</option>
                                                <option crawler_value="ST" value="ST">Sao Tome and Principe</option>
                                                <option crawler_value="SD" value="SUD">Sudan</option>
                                                <option crawler_value="SV" value="SV">El Salvador</option>
                                                <option crawler_value="SC" value="SY">Seychelles</option>
                                                <option crawler_value="SY" value="SYR">Syria</option>
                                                <option crawler_value="TH" value="T">Thailand</option>
                                                <option crawler_value="TW" value="TAI">Taiwan</option>
                                                <option crawler_value="TZ" value="TAN">Tanzania</option>
                                                <option crawler_value="TG" value="TG">Togo</option>
                                                <option crawler_value="TM" value="TM">Turkmenistan</option>
                                                <option crawler_value="TN" value="TN">Tunis</option>
                                                <option crawler_value="TO" value="TON">Tonga</option>
                                                <option crawler_value="TR" value="TR">Turkey</option>
                                                <option crawler_value="TT" value="TT">Trinidad e Tobago</option>
                                                <option crawler_value="TC" value="TUC">Turks e Caicos Isole</option>
                                                <option crawler_value="TV" value="TV">Tuvalu</option>
                                                <option crawler_value="TW" value="TW">Taiwan</option>
                                                <option crawler_value="UA" value="UA">Ukraine</option>
                                                <option crawler_value="UG" value="UGA">Uganda</option>
                                                <option crawler_value="UM" value="UM">US Minor Outlying Island</option>
                                                <option crawler_value="US" value="USA">USA</option>
                                                <option crawler_value="UZ" value="UZ">Uzbekistan</option>
                                                <option crawler_value="VC" value="VC">St. Vincent and The Grenadines
                                                </option>
                                                <option crawler_value="VG" value="VG">British Virgin Islands</option>
                                                <option crawler_value="VI" value="VI">Virgin Islands US</option>
                                                <option crawler_value="VN" value="VN">Vietnam</option>
                                                <option crawler_value="VU" value="VU">Vanuatu</option>
                                                <option crawler_value="GM" value="WAG">Gambia</option>
                                                <option crawler_value="SL" value="WAL">Sierra Leone</option>
                                                <option crawler_value="NG" value="WAN">Nigeria</option>
                                                <option crawler_value="WF" value="WF">Wallis and Futuna Islands</option>
                                                <option crawler_value="US" value="WK">Wake Island</option>
                                                <option crawler_value="WS" value="WS">Samoa</option>
                                                <option crawler_value="YE" value="YEM">Yemen</option>
                                                <option crawler_value="0" value="YUG">Yugoslavia</option>
                                                <option crawler_value="VE" value="YV">Venezuela</option>
                                                <option crawler_value="ZM" value="Z">Zambia</option>
                                                <option crawler_value="ZA" value="ZA">South Africa</option>
                                                <option crawler_value="0" value="ZRE">Zaire</option>
                                                <option crawler_value="ZW" value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="">Emergency person details</h4>

                                <div class="emergency_info_item">

                                    <div class="row">
                                        <label class="col-md-3">
                                            First name:
                                        </label>

                                        <div class="col-md-3">
                                            <input type="text" autocomplete="off"
                                                   class="emergency_info_first_name name form-control input-sm"
                                                   name="guest_data[<?php echo $key; ?>][emergency_info_first_name]"
                                            value=""/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            Last name:
                                        </label>

                                        <div class="col-md-3">
                                            <input type="text" autocomplete="off"
                                                   class="emergency_info_last_name name form-control input-sm"
                                                   name="guest_data[<?php echo $key; ?>][emergency_info_last_name]"
                                                   value=""/>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <label class="col-md-3">
                                            Phone number (+xxxxxxxxxxx):
                                        </label>

                                        <div class="col-md-3">
                                            <input
                                                class="phone_number emergency_info_telephone_number form-control input-sm"
                                                type="text" autocomplete="off"
                                                name="guest_data[<?php echo $key; ?>][emergency_info_telephone_number]"
                                            value=""/>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" value="0" name="client_ids[<?php echo $key; ?>]"
                                       class="client_id"/>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-info" data-control="api">Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.tabs').tab();

            var guests_cookie = getCookie('cruise-guests');
            var guests = JSON.parse(decodeURIComponent(guests_cookie));

            var category_code_cookie = getCookie('category-code');
            var cabin_code_cookie = getCookie('cabin-code');
            var dining_preference_cookie = getCookie('dining-preference');

            $('form[data-step=Book]').each(function () {
                var form = this;
                $.each(guests, function (key, age) {
                    $(form).append('<input type="hidden" name="cruise-guests[]" value="' + age + '">');
                });
                $(form).append('<input type="hidden" name="category-code" value="' + category_code_cookie + '">');
                $(form).append('<input type="hidden" name="cabin-code" value="' + cabin_code_cookie + '">');
                $(form).append('<input type="hidden" name="dining-preference" value="' + dining_preference_cookie + '">');

            });

        });
    </script>

