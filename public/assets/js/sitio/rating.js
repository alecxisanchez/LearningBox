var Rating;

Rating = function () {

    return {

        guardarRating: function () {

            $('.guardar_rating').on('click', function() {
                let url = $(this).data("route");
                let _token = $('input[name=_token]').val();

                var formData = new FormData();
                formData.append("_token", _token);
                formData.append('_method', 'POST');

                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "HTML",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                    success: function (response) {
                        let resp = JSON.parse(response);
                        if( resp.respuesta ) {
                            console.log(resp.msg);
                        }
                    }

                });

            });

        }

    }

}();
