(function($){
    'use strict';

    $(document).ready(function(){
   

        var xhr;

        var amPushAjax = function( url, eventType ){
            if(xhr && xhr.readyState != 4){
                xhr.abort();
            }
            xhr = $.ajax({
                url: url,
                success: function(data) {
                    //console.log(data);
                    //$('.archive_ajax_result').html($('.archive_ajax_result', data).html());
                    //$('#am_posts_navigation').html($('#am_posts_navigation', data).html());
               
                    $('#content').html($('#content', data).html());                    
               
                    document.title = $(data).filter('title').text();
                }
            });
        };


        $( document ).on('click', 'a', function(e){
            e.preventDefault();

            var targetUrl = ( e.target.href ) ? e.target.href : $(this).context.href;

            //console.log(e.target.href);
            //console.log($(this));
            amPushAjax( targetUrl, 'click' );
            window.history.pushState({url: "" + targetUrl + ""}, "", targetUrl);
        });

        window.onpopstate = function(e) {            
            amPushAjax( e.state ? e.state.url : null, 'click' );
        };


    });

    $(window).load(function(){
        
    });

})(jQuery);


