<?php include('header.php'); ?>
<?php
    $config = require('../config/app.php');
    $info = false;
    if( empty($config['api_token']) || !isset($config['api_token']) ){
        $info = "<b>Please set the API Token first in 'config/app.php'!</b> <br/> The example application will not work otherwise. <br/> If you don't have one, contact Orange Travel to get your Token.";
    }
?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">


        <h1>API example</h1>
        <p>This is an example usage of the OrangeTravel API.
            <br/>
            Technical contacts:
            <button class="btn btn-sm btn-info">lpellegrino@smsorange.com.mt</button>
            <button class="btn btn-sm btn-info">iciric@smsorange.com.mt</button>
        </p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">


        <div class="col-md-6">
            <h2>Cruises</h2>
            <p>Search and book cruises with the most popular cruise lines in the world! </p>
            <p><a class="btn btn-default" href="cruises-demo.php" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-6">
            <h2>Tours</h2>
            <p>Search and book bus tours from all around the world!. </p>
            <p><a class="btn btn-default disabled" href="tours-demo.php" role="button">View details &raquo;</a></p>
        </div>

    </div>

    <hr>

    <footer>
        <p>&copy; OrangeTravel <?php echo date('Y'); ?></p>
    </footer>


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
                    <?php if($info): ?>
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

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/main.js"></script>

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
