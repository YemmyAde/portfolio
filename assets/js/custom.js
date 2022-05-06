function convertCurrency(input, exchangeRate) {
    let convertedVal = Number(input) * Number(exchangeRate);
    return parseInt(convertedVal);
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
