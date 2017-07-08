//Working
$( document ).ready(function() {

    loadGraph();
});


function loadGraph() {

    Highcharts.chart('commoditiesGraph', {

        chart: {
            renderTo: 'commoditiesGraph'
        },

        xAxis: {
            ordinal: false
        },

        rangeSelector: {
            selected: 1
        },

        plotOptions: {
            line: {
                gapSize: 2
            }
        },

        series: [{
            name: 'USD to EUR',
            data: usdeur
        }]
    });

//Graph commodities id is: commoditiesGraph
}