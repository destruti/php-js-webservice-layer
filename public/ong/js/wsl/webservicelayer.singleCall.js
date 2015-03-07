$( document ).ready(function() {

    var devEnabled = true;

    var live   = "http://webservicelayer.info";
    var source = "http://webservicelayer.info.dev";
    if (devEnabled == false) source = live;

    singleCall();
    function singleCall() {

        console.log('Lets get ' + $('#hashClient').val() + ' at ' + source)

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

            console.log(obj);

            if (obj.key == 'website_title') {
                document.title = obj.value;
            } else
            if (obj.key == 'website_logo') {
                console.log('???' + obj.value);
                $("#website_logo").attr("src",obj.value);
            } else
            {
                $('#' + obj.key).html( obj.value );
            }

        });

    }

});