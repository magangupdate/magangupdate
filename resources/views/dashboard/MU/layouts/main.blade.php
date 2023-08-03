<!DOCTYPE html>
<html lang="en">
  <head>
    {{--==================== META ====================--}}
    <meta charset="UTF-8" />
    <meta name="description" content="Menarra Finance Dashboard Page" />
    <meta
      name="keywords"
      content="magangupdate, magangupdate academy, dashboard, vol. 9, sandbox, crud, admin"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="MagangUpdate" />

    {{--==================== ICON ====================--}}
    <link rel="icon" href="{{ asset('assets/images/logos/logo-transparent.webp') }}">

    {{--==================== TITLE ====================--}}
    <title>{{ $title }} - Dashboard MagangUpdate</title>

    @vite('resources/css/app.css')

    {{--==================== STYLES ====================--}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{--==================== DATA TABLES ====================--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{--==================== BOX ICONS ====================--}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link
      rel="stylesheet"
      href="{{ asset('assets/css/MU/styles.css') }}"
      type="text/css"
      media="screen"
    />

    {{--==================== CDN FONTAWESOME ====================--}}
    <script
      src="https://kit.fontawesome.com/32f82e1dca.js"
      crossorigin="anonymous"
    ></script>

    <style>
      .btn-success {
        background: #4bb543;
      }

      .btn-success:hover {
        background: #4bb543;
      }
      .popover{
        max-width:600px;
        font-size: 16px;
      }

      .collapse {
        visibility: visible;
      }

      div.dataTables_wrapper div.dataTables_filter input {
        width: 300px;
      }

      input.form-control, select.form-control {
        border: none;
        font-size: 16px;
        padding: 5px 20px;
        color: #6b7280 !important;
        border-radius: 10px !important;
        box-sizing: border-box;
        background-color: #2d2d2d !important;
      }

      .form-control, .thumbnail-container, .mce-content-body {
        background-color: #2d2d2d;
        border: #2d2d2d;
        color: #6b7280 !important;
      }

      .form-control:active {
        outline-color: rgb(236, 134, 36);
      }

      textarea {
        border: none;
        font-size: 16px;
        padding: 20px 20px;
        color: #6b7280 !important;
        border-radius: 10px;
        box-sizing: border-box;
        background-color: #2d2d2d !important;
      }

      #example_length, #example_info {
        color: white;
      }

      .debit {
        background-image: url(../../assets/images/bg_card.png);
        color: #6b7280;
        display: flex;
        background-size: cover;
        background-color: rgb(236, 134, 36);
        justify-content: space-between;
        box-shadow: rgba(236, 134, 36, 0.5) 0px 20px 50px 0px;
      }

      .debit:hover {
        background-color: rgb(148, 84, 24) !important;
      }

      .btn-primary {
        border: 1px solid rgb(236, 134, 36);
        background-color: rgb(236, 134, 36);
      }

      .btn-primary:hover {
        border: 1px solid rgb(148, 84, 24);
        background-color: rgb(148, 84, 24) !important;
      }

      #createArticle {
        background-color: #2d2d2d !important;
      }
      .tox .tox-menubar, .tox .tox-toolbar-overlord, .tox .tox-toolbar, .tox .tox-statusbar, .tox .tox-statusbar__text-container {
        background-color: #1f1f1f !important;
        color: #fff !important;
        font-family: 'Poppins' !important;
      }

      .tox .tox-statusbar {
        border-top: none !important;
      }

      .tox .tox-toolbar {
        background-image: none !important;
      }

      .tox:not(.tox-tinymce-inline) .tox-editor-header {
        padding: 10px !important;
      }

      .tox .tox-tbtn--bespoke .tox-tbtn__select-label {
        color: #1f1f1f !important;
      }

      .tox-tinymce {
        border: 2px solid #1f1f1f !important;
      }

      .tox .tox-mbtn, .tox .tox-tbtn, .tox .tox-tbtn svg, .tox .tox-statusbar__path-item, .tox .tox-statusbar__wordcount, .tox .tox-statusbar__branding svg {
        color: #fff !important;
        fill: #ffffff !important;
      }

      .tox:not(.tox-tinymce-inline) .tox-editor-header {
        background-color: #2d2d2d !important;
      }

      .tox .tox-tbtn__select-chevron svg {
        fill: #1f1f1f !important;
      }

      div.dataTables_wrapper div.dataTables_filter label {
        color: #fff !important;
      }

      .active>.page-link {
        border: 1px solid rgb(236, 134, 36);
        background-color: rgb(236, 134, 36);
      }

      .disabled>.page-link {
        border: 1px solid #2d2d2d;
        background-color: #2d2d2d;
      }      
    </style>
  </head>
  <body class="@if($active === 'Login') overflow-y-hidden @endif">

    @include('sweetalert::alert')

    @if ($active === 'Login')
    <img src="https://i.postimg.cc/gjbJN6b2/circle-decoration.webp" alt="Circle Decoration" title="Circle Decoration" class="top-[15vh] w-full h-auto mx-auto absolute -z-30">
    @endif

    {{--==================== NAVBAR ====================--}}
    @if ($active !== 'Login')
    @include('dashboard.MU.layouts.navbar')
    @endif

    {{--==================== MAIN CONTENT ====================--}}
    @if ($active !== 'Login')
    <main class="content overflow-scroll">
      @include('dashboard.MU.layouts.header')
      @yield('content')
    </main>
    @endif

    @if ($active === 'Login')
    <main class="grid place-items-center">
      @yield('content')
    </main>
    @endif

    @include('dashboard.MU.layouts.scripts')
  </body>
</html>
