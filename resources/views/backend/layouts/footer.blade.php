    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/backend-bundle.min.js"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/table-treeview.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/customizer.js"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('backend/assets') }}/js/chart-custom.js"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('backend/assets') }}/js/app.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--drag and drop-->
    <script src="{{ asset('backend/assets/js/drag-and-drop.js') }}"></script>
    <script>
        $(document).ready(function(){
            toastr.options = {
                // "closeButton": false,
                // "debug": false,
                // "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                // "preventDuplicates": false,
                // "onclick": null,
                // "showDuration": "300",
                // "hideDuration": "1000",
                // "timeOut": "5000",
                // "extendedTimeOut": "1000",
                // "showEasing": "swing",
                // "hideEasing": "linear",
                // "showMethod": "fadeIn",
                // "hideMethod": "fadeOut"
            }
        });

        document.addEventListener("livewire:init", () => {

            Livewire.on("toast", (event) => {

                toastr[event.notify](event.message);

            });
        });
    </script>




    @livewireScripts
