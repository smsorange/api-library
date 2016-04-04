<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                    <div class="number_of_cruises">Number of matching cruises:
                        <span><b><?php echo  $num; ?></b></span></div>
            </div>
            <div class="panel-body">
                <?php if ($num > 0): ?>
                    <div class="table-responsive">
                        <table class="dataTable table small table-striped-alt table-bordered table-hover table-condensed"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="all">Destination</th>
                                <th class="all">Description</th>
                                <th class="desktop">Ship</th>
                                <th class="none">Days</th>
                                <th class="desktop">Departure</th>
                                <th class="min-tablet-l">Confirm</th>
                                <th class="all">From</th>
                                <th class="min-tablet-p">To</th>
                                <th class="none">Cruise Line</th>
                                <th class="none">Arrival Port</th>
                                <th class="all"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($cruises as $cruise): ?>
                                <tr>
                                    <td>
                                        <?php echo  $cruise->CruisesDestination->name; ?>
                                    </td>
                                    <td>
                                        <?php echo  $cruise->Cruise->name; ?>
                                    </td>
                                    <td>
                                        <?php echo  $cruise->CruisesShip->name; ?>
                                    </td>
                                    <td>
                                        <?php echo  $cruise->Cruise->duration; ?>
                                    </td>
                                    <td>
                                        <?php echo  $cruise->DeparturePort->name; ?>
                                    </td>
                                    <td>
                                        <?php if ($cruise->Cruise->is_immediate_confirm === true): ?>
                                            Yes
                                        <?php elseif ($cruise->Cruise->is_immediate_confirm === false): ?>
                                            No
                                        <?php else: ?>
                                            Unknown
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cruise->Cruise->departure_date = str_replace('/', '-', $cruise->Cruise->departure_date);
                                        $departureDate = strtotime($cruise->Cruise->departure_date);
                                        $departureDate = date("d/m/y g:i A", $departureDate);
                                        ?>
                                        <?php echo  $departureDate; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cruise->Cruise->arrival_date = str_replace('/', '-', $cruise->Cruise->arrival_date);
                                        $arrivalDate = strtotime($cruise->Cruise->arrival_date);
                                        $arrivalDate = date("d/m/y g:i A", $arrivalDate);
                                        ?>
                                        <?php echo  $arrivalDate; ?>
                                    </td>
                                    <td>
                                        <?php echo  $cruise->CruisesCruiseLine->name; ?>
                                    </td>
                                    <td>
                                        <?php echo  $cruise->ArrivalPort->name; ?>
                                    </td>
                                    <td style="overflow: hidden;
                                          text-overflow: ellipsis;
                                          white-space: nowrap; max-width: 75px">

                                        <form role="form" id="cruise-select" data-type="Cruise" data-step="Select" data-container="cruise_details" data-webservice="0">
                                            <input type="hidden" value="<?php echo $cruise->Cruise->code; ?>" name="cruise-code">
                                            <input type="hidden" value="<?php echo $cruise->CruisesCruiseLine->webservice_connection_type; ?>" name="webservice">
                                            <button type="submit" class="btn btn-xs btn-info" data-control="api" >Select</button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="empty_message">There are no cruises available with these conditions</p>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>