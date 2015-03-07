$( document ).ready(function() {

    var liveEnv = false;

    var live   = "http://webservicelayer.info";
    var source = "http://webservicelayer.info.dev";
    if (liveEnv == true) source = live;

    singleCall();
    function singleCall() {

        try {

            $('#statusMessage').html(' hashClient - ' + $('#hashClient').val() );

            var data = [{ hashClient: $('#hashClient').val() }];
            var restData = JSON.stringify(data);

            $.ajax({
                type : 'POST',
                url  : source+'/view',
                data : restData,

                success: function(data) {

                    $('#statusMessage').html(' done! ');

                    console.log(data);
                    makeSingleCall(data);
                },

                error: function() { $('#statusMessage').html('Error'); }

            });


        }
        catch(err) {
            $('#statusMessage').html('Error: ' + err.message);
        }

    }

    function makeSingleCall(data) {

        var fields = $.makeArray( data );

        $.map( fields, function( obj ) {

            if (obj.key == 'website_title') {
                document.title = obj.value;
            }

            console.log(obj);

            $('#' + obj.key).html( obj.value );

        });

    }

});