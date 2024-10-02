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

                <div class="col-12 col-sm-12 lg-12">
                    <ul class="nav nav-tabs bordered">
                        <!-- available classes "bordered", "right-aligned" -->
                        <li class="active">
                            <a href="#home" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="entypo-info"></i></span>
                                <span class="hidden-xs">Client Info</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#profile" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="entypo-user"></i></span>
                                <span class="hidden-xs">Status</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#messages" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="entypo-mail"></i></span>
                                <span class="hidden-xs">Partner </span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#settings" data-toggle="tab" aria-expanded="true">
                                <span class="visible-xs"><i class="entypo-cog"></i></span>
                                <span class="hidden-xs">Extra</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">


                            <p>
                            <ul class="list-group">
                                <li class="list-group-item bg-primary"><strong>FirstName:
                                    </strong><span>{{ $client->firstname }}</span></li>
                                <li class="list-group-item bg-primary"><strong>Lastname:
                                    </strong><span>{{ $client->lastname }}</span></li>
                                <li class="list-group-item bg-primary"><strong>Gender:
                                    </strong><span>{{ $client->sex }}</span>
                                </li>
                                <li class="list-group-item bg-primary"><strong>Date of Birth:
                                    </strong><span>{{ $client->dob }}</span></li>

                            </ul>
                            </p>
                        </div>




                        <div class="tab-pane" id="profile">
                            <ul class="list-group">
                                <li class="list-group-item bg-primary"><strong>HIV Status: </strong>
                                    <span>{{ $client->hiv_status }}</span>
                                </li>
                                <li class="list-group-item bg-primary"><strong>Client Type: </strong>
                                    {{ Str::of($client->client_type)->replace('_', ' ') }} </li>
                                <li class="list-group-item bg-primary "><strong>M2M Enrolment Date: </strong>
                                    {{ $client->m2m_enrol_date }}
                                </li>
                                <li class="list-group-item bg-primary"><strong>ART No.:
                                    </strong>{{ $client->art_number }}</li>
                                <li class="list-group-item bg-primary"><strong>Intialization Date:
                                    </strong>{{ $client->art_init_date }}</li>

                            </ul>

                        </div>
                        <div class="tab-pane" id="messages">
                            <ul class="list-group">

                                <li class="list-group-item bg-primary"><strong>Client Partner :
                                    </strong>{{ $client->partner }}
                                </li>
                                <li class="list-group-item bg-primary "><strong>Partner Status:
                                    </strong>{{ $client->partner_status }}</li>
                                <li class="list-group-item bg-primary"><strong>Active Client Follow: </strong>
                                    {{ $client->acfu }}</li>
                                <li class="list-group-item bg-primary"><strong>Active Client Follow up Type:
                                    </strong>{{ $client->acfu_type }} </li>
                                <li class="list-group-item bg-primary"><strong>Active Client Follow up Method:
                                    </strong>{{ $client->acfu_method }}
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane" id="settings">
                            <ul class="list-group">


                                <li class="list-group-item bg-primary "><strong>Mobile No:
                                    </strong>{{ $client->tel }}</li>
                                <li class="list-group-item bg-primary "><strong>Address:
                                    </strong>{{ $client->address }}</li>
                                <li class="list-group-item bg-primary "><strong>ART PickUp:
                                    </strong>{{ $client->art_pick_up }}
                                </li>
                                <li class="list-group-item bg-primary "><strong>Viral Load:
                                    </strong>{{ $client->viral_load }}
                                </li>
                                <li class="list-group-item bg-primary "><strong>Adherance:
                                    </strong>{{ $client->adherance }}
                                </li>
                                <li class="list-group-item bg-primary "><strong>TB Screening:
                                    </strong>{{ $client->tb_screening }}</li>
                            </ul>
                        </div>
                        <a href="{{route('client.menu.index',$client->id)}}" class="btn-primary form-control text-center">Continue <i class="fa fa-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>


        </div>
    </section>
</x-layout.lte>
