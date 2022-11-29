const inputY = document.getElementById("input_Y")
const warningElement = document.getElementById("y-warning");
const submitButton = document.getElementById("submit");

inputY.addEventListener('input', function () {
    const y = parseFloat(inputY.value);
    if (Number.isNaN(y) || y < -3 || y > 3 ){
        warningElement.hidden = false;
        submitButton.disabled = true;
    } else {
        warningElement.hidden = true;
        submitButton.disabled = false;
    }
});


