function searchFunction() {
    var input = document.getElementById("search-bar").value;
    if (input.length === 0) {
        document.getElementById("dropdown").innerHTML = "";
        return;
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var response = JSON.parse(this.responseText);
            var dropdownContent = "";
            for (var i = 0; i < response.length; i++) {
                dropdownContent += "<a href='#'>" + response[i] + "</a>";
            }
            document.getElementById("dropdown").innerHTML = dropdownContent;
        }
    };
    xmlhttp.open("GET", "landsearche.php?input=" + input, true);
    xmlhttp.send();
}