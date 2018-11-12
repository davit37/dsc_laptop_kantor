<?php
class Custom {

    public function error_message($msg){

		return "<div class='alert bg-custom-red alert-dismissible'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
  			$msg
	  	</div>";
	}

	public function success_message($msg){
		return "
		<div class='alert bg-custom-success alert-dismissible'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
  			$msg
	  	</div>
		";
	}
}