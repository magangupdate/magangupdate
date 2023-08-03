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
    <title>{{ $title }} - Dashboard MUA Vol. 9</title>

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
      href="{{ asset('assets/css/MUA/styles.css') }}"
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
        color: #828ea5;
        border-radius: 10px !important;
        box-sizing: border-box;
        background-color: #f8f9fd;
      }

      textarea {
        border: none;
        font-size: 16px;
        padding: 20px 20px;
        color: #828ea5;
        border-radius: 10px;
        box-sizing: border-box;
        background-color: #f8f9fd;
      }
    </style>
  </head>
  <body>

    @include('sweetalert::alert')

    {{--==================== NAVBAR ====================--}}
    @if ($active !== 'Login')
    @include('dashboard.MUA.layouts.navbar')
    @endif

    {{--==================== MAIN CONTENT ====================--}}
    @if ($active !== 'Login')
    <main class="content overflow-scroll">
      @include('dashboard.MUA.layouts.header')
      @yield('content')
    </main>
    @endif

    @if ($active === 'Login')
    <main class="grid place-items-center">
      @yield('content')
    </main>
    @endif

    {{--==================== SCRIPTS ====================--}}
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    
    <script src="{{ asset('assets/js/MUA/donut_chart.js') }}"></script>
    <script src="{{ asset('assets/js/MUA/line_chart.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/zhf194pj9ma6yja8lros9l6orpka9f1dvnj5zhbtfk3m26lf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    
    $(document).ready(function () {
                $('.sidebarCollapseDefault').on('click', function () {
                  $('.sidebar').toggleClass('active');
                  $('.content').toggleClass('active');
                });
              });
        
              $(document).ready(function () {
                $('#example').DataTable({
                    language: {
                        searchPlaceholder: "Search data"
                    }
                });
              });
    
      @if($active === 'Mentees Detail')
          var thicknessClass = {
            id: 'thickness',
            beforeDraw: function (chart, _options) {
              let thickness = chartClass.options.plugins.thickness.thickness;
              thickness.forEach((item, index) => {
                chartClass.getDatasetMeta(0).data[index]._view.innerRadius = item[0];
                chartClass.getDatasetMeta(0).data[index]._view.outerRadius = item[1];
              });
            },
          };
    
          var ctxClass = document.getElementById('chart-class').getContext('2d');
          var chartClass = new Chart(ctxClass, {
            type: 'doughnut',
            plugins: [thickness],
            data: {
              labels: ['First Choice', 'Second Choice'],
              datasets: [
                {
                  label: 'Budget Stats',
                  data: [{{ $menteeOnFirstClass->count() }}, {{ $menteeOnSecondClass->count() }}],
                  backgroundColor: ['#3547AC', '#DCE2F4'],
                  borderWidth: 0,
                },
              ],
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: {
                position: 'bottom',
                display: true,
                labels: {
                  fontSize: 14,
                  usePointStyle: true,
                  fontColor: '#0D1458',
                  padding: 20,
                  fontFamily: 'Poppins',
                },
              },
              plugins: {
                thickness: {
                  thickness: [
                    [35, 70],
                    [40, 65],
                  ],
                },
              },
            },
          });
          
          var thicknessClass2 = {
            id: 'thickness',
            beforeDraw: function (chart, _options) {
              let thickness2 = chartClass.options.plugins.thickness.thickness;
              thickness2.forEach((item, index) => {
                chartClass2.getDatasetMeta(0).data[index]._view.innerRadius = item[0];
                chartClass2.getDatasetMeta(0).data[index]._view.outerRadius = item[1];
              });
            },
          };
    
          var ctxClass2 = document.getElementById('chart-scored').getContext('2d');
          var chartClass2 = new Chart(ctxClass2, {
            type: 'doughnut',
            plugins: [thickness],
            data: {
              labels: ['Scored', 'Not Scored'],
              datasets: [
                {
                  label: 'Budget Stats',
                  data: [{{ $scored }}, {{ $arentScored }}],
                  backgroundColor: ['#A6CB12', '#DCE2F4'],
                  borderWidth: 0,
                },
              ],
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: {
                position: 'bottom',
                display: true,
                labels: {
                  fontSize: 14,
                  usePointStyle: true,
                  fontColor: '#0D1458',
                  padding: 20,
                  fontFamily: 'Poppins',
                },
              },
              plugins: {
                thickness: {
                  thickness: [
                    [35, 70],
                    [40, 65],
                  ],
                },
              },
            },
          });
      @endif
      
      @if($active === 'Overview' || $active === 'Mentees')
        var ctxClass = document.getElementById('chart-overview').getContext('2d');
          var chartClass = new Chart(ctxClass, {
            type: 'doughnut',
            plugins: [thickness],
            data: {
              labels: ['SCM', 'HRM', 'DA', 'PM', 'CC', 'UI/UX', 'BBM', 'SM'],
              datasets: [
                {
                  label: 'Budget Stats',
                  data: [
                      {{ $classesOverview[0]->menteeOnFirstClass->count() + $classesOverview[0]->menteeOnSecondClass->count() }},
                      {{ $classesOverview[1]->menteeOnFirstClass->count() + $classesOverview[1]->menteeOnSecondClass->count() }},
                      {{ $classesOverview[2]->menteeOnFirstClass->count() + $classesOverview[2]->menteeOnSecondClass->count() }},
                      {{ $classesOverview[3]->menteeOnFirstClass->count() + $classesOverview[3]->menteeOnSecondClass->count() }},
                      {{ $classesOverview[4]->menteeOnFirstClass->count() + $classesOverview[4]->menteeOnSecondClass->count() }},
                      {{ $classesOverview[5]->menteeOnFirstClass->count() + $classesOverview[5]->menteeOnSecondClass->count() }},
                      {{ $classesOverview[6]->menteeOnFirstClass->count() + $classesOverview[6]->menteeOnSecondClass->count() }},
                      {{ $classesOverview[7]->menteeOnFirstClass->count() + $classesOverview[7]->menteeOnSecondClass->count() }}
                      ],
                  backgroundColor: ['#260279', '#31029c', '#1c0159', '#22016d', '#b697ff', '#d3c0ff', '#9362ff', '#a881ff'],
                  borderWidth: 0,
                },
              ],
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              legend: {
                position: 'right',
                display: true,
                labels: {
                  fontSize: 14,
                  usePointStyle: true,
                  fontColor: '#0D1458',
                  padding: 20,
                  fontFamily: 'Poppins'
                },
              },
              plugins: {
                thickness: {
                  thickness: [
                    [35, 70],
                    [40, 65],
                  ],
                },
              },
            },
          });
        @endif
      
        @if ($active !== 'Login')
          var thicknessClass = {
            id: 'thickness',
            beforeDraw: function (chart, _options) {
              let thickness = chartClass.options.plugins.thickness.thickness;
              thickness.forEach((item, index) => {
                chartClass.getDatasetMeta(0).data[index]._view.innerRadius = item[0];
                chartClass.getDatasetMeta(0).data[index]._view.outerRadius = item[1];
              });
            },
          };
      
            var ctx = document.getElementById("chart-revenue").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 240);
            gradient.addColorStop(0, "rgba(53, 71, 172, 0.7)");
            gradient.addColorStop(1, "rgba(255, 255, 255, 0)");
            
            window.onload = function () {
                window.myLine = new Chart(ctx, config);
            };
    
            var config = {
                type: "line",
                data: {
                    labels: ["Thu, 1st", "Fri, 2nd", "Sat, 3rd", "Sun, 4th", "Mon, 5th", "Tue, 6th", "Wed, 7th", 
                    "Thu, 8th"],
                    datasets: [
                        {
                            backgroundColor: gradient,
                            borderColor: "#3547AC",
                            fill: true,
                            borderWidth: 4,
                            pointRadius: 7,
                            pointBorderWidth: 4,
                            pointHoverRadius: 7,
                            pointHoverBorderWidth: 4,
                            pointBackgroundColor: "#FFFFFF",
                            pointStyle: "circle",
                            data: [
                                {{ ($trafficRegisterInAWeek['2023-06-01']->count() ?? 0) }}, 
                                @isset($trafficRegisterInAWeek['2023-06-02']) {{$trafficRegisterInAWeek['2023-06-02']->count()}} @else 0 @endisset, 
                                @isset($trafficRegisterInAWeek['2023-06-03']) {{$trafficRegisterInAWeek['2023-06-03']->count()}} @else 0 @endisset,
                                @isset($trafficRegisterInAWeek['2023-06-04']) {{$trafficRegisterInAWeek['2023-06-04']->count()}} @else 0 @endisset,
                                @isset($trafficRegisterInAWeek['2023-06-05']) {{$trafficRegisterInAWeek['2023-06-05']->count()}} @else 0 @endisset,
                                @isset($trafficRegisterInAWeek['2023-06-06']) {{$trafficRegisterInAWeek['2023-06-06']->count()}} @else 0 @endisset, 
                                @isset($trafficRegisterInAWeek['2023-06-07']) {{$trafficRegisterInAWeek['2023-06-07']->count()}} @else 0 @endisset,
                                @isset($trafficRegisterInAWeek['2023-06-08']) {{$trafficRegisterInAWeek['2023-06-08']->count()}} @else 0 @endisset
                                ],
                        },
                    ],
                },
                options: {
                    legend: {
                        display: false,
                    },
                    responsive: true,
                    scales: {
                        xAxes: [
                            {
                                gridLines: {
                                    display: false,
                                },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    callback: function (value) {
                                        var ranges = [
                                            { divider: 10 },
                                            { divider: 250 },
                                        ];
                                        function formatNumber(n) {
                                            for (var i = 0; i < ranges.length; i++) {
                                                if (n >= ranges[i].divider) {
                                                    return (
                                                        (n / ranges[i].divider).toString()
                                                    );
                                                }
                                            }
                                            return n;
                                        }
                                        return value;
                                    },
                                    stepSize: 50,
                                },
                            },
                        ],
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, data) {
                                return ( data["datasets"][0]["data"][tooltipItem["index"]]
                                );
                            },
                        },
                    },
                },
            };
            
        @endif
    
        @if ($active === 'Classes')
              var thicknessClass = {
                id: 'thickness',
                beforeDraw: function (chart, _options) {
                  let thickness = chartClass.options.plugins.thickness.thickness;
                  thickness.forEach((item, index) => {
                    chartClass.getDatasetMeta(0).data[index]._view.innerRadius = item[0];
                    chartClass.getDatasetMeta(0).data[index]._view.outerRadius = item[1];
                  });
                },
              };

            var ctxClass = document.getElementById('chart-class').getContext('2d');
              var chartClass = new Chart(ctxClass, {
                type: 'doughnut',
                plugins: [thickness],
                data: {
                  labels: ['Regular Class', 'Exclusive Class'],
                  datasets: [
                    {
                      label: 'Budget Stats',
                      data: [8, 2],
                      backgroundColor: ['#3547AC', '#DCE2F4'],
                      borderWidth: 0,
                    },
                  ],
                },
                options: {
                  responsive: true,
                  maintainAspectRatio: false,
                  legend: {
                    position: 'bottom',
                    display: true,
                    labels: {
                      fontSize: 14,
                      usePointStyle: true,
                      fontColor: '#0D1458',
                      padding: 20,
                    },
                  },
                  plugins: {
                    thickness: {
                      thickness: [
                        [35, 70],
                        [40, 65],
                      ],
                    },
                  },
                },
              });
        @endif

      $(document).ready(function(){
          $('[data-bs-toggle="popover"]').popover();  
      });

      tinymce.init({
            selector: '#createClass',
            height: 400,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'help', 'wordcount', 'image code'
    ],
            toolbar: 'undo redo | blocks | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help | image code | insertfile undo redo',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/sandbox/dashboard/upload-image',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            },
            content_style: "body { font-family: Poppins; }",
        });

      const dragArea = document.querySelector('.drag-area');
        const dragText = document.querySelector('form.create-article');
        const browseThumbnail = document.querySelector('.browse-thumbnail');
        
        let file;
        let button = document.querySelector('.button');
        let input = document.querySelector('.thumbnail-input');
        let imgPreview = document.querySelector('.img-preview');

        let buttonProfile = document.querySelector('.btn-profile');
        let inputProfile = document.querySelector('.profile-input');
        let imgPreviewProfile = document.querySelector('.img-profile');

        button.onclick = () => {
            input.click();
        }

        input.onclick = () => {
            input.click();
        }

        input.addEventListener('change', function() {
            file = input.files[0];
            browseThumbnail.style.display = 'none';
            imgPreview.style.display = 'block';
            imgPreview.src = URL.createObjectURL(file);
            dragArea.classList.add('active');
        })
    </script>
  </body>
</html>
