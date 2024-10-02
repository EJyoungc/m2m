<x-layout.lte>
    @section('title')
        Add Clients
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-xs-12">
                <h4><strong>Step 1</strong></h4>
                <form action="{{route('client.store')}}" method="post">
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
                      <input type="date" name="m2m_enrol_date" value="{{old('m2m_enrol_date')}}" class="form-control @error('m2m_enrol_date') is-invalid @enderror " >
                      @error('m2m_enrol_date')
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
                      <input type="date" name="art_init_date" value="{{old('art_init_date')}}"  class="form-control @error('art_init_date') is-invalid @enderror " id="">
                      @error('art_init_date')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                    </div>
                  
                    <div class="form-group">
                      <button class="btn btn-primary form-control" >Next</button>
                    </div>
                    
    
                  </form>
            </div>
        </div>
    </div>
</x-layout.lte>
