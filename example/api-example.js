$(function () {
    initRequestHandler();

    $('#cruise-search').attr('data-webservice', $('#cruise_lines').val());

    $('#cruise_lines').change(function () {
        var cruise_line_id = $(this).val();
        $(this).parents('form').attr('data-webservice', cruise_line_id);
    });

});

function formatDataForService(service, data) {
    return eval('formatDataFor' + service + '(data)');
}

function formatDataForCruise(data) {
    console.log(data);
}

function initRequestHandler() {

    $("[data-control=api]").each(function(){
        $(this).off('click');
        $(this).on('click', function (e) {
            e.preventDefault();
            callAjax(
                {
                    data: $(this).parents('form').serialize(),
                    type: $(this).parents('form').data('type'), // Cruise, Tour
                    webservice: $(this).parents('form').data('webservice'), // int
                    step: $(this).parents('form').data('step'), // Search, Select, Book
                    container: $(this).parents('form').data('container') // Search, Select, Book
                }
            );
        });
    });


}

function callAjax(data) {

    $.ajax({
        type: "POST",
        url: "handler.php",
        data: data,
        beforeSend: function () {
            $(".note").hide();
            $("#results").html('');
            $("#dump").html('');
            $(".spinner").show();
        },
        success: function (msg) {
            $(".spinner").hide();

            var resp = JSON.parse(msg);

            $("#results").html(resp.result);

            $("#dump").html(resp.dump);

            $("#api-call-type").html(data.type + ' ' + data.step);

            eval(data.type + data.step + 'Callback()');

        },
        error: function () {
            alert("API communication error");
        }
    });

}

function CruiseSearchCallback() {

    initDataTable('.dataTable');

    initRequestHandler();

}

function CruiseSelectCallback() {

    initRequestHandler();

    customerTypeInit();
}

function CruiseGetComponentsCallback() {

    initRequestHandler();

}

function CruiseGetAvailableCategoriesCallback() {

    initRequestHandler();
}

function CruiseGetCabinsCallback() {

    initRequestHandler();
}

function CruiseGetQuoteCallback() {

    initRequestHandler();
}

function CruiseHoldCabinCallback() {

    initRequestHandler();
}

function CruiseBookCallback() {

    initRequestHandler();
}

function initDataTable(elem) {

    $(elem).DataTable({
        "pageLength": 5
    });

    $(elem + ' tbody').on('click', 'tr', function () {

        console.log($(this).attr('class'));

    });

}

function init_fares_events(fares_wrapper) {
    // select changed
    fares_wrapper.find('select').change(function () {
        fare_code = $(this).val();
        fares_wrapper.find('div.select_fare span.error').hide();

        if (fare_code == FARE_GROUP) {
            fares_wrapper.find('div.select_fare').after($('<div class="group_number">' +
                '<label>Group Number* ' +
                '<input type="text" autocomplete="off" name="cruise_data[group_number]" />' +
                '</label><span class="error">Group number is mandatory</span></div>'));
        } else {
            fares_wrapper.find('div.group_number').remove();
        } // if
    });
} // init_fares_events

function customerTypeInit() {
    //$('select.fare-code').on('change', function(){
    //
    //    if($(this).val()){
    //        // show the number of guests fields
    //        $('.cabin').show();
    //
    //
    //    } else {
    //        // remove gests fields
    //        $('.cabin').hide();
    //    }
    //});
    customerAgeInit();
}

function customerAgeInit() {
    $('#num-pax').on('change', function(){

        if($(this).val()){
            generateAgeField($(this).val());
            $('.pax-age').show();
            $('.pax-submit').show();
        } else {
            $('.pax-age').hide();
            $('.pax-submit').hide();
        }
    });
}

function generateAgeField(num) {

    $('.pax-age').html('');

    for( var i = 0; i < num; i++ ) {
        var pax_num = i + 1;
        $('.pax-age').append('<label>Pax ' + pax_num + ' age </label> <input type="number" name="guests[]" maxlength="2"><br/>');
    }
}

function cabinInit() {
    var cabin_wrapper = $("<div class='cabin'></div>");
    var cabin_wrapper_div = ($('<div class="row"><div/>'));
    cabin_wrapper_div.append($('<label class="col-md-2 p-t-5">Cabin occupancy:<label/>'));
    // generate select by the max occupancy per cabin
    var select_number = $('<select class="form-control"></select>');
    for (var i = 1; i <= max_occupancy; i++) {
        select_number.append($('<option value="' + i + '">' + i + '</option>'))
    } // for

    // generate inputs for age
    var age_input_wrapper = $('<div class="age_input p-t-5"></div>');
    var age_error = '<span style="display: none" class="error">Age must be positive whole number</span>';
    age_input_wrapper.append('<div class="row"><label class="control-label col-md-2 p-t-5">Age of customers*</label><div class="col-md-3"><input class="form-control" type="text" autocomplete="off" name="cruise_data[age_1]" />' + age_error + '</div></div></div>');

    // selected number of inputs changed
    select_number.change(function () {
        var age_input_number = parseInt($(this).val());

        var diff = age_input_number - age_input_wrapper.find('input').length;
        if (diff < 0) {
            // delete inputs
            do {
                age_input_wrapper.find('input:last').parent(0).remove();
                age_input_wrapper.find('label:last').remove();
                ++diff;
            } while (diff < 0);
        } else if (diff > 0) {
            // add inputs
            do {
                var input_count = age_input_wrapper.find('input').length;
                age_input_wrapper.append('<div class="row"><label class="control-label col-md-2 p-t-5">Age of customers*</label><div class="col-md-3"><input class="form-control" type="text" autocomplete="off" name="guests[]" />' + age_error + '</div></div></div>');
                --diff;
            } while (diff > 0);
        } // if
    });

    var select_wrapper = $('<div class="col-md-2"></div>');
    select_wrapper.append(select_number);
    cabin_wrapper_div.append(select_wrapper);
    cabin_wrapper.append(cabin_wrapper_div);
    cabin_wrapper.append(age_input_wrapper);

    cabin_wrapper.appendTo(form_wrapper);
} // cabin_init

function additional_init() {
    var additional_wrapper = $("<div class='additional'></div>");
    additional_wrapper.appendTo(form_wrapper);

    additional_wrapper.append('<p>Additional components:</p>');
    additional_wrapper.append(MainApp.Icons.ajaxLoaderSmall());

    $.ajax({
        'url': '{$get_components_url}',
        'type': 'get',
        'data': {
            'guests': guests,
            'fare_code': fare_code
        },
        'success': function (data) {
            additional_wrapper.find('img').remove();
            additional_wrapper.append(data);
            additional_wrapper.append(($('<button class="back btn btn-sm btn-warning m-r-5">Back</button>')).on('click', button_back_event));
            additional_wrapper.append(($('<button class="next btn btn-sm btn-success">Next</button>')).on('click', button_next_event));
        },
        'error': function (response) {
            additional_wrapper.find('img').remove();
            additional_wrapper.append('<p>' + response.responseText + '</p>');
            additional_wrapper.append(($('<button class="back btn btn-sm btn-warning m-r-5">Back</button>')).on('click', button_back_event));
        }
    });
} // additional_init

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
