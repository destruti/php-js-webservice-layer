<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Restful API Client</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <script>

        $(document).ready(function(){

            $.ajax(
                { url: 'http://webservicelayer.info/view',
                    complete: function ( jsXHR, textStatus ) {

                        console.log(jsXHR);
                        console.log(textStatus);


//                        var xmlResponse = $.parseXML(jsXHR.responseText),
//                            $xml = $(xmlResponse),
//                            $make = $xml.find('make'),
//                            $price = $xml.find('price'),
//                            $carName = $xml.find('car-name');
//                        $('h3#carMake').html("Manufacture: "+$make.text());
//                        $('h3#carPrice').html("Price: "+$price.text());
//                        $('h3#carName').html("Car Name: "+$carName.text());
                    }
                }
            );

        });


    </script>

</head>
<body>

<p>ok! lets do'it!</p>

</body>
</html>