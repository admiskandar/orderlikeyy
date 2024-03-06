<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Kiosk Management</h4>
                    <h6>Edit Kiosk</h6>
                </div>
            </div>
            <form action="{{ route('kiosk.update', [$kiosk->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Name</label>
                                    <input type="text" name="kiosk_name" class="form-control" value="{{$kiosk->name}}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Description</label>
                                    <textarea rows="5" class="form-control" placeholder="Enter text here" name="kiosk_desc" required>{{$kiosk->description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Location</label>
                                    <select class="form-select" name="kiosk_address" required>
                                        <option value="Right Wing" {{ $kiosk->status == 'Right Wing' ? 'selected' : '' }}>Right Wing</option>
                                        <option value="Left Wing" {{ $kiosk->status == 'Left Wing' ? 'selected' : '' }}>Left Wing</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Contact</label>
                                    <input type="text" name="kiosk_phone_num" class="form-control" value="{{$kiosk->phone_num}}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Operating Day</label>
                                    <div>
                                        @php
                                            $selectedOpeningDays = explode(', ', $kiosk->opening_day);
                                        @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="opening_day[]" value="Monday" {{ in_array('Monday', $selectedOpeningDays) ? 'checked' : '' }}>
                                            <label class="form-check-label">Monday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="opening_day[]" value="Tuesday" {{ in_array('Tuesday', $selectedOpeningDays) ? 'checked' : '' }}>
                                            <label class="form-check-label">Tuesday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="opening_day[]" value="Wednesday" {{ in_array('Wednesday', $selectedOpeningDays) ? 'checked' : '' }}>
                                            <label class="form-check-label">Wednesday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="opening_day[]" value="Thursday" {{ in_array('Thursday', $selectedOpeningDays) ? 'checked' : '' }}>
                                            <label class="form-check-label">Thursday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="opening_day[]" value="Friday" {{ in_array('Friday', $selectedOpeningDays) ? 'checked' : '' }}>
                                            <label class="form-check-label">Friday</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Operating Hour</label>
                                    <div class="mb-3">
                                        <label for="opening_time" class="form-label">Opening Time:</label>
                                        <input type="time" name="opening_time" id="opening_time" class="form-control" value="{{ $kiosk->opening_time ?? '' }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="closing_time" class="form-label">Closing Time:</label>
                                        <input type="time" name="closing_time" id="closing_time" class="form-control" value="{{ $kiosk->closing_time ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Category</label>
                                    <select class="form-select" name="kiosk_category" required>
                                        <option value="Retail" selected>Retail</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Owner</label>
                                    <select class="form-select" name="kiosk_owner" required>
                                        @if ($kiosk->user)
                                            <option value="{{$kiosk->user->id}}" selected disabled>{{$kiosk->user->name}}</option>
                                        @endif
                                        <!-- Add options for kiosk owners -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kiosk Status</label>
                                    <select class="form-select" name="kiosk_status" required>
                                        <option value="OPEN" {{ $kiosk->status == 'OPEN' ? 'selected' : '' }}>OPEN</option>
                                        <option value="CLOSE" {{ $kiosk->status == 'CLOSE' ? 'selected' : '' }}>CLOSE</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Uploaded Image</div>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ asset('uploads/images/'.$kiosk->image) }}" class="image-popup">
                                                    <img src="{{ asset('uploads/images/'.$kiosk->image) }}" class="img-fluid" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label class="form-label">New Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="kiosk_image">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a href="{{ route('kiosk.list') }}" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>



