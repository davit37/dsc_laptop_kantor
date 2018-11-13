'use strict'



var counter = 0;
var IDsetInterval = 0;
var arrayImg = null;
var formdata = null;
let file = null;
var imageType = /image.*/;



function nextShow() {
	counter++;
	if (counter == arrayImg.length) {
		counter = 0;
	}
	$('.jumbotron').css({
		'background-image': 'url(' + arrayImg[counter].image + ')',

	})
}

function startInterval() {
	if (IDsetInterval == 0) {
		IDsetInterval = setInterval(nextShow, 2500)
	}
}

function stopInterval() {
	clearInterval(IDsetInterval);
	IDsetInterval = 0;
}



//upload foto front end
function readURL(input) {
    $('#notif').html('')
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {

			$('#prev').attr('src', e.target.result);
			$('#prev').show()
			$('#img-submit').show();
			$('#lbl').html(input.files[0].name)
		}

        
        file = input.files[0];

        if (!file.type.match(imageType))
        {
            $('#notif').append("<div class='alert bg-custom-red alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> File Type Not Allowed </div>");
            return;
        } 
    	
        formdata  = new FormData();
        formdata.append('file', file);
    
        

        reader.readAsDataURL(input.files[0]);
        
	}
}



// jquery 
$(document).ready(function () {

	$('#prev').hide();
    $('#img-submit').hide();
   

	$.ajax({
		method: "GET",
		dataType: "Json",
		url: site_url + "front/get_slider_image/1",
	}).done(function (msg) {
		arrayImg = msg

		$('.jumbotron').css({
			'background-image': 'url(' + arrayImg[0].image + ')',

		})
	})

	$(document).on('mouseover', '.jumbotron', function () {
		stopInterval()
	})
	$(document).on('mouseout', '.jumbotron', function () {
		startInterval();
	})
	startInterval();


	//event save upload



	$("#imgUp").change(function () {
		readURL(this);
	});

	$(document).on('click', '#img-submit', function () {
		console.log(formdata)
        console.log(file)
        console.log($('#notif'))
        $('#notif').html('')
        
        for (var key of formdata.entries()) {
            console.log(key[0] + ', ' + key[1]);
        }
        console.log(formdata)
        if (!file.type.match(imageType)){
            $('#notif').append("<div class='alert bg-custom-red alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> File Type Not Allowed   </div>")
         }else{
            $.ajax({
                method: 'POST',
                dataType: 'JSON',
                url: site_url + "front/do_upload",
                data: formdata,
                processData: false,
                contentType: false,
                cache: false,
                
            }).done(function (msg) {
                console.log(msg)
                if (msg == "true") {
                    console.log("True")
                    $('#notif').append("<div class='alert bg-custom-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> Upload Success     </div>")
                }
                else{
                    $('#notif').append("<div class='alert bg-custom-red alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+ msg   +"</div>")
                }
            })
       }
        
    })
    
    
})