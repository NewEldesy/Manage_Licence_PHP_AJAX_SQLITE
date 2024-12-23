$(document).ready(function () {
    $(document).on('click', '#loginForm', function(e){
        e.preventDefault();
        username = $('#username').val(); password = $('#password').val();
        $.ajax({
            url: 'ajax/login.php',
            method: 'POST',
            data: { username: username, password: password },
            success: function (response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    window.location = 'dashboard.php';
                } else {
                    alert(res.message);
                }
            },
        });
    });

    // Vérification de la licence après connexion
    function checkLicense() {
        $.ajax({
            url: 'ajax/check_license.php',
            method: 'GET',
            success: function (response) {
                const res = JSON.parse(response);
                if (res.status === 'valid') {
                    $("#licenseStatus").text("Licence valide");
                } else if (res.status === 'expired') {
                    $("#licenseStatus").text("Licence expirée");
                } else if (res.status === 'no_license') {
                    $("#licenseStatus").text("Aucune licence trouvée");
                }
            }
        });
    }

    // Appel automatique après chargement de la page
    if (window.location.pathname.includes('dashboard.php')) {
        checkLicense();
    }
});