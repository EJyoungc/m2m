<x-layout.lte>
    @section('title')
       Users
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
    <section class="content" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body ">
                                <table id="" class="table table-sm table-bordered table-hover" >
                                    <thead class="thead-dark">
                                        <th>
                                            Name 
                                        </th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $item)
                                            <tr>
                                                <td class="h6"><i class="fa fa-user" aria-hidden="true"> </i> {{$item->name}}</td>
                                                <td><span class="badge badge-success">{{$item->ac_status}}</span> </td>
                                                <td class="h6" >@if ($item->role == '1')
                                                     Admin
                                                @elseif($item->role =='2')
                                                   Mentor Mother Coodinator
                                                @else
                                                    Mentor Mothor
                                                @endif</td>
                                                <td>
                                                  <a href="#"  data-toggle="modal" data-target="#pwdgen{{$item->id}}"  class="btn btn-info btn-sm btn-icon icon-left">
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                                    Decrypt Password
                                                  </a>
                                                  <a href="#"  data-toggle="modal" data-target="#edit{{$item->id}}"  class="btn btn-success btn-sm btn-icon icon-left">
                                                    <i class="entypo-pencil" ></i>
                                                    Decrypt Password
                                                  </a>
                                                     
                                                </td>
                                                {{-- modal password --}} 
                                                <div class="modal fade" id="pwdgen{{$item->id}}">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header" style="border-bottom: 0px">
                                                          
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <div class="text-center">
                                                              <h3>Password</h3>
                                                          </div>
                                                            <div class="form-group">
                                                            <div id="form_pass-{{$item->id}}" >
                                                                    <label>Encrypted Password</label>
                                                                  <input type="text"  id='encpass' value="{{$item->encpwd}}" class="form-control bg-success">
                                                            </div>
                                                                    
                                                              </div> 
                                                            <div class="form-group">
                                                                <button class="btn btn-dark form-control decryptpass " data-form-id="form_pass-{{$item->id}}" data-id='{{$item->id}}' data-pass="{{$item->encpwd}}"  >Decrypt</button>
                                                               
                                                            </div> 
                                                        </div>
                                                      </div>
                                                      <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                  </div>
                                                  <!-- /.modal -->
                                            </tr>
                                            <div class="modal fade" id="edit{{$item->id}}">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header" style="border-bottom: 0px">
                                                    
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="text-center">
                                                        <h3>Edit</h3>
                                                    </div>
                                                    <form action="{{route('user.update',$item->id)}}" method="post">
                                                      @csrf
                                                      <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" value="{{$item->name}}" class="form-control @error('name') is-invalid @enderror " id="name">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                        </span>    
                                                        @enderror
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="">E-mail </label>
                                                          <input type="text" name="email" value="{{$item->email}}" class="form-control @error('email') is-invalid @enderror " id="email">
                                                          @error('email')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                          </span>    
                                                          @enderror
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="">Role Type</label>
                                                        <select class="form-control form-control @error('role') is-invalid @enderror" name="role" id="">
                                                            
                                                            @if ($item->role == '1')
                                                            <option selected value="1" >Admin</option>
                                                            @elseif($item->role == '2')
                                                              <option selected value='2' >Mentor Coodinator</option>
                                                            @else
                                                            <option selected value='3' >Mentor mother</option>  
                                                            @endif
                                                          
                                                          
                                                          
                                                        </select>
                                                        @error('role')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                          </span>    
                                                          @enderror
                                                      </div>
                                                      <div class="form-group">

                                                      </div>


                                                      <div class="form-group">
                                                        <button class="btn btn-dark form-control" >Save</button>
                                                      </div>
                                                      <div class="form-group">
                                                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
                                                      </div>
                                      
                                                    </form>
                                                    
                                                  </div>
                                                </div>
                                                <!-- /.modal-content -->
                                              </div>
                                              <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        @empty
                                            <tr>
                                                <td colspan="5" class="h4 text-secondary" >Empty</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0px">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="text-center">
                  <h3>Add User</h3>
              </div>
              <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror " id="name">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>    
                  @enderror
                </div>
                <div class="form-group">
                    <label for="">E-mail </label>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror " id="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>    
                    @enderror
                </div>
                <div class="form-group">
                  <label for="">Role Type</label>
                  <select class="form-control form-control @error('role') is-invalid @enderror" name="role" id="">
                      <option value="">Select Role</option>
                    <option value="1" >Admin</option>
                    <option value='2' >Mentor Coodinator</option>
                    <option value='3' >Mentor mother</option>
                  </select>
                  @error('role')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>    
                    @enderror
                </div>
                
                <div class="form-group">
                  <button class="btn btn-dark form-control" >Save</button>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
                </div>

              </form>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</x-layout.lte>