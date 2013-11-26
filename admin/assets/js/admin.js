(function ( $ ) {
	"use strict";

	$(function () {

		$('.date-pick').datepicker({
            dateFormat : 'dd/mm/yy'
         });

        $('#field_slug').slugify('#field_name');

	});

}(jQuery));

