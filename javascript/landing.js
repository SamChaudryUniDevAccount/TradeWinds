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


                    var graphData =  apiData['dataset_data']['data'];

                    loadCommodityGraph(graphData);

                }

            }
        });


}


//Plotting
function loadCommodityGraph(graphData) {

        var graphObject = {

            rangeSelector: {
                selected: 1,
                inputEnabled: $('#commoditiesGraph').width() > 480
            },

            title: {
                text: $('#assetType').val(),
            },
            xAxis: {

                categories: loadDataAsArray(graphData)
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

                    valueDecimals: 4
                }
            }],

            chart: {
                renderTo: 'commoditiesGraph'
            }
        };


    $('#spin').hide();

    var chart = $('#commoditiesGraph').highcharts(graphObject);

}


//Setup spinner object within application
function showLoadingSpinner() {

    var html = "<i class='.spinnerStyles'>Loading data....</i>"

    $('#spin').spinner({

        //Frosted glass effect added into spinner
        background: "rgba(255,255,255,0.5)",
        spin: false,
        color: "#5893B7",
        html: html

    });

    $('#spin').show();
}

//Weather data

//weatherData location
$('#weatherData').click(function() {

    var weatherTypeSelected = $('[name=weatherType]:checked').val();

    alert(weatherTypeSelected);


    var geocoder;

    var startdate = dateTimeParser($('#from').val());
    //var enddate =  dateTimeParser($('#to').val());

    var weatherObj = {}

    var lat
    var long;

    geocoder = new google.maps.Geocoder();

    var location = $('#location').val()

    geocoder.geocode( { 'address': location}, function(results, status)
    {

        var lat  =  results[0].geometry.location.lat();
        var long = results[0].geometry.location.lng();

        //Alerting as needed
        //alert("start date" + startdate,"end date is:.."+enddate + "latitude is.." + lat+"longitude is..." +long );

        getWeather(startdate,lat,long)

    });

})

function getWeather(startdate,lat,long) {

    //      endDate:enddate,

    weatherObj = {

        startDate:startdate,
        lat: lat,
        long:long

    };

    var weatherData =  JSON.stringify(weatherObj);

    //alert(weatherData);



    $.ajax(
        {

            type:'POST',
            url:'apipost.php',
            data:{"getWeatherData":weatherData},
            success: function(data){


                var apiData = $.parseJSON(data);

                console.log(apiData);

                var graphData = apiData['hourly']['data']


                loadWeatherData(graphData);


            }
        });

}


//Weatherdata
function loadWeatherData(graphData) {

    var graphObject = {

        rangeSelector: {
            selected: 1,
            inputEnabled: $('#weatherDataGraph').width() > 480
        },

        title: {
            text: "Weather for " + $('#location').val(),
        },
        xAxis: {

            categories:loadTime(graphData)
        },
        yAxis:[{

            title: {

                text: 'weather'
            }
        }],
        series: [{

            data: loadWeatherDataAsArray(graphData),

        }],

        chart: {
            renderTo: 'weatherDataGraph'
        }
    };



    var chart = $('#weatherDataGraph').highcharts(graphObject);
}

//Date UNIX Helper method
function dateTimeParser(dateToParse) {

    var dateToParse= new Date(dateToParse);

    return (dateToParse.getTime()) /1000;

}

function loadDataAsArray(graphData) {

    var loadarray = [];


    for(i = 0; i < graphData.length; i++){

        for(j = 0; j < graphData[i].length; j++ ){

            loadarray.push(graphData[i][0]);
        }

    }

    return loadarray;
}


//get temprature
function loadWeatherDataAsArray(graphData) {

    var loadarray = [];

    for(i = 0; i < graphData.length; i++){

        loadarray.push(graphData[i]["temperature"])

    }

    return loadarray;
}

//Get Timea
function loadTime(graphData) {

    var loadarray = [];


    for(i = 0; i < graphData.length; i++){

        var arrayTemp = graphData[i]['time'];

        //unix time

        var timelabelFormatted = moment.unix(arrayTemp).format('YYYY-MM-DD HH:mm');

        console.log(timelabelFormatted);

        loadarray.push(timelabelFormatted);

    }

    return loadarray;

}