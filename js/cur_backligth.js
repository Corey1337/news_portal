$(function() {

    var pathname_url = window.location.pathname;
    var href_url = window.location.href;

    $(".menu a").each(function () {

        var link = $(this).attr("href");
        
        if(pathname_url == link || href_url == link) {
            
            $(this).addClass('active');
        }
    });
});