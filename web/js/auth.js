async function onSignIn(User)
{
    const profile = User.getBasicProfile();
    const email = profile.getEmail();

    const body = {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({email})
    }

    const response = await fetch('../../app/controllers/auth/login_google_controller.php', body);
    const jsonRes = response.json();

    jsonRes.then( data => {
        if(data.error)
        {
            swal({title: `Advertencia`, text: `${data.error}`, icon: `warning`, button: 'Aceptar', closeOnClickOutside: false, closeOnEsc: false})
        }
        else
        {
            location.href = data.location;
        }
    })
    .catch( err => console.log(err));
}