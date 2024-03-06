<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu Edit</h4>
                    <h6>Update your product</h6>
                </div>
            </div>
            <!-- /edit -->
            <form action="{{ route('menu.my.menu.update', [$menu->id]) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="menu_name">Menu Name</label>
                                    <input type="text" class="form-control" id="menu_name" name="menu_name" value="{{ $menu->name }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="menu_price">Price</label>
                                    <input type="number" class="form-control" id="menu_price" min="0.1" step="any" name="menu_price" value="{{ $menu->price }}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="menu_quantity">Quantity</label>
                                    <input type="number" class="form-control" id="menu_quantity" name="menu_quantity" value="{{ $menu->quantity }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="menu_desc">Description</label>
                                    <textarea class="form-control" id="menu_desc" name="menu_desc" required>{{ $menu->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="d-flex flex-wrap">
                                        @php
                                            $selectedCategory = explode(', ', $menu->category);
                                        @endphp
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Breakfast" {{ in_array('Breakfast', $selectedCategory) ? 'checked' : '' }}> Breakfast
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Brunch" {{ in_array('Brunch', $selectedCategory) ? 'checked' : '' }}> Brunch
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Lunch" {{ in_array('Lunch', $selectedCategory) ? 'checked' : '' }}> Lunch
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Beverages" {{ in_array('Beverages', $selectedCategory) ? 'checked' : '' }}> Beverages
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Fast Food" {{ in_array('Fast Food', $selectedCategory) ? 'checked' : '' }}> Fast Food
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Desserts" {{ in_array('Desserts', $selectedCategory) ? 'checked' : '' }}> Desserts
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Snacks" {{ in_array('Snacks', $selectedCategory) ? 'checked' : '' }}> Snacks
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Sweets" {{ in_array('Sweets', $selectedCategory) ? 'checked' : '' }}> Sweets
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Vegetarian" {{ in_array('Vegetarian', $selectedCategory) ? 'checked' : '' }}> Vegetarian
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Cuisine" {{ in_array('Cuisine', $selectedCategory) ? 'checked' : '' }}> Cuisine
                                            </label>
                                        </div>
                                    </div>
                                    <div id="categoryError" class="invalid-feedback">Please select at least one category.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title">Uploaded Image</div>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ asset('uploads/images/'.$menu->image) }}" class="image-popup">
                                                    <img src="{{ asset('uploads/images/'.$menu->image) }}" class="img-fluid" alt="image">
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
                                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="menu_image">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('menu.list') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /edit -->
        </div>
    </div>
</x-app-layout>
<script>
    function validateForm() {
        var categoryCheckboxes = document.getElementsByName("menu_category[]");
        var categoryChecked = false;
        
        for (var i = 0; i < categoryCheckboxes.length; i++) {
            if (categoryCheckboxes[i].checked) {
                categoryChecked = true;
                break;
            }
        }
        
        if (!categoryChecked) {
            document.getElementById("categoryError").style.display = "block";
            return false;
        }
        
        return true;
    };
</script>