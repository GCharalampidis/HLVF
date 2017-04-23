//Dragula
$(function () {
    dragula([document.getElementById('left'), document.getElementById('right')]);
});

//Smiley Slider
$(function () {
var newWidth,
    mouth = $("#mouth");

$( "#slider" ).slider({
    slide: function(event, ui) {

        if (ui.value > 54 ) {

            mouth.css({ bottom: 0, top: "auto" });

            newWidth = 160 - ui.value;

            mouth.css({
                width           : newWidth,
                height          : newWidth,
                "border-radius" : newWidth / 2,
                left            : -25 + ((ui.value-50) / 2)
            })
                .removeClass("straight");

        } else if ((ui.value > 44) && (ui.value < 55)) {

            mouth.addClass("straight");

        }  else {

            mouth.css({ top: 0, bottom: "auto" });

            newWidth = ui.value + 60;

            mouth.css({
                width           : newWidth,
                height          : newWidth,
                "border-radius" : newWidth / 2,
                left            : -ui.value / 2
            })
                .removeClass("straight");

        }

    },
    value: 50
    });
});

//Question types preview
$(document).ready(function(){
    $('#question_type').on('change', function() {
        if ( this.value == '1')
        //.....................^.......
        {
            $("#q1").show();
            $("#q2").hide();
            $("#q3").hide();
        }
        else if( this.value == '2')
        {
            $("#q1").hide();
            $("#q2").show();
            $("#q3").hide();
        }
        else
        {
            $("#q1").hide();
            $("#q2").hide();
            $("#q3").show();
        }
    });
});
$(function () {

    var x = $('#unit').find('u');
    var y= $('#unit').find('span');

    var lectures = [];
    var marks = [];

    $.each(x, function( index, value ) {
        lectures.push( $(value).data("id") );
    });

    $.each(y, function( index, value ) {
        marks.push( $(value).data("id") );
    });

    console.log('Lectures: ' + lectures);
    console.log('Marks: ' + marks);

    new Morris.Line({

        // ID of the element in which to draw the chart.
        element: 'myfirstchart',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: [
            // {year: '2008', value: 20},
            // {year: '2009', value: 10},
            // {year: '2010', value: 5},
            // {year: '2011', value: 5},
            // {year: '2012', value: 20}
            // {year: lectures[1], value: marks[1]},
            {year: '2009', value: 10},
            {year: '2010', value: 5},
            {year: '2011', value: 5},
            {year: '2012', value: 20}
        ],
        // The name of the data record attribute that contains x-values.
        xkey: 'year',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['value'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Value']
    });
});