function convertCurrency(input, exchangeRate) {
    let convertedVal = Number(input) * Number(exchangeRate);
    return convertedVal.toFixed(2);
}
function convertCurrencyBack(input, exchangeRate) {
    let convertedVal = Number(input) / Number(exchangeRate);
    return convertedVal.toFixed(2);
}
function getFlagEmoji(countryCode) {
    const codePoints = countryCode
        .toUpperCase()
        .split('')
        .map(char =>  127397 + char.charCodeAt());
    return String.fromCodePoint(...codePoints);
}
function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#selectedImg')
                .attr('src', e.target.result)
                .width(100)
                .height(100);
        };
        $('#selectedImg').show();
        reader.readAsDataURL(input.files[0]);
    }
}
// Get the modal
let modal = document.getElementById("myModal-h");
let span = document.getElementsByClassName("close-modal-h")[0];

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

