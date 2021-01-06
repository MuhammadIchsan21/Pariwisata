@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')
<!-- Header -->
<div class="container">
    <div class="row d-flex flex-column">
        <header class="text-center">
            <h1>
                Explore The Beautiful World
                <br />
                As Easy One Click
            </h1>
            <p class="mt-3">
                You will see beautiful
                <br />
                moment you never see before
            </p>
            <a href="#Pariwisata" class="btn btn-get-started px-4 mt-4"> Get Started </a>
        </header>
    </div>
</div>
<!-- End of header -->

<!-- content -->
<main>
    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center section-birth-death" id="Pariwisata">
                <h2 class="text-center mt-3 travel">Travel</h2>
                {{-- <!-- Search form -->
                <div class="active-cyan-3 active-cyan-4 mb-4">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" />
                </div> --}}
                <section class="section-popular-content" id="popularContent">
                    <div class="container">
                        <div class="section-popular-travel row justify-content-center">
                            @foreach ($items as $item)
                            {{-- ngelooping bagian controller --}}
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card-travel text-center d-flex flex-column"
                                    style="background-image: url('{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}');">
                                    <div class="travel-country">{{$item->location}}</div>
                                    <div class="travel-location">{{$item->title}}</div>
                                    <div class="travel-button mt-auto">
                                        <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-details px-4">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End of Content-->
</main>
<!-- End of content -->
@endsection
