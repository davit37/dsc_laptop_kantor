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


//upload foto front end
function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {

        $('#prev').attr('src', e.target.result);
        $('#prev').show()
        $('#img-submit').show();
        $('#lbl').html(input.files[0].name)
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgUp").change(function () {
    readURL(this);
  });

$(document).ready(function(){

    $('#prev').hide();
    $('#img-submit').hide();

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


    //event save upload
    $(document).on('click','#img-submit',function(){
        $.ajax({
            method:'POST',
            dataType:'JSON',
            url:site_url+"front/do_upload",
            data:{
                image:$('#imgUp').val()
            }
        }).done(function(msg){
            console.log(msg)
            if(msg==true){
                console.log("True")
            }
        })
    })
})


    