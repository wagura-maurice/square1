<!-- Vendors -->
<script type="text/javascript" src="{!! asset('vendors/perfect-scrollbar.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendors/all.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendors/choices.js/choices.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('vendors/toastify.js') !!}"></script>

<!-- Scripts -->
<script type="text/javascript" src="{!! mix('js/bootstrap.bundle.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/main.js') !!}"></script>

<script type="text/javascript" src="{!! mix('js/app.js') !!}"></script>

<!-- Custom scripts -->
@stack('scripts')

@if(Session::has('message'))
    <!-- Toastr notification scripts -->
    <script type="text/javascript">

        var type = "{!! Session::get('alert-type', 'info') !!}";
        
        switch (type) {
            case 'info':
                Toastify({
                    text: "{!! Session::get('message') !!}",
                    duration: 5000,
                    close:true,
                    gravity:"top",
                    position: "center",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
                break;

            case 'warning':
                Toastify({
                    text: "{!! Session::get('message') !!}",
                    duration: 5000,
                    close:true,
                    gravity:"top",
                    position: "center",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
                break;

            case 'success':
                Toastify({
                    text: "{!! Session::get('message') !!}",
                    duration: 5000,
                    close:true,
                    gravity:"top",
                    position: "center",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();

                break;

            case 'error':
                Toastify({
                    text: "{!! Session::get('message') !!}",
                    duration: 5000,
                    close:true,
                    gravity:"top",
                    position: "center",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
                break;
        };

    </script>
@endif