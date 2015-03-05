$( document ).ready(function() {

    viewRegisters();
    function viewRegisters() {

        try {

            $('#statusMessage').html(' hashClient - ' + $('#hashClient').val() );

            var data = [{ hashClient: $('#hashClient').val() }];
            var restData = JSON.stringify(data);

            $.ajax({
                type : 'POST',
                url  : 'http://webservicelayer.info.dev/view',
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

            $('#' + obj.key).html( obj.value );

        });

    }

});