  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Production Engineering PMR</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> Beta 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>

<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!-- Filterizr-->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  function myFunction() {
    window.print();
}
</script>

<script type="text/javascript">
function add_row()
{
 $rowno=$("#tambah_form tr").length;
 $rowno=$rowno+1;
 $("#tambah_form tr:last").after("<tr id='row"+$rowno+"'><td>"+$rowno+"</td><td><input type='text' class='form-control is-invalid' placeholder='No LOT' name='no_lot[]' required><div class='valid-feedback'>No LOT</div></td><td><input type='text' class='form-control is-invalid' placeholder='Nama Jenis Tinta' name='nama_jenis_tinta[]' required><div class='valid-feedback'>Nama Jenis Tinta</div></td><td> <select class='form-control is-invalid' name='status[]' required> <option value=''>Status</option> <option value='Baru'>Baru</option> <option value='Bekas'>Bekas</option> <option value='Retur'>Retur</option> </select> <div class='valid-feedback'>Status</div> </td><td><input type='text' class='form-control is-invalid' placeholder='Kg' name='kg[]' required><div class='valid-feedback'>Kg</div></td><td><a class='btn btn-warning btn-sm' onclick=delete_row('row"+$rowno+"')><i class='far fa-trash-alt'></i></a></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>

<script>
  function updateClock() {
  // Get the current date
  let currentTime = new Date();

  // Extract hour, minute and seconds from the date
  let currentHour = currentTime.getHours();
  let currentMinutes = currentTime.getMinutes();
  let currentSeconds = currentTime.getSeconds();

  // Pad 0 if minute or second is less than 10 (single digit)
  currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
  currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

  // Choose AM/PM as per the time of the day
  let timeOfDay = currentHour < 12 ? "AM" : "PM";

  // Convert railway clock to AM/PM clock
  currentHour = currentHour > 12 ? currentHour - 12 : currentHour;
  currentHour = currentHour == 0 ? 12 : currentHour;

  // Prepare the time string from hours, minutes and seconds
  let currentTimeStr =
    currentHour + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

  // Insert the time string inside the DOM
  document.getElementById("clock").innerHTML = `${currentTimeStr}`;
}

setInterval(updateClock, 1000);

</script>

<script>
function myFunction() {
  document.getElementById("myForm").reset();
}
</script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</body>
</html>