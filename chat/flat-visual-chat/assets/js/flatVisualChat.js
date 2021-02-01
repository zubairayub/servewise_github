var vcht_selectionMode = false;
var vcht_documentBody;
var vcht_avatarSel = false;
var vcht_url = '';
var vcht_position = 'right';

jQuery.noConflict();

jQuery(document).ready(function() {
    vcht_getUrl();
}); 

function vcht_init() {
    vcht_documentBody = ((jQuery.browser.chrome) || (jQuery.browser.safari)) ? document.body : document.documentElement;
    if (!vcht_isIframe() || window.parent.document.location.href.indexOf('console') < 0) {
        if(document.location.href.indexOf('https://')>=0 && vcht_url.indexOf('https://')<0){
            vcht_url = 'https'+vcht_url.substr(4,vcht_url.length);
        } else if(document.location.href.indexOf('http://')>=0 && vcht_url.indexOf('https://')>=0){
            vcht_url = 'http'+vcht_url.substr(5,vcht_url.length);
        }
        jQuery('body').append('<iframe id="vcht_chatframe" src="' + vcht_url + 'flat-visual-chat/include/flatVisualChat_content.php" class="' + vcht_position + '"></iframe>');
        if (jQuery(window).width() < 410) {
            jQuery('#vcht_chatframe').addClass('vcht_mob');
        }
    }
    jQuery('*').click(function(e) {
        if (vcht_selectionMode) {
            if (jQuery(this).children().length == 0 || jQuery(this).is('a') || jQuery(this).is('button') || jQuery(this).is('img') || jQuery(this).is('select')) {
                e.preventDefault();
                jQuery('.vcht_selectedDom').removeClass('vcht_selectedDom');
                jQuery(this).addClass('vcht_selectedDom');
                window.parent.vcht_selectDomElement(this);
                vcht_selectionMode = false;
            }
        }
    });

    if (document.location.href.indexOf('vcht_element') > 0) {
        var msgID = document.location.href.substr(document.location.href.indexOf('vcht_element') + 13);
        jQuery.ajax({
            url: wtmt_root+'flat-visual-chat/include/clientAjax.php',
            type: 'POST',
            data: {
                action: 'vcht_getMsgElement',
                msgID: msgID
            }, success: function(rep) {
                vcht_showElement(rep);
            }
        });
    }
}

function vcht_getUrl() {
    jQuery.ajax({
        url: wtmt_root+'flat-visual-chat/include/clientAjax.php',
        type: 'post',
        data: {
            action: 'vcht_get_url'
        },
        success: function(repS) {
            if (repS != 'no') {
                var rep = jQuery.parseJSON(repS);
                vcht_url = rep.url;
                vcht_position = rep.position;
                vcht_init();
            }
        }
    });
}


function vcht_isIframe() {
    try {
        return window.self !== window.top;
    } catch (e) {
        return true;
    }
}

function vcht_startSelection() {
    vcht_selectionMode = true;
}

function vcht_showElement(el, avatarImg) {
    if (jQuery(el).length > 0) {
        if (jQuery('.vcht_avatarSel').length > 0) {
            vcht_avatarSel = jQuery('.vcht_avatarSel');
        } else {
            if (avatarImg) {
                vcht_avatarSel = jQuery('<div class="vcht_avatarSel" style="background-image:  url(\'' + vcht_url + 'flat-visual-chat/console/include/files/' + avatarImg + '\');"><div class="vcht_avatarArrow"></div></div>');
            } else {
                vcht_avatarSel = jQuery('<div class="vcht_avatarSel"><div class="vcht_avatarArrow"></div></div>');
            }
        }
        jQuery('body').append(vcht_avatarSel);
        jQuery(el).addClass('vcht_selectedDom');
        if (vcht_isAnyParentFixed(jQuery(el))) {
            if (jQuery(el).position().top - 140 < 0) {
                vcht_avatarSel.addClass('bottom');
                vcht_avatarSel.css({
                    top: jQuery(el).position().top + jQuery(el).outerHeight() + 80,
                    left: jQuery(el).position().left + jQuery(el).outerWidth() / 2
                });
            } else {
                vcht_avatarSel.removeClass('bottom');
                vcht_avatarSel.css({
                    top: jQuery(el).position().top - 80,
                    left: jQuery(el).position().left + jQuery(el).outerWidth() / 2
                });
            }
            jQuery(vcht_documentBody).animate({scrollTop: jQuery(el).position().top - 200}, 500);
        } else {
            if (jQuery(el).offset().top - 140 < 0) {
                vcht_avatarSel.addClass('bottom');
                vcht_avatarSel.css({
                    top: jQuery(el).offset().top + jQuery(el).outerHeight() + 80,
                    left: jQuery(el).offset().left + jQuery(el).outerWidth() / 2
                });
            } else {
                vcht_avatarSel.removeClass('bottom');
                vcht_avatarSel.css({
                    top: jQuery(el).offset().top - 80,
                    left: jQuery(el).offset().left + jQuery(el).outerWidth() / 2
                });
            }
            jQuery(vcht_documentBody).animate({scrollTop: jQuery(el).offset().top - 200}, 500);
        }
    }
}

function vcht_isAnyParentFixed($el, rep) {
    if (!rep) {
        var rep = false;
    }
    try {
        if ($el.parent().length > 0 && $el.parent().css('position') == "fixed") {
            rep = true;
        }
    } catch (e) {
    }
    if (!rep && $el.parent().length > 0) {
        rep = vcht_isAnyParentFixed($el.parent(), rep);
    }
    return rep;
}
