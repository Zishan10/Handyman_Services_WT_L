
//ID VALIDATION
document.getElementById("userID").addEventListener("keyup", function() {
    if (document.getElementById("userID").value == "") {
        document.getElementById("errorUserID").innerHTML =
            "Please fill out ID";
    } else if (
        /^[0-9]{1,4}$/.test(document.getElementById("userID").value) == false
    ) {
        document.getElementById("errorUserID").innerHTML =
            "Invalid ID Format";

    } else {
        document.getElementById("errorUserID").innerHTML = "";
    }
});
