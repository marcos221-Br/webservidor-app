document.addEventListener('DOMContentLoaded', function () {
    let alerts = document.querySelectorAll('.alert');

    alerts.forEach(function (alert) {
        setTimeout(function () {
            alert.style.display = 'none';
        }, 5000);
    });
});
