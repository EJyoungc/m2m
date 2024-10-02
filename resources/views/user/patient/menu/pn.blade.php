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
                    <div class="tile-stats tile-primary tile-click" data-toggle="modal" data-target="#exampleModal">
                        <div class="icon"><i class="fa fa-child" aria-hidden="true"></i></div>
                        <div class="num"><i class="fa fa-child" aria-hidden="true"></i></div>

                        <h3>Add Infant </h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-invert" id="charts_env">

                        <div class="panel-heading">
                            <div class="panel-title">Client Infant</div>
                        </div>

                        <div class="panel-body">
                            @forelse ($infants as $item)
                                <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action "><h1>{{$item->firstname}}</h1></a>  
                            </div>
                            @empty
                            <ul class="list-group">
                                <li href="#" class="list-group-item list-group-item-action text-center ">EMPTY</li>  
                            </ul>
                            @endforelse
                            
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border:0px">
                    <h3 class="modal-title" id="exampleModalLabel">Client Infant</h3>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <form action="{{route('infant.store',$client->id)}}" method="Post">
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
                            <button type="submit" s class="btn btn-primary form-control ">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-layout.lte>