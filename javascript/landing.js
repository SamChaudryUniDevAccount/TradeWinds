//Working refactor to typescript and add Sass
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

//assetClassloader

$('#assetClass').on('change',function() {


    var option;

    var assetClass;
    assetClass = $('#assetClass').val();

    var assetClass = { commodityAssetClass: assetClass }

    var jsonDataToPost = JSON.stringify( assetClass);


    $.ajax(
        {

            type:'POST',
            url:'apipost.php',
            data:{"getCommodityByAssetClass": jsonDataToPost},
            success: function(data){

                loadCommodityNames(data)

            }
        });

});

function loadCommodityNames(data) {



    $('#assetType').find('option').remove()

    var apiData = $.parseJSON(data);

    $.each(apiData, function(k, v) {

        $('#assetType').append($("<option></option>").attr("Commodity_name",k).text(v["Commodity_name"]));

    });


}

//Get Graph data by asset class
$('#commodityData').click(function() {

    getCommodityGraphData();


})

function getCommodityGraphData() {


   showLoadingSpinner();

    var commoditiesParameters = {};

        var inputDataArray = ($(".inputData").serializeArray());

        for (var i = 0; i < inputDataArray.length; i++) {

            commoditiesParameters[inputDataArray[i]['name']] = inputDataArray[i]['value'];

        }


        var postdata = JSON.stringify(commoditiesParameters);


    $.ajax(
        {

            type:'POST',
            url:'apipost.php',
            data:{"getCommodityData":postdata},
            success: function(data){

                var apiData = $.parseJSON(data);

                var graphData =  apiData['dataset_data']['data'];

                loadGraph(graphData);

            }
        });


}





//Plotting
function loadGraph(graphData) {


        var graphObject = {

            rangeSelector: {
                selected: 1,
                inputEnabled: $('#commoditiesGraph').width() > 480
            },

            title: {
                text: $('#assetType').val(),
            },
            xAxis: {

                categories: addCommodityDates(graphData)
            },
            yAxis:[{

                title: {

                    text: 'Price ($USD)'
                }
            }],
            series: [{
                name: $('#assetType').val(),
                data: graphData,
                tooltip: {

                    valueDecimals: 2
                }
            }],

            chart: {
                renderTo: 'commoditiesGraph'
            }
        };


    $('#spin').hide();

    var chart = $('#commoditiesGraph').highcharts(graphObject);

}

function addCommodityDates(graphData) {

    var datesArray = [];

    for(i = 0; i < graphData.length; i++){

        for(j = 0; j < graphData[i].length; j++ ){

            datesArray.push(graphData[i][0]);
        }

    }

    return datesArray;
}
//Setup spinner object within application
function showLoadingSpinner() {

    var html = "<i class='.spinnerStyles'> Loading data...</i>"

    $('#spin').spinner({

        background: "rgba(255,255,255,0.25)",
        spin: false,
        color: "white",
        html: html

    });

    $('#spin').show();
}

