</div>

<footer class="content-footer footer bg-footer-theme">
  <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0"> © <?= DATE('Y') ?> </div>
  </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->


<?php
$cur_tab1 = $this->uri->segment(1) == '' ? '' : $this->uri->segment(1);
$cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
$curr_action = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
?>
 
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/popper/popper.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/js/bootstrap.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/hammer/hammer.js"></script>

<!-- start form validation -->
<script src="<?= ADMIN_ASSETS_PATH; ?>js/form-validation.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/select2/select2.js"></script>
<!-- end form validation -->

<script src="<?= ADMIN_ASSETS_PATH; ?>vendors/js/pickers/pickadate/picker.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendors/js/pickers/daterange/moment.min.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendors/js/pickers/daterange/daterangepicker.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendors/js/pickers/dateTime/pick-a-datetime.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<!-- responsive datatable -->
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/datatables/jquery.dataTables.js"></script>
<!-- <script src="<?= ADMIN_ASSETS_PATH; ?>vendor/datatables/datatables.min.js"></script> -->
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<?php
//if($cur_tab !='sample_e2e_tat' && ($cur_tab1 !='payment_transaction' && $cur_tab1 !='home_visit') && ($cur_tab != 'daily_outsource') && ($cur_tab != 'daily_outsource_master') && ($cur_tab != 'inter_lab_test') && ($cur_tab != 'daily_pending_outsource') && ($cur_tab != 'daily_outsource_pending_visit') && ($cur_tab != 'email_notification') && ($cur_tab != 'out_of_tat') && $cur_tab != 'nm_outsource_report' && $cur_tab != 'nm_outsource_monitoring' && $cur_tab != 'monitoring' && $cur_tab !='followuptest' && $cur_tab1 !='materail_request' && $cur_tab != 'table_view' && $cur_tab1 !='center_report_tat' && ($cur_tab != 'nm_outsource_report_new') && ($cur_tab !='client_communication') && ($cur_tab !='nm_sample_processing_stage')){ 
?>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<?php //} 
?>

<script src="<?= ADMIN_ASSETS_PATH; ?>js/tables-datatables-advanced.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>plugins/ckeditor/ckeditor.js"></script>

<!--end  responsive datatable -->
<script src="<?= ADMIN_ASSETS_PATH; ?>vendors/js/forms/select/select2.full.min.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/i18n/i18n.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/js/menu.js"></script>
<link rel="stylesheet" href="<?= ADMIN_ASSETS_PATH; ?>vendor/dropzone/dropzone.css" />



<!-- endbuild -->

<!-- <script src="<?= ADMIN_ASSETS_PATH ?>plugins/html5-editor/wysihtml5-0.3.0.js"></script> -->
<!-- <script src="<?= ADMIN_ASSETS_PATH ?>plugins/html5-editor/bootstrap-wysihtml5.js"></script> -->

<!-- Main JS -->
<script src="<?= ADMIN_ASSETS_PATH; ?>js/main.js"></script>

<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/dropzone/dropzone.js"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>vendor/dropzone/file-upload.js"></script>
 
<script src="<?= ADMIN_ASSETS_PATH; ?>script/datatable.js?v=<?= date("YmdH"); ?>"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>script/general.js?v=<?= date("YmdHi"); ?>1"></script>
<script src="<?= ADMIN_ASSETS_PATH; ?>script/technician.js?v=<?= date("YmdH"); ?>"></script>

<script>
  ;(function($, window, document, undefined) {
    $('document').ready(function() {
      setInterval(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 4000);
    });
  })(jQuery, window, document);
</script>

<script>
  $(document).ready(function() {
    $('.custom-datatable').DataTable({
      "lengthMenu": [
        [10, 20, 50, 100, -1],
        [10, 20, 50, 100, "All"]
      ],
      "pageLength": 100
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('.textarea_editor').wysihtml5();
  });
</script>

<script>
  $('.yearpicker').datepicker({
    autoclose: true,
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
  });

  $('.monthpicker').datepicker({
    autoclose: true,
    format: 'M, yyyy',
    startView: "months",
    minViewMode: "months",
  });
</script>

<script>
  $(function() {
    $('.timepicker').daterangepicker({
      opens: 'left',
      timePicker: true,
      timePicker24Hour: true,
      timePickerIncrement: 1,
      timePickerSeconds: true,
      locale: {
        format: 'HH:mm:ss'
      }
    }, function(start, end, label) {
      console.log("A new time selection was made: " + start.format('HH:mm:ss') + ' to ' + end.format('HH:mm:ss'));
    }).on('show.daterangepicker', function(ev, picker) {
      picker.container.find(".calendar-table").hide();
    });;
  });
</script>

</body>

</html>