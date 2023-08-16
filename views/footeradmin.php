<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<<<<<<< Updated upstream
<script src="../../dist/js/adminlte.js"></script>
=======
<script src="../../dist/js/adminlte.js"></script>

<script>
    var isNewNotification = false;

    function fetchNotifications() {
        $.ajax({
            url: '../scripts/notifications.php',
            method: 'GET',
            success: function(data) {
                if (data !== $('#notifications').html()) {
                    $('#notifications').html(data);
                    if (isNewNotification) {
                        $('#newNotification').fadeIn().delay(3000).fadeOut();
                    }
                    isNewNotification = true;
                }
            }
        });
    }

    $(document).ready(function() {
        fetchNotifications();
        setInterval(fetchNotifications, 5000); // Fetch notifications every 5 seconds
    });
</script>
>>>>>>> Stashed changes
