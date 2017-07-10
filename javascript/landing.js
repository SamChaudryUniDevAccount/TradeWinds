//Working
$( document ).ready(function() {

    loadAssetTypes();

});


function loadAssetTypes() {

    $.ajax(
        {

            type:'GET',
            url:'apiget.php',
            data:"getAssetClassList",
            success: function(data){

              parse(data);
            }
        });

}

function parse(data){

    var apiData = $.parseJSON(data);

    for (var x = 0; apiData.length < 10; x++) {

        selectList += "<option>" + apiData[x] + "</option>";
    }
    selectList += "</select>";

    $('#assetClass').html(selectList);
}

//Plotting
function loadGraph() {

    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data)    {

        // Create the chart

        var dataObject = {

            rangeSelector: {
                selected: 1,
                inputEnabled: $('#commoditiesGraph').width() > 480
            },

            title: {
                text: 'AAPL Stock Price'
            },

            series: [{
                name: 'AAPL',
                data: data,
                tooltip: {
                    valueDecimals: 2
                }
            }],

            chart: {
                renderTo: 'commoditiesGraph'
            }
        };

        var chart = $('#commoditiesGraph').highcharts(dataObject);
    });




}