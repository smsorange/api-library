<?php
$cabinCategories = [
    0 => 'Inside',
    1 => 'Outside',
    2 => 'Balcony',
    3 => 'Suite',
];

?>

<div class="table-responsive">
    <form role="form" data-type="Cruise" data-step="GetCabins" data-container="cabins" data-webservice="21">
        <input type="hidden" name="cruise-code" value="<?php echo $_COOKIE['cruise-code']; ?>">
        <table class="table categories table-condensed">
            <thead>
            <tr>
                <th width="25%">Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Price (EUR)</th>
                <th>Price Desc.</th>
                <th>Available</th>
                <th>Choose</th>
            </tr>
            </thead>
            <tbody>


            <?php foreach ($categories as $category_type => $sub_categories) : ?>
                <tr>
                    <td colspan="8" class="category_type">
                        <h5>
                            <b>Type: <?php echo $cabinCategories[$category_type]; ?></b>
                        </h5>
                    </td>
                </tr>
                <?php foreach ($sub_categories as $key => $category): ?>
                    <tr class="category">
                        <td class="name"><span><?php echo $category->Name; ?></span></td>
                        <td class="code"><?php echo $category->Code; ?></td>
                        <td class="description">
                            <?php if ($category->AdditionalDescription): ?>
                                <span class="description" title="<?php echo $category->AdditionalDescription; ?>">
            <i class="fa fa-info-circle"></i>
          </span>
                            <?php endif; ?>
                            <a href="<?php echo $category->URL; ?>" target="_blank">
                                <i class="fa fa-video-camera"></i>
                            </a>
                        </td>
                        <td class="price"><?php echo $category->Price->GuestPrice->Amount; ?></td>
                        <td class="price_desc"><?php echo $category->Price->GuestPrice->Description; ?></td>
                        <td class="available"><?php echo ($category->Availability === 'true') ? 'Yes' : 'No'; ?></td>
                        <td class="choose">
                            <?php if ($category->Availability === 'true'): ?>
                                <input type="radio" name="category-code" value="<?php echo $category->Code; ?>"/>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn btn-success" data-control="api">Next</button>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('table.categories').find('input[type=radio]:first').prop('checked', true);

        var guests_cookie = getCookie('cruise-guests');
        var guests = JSON.parse(decodeURIComponent(guests_cookie));

        $('form[data-step=GetCabins]').each(function () {
            var form = this;
            $.each(guests, function (key, age) {
                $(form).append('<input type="hidden" name="cruise-guests[]" value="' + age + '">');
            });
        });

    });
</script>