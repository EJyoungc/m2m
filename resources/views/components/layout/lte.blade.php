<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">

    <title>HIV M2M Managment system | Dashboard</title>

    <link rel="stylesheet" href="{{ asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/datatables/FixedColumns-3.1.0/css/fixedColumns.jqueryui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons/entypo/css/entypo.css') }}">
    <link rel="stylesheet" href="{{ asset('//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/neon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/neon-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/neon-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-icons/font-awesome/css/font-awesome.css') }}">

    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>

    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->


</head>

<body class="page-body  page-fade">

    <div class="page-container sidebar-collapsed ">
        <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

        @include('aside.sidenav')
        <div class="main-content">
            {{-- topNav --}}
            <div class="row">

                <!-- Profile Info and Notifications -->
                <div class="col-md-6 col-sm-8 clearfix">

                    <ul class="user-info pull-left pull-none-xsm">

                        <!-- Profile Info -->
                        <li class="profile-info dropdown">
                            <!-- add class "pull-right" if you want to place this from right -->

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ url('assets/images/thumb-1@2x.png') }}" alt="" class="img-circle"
                                    width="44" />
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu">

                                <!-- Reverse Caret -->
                                <li class="caret"></li>

                                <!-- Profile sub-links -->
                                <li>
                                    <a href="extra-timeline.html">
                                        <i class="entypo-user"></i>
                                        Edit Profile
                                    </a>
                                </li>

                                <li>
                                    <a href="mailbox.html">
                                        <i class="entypo-mail"></i>
                                        Inbox
                                    </a>
                                </li>

                                <li>
                                    <a href="extra-calendar.html">
                                        <i class="entypo-calendar"></i>
                                        Calendar
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="entypo-clipboard"></i>
                                        Tasks
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>



                </div>


                <!-- Raw Links -->
                <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                    <ul class="list-inline links-list pull-right">

                        <li class="sep"></li>

                        <li>
                            <a onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                                Log Out <i class="entypo-logout right"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </div>

            </div>

            <hr />

            {{ $slot }}

            <br />




            <!-- Footer -->
            <footer class="main">

                &copy; 2022 <strong>Copyright </strong>HIV M2M Managment system <a href="#" target="_blank"></a>

            </footer>
        </div>


        <div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1"
            data-max-chat-history="25">

            <div class="chat-inner">


                <h2 class="chat-header">
                    <a href="#" class="chat-close"><i class="entypo-cancel"></i></a>

                    <i class="entypo-users"></i>
                    Chat
                    <span class="badge badge-success is-hidden">0</span>
                </h2>


                <div class="chat-group" id="group-1">
                    <strong>Favorites</strong>

                    <a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span
                            class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                    <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                    <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                    <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                    <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
                </div>


                <div class="chat-group" id="group-2">
                    <strong>Work</strong>

                    <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                    <a href="#" data-conversation-history="#sample_history_2"><span
                            class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                    <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
                </div>


                <div class="chat-group" id="group-3">
                    <strong>Social</strong>

                    <a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
                    <a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
                    <a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
                    <a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
                </div>

            </div>

            <!-- conversation template -->
            <div class="chat-conversation">

                <div class="conversation-header">
                    <a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

                    <span class="user-status"></span>
                    <span class="display-name"></span>
                    <small></small>
                </div>

                <ul class="conversation-body">
                </ul>

                <div class="chat-textarea">
                    <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                </div>

            </div>

        </div>


        <!-- Chat Histories -->
        <ul class="chat-history" id="sample_history">
            <li>
                <span class="user">Art Ramadani</span>
                <p>Are you here?</p>
                <span class="time">09:00</span>
            </li>

            <li class="opponent">
                <span class="user">Catherine J. Watkins</span>
                <p>This message is pre-queued.</p>
                <span class="time">09:25</span>
            </li>

            <li class="opponent">
                <span class="user">Catherine J. Watkins</span>
                <p>Whohoo!</p>
                <span class="time">09:26</span>
            </li>

            <li class="opponent unread">
                <span class="user">Catherine J. Watkins</span>
                <p>Do you like it?</p>
                <span class="time">09:27</span>
            </li>
        </ul>




        <!-- Chat Histories -->
        <ul class="chat-history" id="sample_history_2">
            <li class="opponent unread">
                <span class="user">Daniel A. Pena</span>
                <p>I am going out.</p>
                <span class="time">08:21</span>
            </li>

            <li class="opponent unread">
                <span class="user">Daniel A. Pena</span>
                <p>Call me when you see this message.</p>
                <span class="time">08:27</span>
            </li>
        </ul>


    </div>

    <!-- Sample Modal (Default skin) -->
    <div class="modal fade" id="sample-modal-dialog-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Default Modal</h4>
                </div>

                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw.
                        Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end
                        marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope.
                        Secure active living depend son repair day ladies now.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample Modal (Skin inverted) -->
    <div class="modal invert fade" id="sample-modal-dialog-2">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
                </div>

                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw.
                        Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end
                        marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope.
                        Secure active living depend son repair day ladies now.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample Modal (Skin gray) -->
    <div class="modal gray fade" id="sample-modal-dialog-3">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Widget Options - Gray Skin Modal</h4>
                </div>

                <div class="modal-body">
                    <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw.
                        Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end
                        marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope.
                        Secure active living depend son repair day ladies now.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="{{ asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/rickshaw/rickshaw.min.css') }}">

    <!-- Bottom scripts (common) -->
    <script src="{{ asset('assets/js/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/joinable.js') }}"></script>
    <script src="{{ asset('assets/js/resizeable.js') }}"></script>
    <script src="{{ asset('assets/js/neon-api.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>


    <!-- Imported scripts on this page -->



    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

   
    <script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/FixedColumns-3.1.0/js/dataTables.fixedColumns.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/rickshaw/vendor/d3.v3.js') }}"></script>
    <script src="{{ asset('assets/js/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('assets/js/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/js/morris.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.js') }}"></script>
    <script src="{{ asset('assets/js/neon-chat.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-switch.min.js') }}"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="{{ asset('assets/js/neon-custom.js') }}"></script>


    <!-- Demo Settings -->
    <script src="{{ asset('assets/js/neon-demo.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    
    <script>
        jQuery(document).ready(function($) {
            $('.tile-clickable').click(function() {
                var url = $(this).attr('data-url');
                window.location = url;
            })
            $('#panel-fullscreen').click(function(e) {
                e.preventDefault();
                var $this = $(this);
                if ($this.children('i').hasClass('entypo-resize-full')) {
                    $this.children('i').removeClass('entypo-resize-full');
                    $this.children('i').addClass('entypo-resize-small');
                } else if ($this.children('i').hasClass('entypo-resize-small')) {
                    $this.children('i').removeClass('entypo-resize-small');
                    $this.children('i').addClass('entypo-resize-full');
                }
                $(this).closest('.panel').toggleClass('panel-fullscreen');
            });

            setTimeout(function() {
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ?
                        "toast-top-left" : "toast-top-right",
                    "toastClass": "black",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                @if (Session::has('notify'))
                    toastr.success("{{ Session::get('notify') }}","Alert", opts);
                @endif
            }, 3000);



            var $table4 = jQuery("#example1");

            $table4.DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,

                "info": false,
                "ordering": false,
                //   "scrollY":"200px",
                // "scrollX":true,
                // "scrollCollapse":true,
                "paging": false,
                // "columnDefs":[{'width':'20%','targets':0},{'targets':[16],'visible':true}],
                // "aaColumns":[{"bSortable":false,}],
                dom: 'Bfrtip',
                //   "fixedColumns":true,
                "buttons": ["copy", "csv",
                    {
                        title: '',
                        extend: 'excelHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                        }
                    },
                    "print", {
                        title: 'Data',
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]
                        }
                    }, 'colvis'
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })


        // $("#example1").DataTable({
        //     "responsive": true,
        //     "lengthChange": false,
        //     "info": false,
        //     "searching": true,
        //     "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "print", {
        //         extend: 'pdfHtml5',
        //         orientation: 'landscape',
        //         pageSize: 'LEGAL'
        //     }]
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('.cp').on('change', function() {
            var data = $(this).val();
            console.log(data);
            if (data == 'yes') {
                $('#cp_status_form').show(700);
                $('#cp_status').removeAttr('disabled')
            } else if (data == 'no') {
                $('#cp_status').attr('disabled', 'disabled')
                $('#cp_status_form').hide(500);
            } else {
                $('#cp_status').attr('disabled', 'disabled')
                $('#cp_status_form').hide(500);
            }
        });

        $('.acf').on('change', function() {
            var dat = $(this).val();
            console.log(dat);
            if (dat == 'yes') {
                $('#afcu_type_form').show(700);
                $('#acfu_type').removeAttr('disabled');
            } else {
                $('#acfu_type').attr('disabled', 'disabled');
                $('#afcu_type_form').hide(700);

            }
        });
        $('#client_type').on('change', function() {
            var data = $(this).val();
            //console.log(data);
            if ($(this).val() == 'peads') {
                $('#cp_form').hide(700);
                $('#cp').attr('disabled', 'disabled');
            } else {
                $('#cp_form').show(700);
                $('#cp').removeAttr('disabled');
            }
        });
        $('#acfu_type').on('change', function() {
            var d = $(this).val();
            console.log(d);
            if (d == "sms") {
                $('#tel_form').show(700);
                $('#tel').removeAttr('disabled');
                $('#address_form').hide(700);
                $('#address').attr('disabled', 'disabled');
            } else if (d == "phone") {
                $('#tel_form').show(700);
                $('#tel').removeAttr('disabled');
                $('#address_form').hide(700);
                $('#address').attr('disabled', 'disabled');
            } else if (d == "Home Visit") {
                $('#tel_form').show(700);
                $('#tel').removeAttr('disabled');
                $('#address_form').show(700);
                $('#address').removeAttr('disabled');
            } else {
                $('#tel_form').hide(700);
                $('#tel').attr('disabled', 'disabled');
                $('#address_form').hide(700);
                $('#address').attr('disabled', 'disabled');
            }
        });
    </script>
    <script>
        // $('.table-link').on('click', function() {
        //     var link = $(this).attr('data-table-view');
        //     window.location = link;
        // });

        $('.decryptpass').on('click', function() {
            var ep = $(this).attr('data-pass');
            var id = $(this).attr('data-id');
            var form_id = $(this).attr('data-form-id');
            //console.log(form_id);
            $.ajax({
                url: 'https://edo.test/generate/' + ep,
                type: 'get',
                success: function(data) {
                    //console.log(form_id);
                    var d1 = data.replace('"', "");
                    var d2 = d1.replace('"', "");

                    console.log(d2);
                    if (data == 'error') {
                        $('#' + form_id).html(
                            '<div class="alert alert-danger" role="alert"><strong>Error</strong> Try Again!</div>'
                        );
                        console.log(d2 + 'error');
                    } else {
                        console.log(d2 + 'error 2');
                        $('#' + form_id).html(
                            "<label>Decrypted Password</label><input type='text' value='" + d2 +
                            "' class='form-control bg-success'>");
                    }
                },
                error: function(data) {
                    console.log(d2 + 'error3');
                    $('#' + form_id).html(
                        '<div class="alert alert-danger" role="alert"><strong>Error</strong> Try Again!</div>'
                    );
                }
            });
        });
    </script>

@yield('chart')





</body>

</html>
