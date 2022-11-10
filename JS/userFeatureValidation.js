
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

// Handyman ID Validation
document.getElementById("hmID").addEventListener("keyup", function() {
    if (document.getElementById("hmID").value == "") {
        document.getElementById("errorhmID").innerHTML =
            "Please fill out ID";
    } else if (
        /^[0-9]{1,4}$/.test(document.getElementById("hmID").value) == false
    ) {
        document.getElementById("errorhmID").innerHTML =
            "Invalid ID Format";

    } else {
        document.getElementById("errorhmID").innerHTML = "";
    }
});



