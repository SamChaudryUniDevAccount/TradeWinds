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

                    //Graph Data
                    console.log(apiData);

                    var graphData =  apiData['dataset_data']['data'];

                    loadCommodityGraph(graphData);

                }

            }
        });


}


//Plotting
function loadCommodityGraph(graphData) {


    var assetName =  $('#assetType').val();

        var graphObject = {

            rangeSelector: {
                selected: 1,
                inputEnabled: $('#commoditiesGraph').width() > 480
            },

            title: {
                text: assetName,
            },
            xAxis: {

                categories: loadAssetPriceDataAsArray(graphData)
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

    //alert(weatherTypeSelected);


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

        getWeather(startdate,lat,long,weatherTypeSelected);

    });

})

function getWeather(startdate,lat,long,weatherTypeSelected) {


    weatherObj = {

        startDate:startdate,
        lat: lat,
        long:long

    };

    var weatherData =  JSON.stringify(weatherObj);



    $.ajax(
        {

            type:'POST',
            url:'apipost.php',
            data:{"getWeatherData":weatherData},
            success: function(data){


                var apiData = $.parseJSON(data);

                console.log(apiData);

                var graphData = apiData['hourly']['data']


                loadWeatherData(graphData,weatherTypeSelected);


            }
        });

}


//Weatherdata
function loadWeatherData(graphData,weatherTypeSelected) {



    var graphObject = {

        rangeSelector: {
            selected: 1,
            inputEnabled: $('#weatherDataGraph').width() > 480
        },

        title: {

            text: weatherTypeSelected + " data for "  + $('#location').val() + " with an average of " + weatherStatistics(graphData,weatherTypeSelected),
        },
        xAxis: {

            categories:loadTime(graphData)
        },
        yAxis:[{

            title: {

                text: weatherTypeSelected,
            }
        }],
        series: [{

            data: loadWeatherDataAsArray(graphData,weatherTypeSelected),

        }],

        chart: {
            renderTo: 'weatherDataGraph'
        }
    };



    var chart = $('#weatherDataGraph').highcharts(graphObject);
}

//Date UNIX Helper method
function dateTimeParser(dateToParse) {

    //var dateToParse= new Date(dateToParse);

    // (dateToParse.getTime()) /1000;

    var dateAsUnix = moment(dateToParse).unix();


     console.log(dateAsUnix);

    return dateAsUnix;

}

//Asset price
function loadAssetPriceDataAsArray(graphData) {

    var loadarray = [];


    for(i = 0; i < graphData.length; i++){

        for(j = 0; j < graphData[i].length; j++ ){

            loadarray.push(graphData[i][j]);
        }

    }

    return loadarray;
}

//Asset price name
function averageAssetPrice(graphData, assetName) {

    var total = 0;
    var assetPriceAverage = 0;
    var assetPriceAvgString = "";

    for(i = 0; i < graphData.length; i++){

        for(j = 0; j < graphData[i].length; j++ ){

            total += graphData[i][1];

        }

    }

    assetPriceAverage = (total / graphData.length).toFixed(2);

    assetPriceAvgString = "Average price in USD($) for " + assetName + assetPriceAverage;

    return assetPriceAvgString;

}

//get temprature
function loadWeatherDataAsArray(graphData,weatherTypeSelected) {

    var weatherKey = "";

    if(weatherTypeSelected == "Temperature"){

        weatherKey = "temperature";

        //console.log(weatherKey);

    }else if(weatherTypeSelected =="Precipitation"){

        weatherKey = "precipIntensity";

        //console.log(weatherKey);

    }


    var loadarray = [];

    for(i = 0; i < graphData.length; i++){

        loadarray.push(graphData[i][weatherKey]);

    }

    return loadarray;
}

//Get Time
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
//Weather stats
function weatherStatistics(graphData,weatherTypeSelected) {

    var weatherKey = "";
    var total = 0;
    var weatherAverages = "";
    var unitsTemp = "°F";
    var unitsRain = "mm/hour"
    var returnedStat = "";

    if(weatherTypeSelected == "Temperature"){

        weatherKey = "temperature";

        for(i = 0; i < graphData.length; i++){


            total += graphData[i][weatherKey];

        }

        weatherAverages = (total / graphData.length).toFixed(2);

        returnedStat = weatherAverages + " " + unitsTemp;

    }else if(weatherTypeSelected =="Precipitation"){

        weatherKey = "precipIntensity";

        //Loop through and get data statistics
        for(i = 0; i < graphData.length; i++){


            total += graphData[i][weatherKey];

        }

        weatherAverages = (total / graphData.length).toFixed(2);

        returnedStat = weatherAverages + " " + unitsRain;

    }

    return returnedStat;
}

//Get news data

$('#news').change('change',function () {


    //News topic
    var newsTopic = $('#newsTopicSelected').val();

    //Attribute value for API
    var newsSource = $('#news').val();

    //Ranking
    var rankingSelected =  $('[name=newsRanking]:checked').val();


    //Working
    //console.log(newsName,rankingSelected,newsTopic);

    var apikey = "1f2f291aca4a4e3eb8ebbcc5156805f7";

    //https://newsapi.org/v1/articles?source=the-next-web&sortBy=latest&apiKey=1f2f291aca4a4e3eb8ebbcc5156805f7


    var url = "https://newsapi.org/v1/articles?source=" + newsSource + "&sortBy=" + rankingSelected + "&apiKey=" + apikey;

    $.ajax(
        {

            type:'GET',
            url:url,
            success: function(data){


                var articles = data['articles'];

                parseNewsArticles(articles);

            }
        });


});

function parseNewsArticles(articles) {


    for(i =0; i < articles.length;i++){

        tableRow = $(' <tr/>');

        var articlelink = $('<a>');

        var articleLink = $('a');

        tableRow.append("<td ><span> " + articles[i].author + "</span></td>");

        tableRow.append("<td ><span>   " + articles[i].publishedAt + "   </span></td>");

        tableRow.append("<td ><span>   " + articles[i].title + "   </span></td>");

        tableRow.append("<td ><span href= '' articles[i].url  + ''>   " + articles[i].description + "   " +  "" + '<a  href="' + articles[i].url + '">Link to full article</a>' + " </span> </td>");

        $('#news ').append((tableRow).css({"font-family":"Arial","color" : "#0275d8"," text-align" : "justify"}));

    }

}



