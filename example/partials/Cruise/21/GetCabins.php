<form role="form" data-type="Cruise" data-step="HoldCabin" data-container="book_data" data-webservice="21">
    <input type="hidden" name="cruise-code" value="<?php echo $_COOKIE['cruise-code']; ?>">

    <div class="table-repsonsive">
        <table class="cabins table table-condensed">
            <tr>
                <th>Cabin No.</th>
                <th>No. of beds</th>
                <th>Facility</th>
                <th>Ship plan</th>
                <th>Category video</th>
                <th>Name of deck</th>
                <th>Select</th>
            </tr>
            <?php foreach ($cabins as $cabin): ?>
                <tr class="cabin_item">
                    <td class="cabin_number"><span><?php echo $cabin->Number; ?></span></td>
                    <td class="number_of_beds"><?php echo $cabin->MinOccupancy; ?>
                        - <?php echo $cabin->MaxOccupancy; ?></td>
                    <td class="facility">
                        <?php foreach ($cabin->Beds->Bed as $bed): ?>
                            <?php if ($bed->BedCode): ?>
                                <img src="../example/images/<?php echo strtolower($bed->BedCode); ?>.gif">
                            <?php else: ?>
                                /
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                    <td class="ship_plan">
                        <a href="<?php echo $cabin->URL; ?>" target="_blank">
                            <i class="fa fa-ship"></i>
                        </a>
                    </td>
                    <td class="ship_plan">
                        <a href="<?php echo $cabin->Category->URL; ?>" target="_blank">
                            <i class="fa fa-video-camera"></i>
                        </a>
                    </td>
                    <td class="name_of_deck"><?php echo $cabin->DeckName; ?></td>
                    <td class="select">
                        <input type="radio" name="cabin_number" value="<?php echo $cabin->Number; ?>"/>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label>
                Dining
                preference:
            </label>

            <select name="dining_preference" class="form-control dining_preference" id="">
                <option value="Main">Main</option>
                <option value="Late">Late</option>
                <option value="OpenSeating">Open Seating</option>
                <option value="Unspecified">Unspecified</option>
            </select>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <input type="text" autocomplete="off" class="first_name form-control" name='first_name'
                   placeholder="First Name *" value="Luca"/>
            <span style="display: none" class="error">Insert first name</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <input type="text" autocomplete="off" class="last_name form-control" name="last_name"
                   placeholder="Last Name *" value="Pellegrino"/>
            <span style="display: none" class="error">Insert last name</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-info" data-control="api">Next</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('table.cabins').find('input[type=radio]:first').prop('checked', true);

        var guests_cookie = getCookie('cruise-guests');
        var guests = JSON.parse(decodeURIComponent(guests_cookie));

        var category_code_cookie = getCookie('category-code');

        $('form[data-step=HoldCabin]').each(function () {
            var form = this;
            $.each(guests, function (key, age) {
                $(form).append('<input type="hidden" name="cruise-guests[]" value="' + age + '">');
            });
            $(form).append('<input type="hidden" name="category-code" value="' + category_code_cookie + '">');
        });
    });
</script>
