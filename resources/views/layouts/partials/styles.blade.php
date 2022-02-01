<!-- Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap">

<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{!! mix('css/bootstrap.css') !!}">
<!-- Vendors -->
<link rel="stylesheet" type="text/css" href="{!! asset('vendors/perfect-scrollbar.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('vendors/all.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('vendors/choices.js/choices.min.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('vendors/toastify.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('vendors/bootstrap-icons.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('vendors/css/font-awesome-animation.min.css') !!}">

<link rel="stylesheet" type="text/css" href="{!! mix('css/app.css') !!}">

<!-- favicons -->
<link rel="shortcut icon" type="image/x-icon" href="{!! getSetting('SYSTEM_LOGO_IMAGE') !!}">

<!-- Custom Styles -->
@stack('styles')
