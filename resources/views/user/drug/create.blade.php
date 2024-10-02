<x-layout.lte>
    @section('title')
        Add Drug
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('drug.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror " id="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
    
                            <div class="form-group">
                                <button class="btn btn-primary form-control">Save</button>
                            </div>
                            
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.lte>
