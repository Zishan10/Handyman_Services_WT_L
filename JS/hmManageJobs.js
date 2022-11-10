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


//Problem Completed Validation

document.getElementById("problemCompleted").addEventListener("keyup", function() {
    if (document.getElementById("problemCompleted").value == "") {
        document.getElementById("errorProblemCompleted").innerHTML =
            "Please fill Completion";
    } else if (
        /^[0-9][0-9]$/.test(document.getElementById("problemCompleted").value) == false
    ) {
        document.getElementById("errorProblemCompleted").innerHTML ="Completion Must Be Within 10 to 99%";
            

    } else {
        document.getElementById("errorProblemCompleted").innerHTML = "";
    }
});
