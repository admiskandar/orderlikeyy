<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>My Kiosk</h4>
                    <h6>Your Kiosk Information</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card flex-fill bg-white">
                                <div class="card-header">
                                    <a href="{{ asset('uploads/images/'.$kiosk->image) }}" class="image-popup">
                                        <img src="{{ asset('uploads/images/'.$kiosk->image) }}" class="card-img-top" alt="image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card flex-fill bg-white">
                                <div class="card-body d-flex justify-content-between">
                                    <div>
                                        <h5 class="card-title">{{$kiosk->name}}</h5>
                                        <button class="btn @if ($kiosk->status == 'OPEN') btn-outline-success @else btn-outline-danger @endif active" id="statusBtn" data-kiosk-id="{{$kiosk->id}}" type="button">{{$kiosk->status}}</button>

                                    </div>
                                    <div>
                                        <a href="{{ route('kiosk.my.kiosk.edit', [$kiosk->id])}}" class="btn btn-primary">Edit Info</a>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <p class="card-text"><i class="fa-solid fa-store"></i>&nbsp; {{$kiosk->category}}</p>
                                    <p class="card-text"><i class="fa-solid fa-location-dot"></i>&nbsp; {{$kiosk->address}}</p>
                                    <p class="card-text"><i class="fa-solid fa-calendar"></i>&nbsp; {{$kiosk->opening_day}}</p>
                                    <p class="card-text"><i class="fa-solid fa-clock"></i>&nbsp; {{$kiosk->opening_time}} - {{$kiosk->closing_time}}</p>
                                    <p class="card-text"><i class="fa-solid fa-circle-info"></i>&nbsp; {{$kiosk->description}}</p>
                                    <p class="card-text"><i class="fa-solid fa-clipboard-user"></i>&nbsp; {{$kiosk->user->name}}</p>
                                    <p class="card-text"><i class="fa-solid fa-phone"></i>&nbsp; {{$kiosk->phone_num}}</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <script>
                            document.getElementById('statusBtn').addEventListener('click', function() {
                                var confirmation = confirm("Are you sure you want to change the status?");
                                if (confirmation) {
                                    var statusBtn = document.getElementById('statusBtn');
                                    var currentStatus = statusBtn.textContent.trim();
                                    var newStatus = currentStatus === 'OPEN' ? 'CLOSE' : 'OPEN';
                                    var kioskId = statusBtn.dataset.kioskId;

                                    var form = document.createElement('form');
                                    form.method = 'POST';
                                    form.action = '/kiosk/' + kioskId + '/status';

                                    var statusInput = document.createElement('input');
                                    statusInput.type = 'hidden';
                                    statusInput.name = 'status';
                                    statusInput.value = newStatus;
                                    form.appendChild(statusInput);

                                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                                    var csrfInput = document.createElement('input');
                                    csrfInput.type = 'hidden';
                                    csrfInput.name = '_token';
                                    csrfInput.value = csrfToken;
                                    form.appendChild(csrfInput);

                                    document.body.appendChild(form);
                                    form.submit();
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>