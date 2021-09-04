function onSignIn(googleUser) {
    let profile = googleUser.getBasicProfile();
    let profileId = profile.getId();
    let profileEmail = profile.getEmail();
    let profileName =  profile.getName();
    let profileImageUrl = profile.getImageUrl();

    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

    if (profileEmail != null && profileEmail !== "") {
        let _token = $('input[name=_token]').val();
        let url = $('.g-signin2').data("route-google");

        var formData = new FormData();
        formData.append("_token", _token);
        formData.append("name", profileName);
        formData.append("email", profileEmail);
        formData.append("profileId", profileId);
        formData.append("profileImageUrl", profileImageUrl);

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
                    Swal.fire({
                        icon: 'success',
                        title: resp.msg,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.replace(resp.ruta);
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: resp.msg,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        signOut();
                        window.location.replace(resp.ruta);
                    });
                }
            },

            error: function (error) {
                Swal.fire({
                    icon: 'error',
                    text: error
                }).then(function() {
                    signOut();
                });
            }
        });
    }
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
    });
}

function onLoad() {
    gapi.load('auth2', function() {
        gapi.auth2.init();
    });
}
