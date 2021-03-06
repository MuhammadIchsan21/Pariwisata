@extends('layouts.admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{route('travel-package.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" name="location" placeholder="location" class="form-control"
                        value="{{old('location')}}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" rows="10" class="d-block w-100 form-control">{{old('about')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="departure_date">Departure Date</label>
                    <input type="date" name="departure_date" placeholder="departure Date" class="form-control"
                        value="{{old('departure_date')}}">
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" name="duration" placeholder="Duration" class="form-control"
                        value="{{old('duration')}}">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" name="type" placeholder="Type" class="form-control" value="{{old('type')}}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" placeholder="Price" class="form-control" value="{{old('price')}}">
                </div>
                <div class="form-group">
                    <label for="lat">Latitude</label>
                    <input type="text" name="lat" placeholder="Latitude" class="form-control" value="{{old('lat')}}">
                </div>
                <div class="form-group">
                    <label for="long">Longtitude</label>
                    <input type="text" name="long" placeholder="Longtitude" class="form-control"
                        value="{{old('long')}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
