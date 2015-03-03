$( document ).ready(function() {

    $( "#insert_btn" ).click(function() {

        var campaign = $('#campaign').val();
        var pr_name  = $('#pr_name').val();
        var mp3_link = $('#mp3_link').val();
        var yt_link  = $('#yt_link').val();
        var data = [{ campaign: campaign, pr_name: pr_name, mp3_link: mp3_link, yt_link: yt_link , _method: 'post' }];

        $('#statusMessage').html('Waiting Insert...');

        url = "http://webservicelayer.info.dev/addWorship";
        makeCall(url, data);

    });

    $( "#update_btn" ).click(function() {

        var _id      = $('#_id').val();
        var campaign = $('#campaign').val();
        var pr_name  = $('#pr_name').val();
        var mp3_link = $('#mp3_link').val();
        var yt_link  = $('#yt_link').val();
        var data = [{ _id: _id, campaign: campaign, pr_name: pr_name, mp3_link: mp3_link, yt_link: yt_link , _method: 'post' }];

        $('#statusMessage').html('Waiting Update...');

        var url = "http://webservicelayer.info.dev/updateWorship";
        makeCall(url, data);

    });

    $( "#delete_btn" ).click(function() {

        var _id      = $('#_id').val();
        var campaign = $('#campaign').val();
        var pr_name  = $('#pr_name').val();
        var mp3_link = $('#mp3_link').val();
        var yt_link  = $('#yt_link').val();
        var data = [{ _id: _id, campaign: campaign, pr_name: pr_name, mp3_link: mp3_link, yt_link: yt_link , _method: 'post' }];

        $('#statusMessage').html('Waiting Update...');

        var url = "http://webservicelayer.info.dev/updateWorship";
        makeCall(url, data);

    });

    function makeCall(url, data) {

        try {

            var restData = JSON.stringify(data);

            request = $.post(url, restData);
            request.done(function(res){

                console.log(res);

                if (res.ok == '1') {
                    $('#statusMessage').html('Success');
                    window.location.href = '/example/';
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