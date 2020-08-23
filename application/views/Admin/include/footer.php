<footer class="main-footer">
</footer>  
</div>

<script src="<?php echo site_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo site_url(); ?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script src="<?php echo site_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo site_url(); ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo site_url(); ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo site_url(); ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo site_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo site_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="<?php echo site_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="<?php echo site_url(); ?>assets/admin/custom/custom.js"></script>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=y8edi4divxwsplcdd28rzuyx245zbzdndm22yzhuaanemki5"></script>

<script> 


tinymce.init({ 
	selector: '.textarea', 
	height: 300, 
	plugins: [ 
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	setup: function (editor) { 
		editor.on('change', function () { 
			tinymce.triggerSave(); 
		}); 
	} 
}); 
</script>
<script>
  $(function () {
    $('.DataTable').DataTable();
  })
</script>

<script>
var url = window.location;
// for sidebar menu but not for treeview submenu
$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().siblings().removeClass('active').end().addClass('active');
// for treeview which is like a submenu
$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.1/dist/sweetalert2.all.min.js"></script>


</body>
</html>