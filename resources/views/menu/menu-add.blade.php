<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu Add</h4>
                    <h6>Create new menu</h6>
                </div>
            </div>
            <!-- /add -->
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="menu_name">Menu Name</label>
                                    <input type="text" class="form-control" id="menu_name" name="menu_name" required>
                                    <div class="invalid-feedback">Please enter a menu name.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="menu_price">Price</label>
                                    <input type="number" class="form-control" id="menu_price" min="0.1" step="any" name="menu_price" required>
                                    <div class="invalid-feedback">Please enter a valid price.</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="menu_quantity">Quantity</label>
                                    <input type="number" class="form-control" id="menu_quantity" name="menu_quantity" required>
                                    <div class="invalid-feedback">Please enter a valid quantity.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="menu_desc">Description</label>
                                    <textarea class="form-control" id="menu_desc" name="menu_desc" required></textarea>
                                    <div class="invalid-feedback">Please enter a description.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="d-flex flex-wrap">
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Beverages"> Beverages
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Breakfast"> Breakfast
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Brunch"> Brunch
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Desserts"> Desserts
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Fast Food"> Fast Food
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Lunch"> Lunch
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Snacks"> Snacks
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Sweets"> Sweets
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="menu_category[]" value="Vegetarian"> Vegetarian
                                            </label>
                                        </div>
                                    </div>
                                    <div id="categoryError" class="invalid-feedback">Please select at least one category.</div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="kiosk_image" class="form-label">Kiosk Image</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                                <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="menu_image" id="menu_image" required>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
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
            <!-- /add -->
        </div>
    </div>
</x-app-layout>

<script>
    function validateForm() {
        var checkboxes = document.getElementsByName("menu_category[]");
        var isChecked = false;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                isChecked = true;
                break;
            }
        }

        if (!isChecked) {
            document.getElementById("categoryError").style.display = "block";
            return false;
        } else {
            document.getElementById("categoryError").style.display = "none";
        }
    }
</script>
