
jQuery(document).ready(function() {
    jQuery('.colorpick').each(function() {
        var $this = jQuery(this);
        jQuery(this).colpick({
            color: $this.val().substr(1, 7),
            onChange: function(hsb, hex, rgb, el, bySetColor) {
                jQuery(el).val('#' + hex);
            }
        });
    });
});