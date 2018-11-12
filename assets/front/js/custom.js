'use strict'



var counter = 0;
var IDsetInterval=0;
var arrayImg=null;



function nextShow(){
    counter++;
    if(counter==arrayImg.length){
        counter=0;
    }
    $('.jumbotron').css({
        'background-image':'url('+arrayImg[counter].image+')',
        
    })
}

function startInterval(){
    if(IDsetInterval==0){
        IDsetInterval=setInterval(nextShow,2500)
    }
}

function stopInterval(){
    clearInterval(IDsetInterval);
    IDsetInterval=0;
}

$(document).ready(function(){

    $.ajax({
        method:"GET",
        dataType:"Json",
        url:site_url+"front/get_slider_image/1",
    }).done(function(msg){
        arrayImg=msg

        $('.jumbotron').css({
            'background-image':'url('+arrayImg[0].image+')',
            
        })
    })

    $(document).on('mouseover','.jumbotron',function(){
        stopInterval()
    })
    $(document).on('mouseout','.jumbotron',function(){
        startInterval();
    })
    startInterval();
})


    