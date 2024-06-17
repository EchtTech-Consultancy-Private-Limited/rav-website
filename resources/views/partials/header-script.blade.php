<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
    @section('title')
        {{ config('app.name') }}
    @show
</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="{{ $metaDetails->meta_tag_description ?? 'Rashtriya Ayurveda Vidyapeeth (RAV)' }}">
<meta name="keywords" content="{{ $metaDetails->meta_keywords ?? 'Rashtriya Ayurveda Vidyapeeth (RAV)' }}">
<meta name="tag" content="{{ $metaDetails->meta_tag ?? 'Rashtriya Ayurveda Vidyapeeth (RAV)' }}">
<link rel="stylesheet" href="{{ asset('assets/font-awesome-master/css/font-awesome.min.css') }}">
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
<!-- <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}"> -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="theme-style">
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/buttons.dataTables.min.css') }}">


