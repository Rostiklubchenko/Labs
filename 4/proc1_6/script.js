document.addEventListener("DOMContentLoaded", function () {
    const Input = document.getElementById('interval');
    const submitButton = document.getElementById('submitButton');

    Input.addEventListener('input', check);

    function check() {
        const input = Input.value;

        let numberRegex = /^[1-9]\d*$/;

        if (numberRegex.test(input)) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }
});