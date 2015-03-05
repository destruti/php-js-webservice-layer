$( document ).ready(function() {

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
                    makeTable(data);
                },

                error: function() { $('#statusMessage').html('Error'); }

            });


        }
        catch(err) {
            $('#statusMessage').html('Error: ' + err.message);
        }

    }

    function makeTable(data) {

        var realArray = $.makeArray( data );

        $('#here_table').append( '' +
            '<table style="width: 100%;" class="collapse">' +
                '<tr>' +
                    '<td style="width: 20%; font-weight: bold; " >_id</td>' +
                    '<td style="width: 20%; font-weight: bold; " >campaign</td>' +
                    '<td style="width: 20%; font-weight: bold; " >pr_name</td>' +
                    '<td style="width: 20%; font-weight: bold; " >created</td>' +
                    '<td style="width: 10%; font-weight: bold; " ></td>' +
                    '<td style="width: 10%; font-weight: bold; " ></td>' +
                '</tr>' +
            '</table>'
        );

        $.map( realArray, function( obj ) {

            $('#here_table').append( '' +
                '<table style="width: 100%;" class="collapse">' +
                    '<tr >' +

                        '<td style="width: 20%;" >'+obj._id.$id+'</td>' +
                        '<td style="width: 20%;" >'+obj.campaign+'</td>' +
                        '<td style="width: 20%;" >'+obj.pr_name+'</td>' +
                        '<td style="width: 20%;" >'+obj.created.sec+obj.created.usec+'</td>' +

                        '<td style="width: 10%; cursor: pointer; color: green; font-weight: bold; " onclick="window.location.href=\'update.html?_id='+obj._id.$id+'&campaign='+obj.campaign+'&pr_name='+obj.pr_name+'&mp3_link='+obj.mp3_link+'&yt_link='+obj.yt_link+'\'" >Edit</td>' +
                        '<td style="width: 10%; cursor: pointer; color: red; font-weight: bold; " class="removeOne" id="'+obj._id.$id+'">Remove</td>' +

                    '</tr>' +
                '</table>'
            );

        });

        $('#here_table').append( '<br/><br/><br/>' );
        $('#here_table').append( '<input onclick="window.location.href=\'insert.html\'" type="button" id="add_BTN" value="Add New Row" />' );

        deleteIfNeed();

    }

    function deleteIfNeed() {
        $('.removeOne').click(function() {

            try {

                $('#statusMessage').html(' delete - ' + $('#hashClient').val() );

                var data = [{ hashClient: $('#hashClient').val() }];
                var restData = JSON.stringify(data);

                $.ajax({
                    type : 'POST',
                    url  : "http://webservicelayer.info.dev/removeOne/"+this.id,
                    data : restData,

                    success: function(data) {

                        $('#statusMessage').html('Success');
                        window.location.href = '/examples/church/';
                    },

                    error: function() { $('#statusMessage').html('Error'); }

                });


            }
            catch(err) {
                $('#statusMessage').html('Error: ' + err.message);
            }

        });
    }

});