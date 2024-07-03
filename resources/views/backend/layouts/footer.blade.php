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

    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#summernote').summernote({
          placeholder: 'Enter product description',
          tabsize: 2,
          height: 100,
          toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });
      </script>

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

    <!-- Include select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();

            $('.js-example-basic-single').select2();
        });
    </script>
    

    <!--file upload-->
    <script src=" {{ asset('backend/assets/fileUpload/fileUpload.js') }}"></script>
    <script>
        $(function(){
           $("#fileUpload").fileUpload();
        });
    </script>
    @livewireScripts
