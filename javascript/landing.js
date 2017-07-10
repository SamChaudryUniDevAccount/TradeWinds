//Working
$( document ).ready(function() {

loadAssetTypes();

});


function loadAssetTypes() {

    $.ajax(
        {

            type:'GET',
            url:'/API/api.php',
            data:"test",
            success: function(data){

                alert(data);

            }

        });


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