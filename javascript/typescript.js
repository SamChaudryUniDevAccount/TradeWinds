/*

when adding to the main page add the js file as below

 <script src="javascript/typescript.js"></script>

$( document ).ready(function() {

    alert("This came from typescript.js document.ready function")

    getSuccessOutput();
});

let user ="sam this came from sam who is using typescript"

document.getElementById('test').innerHTML = user;

function getSuccessOutput() {

    $.ajax({

        url:'http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?',

        complete: function (response) {

            alert(response)

        },
        error: function () {



        },
    });
    return false;
}
 */
