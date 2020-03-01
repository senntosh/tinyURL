<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function objectifyForm(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            if (typeof returnArray[formArray[i]['name']] !== 'undefined') {
                if (Array.isArray(returnArray[formArray[i]['name']])) {
                    returnArray[formArray[i]['name']].push(formArray[i]['value']);
                } else {
                    returnArray[formArray[i]['name']] = [
                        returnArray[formArray[i]['name']],
                        formArray[i]['value']
                    ];
                }
            } else {
                returnArray[formArray[i]['name']] = formArray[i]['value'];
            }
        }
        return returnArray;
    }

    $(document).ready(function () {
        $('#submit').on('click', function (event) {
            event.preventDefault();
            var formData = objectifyForm($('#tiny-url').serializeArray()),
                handleSuccess = function(response){
                    console.log('ajax success',response);
                    if(response.success){
                        $("<div class=\"alert alert-success\">" +response.message+"</div>").prependTo('#tiny-url').delay(5000).fadeOut(400);
                        $('.card-footer').html("Generated Tiny URL: <a href='"+response.url+"' target='_blank'>"+response.url+"</a>")
                        $('#tiny-url')[0].reset();
                    }else{
                        $("<div class=\"alert alert-danger\">" +response.message+"</div>").prependTo('#tiny-url').delay(5000).fadeOut(400);
                    }
                },
                handleFailure = function(response){
                        $("<div class=\"alert alert-danger\">" +"Whoops! Something went wrong. Please try again later."+"</div>").prependTo('#tiny-url').delay(5000).fadeOut(400);
                };

            $.post('/api.php',formData,null,'json').done(handleSuccess).fail(handleFailure);
        })
    })
</script>
