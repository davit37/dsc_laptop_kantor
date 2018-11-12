<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
	<div class="container">

	</div>
</div>
<!-- End Jumbotron -->
<!-- List Content -->
<div class="container-fluid content">
	<div class="row justify-content-center">
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

		<div class="col-8  col-md-8 col-lg-9">
			<div class="form-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="imgUp" lang="es">
					<label class="custom-file-label" for="customFileLang" id='lbl'>Seleccionar Archivo</label>

				</div>
				<br><br>

				<div class="col-4">
					<img src="..." alt="images" class="img-thumbnail" id='prev'>
        </div>
        <br><br>
        <div class="col-4">
        <button type="submit" class="btn btn-primary ">submit</button>
        </div>
        


			</div>
		</div>

	</div>

</div>
<!-- End List Content-->