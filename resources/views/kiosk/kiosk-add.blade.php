<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Kiosk Management</h4>
                    <h6>Add Kiosk</h6>
                </div>
            </div>
            <form action="{{ route('kiosk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kiosk_name" class="form-label">Kiosk Name</label>
                                    <input type="text" name="kiosk_name" id="kiosk_name" class="form-control" required>
                                    <div class="invalid-feedback">Please enter a kiosk name.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kiosk_desc" class="form-label">Kiosk Description</label>
                                    <textarea rows="5" cols="5" id="kiosk_desc" class="form-control" placeholder="Enter text here" name="kiosk_desc" required></textarea>
                                    <div class="invalid-feedback">Please enter a kiosk description.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kiosk_address" class="form-label">Kiosk Location</label>
                                    <select class="form-select" id="kiosk_address" name="kiosk_address" required>
                                        <option value="Right Wing">Right Wing</option>
                                        <option value="Left Wing">Left Wing</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a kiosk location.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Kiosk Operating Day</label>
                                    <div class="d-flex flex-wrap">
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="opening_day[]" value="Monday"> Monday
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="opening_day[]" value="Tuesday"> Tuesday
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="opening_day[]" value="Wednesday"> Wednesday
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="opening_day[]" value="Thursday"> Thursday
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="opening_day[]" value="Friday"> Friday
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label class="form-label">Kiosk Operating Hour</label>
                                    <div>
                                        <label for="opening_time">Opening Time:</label>
                                        <input type="time" name="opening_time" id="opening_time" class="form-control" required>
                                        <div class="invalid-feedback">Please enter the opening time.</div>
                                    </div>
                                    <br>
                                    <div>
                                        <label for="closing_time">Closing Time:</label>
                                        <input type="time" name="closing_time" id="closing_time" class="form-control" required>
                                        <div class="invalid-feedback">Please enter the closing time.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kiosk_category" class="form-label">Kiosk Category</label>
                                    <select class="form-select" id="kiosk_category" name="kiosk_category" required>
                                        <option value="Retail" selected>Retail</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a kiosk category.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kiosk_owner" class="form-label">Kiosk Owner</label>
                                    <select class="form-select" id="kiosk_owner" name="kiosk_owner" required>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a kiosk owner.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kiosk_phone_num" class="form-label">Kiosk Contact</label>
                                    <input type="text" name="kiosk_phone_num" id="kiosk_phone_num" class="form-control" required>
                                    <div class="invalid-feedback">Please enter a kiosk contact number.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="kiosk_status" class="form-label">Kiosk Status</label>
                                    <select class="form-select" id="kiosk_status" name="kiosk_status" required>
                                        <option value="">Select a status</option>
                                        <option value="OPEN" selected>OPEN</option>
                                        <option value="CLOSE">CLOSE</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a kiosk status.</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="kiosk_image" class="form-label">Kiosk Image</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                                <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="kiosk_image" id="kiosk_image" required>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                                <div class="invalid-feedback">Please select a kiosk image.</div>
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