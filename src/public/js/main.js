function makeHandler () {
    var button = $('.bind');
    button.unbind();
    button.click(function () {
        var link = $(this).attr('href');
        jQuery.ajax({'success': function (html) {
            jQuery("#reloaded").replaceWith(html);
            makeHandler();
        }, 'type': 'POST', 'url': link, 'cache': false, 'data': jQuery(this).parents("form").serialize()});
        return false;
    });
}