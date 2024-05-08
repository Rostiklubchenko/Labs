document.addEventListener("DOMContentLoaded", function () {
    const date1Input = document.getElementById('date1');
    const date2Input = document.getElementById('date2');
    const submitButton = document.getElementById('submitButton');

    date1Input.addEventListener('change', checkDates);
    date2Input.addEventListener('change', checkDates);

    checkDates();

    function checkDates() {
        const date1 = new Date(date1Input.value);
        const date2 = new Date(date2Input.value);

        if (date1 >= date2) {
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    }
});