window.YM ={};
require('./notifications')
require('./simplebar')
require('./metisMenu')
require('./scrollbar')
import * as PerfectScrollbar from './scrollbar'
window.PerfectScrollbar = PerfectScrollbar;
require('./theme')
require('./medias')
require('./permissions')
require('./editor')
require('./menus')
require('./email')
require('./nepali-calendar')
require('./avatar')
require("jquery-validation")


$(function () {
    $("#form-validator").validate({
        errorPlacement: function ( error, element ) {
            // Add the `invalid-feedback` class to the error element
            error.addClass( "invalid-feedback" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.next( "label" ) );
            }else if(element.prop("type") === "file" && element.hasClass('filepond--browser')){
                error.insertAfter( element.parent());
            }
            else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
    });
});
