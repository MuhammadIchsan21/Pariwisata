@extends('layouts.app')

@section('title', 'Detail')

@section('content')
<div class="container">
    <div class="section-details-content">
        <div id="map" style="width: 100%; height: 400px">

        </div>
        <div class="row row-wisata">
            <div class="col-lg-8 pl-lg-0">
                <div class="card card-details">
                    <h1>{{$item->title}}</h1>
                    <p>{{$item->location}}</p>
                    @if($item->galleries->count())
                    <div class="gallery">
                        <div class="xzoom-container">
                            <img src="{{Storage::url($item->galleries->first()->image)}}" class="xzoom"
                                id="xzoom-default" xoriginal="{{Storage::url($item->galleries->first()->image)}}" />
                        </div>
                        <div class="xzoom-thumbs">
                            @foreach ($item->galleries as $gallery)
                            <a href="{{Storage::url($gallery->image)}}">
                                <img src="{{Storage::url($gallery->image)}}" class="xzoom-gallery" width="128"
                                    xpreview="{{Storage::url($gallery->image)}}" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <h2>Tentang Wisata</h2>
                    <p>{!! $item->about!!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-details card-right">
                    <h2>Details</h2>
                    <hr />
                    <h2>Informasi Wisata</h2>
                    <table class="trip-informations">
                        <tr>
                            <th width="50%">Tanggal Keberangkatan</th>
                            <td width="50%" class="text-right">
                                {{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y')}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Berapa Lama?</th>
                            <td width="50%" class="text-right">{{$item->duration}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Tipe</th>
                            <td width="50%" class="text-right">{{$item->type}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Harga</th>
                            <td width="50%" class="text-right">{{$item->price}} / person</td>
                        </tr>
                    </table>
                </div>
                <div class="join-container">
                    @auth
                    <form action="{{route('checkout_process', $item->id)}}" method="post">
                        @csrf
                        <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                            Join Now
                        </button>
                    </form>
                    @endauth
                    @guest
                    <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">Login Or Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-style')
<link rel="stylesheet" href="{{url('assets/libraries/xzoom/xzoom.css')}}" />
@endpush
@push('addon-script')
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2C8vk7iaIGmDNt-TfJDQ_mdcyc7VbtTE&callback=myMap">
</script>
<script src="{{url('assets/libraries/xzoom/xzoom.min.js')}}"></script>
<script>
    $(document).ready(function () {
    $(".xzoom, .xzoom-gallery").xzoom({
    zoomWidth: 500,
    title: false,
    tint: "#333",
    Xoffset: 15,
    });
    });
</script>
<script type='text/javascript'
    {{-- src='https://maps.google.com/maps/api/js?language=en&key=AIzaSyB2C8vk7iaIGmDNt-TfJDQ_mdcyc7VbtTE&libraries=places&region=GB'> --}}
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
    async defer>
</script>
<script defer>
    function initialize() {
		var mapOptions = {
			zoom: 15,
			minZoom: 6,
			maxZoom: 17,
			zoomControl:true,
			zoomControlOptions: {
  				style:google.maps.ZoomControlStyle.DEFAULT
			},
			center: new google.maps.LatLng({{ $item->lat}}, {{ $item->long }}),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			panControl:false,
			mapTypeControl:false,
			scaleControl:false,
			overviewMapControl:false,
			rotateControl:false
	  	}
		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        //Marker
        const marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng({{ $item->lat}}, {{ $item->long }}),
        });

        marker.setVisible(isEdit);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

@endpush
