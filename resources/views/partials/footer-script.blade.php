<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/sidebar.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

<!-- DataTables Buttons JS -->
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('assets/js/buttons.print.min.js') }}"></script>

{{-- datatable --}}
<script>
    $(document).ready(function() {
        $('.dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excelFlash', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
