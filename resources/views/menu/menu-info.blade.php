<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu Details</h4>
                    <h6>Full details of this menu.</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card flex-fill bg-white">
                                        <div class="card-header">
                                            <div class="card-image">
                                                <a href="{{ asset('uploads/images/'.$menu->image) }}" class="image-popup">
                                                    <img src="{{ asset('uploads/images/'.$menu->image) }}" class="img-fluid" alt="image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card flex-fill bg-white">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$menu->name}}</h5>
                                            <p class="card-text">{{$menu->description}}</p>
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-money-bill-1"></i>
                                                <p class="card-text ml-2">RM {{ number_format($menu->price, 2) }}</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-utensils"></i>
                                                <p class="card-text ml-2">{{$menu->category}}</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-box"></i>
                                                <p class="card-text ml-2">{{$menu->quantity}}</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-store"></i>
                                                <p class="card-text ml-2">{{$menu->kioskk->name}}</p>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <a href="{{ route('kiosk.info', [$menu->kiosk])}}" type="button" class="btn btn-rounded btn-outline-primary">{{$menu->kioskk->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>