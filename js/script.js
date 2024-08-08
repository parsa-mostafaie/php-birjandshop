jQuery(document).ready(function($){

    function second_to_time( seconds ){
        // Eg. 90,110
        let ss = seconds % 60; // 50
        let mm = Number.parseInt(seconds / 60); // 1501
        let hh = Number.parseInt(mm / 60); // 25
        mm = mm % 60; // 1

        if (hh < 10) {hh = "0"+hh;}
        if (mm < 10) {mm = "0"+mm;}
        if (ss < 10) {ss = "0"+ss;}

        return hh+":"+mm+":"+ss; // 25:01:50

    }

    $('.countdown').each( function(  ){
        let time    = $(this).data('time');
        let seconds = ( Date.parse(time) / 1000 ) - parseInt( Date.now() / 1000 );
        if( seconds > 0 ){
            let _this = $(this);
            $(this).attr('data-remain', seconds ).closest( '.card' ).addClass('active-countdown');
            $(_this).text( second_to_time( seconds ) );
            setInterval(function(){
                let seconds = parseInt( $(_this).attr('data-remain') ) - 1;
                if( seconds ){
                    $(_this).attr( 'data-remain', seconds );
                    $(_this).text( second_to_time( seconds ) );
                }else{
                    $(_this).closest('.card').removeClass('active-countdown')
                }
            }, 1000 );
        }
    } );

});