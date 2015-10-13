/* TABS */

jQuery(function () {
    jQuery(".pane").hide().first().show();
    jQuery(".navigation li:first").addClass("active");

    jQuery(".navigation a").on('click', function (e) {
        e.preventDefault();
        jQuery(this).closest('li').addClass("active").siblings().removeClass("active");
        jQuery(jQuery(this).attr('href')).show().siblings('.pane').hide();
    });

    var hash = jQuery.trim( window.location.hash );

    if (hash) jQuery('.navigation a[hrefjQuery="'+hash+'"]').trigger('click');

});

