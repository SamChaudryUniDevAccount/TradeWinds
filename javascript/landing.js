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

                if(apiData == null){

                    $('#spin').hide();

                    $('#commoditiesGraph').text('Sorry data not found please check your inputted parameters');

                }else {


                    //var graphData =  apiData['dataset_data']['data'];

                    loadCommodityGraph(data);

                }

            }
        });


}


//Plotting
function loadCommodityGraph(data) {


        var graphObject = {

            rangeSelector: {
                selected: 1,
                inputEnabled: $('#commoditiesGraph').width() > 480
            },

            title: {
                text: $('#assetType').val() + "\n" + data['dataset']['description'],
            },
            xAxis: {

                categories: addCommodityDates(graphData)
            },
            yAxis:[{

                title: {

                    text: data['dataset']['name']
                }
            }],
            series: [{
                name: $('#assetType').val(),
                data: graphData,
                tooltip: {

                    valueDecimals: 3
                }
            }],

            chart: {
                renderTo: 'commoditiesGraph'
            }
        };


    $('#spin').hide();

    var chart = $('#commoditiesGraph').highcharts(graphObject);

}

function addCommodityDates(data) {

    var datesArray = [];
    var dataToplot = data['dataset']['data']


    for(i = 0; i < dataToplot.length; i++){

        for(j = 0; j < dataToplot[i].length; j++ ){

            datesArray.push(dataToplot[i][0]);
        }

    }

    return datesArray;
}
//Setup spinner object within application
function showLoadingSpinner() {

    var html = "<i class='.spinnerStyles'>Loading data. Please wait.</i>"

    $('#spin').spinner({

        //Frosted glass effect added into spinner
        background: "rgba(255,255,255,0.5)",
        spin: false,
        color: "#5893B7",
        html: html

    });

    $('#spin').show();
}

//