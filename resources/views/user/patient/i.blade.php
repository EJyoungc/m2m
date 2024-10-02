<x-layout.dash>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clients </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
          <x-fab data-bs-toggle="modal" data-bs-target="#store">
              <i class="fa fa-plus" aria-hidden="true"></i>
          </x-fab>
            <!-- Modal -->
          <div class="modal fade" id="store" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route('patient.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Firstname</label>
                      <input type="text" name="firstname" value="{{old('firstname')}}" class="form-control @error('firstname') is-invalid @enderror " id="firstname">
                      @error('firstname')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>    
                    @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Lastname</label>
                      <input type="text" name="lastname" value="{{old('lastname')}}" class="form-control @error('lastname') is-invalid @enderror " id="lastname">
                      @error('lastname')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>    
                    @enderror
                    </div>
                    <div class="form-group">
                      <Label>HIV status</Label>
                     <select name="hiv_status"  class="form-control @error('hiv_status') is-invalid @enderror " id="hiv_status">
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
                      <select name="client_type" class="form-control @error('client_type') is-invalid @enderror " id="client_type">
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
                      <input type="date" name="dob" value="{{old('dob')}}" class="form-control @error('dob') is-invalid @enderror " id="dob">
                      @error('dob')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Gender</label>
                      <select name="gender" class="form-control @error('gender') is-invalid @enderror " id="gender">
                         <option selected value="">Select Gender</option>
                         <option value="male">Male</option>
                         <option value="female">Female</option>
                      </select>
                      @error('gender')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                     </div>
                     <div class="form-group">
                      <label for="">M2M Enrolment Date</label>
                      <input type="date" name="MED" value="{{old('MED')}}" class="form-control @error('MED') is-invalid @enderror " >
                      @error('MED')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">ART Number</label>
                      <input type="text" name="art_number" value="{{old('art_number')}}" class="form-control @error('art_number') is-invalid @enderror " id="">
                      @error('art_number')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">ART Initiation Date</label>
                      <input type="date" name="art_initiation_date" value="{{old('art_initiation_date')}}"  class="form-control @error('art_initiation_date') is-invalid @enderror " id="">
                      @error('art_initiation_date')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                    </div>
                    {{-- <div class="form-group">
                      <label for="">Does Client Have Partner</label>
                      <select name="client_partner" class="form-control @error('client_partner') is-invalid @enderror " id="cp">
                        <option value="">select</option>
                        <option value="yes">yes</option>
                        <option value="no">no</option>
                      </select>
                      @error('client_partner')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>    
                    @enderror
                    </div> --}}

                    <div class="form-group " id="cp_form">
                      <label for="">Does client have partner</label>
                      <div class="form-check">
                        <input class="form-check-input cp @error('client_partner') is-invalid @enderror" name="client_partner" value="yes" type="radio"  >
                        <label class="form-check-label" for="inlineRadio1">yes</label>
                      </div>
                      <div class="form-check ">
                        <input class="form-check-input cp  @error('client_partner') is-invalid @enderror " name="client_partner" value="no" type="radio"  >
                        <label class="form-check-label" for="inlineRadio1">no</label>
                        @error('client_partner')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                        @enderror
                      </div>
                    </div>

                    <div class="form-group" id="cp_status_form" style="display: none;" >
                      <label for=""> If Partner Exists : Status ?</label>
                      <select name="partner_status" disabled class="form-control @error('partner_status') is-invalid @enderror"   id="cp_status">
                        <option value="">select</option>
                        <option value="positive">positive</option>
                        <option value="negative">negative</option>
                        <option value="unknown">Unknown</option>
                      </select>
                      @error('partner_status')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>    
                    @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Does the client  Agree To Active client Follow</label>
                      <div class="form-check ">
                        <input class="form-check-input acf @error('acfu') is-invalid @enderror" name="acfu" value="yes" type="radio"  id="acf" >
                        <label class="form-check-label" for="inlineRadio1">yes</label>
                      </div>
                      <div class="form-check ">
                        <input class="form-check-input acf  @error('acfu') is-invalid @enderror " name="acfu" value="no" type="radio"  id="acf" >
                        <label class="form-check-label" for="inlineRadio1">no</label>
                        @error('acfu')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                        @enderror
                      </div>
                      
                    </div>
                    <div class="form-group" id="afcu_type_form" style="display: none" >
                      <label for="">ACFU Method</label>
                      <select class="form-control  @error('acfu') is-invalid @enderror " disabled name="acfu_method" id="acfu_type">
                        <option value="">select type</option>
                        @foreach ($acfutypes as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        @error('acfu_type')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>    
                    @enderror
                      </select>
                    </div>
                    <div class="form-group" id="tel_form">
                      <label for="">Tel.</label>
                        <input type="number" class="form-control @error('number') is-invalid  @enderror"  name="tel" id="tel">
                        @error('number')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                    </div>
                    <div class="form-group" id="address_form">
                      <label for="">Address</label>
                        <input type="address" class="form-control @error('address') is-invalid  @enderror"  name="address" id="address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Priority Visits</label>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" name="art_pick_up"  id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">ART Pick UP</label>
                      </div><div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" name="viral_load" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Viral Load</label>
                      </div><div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" name="adherance" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Adherance</label>
                      </div><div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="1" name="tb_screening" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">TB Screening</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-dark form-control" >Save</button>
                    </div>

                  </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center my-5">
        <div class="col-md-12 col-sm-12 col-lg-12">
          <div class="card-glass border-0 shadow">
            <div class=" px-3 pt-4 border-bottom rounded-top">
              <div class="row">
                @forelse ($patients as $item)
                  <div class="col-12 col-lg-12 col-md-12 col-sm-12 pb-3">
                    <div class="list-group pt-2 bg-light " >
                      <a href="{{route('patient.show',$item->id)}}" class="list-group-item-action  d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold"><h4>{{$item->firstname}} {{$item->lastname}}</h4></div>
                        </div ><span class="p-2">
                          98-43-34
                        </span>
                      </a>
                    </div>
                  </div>  
                @empty
                  <div class="col-12 col-lg-12 col-md-12 col-sm-12 p-2">
                    <h1 class="text-center text-secondary" >EMPTY</h1>
                  </div>  
                @endforelse
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        $('.cp').on('change',function(){
          var data = $(this).val();
          console.log(data);
          if (data =='yes') {
            $('#cp_status_form').show(700);
            $('#cp_status').removeAttr('disabled')
          }else if (data == 'no'){
            $('#cp_status').attr('disabled','disabled')
            $('#cp_status_form').hide(500);
          }else{
            $('#cp_status').attr('disabled','disabled')
            $('#cp_status_form').hide(500);
          }
        });

        $('.acf').on('change',function(){
          var dat = $(this).val();
          console.log(dat);
          if (dat == 'yes') {
            $('#afcu_type_form').show(700);
            $('#acfu_type').removeAttr('disabled');
          } else{
            $('#acfu_type').attr('disabled','disabled');
            $('#afcu_type_form').hide(700);
             
          }
        });
        $('#client_type').on('change',function(){
          var data = $(this).val();
          //console.log(data);
          if($(this).val() == 'peads'){
            $('#cp_form').hide(700);
            $('#cp').attr('disabled','disabled');
          }else{
            $('#cp_form').show(700);
            $('#cp').removeAttr('disabled');
          }
        });
       

      </script>
</x-layout.dash>