<x-app-layout>
    <style>

.fade-effect {
    opacity: 0.5; /* Adjust the opacity value as needed */
    filter: blur(2px); /* Apply a blur effect */
    transition: opacity 0.3s ease-in-out; /* Add a smooth transition */
}

.fade-effect:hover {
    opacity: 1; /* Restore full opacity on hover */
    filter: none; /* Remove the blur effect on hover */
}
    </style>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
            <div class="page-header ">
                <div class="page-title">
                    <h4>Kiosk</h4>
                    <h6>All available kiosk</h6>
                </div>
            </div>
            @foreach ($kiosks as $kiosk)
            <div class="col-lg-3 col-md-4 d-flex">
                <div class="card flex-fill bg-white @if ($kiosk->status == 'CLOSE') fade-effect @endif">
                    <img alt="Card Image" src="{{ asset('uploads/images/'.$kiosk->image) }}" class="card-img-top mx-auto" style="max-width: 213px; max-height: 213px;">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{$kiosk->name}}</h5>
                        <a class="btn @if ($kiosk->status == 'OPEN') btn-outline-success @else btn-outline-danger @endif active " style="color: white !important;" >{{$kiosk->status}}</a>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><i class="fa-solid fa-location-dot"></i>&nbsp; {{$kiosk->address}}</p>
                        <p class="card-text"><i class="fa-solid fa-calendar"></i>&nbsp; {{$kiosk->opening_day}}</p>
                        <p class="card-text"><i class="fa-solid fa-clock"></i>&nbsp; {{$kiosk->opening_time}} - {{$kiosk->closing_time}}</p>
                        <a class="btn btn-rounded btn-outline-primary" href="{{ route('kiosk.info', [$kiosk->id]) }}">More Info</a>
                    </div>
                </div>
            </div>
        @endforeach

            </div>

        </div>
    </div>
</x-app-layout>