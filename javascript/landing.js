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

                var apiData = $.parseJSON(data);

                $.each(apiData, function(k, v) {

                    $('#assetClass').append($("<option></option>").attr("TABLE_NAME",k).text(v["TABLE_NAME"]));

                });
            }
        });

}


$('#assetClass').change(function() {

    var $items = $('assetClass').val();

    var obj = {}

    $items.each(function() {

        obj[this.id] = $(this).val();

    })

    var jsonDataToPost = JSON.stringify( obj);

    $.ajax(
        {

            type:'POST',
            url:'apipost.php',
            data:{"getCommodityByAssetClass": jsonDataToPost},
            success: function(data){

                 alert(data);

            }
        });




});


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