<?php if (empty($components->flights) && empty($components->buses)): ?>
    <p>No additional components available</p>
<form role="form" data-type="Cruise" data-step="GetAvailableCategories"
      data-container="categories" data-webservice="21">
    <input type="hidden" name="cruise-code" value="<?php echo $_COOKIE['cruise-code']; ?>">
    <button class="btn btn-success" data-control="api">Next</button>
</form>

<?php else: ?>
    <label>
        <input type="radio" value="0" name="additional_component" checked="checked"/>
        None
    </label>
<?php endif; ?>

<?php if (isset($components->flights) && !empty($components->flights)): ?>

    <div class="col-md-2 f-w-600">Flights</div>


    <?php foreach ($components->flights as $flight): ?>
        <span class="row">
        <form role="form" data-type="Cruise" data-step="GetAvailableCategories"
              data-container="categories" data-webservice="21">

        <input type="hidden" value="<?php echo $flight->Code; ?>"
               additional_type="<?php echo $flight->Type; ?>"
               additional_direction="<?php echo $flight->Direction; ?>"
               name="Code"/>

            <input type="hidden" name="Direction" value="<?php echo $flight->Direction; ?>">
            <input type="hidden" name="cruise-code" value="<?php echo $components->cruise->Code; ?>">

        <?php if ($flight->Mandatory == 'true'): ?>
            Mandatory
        <?php else: ?>
            <input type="hidden" name="Type" value="<?php echo $flight->Type; ?>">
        <?php endif; ?>

        <label class="p-t-5">
            Direction:
        </label>
        <span class="f-w-600"><?php echo $flight->Direction; ?></span>


        <label class="control-label col-md-3 p-t-5">Departure city:</label>
        <select class='form-control' name="City">
            <?php foreach ($flight->Cities as $city): ?>
                <?php foreach ($city as $c): ?>
                    <option value='<?php echo $c->Code; ?>'><?php echo $c->Description; ?></option>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </select>

        <button class="btn btn-success" data-control="api">Next</button>
        </form>
        </div>
    <?php endforeach; ?>


<?php endif; ?>
<br>
<?php if (isset($components->buses) && !empty($components->buses)): ?>
    <div class="col-md-2 f-w-600">Buses</div>
    <div class="row table-responsive thumbnail">
        <table class="additional_components_table buses table table-condensed">
            <thead></thead>
            <tbody>
            <?php foreach ($components->buses as $bus): ?>
                <tr class="additional_component bus">
                    <td class="checkbox_b width-100">
                        <label>
                            <?php if ($bus->Mandatory == 'true'): ?>
                                Mandatory
                            <?php else: ?>
                                <input type="radio" value="<?php echo $bus->Code; ?>"
                                       additional_type="<?php echo $bus->Type; ?>"
                                       additional_direction="<?php echo $bus->Direction; ?>"
                                       name="Code"/>
                                Book
                                <input type="hidden" name="Type" value="<?php echo $bus->Type; ?>">
                            <?php endif; ?>
                        </label>
                    </td>
                    <td width="30%" class="direction">
                        <div class="row">
                            <label class="p-t-5">
                                Direction:
                            </label>
                            <span class="f-w-600"><?php echo $bus->Direction; ?></div>
                        </span>
                    </td>
                    <td width="55%" class="city">
                        <div class="row">
                            <label class="control-label col-md-3 p-t-5">Departure city:</label>

                            <div class="col-md-9">
                                <select class='form-control' name="City">
                                    <?php foreach ($bus->Cities as $city): ?>
                                        <?php foreach ($city as $c): ?>
                                            <option
                                                value='<?php echo $c->Code; ?>'><?php echo $c->Description; ?></option>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
<?php endif; ?>


<script>
$(function () {
    var guests_cookie = getCookie('cruise-guests');
    var guests = JSON.parse( decodeURIComponent( guests_cookie ) );

    $('form[data-step=GetAvailableCategories]').each(function() {
        var form = this;
        $.each(guests, function(key, age) {
            $(form).append('<input type="hidden" name="cruise-guests[]" value="' + age + '">');
        });
    });

});
</script>