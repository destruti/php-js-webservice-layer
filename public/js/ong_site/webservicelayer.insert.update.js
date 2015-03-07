$( document ).ready(function() {

    var liveEnv = false;

    var live   = "http://webservicelayer.info";
    var source = "http://webservicelayer.info.dev";
    if (liveEnv == true) source = live;

    $( "#insert_btn" ).click(function() {

        var key   = $('#key').val();
        var value = $('#value').val();
        var data  = [{ hashClient: $('#hashClient').val(),  key: key, value: value, _method: 'post' }];

        $('#statusMessage').html('Waiting Insert...');

        url = source+"/addClientDatabase";
        makeCall(url, data);

    });

    $( "#update_btn" ).click(function() {

        var _id   = $('#_id').val();
        var key   = $('#key').val();
        var value = $('#value').val();
        var data  = [{ hashClient: $('#hashClient').val(), _id: _id, key: key, value: value, _method: 'post' }];

        $('#statusMessage').html('Waiting Update...');

        var url = source+"/updateClientDatabase";
        makeCall(url, data);

    });

    $( "#delete_btn" ).click(function() {

        var _id   = $('#_id').val();
        var key   = $('#key').val();
        var value = $('#value').val();
        var data  = [{ hashClient: $('#hashClient').val(), _id: _id, key: key, value: value, _method: 'post' }];

        $('#statusMessage').html('Waiting Update...');

        var url = source+"/deleteClientDatabase";
        makeCall(url, data);

    });

    function makeCall(url, data) {

        try {

            $('#statusMessage').html(' hashClient - ' + $('#hashClient').val() );

            var restData = JSON.stringify(data);

            request = $.post(url, restData);
            request.done(function(res){

                console.log(res);

                if (res.ok == '1') {
                    $('#statusMessage').html('Success');
                    window.location.href = '/examples/'+$('#hashClient').val()+'/';
                } else {
                    $('#statusMessage').html('Error');
                }

            });

        }
        catch(err) {
            $('#statusMessage').html('Error: ' + err.message);
        }

    }

});