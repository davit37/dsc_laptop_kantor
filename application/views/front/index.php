<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid" id='slider'>
	<div class="container">

	</div>
</div>
<!-- End Jumbotron -->
<!-- List Content -->
<div class="container-fluid content"id='articel'>
	<div class="row justify-content-center" >
		<?php 
      $i=0;
        foreach ($data as $obj){
          $title=word_limiter($obj->title, 5, "...");
          $content=word_limiter($obj->content, 15, '..');
          echo"<div class='col-8 col-md-4 col-lg-3'>
                <img class='card-img-top img-thumbnail' src='$obj->image' alt='Card image cap'>
                <div class='card-body'>
                  <b class='card-title'>$title</b>
                  <p class='custom-text'>$content</p>
                </div>
              </div>";
          $i++;

          if($i==3){
            break;
          }
        }
        ?>

		<br><br>
		
			<div id='notif' class=' col-6 col-md-8'>

      </div>



		<div class="col-8  col-md-8 col-lg-9">
			<div class="form-group">
				<div class="custom-file">
					<form id='form-img'>
						<input type="file" class="custom-file-input" id="imgUp" lang="es" name='uploadimg' accept="image/*">

						<label class="custom-file-label" for="customFileLang" id='lbl'></label>


				</div>
        <br><br>
        
      <br>



				<div class="col-4">
					<img src="..." alt="images" class="img-thumbnail" id='prev'>
				</div>
				<br><br>
				<div class="col-4">
					<button type="button" class="btn btn-primary " id='img-submit'>submit</button>
				</div>
				</form>



			</div>
		</div>

	</div>

</div>
<!-- End List Content-->