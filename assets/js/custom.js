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
let modal = document.getElementById("myModal");
let span = document.getElementsByClassName("close-modal")[0];

span.onclick = function() {
    modal.style.display = "none";
}
span.onclick = function() {

}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
const handlechange = ()=>{
    let choose_NGN = document.getElementById("choose_NGN");
    let value = choose_NGN.options[choose_NGN.selectedIndex].value;

    if(value == "add"){
        modal.style.display = "block";


    }
}