//Working
$( document ).ready(function() {

    loadGraph();
});


function loadGraph() {

        //Sample from test project integrated in for hard coded data
    $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=aapl-c.json&callback=?', function (data)    {

        var CommoditiesDataObject = {

            rangeSelector: {
                selected: 1,

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

        var chart = new Highcharts.StockChart(CommoditiesDataObject);

        //var plot = $('#container').highcharts('commoditiesGraph', CommoditiesDataObject);
    });






//Graph commodities id is: commoditiesGraph
}