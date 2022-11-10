//REQUEST ID VALIDATION
document.getElementById("requestID").addEventListener("keyup", function() {
    if (document.getElementById("requestID").value == "") {
        document.getElementById("errorRequestID").innerHTML =
            "Please fill out ID";
    } else if (
        /^[0-9]{1,4}$/.test(document.getElementById("requestID").value) == false
    ) {
        document.getElementById("errorRequestID").innerHTML ="Invalid ID Format";
            

    } else {
        document.getElementById("errorRequestID").innerHTML = "";
    }
});

//OFFERED PRICE VALIDATION
document.getElementById("offeredPrice").addEventListener("keyup", function() {
    if (document.getElementById("offeredPrice").value == "") {
        document.getElementById("errorOfferedPrice").innerHTML =
            "Please Put A Price";
    } else if (
        /^[0-9]{1,5}$/.test(document.getElementById("offeredPrice").value) == false
    ) {
        document.getElementById("errorOfferedPrice").innerHTML ="Invalid Price Format";
            

    } else {
        document.getElementById("errorOfferedPrice").innerHTML = "";
    }
});