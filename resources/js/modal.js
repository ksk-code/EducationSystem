document.addEventListener('DOMContentLoaded', function() {
    const registerButton = document.getElementById('registerButton');
    const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));

    registerButton.addEventListener('click', function () {
        registerModal.show();
    });

    document.getElementById('confirmSubmit').addEventListener('click', function() {
        document.getElementById('registrationForm').submit();
    });

    const cancelButton = document.querySelector('#registerModal .btn-secondary');
    if (cancelButton) {
        cancelButton.addEventListener('click', function() {
            registerModal.hide();
        });
    }

    const closeButton = document.querySelector('#registerModal .btn-close');
    if (closeButton) {
        closeButton.addEventListener('click', function() {
            registerModal.hide();
        });
    }
});
