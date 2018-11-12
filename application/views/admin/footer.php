</div>
<!-- /.content-wrapper -->

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/bower_components/chart.js/Chart.js"></script>

<!-- Sweet Alert-->
<script src="<?php echo base_url();?>assets/bower_components/sweetalert/sweetalert2.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url();?>assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/ckfinder/ckfinder.js"></script>


<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>

<script>
	$(document).on('click', '.delete', function () {
		

		var del_id = $(this).attr("id");
		var triger = $(this).attr('triger');

		swal({
			title: 'Anda yakin ?',
			text: "Data ini akan dihapus !",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#74b9ff',
			cancelButtonColor: '#ff7675',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			
			if (result.value) {
				$(".content").addClass("disabledContent");
				$.ajax({
					method:"GET",
					url:"<?php echo site_url()?>admin/"+triger+"/"+ del_id,
					type:"JSON"
				}).done(function(){
					location.reload()
				})
			}
		})

	});

	var editor = '';
	

	if(typeof($('#editor1').val()) != 'undefined'){
		CKEDITOR.replace('editor1', {
			filebrowserBrowseUrl : '<?php echo base_url('assets/')?>filemanager/dialog.php?type=2&editor=ckeditor&akey=<?php echo $this->config->item('file_manager_key');?>',
			filebrowserUploadUrl : '<?php echo base_url('assets/')?>filemanager/dialog.php?type=2&editor=ckeditor&akey=<?php echo $this->config->item('file_manager_key');?>',
			filebrowserImageBrowseUrl : '<?php echo base_url('assets/')?>filemanager/dialog.php?type=1&editor=ckeditor&akey=<?php echo $this->config->item('file_manager_key');?>'
		});
		
	}

	

	$(document).ready(function () {

	

		function saveCategory() {
			if ($("#name_of_category").val() == '') {
				return;
			}

			$('#btn-kategori').attr("disabled", true);
			$.ajax({
				dataType: 'JSON',
				method: 'POST',
				url: '<?php echo site_url('admin/post/save_new_category')?>',
				data: {
					name: $("#name_of_category").val()
				}

			}).done(function (msg) {

				var html = '';
				for (i = 0; i < msg.length; i++) {
					console.log(msg[i])
					html += "<div class='checkbox'><label><input class='id_category' type='checkbox' value='" + msg[i].id + "'>" +
						msg[i].name + "</label></div>";
				}
				$("#name_of_category").val('')
				$('#list-category').html(html)
				$('#btn-kategori').attr("disabled", false);
			})
		}

		$(document).on('click', '#btn-simpan', function () {
			$('#btn-simpan').attr("disabled", true);
			
			var title = $('#title').val();
			var editor = CKEDITOR.instances.editor1.getData();
			var categoryArr = [];

			$(".id_category:checked").each(function () {
				categoryArr.push($(this).val());
			});

			console.log(categoryArr)

			$.ajax({
				dataType: "JSON",
				method: "POST",
				url: "<?php echo site_url('admin/post/save_new_post')?>",
				data: {
					title: title,
					editor1: editor,
					category:categoryArr,
					image:$('#image_link').val(),
					id_user:'<?php echo $this->session->userdata['logged_in']['id']?>',
				}
			}).done(function (msg) {

				window.location.href = '<?php echo site_url('admin/post/all_post')?>';
			})
		})

		$(document).on('click', '#btn-edit', function () {

			$('#btn-edit').attr("disabled", true);
			
			var title = $('#title').val();
			var editor = CKEDITOR.instances.editor1.getData();
			var categoryArr = [];

			$(".id_category:checked").each(function () {
				categoryArr.push($(this).val());
			});
			

			$.ajax({
				dataType: "JSON",
				method: "POST",
				url: "<?php echo site_url('admin/post/save_edit_post')?>",
				data: {
					title: title,
					editor1: editor,
					category:categoryArr,
					image:$('#image_link').val(),
					id:$('#id-post').val()}
			}).done(function (msg) {

				window.location.href = '<?php echo site_url('admin/post/all_post')?>';
			})
		})

		$(document).on('click', '#btn-kategori', function () {
			saveCategory()
		})

		$(document).keypress(function (e) {
			if (e.which == 13) {
				saveCategory()
			}
		});

		$(document).ready( function () {
			$('#table_id').DataTable({
				"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
			});
		} );

		$(document).on('click', '#btn-upload', function(){
			CKFinder.popup( {
				chooseFiles: true,
				width: 800,
				height: 600,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						var output = document.getElementById( 'image' );
						output.value = file.getUrl();
					} );

					
				}
			} );
		})
	})

</script>

</body>

</html>
