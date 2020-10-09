jQuery(document).ready(function ($) {

    var at_document = $(document);

    $( '.wishful-blog-install-plugins' ).click( function ( e ) {
        e.preventDefault();

        $( this ).addClass( 'updating-message' );
        $( this ).text( wishful_blog_install.btn_text );

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action     : 'wishful_blog_getting_started',
                security : wishful_blog_install.nonce,
                slug : 'wishful-companion',
                request : 1
            },
            success:function( response ) {
                setTimeout(function(){
                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: {
                            action     : 'wishful_blog_getting_started',
                            security : wishful_blog_install.nonce,
                            slug : 'email-capture-lead-generation',
                            request : 2
                        },
                        success:function( response ) {
                            var extra_uri, redirect_uri, dismiss_nonce;
                            redirect_uri         = wishful_blog_install.adminurl+'themes.php?page=wishful-companion-panel-install-demos';
                            window.location.href = redirect_uri;

                        },
                        error: function( xhr, ajaxOptions, thrownError ){
                            console.log(thrownError);
                        }
                    });
                }, 2000);
            },
            error: function( xhr, ajaxOptions, thrownError ){
                console.log(thrownError);
            }
        });
    } );

});
