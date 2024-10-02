<x-layout.lte>
    @section('title')
        Client | {{ $ap->client->firstname }} :({{ $ap->client->art_number }})
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->


            </div>
        </div><!-- /.col -->
        <div class="row">

            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 ">

                <div class="tile-stats tile-dark tile-click" data-toggle="modal" data-target="#exampleModal2">
                    <div class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                    <div class="num"><i class="fa fa-calendar" aria-hidden="true"></i></div>

                    <h3>View Appointment Details @if ($ap->status == 'rescheduled')
                            <span class="badge badge-success">Rescheduled</span>
                        @endif
                    </h3>
                    

                </div>
            </div>

            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 ">

                <div class="tile-stats tile-blue tile-click" data-toggle="modal" data-target="#exampleModal">
                    <div class="icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
                    <div class="num"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>

                    <h3>Reschedule </h3>
                    <p>

                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 ">

                <div class="tile-stats tile-aqua tile-click" data-toggle="modal" data-target="#exampleModal7">
                    <div class="icon"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></div>
                    <div class="num"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></div>

                    <h3>Edit </h3>
                    <p>

                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-4 col-lg-3 ">

                <div class="tile-stats tile-red tile-clickable"
                    data-url='{{ route('appointment.destroy', $ap->id) }}'>
                    <div class="icon"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></div>
                    <div class="num"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></div>

                    <h3>Delete({{ $ap->appointment }})</h3>
                    <p></p>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title" style="font-size:21px">
                            <ul class="nav nav-tabs nav-dark border">
                                <!-- available classes "bordered", "right-aligned" -->
                                @if ($ap->art=='active')
                                   <li class="active">
                                    <a href="#atr" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-home"></i></span>
                                        <h5 class="hidden-xs">A.R.T Refill
                                            @forelse ($arts as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>

                                    </a>
                                </li> 
                                @endif
                                @if ($ap->viralload=='active')
                                    <li class="">
                                    <a href="#viralload" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-user"></i></span>
                                        <h5 class="hidden-xs">Viral Load
                                            @forelse ($viralload as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></span>
                                            @endforelse

                                        </h5>
                                    </a>
                                </li>
                                @endif
                                @if ($ap->adherance=='active')
                                  <li>
                                    <a href="#adh" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-mail"></i></span>
                                        <h5 class="hidden-xs">Adherance
                                            @forelse ($adherence as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>
                                    </a>
                                </li>  
                                @endif
                                @if ($ap->tbtest=='active')
                                  <li>
                                    <a href="#tbs" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-cog"></i></span>
                                        <h5 class="hidden-xs">Tb Screening
                                            @forelse ($tbtest as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>
                                    </a>
                                </li>  
                                @endif


                                <li>
                                    <a href="#nvp" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-cog"></i></span>
                                        <h5 class="hidden-xs">NVP
                                            @forelse ($tbtest as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>
                                    </a>
                                </li> 
                                
                                <li>
                                    <a href="#ctx" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-cog"></i></span>
                                        <h5 class="hidden-xs">CTX 
                                            @forelse ($tbtest as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>
                                    </a>
                                </li>  
                                <li>
                                    <a href="#pcr68" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-cog"></i></span>
                                        <h5 class="hidden-xs">PCR 6-8 weeks
                                            @forelse ($tbtest as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>
                                    </a>
                                </li>  
                                <li>
                                    <a href="#pcr68" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-cog"></i></span>
                                        <h5 class="hidden-xs">Infant test 12/M
                                            @forelse ($tbtest as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>
                                    </a>
                                </li>
                                <li>
                                    <a href="#pcr68" data-toggle="tab">
                                        <span class="visible-xs"><i class="entypo-cog"></i></span>
                                        <h5 class="hidden-xs">Infant test 18-24/M
                                            @forelse ($tbtest as $item)
                                                <span class="badge badge-success "
                                                    style=" background-color:#00a651;color:white;"><i
                                                        class="fa fa-check" aria-hidden="true"></i></span>
                                            @empty
                                                <span class="badge badge-danger"
                                                    style=" background-color:red;color:white;"><i class="fa fa-times"
                                                        aria-hidden="true"></i></i></span>
                                            @endforelse
                                        </h5>
                                    </a>
                                </li>    
                            </ul>

                        </div>
                        <div class="panel-options">

                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="atr">



                                @forelse ($arts as $item)
                                    <div class="alert alert-success text-center">
                                        <p>
                                        <h1>Succefully Refilled</h1>
                                        <h3>Next Refill is on the <strong> {{ $item->next_refill }}</strong></h3>
                                        <button class="btn btn-info btn-md">Edit</button>
                                        </p>
                                    </div>
                                @empty
                                    <a href="#tab1" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal3">Add</a> <br> <br>
                                    <div class="alert alert-info text-center">
                                        <p>
                                        <h1>EMPTY</h1>
                                        <h3>Please Click Add !</h3>
                                        </p>
                                    </div>
                                @endforelse





                            </div>
                            <div class="tab-pane " id="viralload">

                                @forelse ($viralload as $item)
                                    @if ($item->viral_copy <= 75)
                                        <div class="alert alert-info text-center">
                                            <p>
                                            <h1>Normal Viral Load </h1>
                                            <h3><strong>{{ $item->viral_copy }}</strong> PER MiliLitter</h3>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @elseif($item->viral_copy <= 200)
                                        <div class="alert alert-warning text-center">
                                            <p>
                                            <h1>Medium Viral Load </h1>
                                            <h3><strong>{{ $item->viral_copy }}</strong> PER MiliLitter</h3>
                                            <h4>Client Requires Monitoring </h4>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @else
                                        <div class="alert alert-warning text-center">
                                            <p>
                                            <h1>Medium Viral Load </h1>
                                            <h3><strong>{{ $item->viral_copy }}</strong> PER MiliLitter</h3>
                                            <h4>Client Requires Imediate attention</h4>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @endif
                                @empty
                                    <a href="#tab1" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal4">Add</a> <br> <br>
                                    <div class="alert alert-info text-center">
                                        <p>
                                        <h1>EMPTY</h1>
                                        <h3>Please Click Add !</h3>
                                        </p>
                                    </div>
                                @endforelse


                            </div>
                            <div class="tab-pane" id="adh">

                                @forelse ($adherence as $item)
                                    @if ($item->adherence_result <= 33.33)
                                        <div class="alert alert-info text-center">
                                            <p>
                                            <h1>Adherence Low</h1>
                                            <h3>With <strong>{{ $item->adherence_result }}%</strong> of Pills from
                                                last
                                                Month Dosage</h3>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @elseif($item->adherence_result <= 66.66)
                                        <div class="alert alert-warning text-center">
                                            <p>
                                            <h1>Adherence Medium</h1>
                                            <h3>With <strong>{{ $item->adherence_result }}%</strong> of Pills from
                                                last
                                                Month Dosage</h3>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @else
                                        <div class="alert alert-danger">
                                            <p>
                                                <strong>Adherence High</strong> <br>
                                                With <strong>{{ $item->adherence_result }}%</strong> of Pills from
                                                last
                                                Month Dosage <span><a href="#tab1" class="btn text btn-info"
                                                        data-toggle="modal" data-target="#exampleModal3">Edit</a></span>
                                            </p>
                                        </div>
                                        <div class="alert alert-danger text-center">
                                            <p>
                                            <h1>Adherence High</h1>
                                            <h3>With <strong>{{ $item->adherence_result }}%</strong> of Pills Missed
                                                from
                                                last
                                                Month Dosage</h3>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @endif

                                @empty
                                    <a href="#tab1" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal6">Add</a>
                                    <br> <br>
                                    <div class="alert alert-info text-center">
                                        <p>
                                        <h1>EMPTY</h1>
                                        <h3>Please Click Add !</h3>
                                        </p>
                                    </div>
                                @endforelse



                            </div>

                            <div class="tab-pane" id="tbs">


                                @forelse ($tbtest as $item)
                                    @if ($item->result == 'negative')
                                        <div class="alert alert-success text-center">
                                            <p>
                                            <h1>TB Screening</h1>
                                            <h3>Result<strong> Negative</strong></h3>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @else
                                        <div class="alert alert-danger text-center">
                                            <p>
                                            <h1>TB Screening</h1>
                                            <h3>Result<strong> Positive</strong></h3>
                                            <button class="btn btn-info btn-md">Edit</button>
                                            </p>
                                        </div>
                                    @endif

                                @empty
                                    <a href="#tab1" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal5">Add</a>
                                    <br> <br>
                                    <div class="alert alert-info text-center">
                                        <p>
                                        <h1>EMPTY</h1>
                                        <h3>Please Click Add !</h3>
                                        </p>
                                    </div>
                                @endforelse


                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:0px">
                        <h3 class="modal-title" id="exampleModalLabel">Reschedule</h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form action="{{ route('appointment.update', $ap->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Appointment</label>
                                <input type="date" value="{{ $ap->appointment }}" name="appointment"
                                    class="form-control @error('appointment') is-invalid @enderror " id="dob">
                                @error('appointment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="desc" id="" cols="30" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" s class="btn btn-primary form-control ">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:0px">
                        <h3 class="modal-title" id="exampleModalLabel"></h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <h1 class="text-center">Appointment Details</h1>
                        <h3>{{ $ap->appointment }}</h3>
                        <P>
                            {{ $ap->desc }}
                        </P>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:0px">
                        <h3 class="modal-title" id="exampleModalLabel"></h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <h1 class="text-center">ART</h1>
                        <form action="{{ route('art.store') }}" method="post">
                            @csrf
                            <input type="text" name="client_id" hidden value="{{ $ap->client->id }}">
                            <input type="text" name="appointment_id" hidden value="{{ $ap->id }}">
                            <div class="form-group">
                                <label for="">Next Refill</label>
                                <input type="text" name="nextfill" value="{{ $ap->nextrefill() }}" id=""
                                    class="form-control" readonly placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for="">Drug</label>
                                <select name="drug" class="form-control" id="">
                                    <option value="">select</option>
                                    @foreach ($drugs as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Dose</label>
                                <input type="text" name="dose" value="1" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn form-control btn-primary">Refill</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:0px">
                        <h3 class="modal-title" id="exampleModalLabel"></h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <h1 class="text-center">Viral Load</h1>
                        <form action="{{ route('viralload.store', $ap->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Viral Copy (per militer)</label>
                                <input type="number" name="viralcopy" min="0" required class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary form-control">save</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:0px">
                        <h3 class="modal-title" id="exampleModalLabel"></h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h1 class="text-center">TB Screening</h1>
                        <form action="{{route('tb.store',$ap->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">TB Result</label>
                                    <select class="form-control" name="tb_result" id="">
                                        <option value="">Select Result</option>
                                        <option value="negative">Negative</option>
                                        <option value="positive">Positive</option>
                                    </select>
                                    @error('tb_result')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submiting" class="btn btn-primary form-control ">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:0px">
                        <h3 class="modal-title" id="exampleModalLabel"></h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <h1 class="text-center">Adherence</h1>
                        <form action="{{ route('adherence.store', $ap->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Pills missed</label>
                                <input type="number" class="form-control" name="pills_missed">
                                @error('pills_missed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border:0px">
                    <h3 class="modal-title" id="exampleModalLabel"></h3>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <h1 class="text-center">Edit</h1>
                    <form action="{{ route('appointment.store',  $ap->client->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Appointment</label>
                            <input type="date" name="appointment" data-mask="datetime" value="{{ old('dob') }}"
                                class="form-control @error('dob') is-invalid @enderror " id="dob">
                            @error('appointment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="desc" id="" cols="30" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">ART Refill</label>

                            <div class="col-sm-3">
                                <div class="make-switch" data-on-label="<i class='entypo-check'></i>"
                                    data-off-label="<i class='entypo-cancel'></i>">
                                    <input type="checkbox" name="art" value="active" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">Viral Load</label>

                            <div class="col-sm-3">
                                <div class="make-switch" data-on-label="<i class='entypo-check'></i>"
                                    data-off-label="<i class='entypo-cancel'></i>">
                                    <input type="checkbox" name="viralload" value="active" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">Adherance</label>

                            <div class="col-sm-3">
                                <div class="make-switch" data-on-label="<i class='entypo-check'></i>"
                                    data-off-label="<i class='entypo-cancel'></i>">
                                    <input type="checkbox" name="adherance" value="active" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-9 control-label">TB Test</label>

                            <div class="col-sm-3">
                                <div class="make-switch" data-on-label="<i class='entypo-check'></i>"
                                    data-off-label="<i class='entypo-cancel'></i>">
                                    <input type="checkbox" name="tbtest" value="active" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control ">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</x-layout.lte>
