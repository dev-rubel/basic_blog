function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        $.ajax({
            url: "../home/search",
            method: 'post',
            data: {
                title: str
            },
            success: function(res) {
                console.log(res)
                document.getElementById("txtHint").innerHTML = res;
            },
            error: function(err) {
                console.log(err);
            }
        })
        // var xmlhttp = new XMLHttpRequest();
        // xmlhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //         document.getElementById("txtHint").innerHTML = this.responseText;
                
        //     }
        // };
        // xmlhttp.open("GET", "../search.php" + str, true);
        // xmlhttp.send();
    }
}

$(document).ready(function(){
    $("#show").click(function(){
        $(this).hide(function() {
            $("#hide").show(function () {
                $(this).click(function () {
                    $("#nav").slideUp();
                    $(this).hide(function () {
                        $("#show").show();
                    })
                })
            });
            $("#nav").slideDown();
        });
    });
});