<x-layout.lte>
    @section('title')
        Dashboard
    @endsection

    {{-- <x-statcards /> --}}
    <div class="row">
        <div class="col-sm-3 col-xs-6">
    
            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500"
                    data-delay="0">0</div>
    
                <h3>All Clients</h3>
                <p></p>
            </div>
    
        </div>
    
        <div class="col-sm-3 col-xs-6">
    
            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-chart-bar"></i></div>
                <div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1500"
                    data-delay="600">0</div>
    
                <h3>Appointment</h3>
                <p></p>
            </div>
    
        </div>
    
        <div class="clear visible-xs"></div>
    
        <div class="col-sm-3 col-xs-6">
    
            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-mail"></i></div>
                <div class="num" data-start="0" data-end="" data-postfix="" data-duration="1500"
                    data-delay="1200">0</div>
    
                <h3>Clients</h3>
                <p></p>
            </div>
    
        </div>
    
        <div class="col-sm-3 col-xs-6">
    
            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-rss"></i></div>
                <div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500"
                    data-delay="1800">0</div>
    
                <h3>Subscribers</h3>
                <p></p>
            </div>
    
        </div>
    </div>
    

</x-layout.lte>
