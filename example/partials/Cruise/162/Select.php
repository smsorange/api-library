<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-10">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">

                <h4 class="panel-title">Booking information</h4>
            </div>
            <div class="panel-body">

                <div class="cruise_information">

                    <div class="row vertical-align">
                        <div class="col-md-4">
                            <img class="img-responsive" src="<?php echo $cruise_details->Itinerary->URL; ?>"/>
                        </div>

                        <div class="col-md-8">
                            <div class="other_info">
                                <div class="row p-b-5">
                                    <label class="control-label col-md-4">Duration:</label>

                                    <div
                                        class="col-md-8 f-s-14 text-black f-w-500"> <?php echo $cruise_details->Duration; ?>
                                        days
                                    </div>
                                </div>

                                <div class="row p-b-5">
                                    <label class="control-label col-md-4">Destination:</label>

                                    <div
                                        class="col-md-8 f-s-14 text-black f-w-500"> <?php echo $cruise_details->Destination->Description; ?></div>
                                </div>

                                <div class="row p-b-5">
                                    <label class="control-label col-md-4">Ship:</label>

                                    <div
                                        class="col-md-8 f-s-14 text-black f-w-500"> <?php echo $cruise_details->Ship->Name; ?></div>
                                </div>

                                <div class="row p-b-5">
                                    <label class="control-label col-md-4">Departure Date:</label>

                                    <div
                                        class="col-md-8 f-s-14 text-black f-w-500"> <?php echo $cruise_details->DepartureDate; ?></div>
                                </div>

                                <div class="row p-b-5">
                                    <label class="control-label col-md-4">Immediate Confirm:</label>

                                    <div
                                        class="col-md-8 f-s-14 text-black f-w-500"> <?php echo ($cruise_details->ImmediateConfirm->IsImmediateConfirm === 'true') ? 'Yes' : 'No'; ?></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row table-responsive">
                        <table class="ports table table-condensed">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Port name</th>
                                <th>Arrival Time</th>
                                <th>Departure Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cruise_details->Itinerary->Segments->Segment as $index => $segment): ?>
                                <tr>
                                    <td><?php echo $index + 1; ?>.</td>
                                    <td><?php echo $segment->Port->Description; ?></td>
                                    <td><?php echo ($segment->ArrivalTime === '0001-01-01T00:00:00') ? '-' : $segment->ArrivalTime; ?></td>
                                    <td><?php echo ($segment->DepartureTime === '0001-01-01T00:00:00') ? '-' : $segment->DepartureTime; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">

                <h2 class="panel-title"><b>Cruise booking</b></h2>
            </div>
            <div class="panel-body">

                <div class="book_form col-md-4">

                    <form role="form" >


                                <div class="col-md-12 form-group">

                                    <label for="fare-code">
                                        Type of Customers*
                                    </label>

                                        <select name="cruise_data[fare_code]" id="fare-code" class="form-control fare-code">
                                            <option value=""> - Choose -</option>
                                            <option value="IND_CC">CostaClub</option>
                                            <option value="hm">Honeymooners</option>
                                            <option value="FP">Family Plan</option>
                                            <option value="IND">Individual</option>
                                            <option value="GRP">Group</option>
                                        </select>
                                        <span style="display: none" class="error">Please select type of client</span>

                                </div>


                                <div class="col-md-12 form-group cabin" style="display: none;">
                                    <label for="num-pax">
                                        Cabin occupancy:
                                    </label>

                                        <select class="form-control" id="num-pax">
                                            <option value=""> - Choose -</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>

                                </div>

                        <div class="col-md-12 form-group pax-age" style="display: none;"></div>



                    </form>

                </div>
            </div>
        </div>
    </div>
</div>