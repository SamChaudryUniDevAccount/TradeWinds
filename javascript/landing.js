//Working
$( document ).ready(function() {

    loadGraph();
});


function loadGraph() {

    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data)    {
        // Create the chart

        var dataObject = {
            rangeSelector: {
                selected: 1,
                inputEnabled: $('#container').width() > 480
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

       // var chart = new Highcharts.StockChart(dataObject);

        var chart = $('#commoditiesGraph').highcharts(dataObject);
    });






//Graph commodities id is: commoditiesGraph
}