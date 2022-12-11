@extends('layouts.layout')

@section('content')
<section id="home">
    <div class="container">
        <div class="d-flex gap-5 wrap justify-content-center align-items-center">
            <div>
                <h1>Welcome To<br> Fauzan Show Room</h1>
                <p class="mt-3">Fauzan Show Room is a car showroom under EAD Show Room Group</p>
                <div class="d-flex  justify-content-lg-start mt-2">

                </div>
                <div class="d-flex align-items-center gap-5 mt-5">
                    <img src="assets/img/logo-ead.png" alt="logoead" style="width:100px;">
                    <p style="margin-top: 20px; font-size:14px;">Fauzan_1202204056</p>
                </div>
            </div>
            {{-- display image from assets/img --}}
            <img src="assets/img/image.png" alt="" style="width: 750px;height: 500px;">
        </div>
    </div>
</section>
@endsection