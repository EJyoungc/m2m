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


            </div>
        </div><!-- /.col -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-invert">

                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title" style="font-size:21px">Appointment log</div>

                        <div class="panel-options">

                            <a href="#tab1" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">Create Appointment</a>



                        </div>
                    </div>

                    <!-- panel body -->
                    <div class="panel-body">

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                @forelse ($appointments as $item)
                                    <div class="list-group">
                                        <a href="{{ route('appointment.show', $item->id) }}"
                                            class="list-group-item list-group-item-action flex-column @if ($item->status == 'attended')
                                            list-group-item-success
                                            @elseif($item->status == 'missed')  list-group-item-danger @else @endif align-items-start ">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="list-group-item-heading">{{ $item->appointment }} <span><small style="color:black;">@if ($item->status == 'attended')
                                                   ( Complete)
                                                @elseif ($item->status == 'missed')
                                                    (Missed)
                                                @else
                                                (Pending)
                                                @endif </small></span></h3>
                                                @if ($item->status == 'rescheduled')
                                                    <span class="badge badge-success">Rescheduled</span>
                                                @endif
                                                @if (!$item->desc == 'N/A')
                                                    <p class="list-group-item-text">
                                                        {{ $item->desc }}
                                                    </p>
                                                @endif
                                                @if ($item->art == 'active')
                                                    @forelse ($item->artcheck as $ite)
                                                        @if ($ite->appointment_id)
                                                            A.R.T <span class="badge badge-sm badge-success">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span> |
                                                        @endif
                                                    @empty
                                                        A.R.T <span class="badge badge-sm badge-danger">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </span> |
                                                    @endforelse
                                                @endif

                                                @if ($item->viralload == 'active')
                                                    @forelse ($item->viralloadcheck as $ite)
                                                        @if ($ite->appointment_id)
                                                            Viral load <span class="badge badge-sm badge-success">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span> |
                                                        @endif
                                                    @empty
                                                        Viral load <span class="badge badge-sm badge-danger">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </span> |
                                                    @endforelse
                                                @endif

                                                @if ($item->adherance == 'active')
                                                    @forelse ($item->adherencecheck as $ite)
                                                        @if ($ite->appointment_id)
                                                            Adherence <span class="badge badge-sm badge-success">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span> |
                                                        @endif
                                                    @empty
                                                        Adherence <span class="badge badge-sm badge-danger">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </span> |
                                                    @endforelse
                                                @endif


                                                @if ($item->tbtest == 'active')
                                                    @forelse ($item->tbcheck as $ite)
                                                        @if ($ite->appointment_id)
                                                            TB Screening <span class="badge badge-sm badge-success">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        @endif
                                                    @empty
                                                        TB Screening <span class="badge badge-sm badge-danger">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </span>
                                                    @endforelse
                                                @endif

                                            </div>


                                        </a>
                                    </div>
                                    @empty
                                        <div class="list-group">
                                            <a href="#"
                                                class="list-group-item list-group-item-action flex-column align-items-start ">
                                                <div class="d-flex justify-content-between">
                                                    <h1 class="mb-1">Empty</h1>

                                                </div>


                                            </a>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- /.row -->

        </div><!-- /.container-fluid -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:0px">
                        <h3 class="modal-title" id="exampleModalLabel">Create Appointment</h3>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form action="{{ route('appointment.store', $client->id) }}" method="post">
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
