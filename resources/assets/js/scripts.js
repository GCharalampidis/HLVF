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

//Tooltips
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

//Radio buttons styles
// $('#sites input:radio').addClass('input_hidden');
$('#sites label').click(function() {
    $(this).addClass('selected').siblings().removeClass('selected');
});


// function saveQuestions()
// {
//     var x = $('#left').find('li');
//     var y = $('#right').find('li');
//     var active = [];
//     var inactive = [];
//     $.each(x, function( index, value ) {
//         active.push( $(value).data("id") );
//     });
//
//     $.each(y, function( index, value ) {
//         inactive.push( $(value).data("id") );
//     });
//
//     console.log('Active ids: ' + active);
//     console.log('Inactive ids: ' + inactive);
//
//     dataString = active;
//     var jsonString = JSON.stringify(dataString);
//     $.ajax({
//         '_token': $('meta[name=csrf_token]').attr('content'),
//         type: "POST",
//         url: "test/updateStatus",
//         data: {data : jsonString},
//         cache: false,
//
//         success: function(){
//             alert("OK");
//         }
//     });
// }


$('#modal-save').on('click', function () {

    var x = $('#left').find('li');
    var y = $('#right').find('li');
    var active = [];
    var inactive = [];
    $.each(x, function( index, value ) {
        active.push( $(value).data("id") );
    });

    $.each(y, function( index, value ) {
        inactive.push( $(value).data("id") );
    });

    console.log('Active ids: ' + active);
    console.log('Inactive ids: ' + inactive);

    dataString1 = active;
    dataString2 = inactive;
    var activeString = JSON.stringify(dataString1);
    var inactiveString = JSON.stringify(dataString2);
    $.ajax({
        method: "POST",
        url: url,
        data: {active : activeString, inactive: inactiveString,  _token: token},

    })
    .done(function (msg) {
        console.log(JSON.stringify(msg));
    });
});