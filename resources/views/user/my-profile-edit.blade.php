<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Edit My Profile</h4>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('my.profile.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{$user->email}}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_num" value="{{$user->phone_num}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <input type="text" value="{{$user->user_type}}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="{{ route('my.profile.show') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>