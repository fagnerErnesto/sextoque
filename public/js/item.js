var manage = {
    showHideElementsByScreenWith:function () {
        if ($(window).width() > 567) {
            $('.img_name').hide();
            $('.img_logo').show();
        } else {
            $('.img_name').show();
            $('.img_logo').hide();
        }
    }
};

$(document).ready(function(){
    manage.showHideElementsByScreenWith();
});