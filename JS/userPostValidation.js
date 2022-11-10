// POST VALIDATION
document.getElementById("userPost").addEventListener("keyup", function() {
    if (document.getElementById("userPost").value == "") {
        document.getElementById("errorUserPost").innerHTML =
            "Please fill Post";
    } else if (
        /^[\sa-zA-Z]{20,}$/.test(document.getElementById("userPost").value) == false
    ) {
        document.getElementById("errorUserPost").innerHTML =
            "Post Must be atleast 20 characters long and must not contain special characters excpt Spaces ";

    } else {
        document.getElementById("errorUserPost").innerHTML = "";
    }
});
