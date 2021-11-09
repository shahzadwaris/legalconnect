<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('plugins/images/favicon.png')}}">
  <title>Admin Dashboard</title>
  <!-- Bootstrap Core CSS -->
  <link href="{{asset('admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Menu CSS -->
  <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
  <!-- toast CSS -->
  <link href="{{asset('plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
  <!-- morris CSS -->
  <link href="{{asset('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
  <!-- animation CSS -->
  <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
  <!-- color CSS -->
  <link href="{{asset('admin/css/colors/default-dark.css')}}" id="theme" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="{{asset('css/main.css')}}" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-19175540-9', 'auto');
    ga('send', 'pageview');
  </script>
  @yield('css')
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="cssload-speeding-wheel"></div>
  </div>
  @yield('contents')
  </div>
  <script src="{{asset('plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="{{asset('admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- Menu Plugin JavaScript -->
  <script src="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
  <!--slimscroll JavaScript -->
  <script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
  <!--Wave Effects -->
  <script src="{{asset('admin/js/waves.js')}}"></script>
  <!-- Custom Theme JavaScript -->
  <script src="{{asset('admin/js/custom.min.js')}}"></script>
  <script src="{{asset('admin/js/jasny-bootstrap.js')}}"></script>
  <!-- jQuery file upload -->
  {{-- <script src="{{asset('plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
  <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')}}"></script>
  <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js')}}"></script> --}}
  <!--Style Switcher -->
  <script src="{{asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
  @yield('js')
  <!-- end - This is for export functionality only -->
  <script>
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
      });
  </script>
  <script>
    $(document).ready(function() {
          $('#myTable').DataTable();
          $(document).ready(function() {
            var table = $('#example').DataTable({
              "columnDefs": [{
                "visible": false,
                "targets": 2
              }],
              "order": [
                [2, 'asc']
              ],
              "displayLength": 25,
              "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                  page: 'current'
                }).nodes();
                var last = null;
    
                api.column(2, {
                  page: 'current'
                }).data().each(function(group, i) {
                  if (last !== group) {
                    $(rows).eq(i).before(
                      '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                    );
    
                    last = group;
                  }
                });
              }
            });
    
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
              var currentOrder = table.order()[0];
              if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
              } else {
                table.order([2, 'asc']).draw();
              }
            });
          });
        });
        var table = $('#example23').DataTable({
          dom: 'Bfrtip',
          responsive: true,
          buttons: [
             'excel'
          ]
        });
        table.buttons().container()
        .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
  </script>
</body>

</html>