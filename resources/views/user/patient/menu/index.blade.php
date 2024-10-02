<x-layout.lte>
    @section('title')
        Client | {{ $client->firstname }} :({{ $client->art_number }})
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class=" float-sm-right">

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-3 col-xs-6 col-lg-6 ">

                    <div class="tile-stats tile-primary tile-clickable"
                        data-url='{{ route('menu.diary', $client->id) }}'>
                        <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                        <div class="num"><i class="fa fa-calendar" aria-hidden="true"></i></div>

                        <h3>Appointment Diary </h3>
                        <p></p>
                    </div>

                </div>


                <div class="col-sm-3 col-xs-6 col-lg-6">

                    <div class="tile-stats tile-green tile-clickable" data-url="#">
                        <div class="icon"><i class="entypo-chart-bar"></i></div>
                        <div class="num"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>

                        <h3>Active Client Follow Up</h3>
                        <p></p>
                    </div>

                </div>

                <div class="clear visible-xs"></div>

                <div class="col-sm-3 col-xs-6 col-lg-6 ">

                    <div class="tile-stats tile-cyan tile-clickable" data-url='{{ route('client.menu.pn', $client->id) }}'>
                        <div class="icon"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></div>
                        <div class="num"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></div>

                        <h3>Post - Natal</h3>
                        <p></p>
                    </div>

                </div>

                <div class="col-sm-3 col-xs-6 col-lg-6">

                    <div class="tile-stats tile-red tile-clickable" data-url="#">
                        <div class="icon"><i class="fa fa-times" aria-hidden="true"></i></div>
                        <div class="num"><i class="fa fa-times" aria-hidden="true"></i></div>
                        <h3> Remove Client</h3>
                        <p></p>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">

                    <div class="panel panel-invert" id="charts_env">

                        <div class="panel-heading">
                            <div class="panel-title">Viral Load</div>

                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#area-chart" data-toggle="tab">Viral Load</a>
                                    </li>
                                    {{-- <li class=""><a href="#line-chart" data-toggle="tab">Line Charts</a>
                                    </li>
                                    <li class=""><a href="#pie-chart" data-toggle="tab">Pie Chart</a></li> --}}
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">

                                <div class="tab-pane active" id="area-chart">
                                    <canvas id="viral-chart"  style="height: 200px"></canvas>
                                    @section('chart')
                                       
                                        <script>
                                            $(document).ready(function() {

                                               
                                                var data = @php  print json_encode($viralchart) @endphp;
                                                var amount = [];
                                                var date = [];
                                                for (var i in data) {
                                                    amount.push(data[i].viral_copy);
                                                    date.push(data[i].appointment);
                                                }
                                                //get canvas
                                                var ctx = $("#viral-chart");
                                                var data = {
                                                    labels: date,
                                                    datasets: [{
                                                        label: "Date",
                                                        data: amount,
                                                        backgroundColor: "#CC33FF",
                                                        borderColor: "purple",
                                                        fill: true,
                                                        lineTension: 0.2,
                                                        pointRadius: 3,
                                                        pointHitRadius: 10
                                                    }]
                                                };
                                                var options = {
                                                    title: {
                                                        display: true,
                                                        position: "top",
                                                        text: 'Viral Load (per Mililter)',
                                                        fontSize: 18,
                                                        fontColor: "#111"
                                                    },
                                                    gridLinesdrawTicks: false,
                                                    legend: {
                                                        display: true,
                                                        position: "bottom"
                                                    }
                                                };
                                                var chart = new Chart(ctx, {
                                                    type: "line",
                                                    data: data,
                                                    options: options
                                                });
                                            });
                                        </script>

                                    @endsection

                                </div>

                                <div class="tab-pane " id="line-chart">
                                    <div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
                                </div>

                                <div class="tab-pane" id="pie-chart">
                                    <div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
                                </div>

                            </div>

                        </div>

                       

                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border:0px">
                    <h3 class="modal-title" id="exampleModalLabel">Post Natal</h3>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="firstname" value="{{ old('firstname') }}"
                                class="form-control @error('firstname') is-invalid @enderror " id="firstname">
                            @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Lastname</label>
                            <input type="text" name="lastname" value="{{ old('lastname') }}"
                                class="form-control @error('lastname') is-invalid @enderror " id="lastname">
                            @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <Label>HIV status</Label>
                            <select name="hiv_status" class="form-control @error('hiv_status') is-invalid @enderror "
                                id="hiv_status">
                                <option selected value="">Select HIV Status</option>
                                <option value="known +">Known +</option>
                                <option value="newly +">Newly +</option>
                            </select>
                            @error('hiv_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Client type</label>
                            <select name="client_type" class="form-control @error('client_type') is-invalid @enderror "
                                id="client_type">
                                <option selected value="">Select Client type</option>
                                <option value="general_art">General ART </option>
                                <option value="peads">Peads</option>
                            </select>
                            @error('client_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Date Of Birth</label>
                            <input type="date" name="dob" value="{{ old('dob') }}"
                                class="form-control @error('dob') is-invalid @enderror " id="dob">
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group @error('sex') has-error @enderror">
                            <label for="">Gender</label>
                            <select name="sex" class="form-control @error('sex') is-invalid @enderror " id="gender">
                                <option selected value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('sex')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">M2M Enrolment Date</label>
                            <input type="date" name="m2m_enrol_date" value="{{ old('m2m_enrol_date') }}"
                                class="form-control @error('m2m_enrol_date') is-invalid @enderror ">
                            @error('m2m_enrol_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ART Number</label>
                            <input type="text" name="art_number" value="{{ old('art_number') }}"
                                class="form-control @error('art_number') is-invalid @enderror " id="">
                            @error('art_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ART Initiation Date</label>
                            <input type="date" name="art_init_date" value="{{ old('art_init_date') }}"
                                class="form-control @error('art_init_date') is-invalid @enderror " id="">
                            @error('art_init_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="" id="" value="checkedValue" checked>
                                NVP
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="" id="" value="checkedValue"
                                    checked>
                                CTX
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="" id="" value="checkedValue"
                                    checked>
                                PCR 6 to 8 weeks
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="" id="" value="checkedValue"
                                    checked>
                                PCR 18 to 24 months
                            </label>
                        </div>



                        <div class="form-group">
                            <label for="">PCR Status</label>
                            <select class="form-control" name="" id="">
                                <option>Select PCR status</option>
                                <option>Positive</option>
                                <option>Negative</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" s class="btn btn-primary form-control ">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-layout.lte>
