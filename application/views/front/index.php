  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">

    </div>
  </div>
  <!-- End Jumbotron -->
  <!-- List Content -->
  <div class="container-fluid">
    <div class="row justify-content-center">
    <?php 
      $i=0;
        foreach ($data as $obj){
          echo"<div class='col-8 col-md-4 col-lg-3'>
                <img class='card-img-top img-thumbnail' src='$obj->image' alt='Card image cap'>
                <div class='card-body'>
                <p class='custom-text'>$obj->title</p>
                </div>
              </div>";
          $i++;

          if($i==3){
            break;
          }
        }
        ?>

      


    </div>

  </div>
  <!-- End List Content-->
