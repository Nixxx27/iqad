/**
 * Created by nikko.zabala on 9/22/2015.
 */


/**
 * effects name in index.
 * @return name with effects
 */
function effects_name()
    {
        $(".name").typed({
                strings: ["Quality Assurance Department"],
            typeSpeed: 20
        });
    };


/**
 * show hide div
 * @return div show effects.
 */
function show_hide_unknown_page()
    {
        $('#unknown')
        .hide(100)
        .show('slow');
    }




/**
 * view organization from department_tbl
 * @return organization list.
 */
function show_organization()
    {
        var department = $('#department').val(),
            person_org = $('#person_org');
        $.ajax({
            type: 'GET',
            url: "get_organization",
            data: {selected_department: department},
            success: function(result){
                 person_org.val(result)
            }
        });
    };



/**
 * view cause category base on chosen items
 * @return category list.
 */
function show_cause_category()
    {
        var causal_factor = $('#causal_factor').val(),
            cause_category = $('#cause_category');

        cause_category.find('option').remove();
            if(causal_factor==0){
                cause_category.append("<option selected='selected'>-- select category --</option>");
            }else{
                $.ajax({
                    type: 'GET',
                    url: "get_cause_category",
                    data: {selected_causal_factor: causal_factor},
                    success: function(result){
                        cause_category.append("<option value=''>Choose from list</option>" + result)
                    }
                });
            }
    };


/**
 * view Item base on chosen category
 * @return item list.
 */
function show_item()
    {
        var cause_category = $('#cause_category').val(),
            item = $('#item');

        item.find('option').remove();
            if(cause_category==0){
                item.append("<option selected='selected'>-- select category --</option>");
            }else{
                $.ajax({
                    type: 'GET',
                    url: "get_item",
                    data: {selected_category: cause_category},
                    success: function(result){
                        item.append("<option value=''>Choose from list</option>" + result)
                    }
                });
            }
    };


function logout()
    {
        if( confirm("Are you sure you wish to logout?")){
            return true;
        }else { return false; }
    }


/**
 * @response Add placeholder to fields with Errors
 */

$(".withErrors").attr("placeholder", "required");


/**
 * @response go to Homepage
 */
function go_Home()
    {
     window.location.href='home';
    }


function go_back (){
    window.history.back()
}


/*
    @response Date picker
 */

var inputs = document.querySelectorAll('input.date-picker');

for( var i = 0; i <= inputs.length - 1; i++ ) {
    new DatePicker(inputs[i], {
        outputFormat: inputs[i].getAttribute('data-format')
    });
}


/*
 * @return FadeToggle Body
 */

$('.opa_white').fadeToggle('slow');