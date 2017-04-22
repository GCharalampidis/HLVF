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