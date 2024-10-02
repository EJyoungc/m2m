<x-layout.lte>
    @section('title')
        Clients
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class=" float-sm-right">
                        <div class="btn-group">
                            
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid" style="padding-left: 0px;padding-right:0px;">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="panel panel-default ">

                        <div class="panel-heading ">
                            <div class="panel-options">
                                <a href="#" id="panel-fullscreen" role="button" title="Toggle fullscreen"><i class="entypo-resize-full" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="panel-body" style="padding:0px;">
                            <table id="example1" class="table responsive table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ART No.</th>
                                        <th>First</th>
                                        <th>Last</th>
                                        <th>Sex</th>
                                        <th>Date of Birth</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($patients as $item)
                                        <tr class="table-link"
                                            data-table-view="{{ route('client.show', $item->id) }}"
                                            @if ($item->form_status == 'incomplete') class="table-danger" @else @endif>

                                            <td>{{ $item->art_number }}</td>
                                            <td>{{ $item->firstname }}</td>
                                            <td>{{ $item->lastname }}</td>
                                            <td>{{ $item->sex }}</td>
                                            <td>{{ $item->dob }}</td>
                                            
                                            {{-- <td><a href="{{ route('client.show', $item->id) }}" class="btn btn-primary" >view</a></td> --}}
                                            <td>
                                                <a href="{{ route('client.show', $item->id) }}" class="btn btn-info btn-sm btn-icon icon-left">
                                                    <i class="entypo-info"></i>
                                                    View
                                                </a>
                                            </td>
                                        </tr>



                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-secondary h3 ">No Records Found <i
                                                    class="fa fa-exclamation-triangle" aria-hidden="true"></i></td>
                                        </tr>
                                    @endforelse


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout.lte>
