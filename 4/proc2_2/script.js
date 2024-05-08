document.addEventListener("DOMContentLoaded", function () {
    const yearInput = document.getElementById('year');
    const submitButton = document.getElementById('submitButton');

    yearInput.addEventListener('input', check);

    function check() {
        const year = yearInput.value;
        console.log(year);

        let numberRegex = /^[1-9]\d*$/;

        if (numberRegex.test(year)) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }
});