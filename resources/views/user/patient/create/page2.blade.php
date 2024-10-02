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
                <h4><strong>Step 2</strong></h4>
                <form method="POST" action="{{route('client.save')}}">
                    @csrf
                    @method('POST')
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
                          <input class="form-check-input acf @error('acfu') is-invalid @enderror" name="acfu" s value="yes" type="radio"  id="acf" >
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
                        <select class="form-control  @error('acfu_method') is-invalid @enderror " disabled name="acfu_method" id="acfu_type">
                          <option value="">select type</option>
                          @foreach ($acfutypes as $client)
                              <option value="{{$client->name}}">{{$client->name}}</option>
                          @endforeach
                          @error('acfu_method')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>    
                      @enderror
                        </select>
                      </div>
                      <div class="form-group" id="tel_form" style="display: none">
                        <label for="">Tel.</label>
                          <input type="text" class="form-control @error('number') is-invalid  @enderror" disabled data-inputmask='"mask": "(+265) 999 99 9999"' data-mask  name="tel" id="tel">
                          @error('number')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>    
                        @enderror
                      </div>
                      <div class="form-group" id="address_form" style="display: none">
                        <label for="">Address</label>
                          <input type="address" class="form-control @error('address') is-invalid  @enderror" disabled  name="address" id="address">
                          @error('address')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>    
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="">Priority Visits</label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="yes" name="art_pick_up"  id="flexSwitchCheckDefault">
                          <label class="form-check-label" for="flexSwitchCheckDefault">ART Pick UP</label>
                        </div><div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="yes" name="viral_load" id="flexSwitchCheckDefault">
                          <label class="form-check-label" for="flexSwitchCheckDefault">Viral Load</label>
                        </div><div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="yes" name="adherance" id="flexSwitchCheckDefault">
                          <label class="form-check-label" for="flexSwitchCheckDefault">Adherance</label>
                        </div><div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" value="yes" name="tb_screening" id="flexSwitchCheckDefault">
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
</x-layout.lte>
