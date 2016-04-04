<?php include('header.php'); ?>
<?php
    $config = require('../config/app.php');
    $info = false;
    if (empty($config['api_token']) || !isset($config['api_token'])) {
        $info = "<b>Please set the API Token first in 'config/app.php'!</b> <br/> The example application will not work otherwise. <br/> If you don't have one, contact Orange Travel to get your Token.";
    }
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="images/cruise-1.jpg" alt="Cruise" width='100%'>
            <div class="carousel-caption">
                <h1>Cruises API example</h1>
            </div>
        </div>
        <div class="item ">
            <img src="images/cruise-2.jpg" alt="Cruise" width='100%'>
            <div class="carousel-caption">
                <h1>Cruises API example</h1>
            </div>
        </div>
        <div class="item ">
            <img src="images/cruise-4.jpg" alt="Cruise" width='100%'>
            <div class="carousel-caption">
                <h1>Cruises API example</h1>
            </div>
        </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<p></p>
<div class="container">
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-primary">

                <div class="panel-heading">
                    <b>Search</b>
                </div>

                <div class="panel-body">

                    <form role="form" id="cruise-search"
                          data-type="Cruise"
                          data-webservice="0"
                          data-step="Search"
                          data-container="cruises">

                        <div class="col-md-2 form-group">
                            <label for="from_date">Earliest departure</label>
                            <select name="cruise_data[from_date]" id="from_date" class="form-control">
                                <option value="0">
                                    -- Any Date --
                                </option>
                                <option value="2016-03">
                                    March 2016
                                </option>
                                <option value="2016-04">
                                    April 2016
                                </option>
                                <option value="2016-05">
                                    May 2016
                                </option>
                                <option value="2016-06">
                                    June 2016
                                </option>
                                <option value="2016-07">
                                    July 2016
                                </option>
                                <option value="2016-08">
                                    August 2016
                                </option>
                                <option value="2016-09">
                                    September 2016
                                </option>
                                <option value="2016-10">
                                    October 2016
                                </option>
                                <option value="2016-11">
                                    November 2016
                                </option>
                                <option value="2016-12">
                                    December 2016
                                </option>
                                <option value="2017-01">
                                    January 2017
                                </option>
                                <option value="2017-02">
                                    February 2017
                                </option>
                                <option value="2017-03">
                                    March 2017
                                </option>
                                <option value="2017-04">
                                    April 2017
                                </option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="to_date">Latest arrival</label>
                            <select name="cruise_data[to_date]" id="to_date" class="form-control">
                                <option value="0">
                                    -- Any Date --
                                </option>
                                <option value="2016-03">
                                    March 2016
                                </option>
                                <option value="2016-04">
                                    April 2016
                                </option>
                                <option value="2016-05">
                                    May 2016
                                </option>
                                <option value="2016-06">
                                    June 2016
                                </option>
                                <option value="2016-07">
                                    July 2016
                                </option>
                                <option value="2016-08">
                                    August 2016
                                </option>
                                <option value="2016-09">
                                    September 2016
                                </option>
                                <option value="2016-10">
                                    October 2016
                                </option>
                                <option value="2016-11">
                                    November 2016
                                </option>
                                <option value="2016-12">
                                    December 2016
                                </option>
                                <option value="2017-01">
                                    January 2017
                                </option>
                                <option value="2017-02">
                                    February 2017
                                </option>
                                <option value="2017-03">
                                    March 2017
                                </option>
                                <option value="2017-04">
                                    April 2017
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="cruise_lines">Cruise line</label>
                            <select name="cruise_data[cruises_cruise_line_id]" id="cruise_lines" class="form-control">
<!--                                <option value="0">-->
<!--                                    -- Any Cruise Line ---->
<!--                                </option>-->
                                <option value="21">
                                    Costa Cruise Line
                                </option>
<!--                                <option value="162">-->
<!--                                    Manual Cruise Line-->
<!--                                </option>-->
                                <!--                                <option value="166">-->
                                <!--                                    CDF-->
                                <!--                                </option>-->
                                <!--                                <option value="167">-->
                                <!--                                    NCL Cruise Line-->
                                <!--                                </option>-->
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="destinations">Destination</label>
                            <select name="cruise_data[destination_id]" id="destinations" class="form-control">
                                <option value="">
                                    -- Any Destination --
                                </option>
                                <option value="23">
                                    Caribbean
                                </option>
                                <option value="24">
                                    Mediterranean
                                </option>
                                <option value="26">
                                    Grand Oriental Cruises
                                </option>
                                <option value="27">
                                    Indian Ocean/Mauritius
                                </option>
                                <option value="28">
                                    Northern Europe
                                </option>
                                <option value="29">
                                    Pacific Asia
                                </option>
                                <option value="30">
                                    Persian Gulf
                                </option>
                                <option value="31">
                                    Round World
                                </option>
                                <option value="32">
                                    South America
                                </option>
                                <option value="33">
                                    Transatlantic
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="ships">Ship</label>
                            <select name="cruise_data[ship_code]" id="ships" class="form-control">
                                <option value="0">
                                    -- Any Ship --
                                </option>
                                <option value="PA">
                                    Costa Pacifica
                                </option>
                                <option value="NC">
                                    Costa neoClassica
                                </option>
                                <option value="DI">
                                    Costa Diadema
                                </option>
                                <option value="FO">
                                    Costa Fortuna
                                </option>
                                <option value="FA">
                                    Costa Favolosa
                                </option>
                                <option value="MD">
                                    Costa Mediterranea
                                </option>
                                <option value="NR">
                                    Costa neoRomantica
                                </option>
                                <option value="MG">
                                    Costa Magica
                                </option>
                                <option value="RN">
                                    Costa neoRiviera
                                </option>
                                <option value="LU">
                                    Costa Luminosa
                                </option>
                                <option value="FS">
                                    Costa Fascinosa
                                </option>
                                <option value="DE">
                                    Costa Deliziosa
                                </option>
                                <option value="ERcGU2mPiq">
                                    Zenith 2016
                                </option>
                                <option value="xdwikVQvl7">
                                    Horizon 2016
                                </option>
                                <option value="VI">
                                    Costa Victoria
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="ports">Departure port</label>
                            <select name="cruise_data[departure_port_id]" id="ports" class="form-control">
                                <option value="0">
                                    -- Any Port --
                                </option>
                                <option value="12">
                                    Venice
                                </option>
                                <option value="13">
                                    La Valletta
                                </option>
                                <option value="14">
                                    Amsterdam
                                </option>
                                <option value="15">
                                    Barcelona
                                </option>
                                <option value="16">
                                    Buenos Aires
                                </option>
                                <option value="18">
                                    Civitavecchia
                                </option>
                                <option value="19">
                                    Copenhagen
                                </option>
                                <option value="20">
                                    Dubai
                                </option>
                                <option value="21">
                                    Dubrovnik
                                </option>
                                <option value="22">
                                    Genoa
                                </option>
                                <option value="23">
                                    Guadeloupe
                                </option>
                                <option value="24">
                                    Hamburg
                                </option>
                                <option value="28">
                                    Kiel
                                </option>
                                <option value="29">
                                    La Romana
                                </option>
                                <option value="30">
                                    Marseilles
                                </option>
                                <option value="34">
                                    Piraeus/Athens
                                </option>
                                <option value="35">
                                    Port Louis
                                </option>
                                <option value="36">
                                    Rhodes
                                </option>
                                <option value="37">
                                    Santos
                                </option>
                                <option value="38">
                                    Savona
                                </option>
                                <option value="39">
                                    Shanghai
                                </option>
                                <option value="42">
                                    Stockholm
                                </option>
                                <option value="43">
                                    Sydney
                                </option>
                                <option value="45">
                                    Trieste
                                </option>
                            </select>
                        </div>

                        <div class="col-md-1 form-group pull-right">
                            <button
                                type="submit"
                                id="submit"
                                data-control="api"
                                class="btn btn-success"
                                <?php //echo ($info) ? 'disabled="disabled"' : null ?>
                            >Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">

                <div class="panel-heading">
                    <b>Result</b> - example of a formatted <b><span id="api-call-type"></span></b> result
                </div>

                <div class="spinner text-center" style="display: none;">
                    <p class="col-md-12"><i class="fa-5x fa fa-spinner fa-spin"></i></p>
                </div>

                <div class="panel-body " id="results">

                    <div class="note">
                        Keep an <i class="fa fa-eye"></i> on this pane...
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning">

                <div class="panel-heading">
                    <b>Dump</b> - single object, for reference
                </div>

                <div class="spinner text-center" style="display: none;">
                    <p class="col-md-12"><i class="fa-5x fa fa-spinner fa-spin"></i></p>
                </div>

                <div class="panel-body pre-scrollable" id="dump">

                    <div class="note">
                        Keep an <i class="fa fa-eye"></i> on this pane...
                    </div>

                </div>

            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <footer>
            <p>&copy; OrangeTravel <?php echo date('Y'); ?></p>
        </footer>
    </div>

    <!-- Modal -->
    <div id="modalInfo" class="modal fade" role="dialog" data-color="green">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Notice</h4>
                </div>
                <div class="modal-body info">
                    <?php if ($info): ?>
                        <p>
                            <?php echo $info; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


</div> <!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>


<script src="js/vendor/transition.js"></script>
<script src="js/vendor/collapse.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/main.js"></script>

<script type="text/javascript"
        src="https://cdn.datatables.net/t/bs-3.3.6/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.11,b-1.1.2,b-colvis-1.1.2,b-html5-1.1.2,b-print-1.1.2,fh-3.1.1,r-2.0.2,sc-1.4.1,se-1.1.2/datatables.min.js"></script>

<script src="api-example.js"></script>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');

    $(document).ready(function () {
        $('.collapse').collapse();
        $('.dropdown-toggle').dropdown();
        <?php if($info): ?>
            //$("#modalInfo").modal();
        <?php endif; ?>
    });

</script>
<style>
    .modal.in .modal-dialog {
        z-index: 9999;
    }
</style>
</body>
</html>