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

            beforeSend: function () {
                console.log('beforeSend');
            },

            success: function (response) {
                console.log('success');
            },

            error: function (error) {
                console.log(error);
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
