<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Kiosk Info</h4>
                    <h6>Kiosk Information</h6>
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
                                <div class="card-body">
                                    <h5 class="card-title">{{$kiosk->name}}</h5>
                                    <a class="btn btn-outline-success active">{{$kiosk->status}}</a>
                                </div>
                                <div class="card-footer text-muted">
                                    <p class="card-text"><i class="fa-solid fa-store"></i>&nbsp; {{$kiosk->category}}</p>
                                    <p class="card-text"><i class="fa-solid fa-location-dot"></i>&nbsp; {{$kiosk->address}}</p>
                                    <p class="card-text"><i class="fa-solid fa-calendar"></i>&nbsp; {{$kiosk->opening_day}}</p>
                                    <p class="card-text"><i class="fa-solid fa-clock"></i>&nbsp; {{$kiosk->opening_time}} - {{$kiosk->closing_time}}</p>
                                    <p class="card-text"><i class="fa-solid fa-circle-info"></i>&nbsp; {{$kiosk->description}}</p>
                                    <p class="card-text"><i class="fa-solid fa-clipboard-user"></i>&nbsp; {{$kiosk->user->name}}</p>
                                    <p class="card-text"><i class="fa-solid fa-phone"></i>&nbsp; {{$kiosk->phone_num}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 tabs_wrapper" >
                                <div class="page-header ">
                                    <div class="page-title">
                                        <h4>Menu</h4>
                                        <h6>Menu that available on this kiosk.</h6>
                                    </div>
                                </div>
                                <ul class="tabs owl-carousel owl-theme owl-product border-0">
                                    <li class="active" id="Beverages">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/beverages.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Beverages</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Breakfast">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/breakfast.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Breakfast</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Brunch">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/brunch.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Brunch</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Desserts">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/desserts.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Desserts</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Fast Food">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/fast-food.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Fast Food</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Lunch">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/lunch.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Lunch</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Snacks">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/snacks.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Snacks</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Sweets">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/sweets.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Sweets</h6>
                                        </div>
                                    </li>
                                    <li class="" id="Vegetarian">
                                        <div class="product-details">
                                            <img src="{{ asset('build') }}/assets/img/category/vegetarian.png" alt="img" style="max-width: 34px; max-height: 34px;">
                                            <h6>Vegetarian</h6>
                                        </div>
                                    </li>
                                </ul>
                                <div class="tabs_container">
                                @php
                                    $uniqueCategories = [];
                                @endphp
                                @isset($menus)
                                @foreach ($menus as $index => $menu)
                                @php
                                $categories = explode(", ", $menu->category);
                                @endphp
                                @foreach ($categories as $category)
                                @if (!in_array($category, $uniqueCategories))
                                @php
                                $uniqueCategories[] = $category;
                                @endphp
                                @endif
                                @endforeach
                                @endforeach

                                @php
                                sort($uniqueCategories); // Sort the categories alphabetically
                                @endphp

                                @foreach ($uniqueCategories as $index => $category)
                                <div class="tab_content" data-tab="{{$category}}">
                                    <div class="row">
                                        @foreach ($menus as $menu)
                                        @php
                                        $categories = explode(", ", $menu->category);
                                        @endphp
                                        @if (in_array($category, $categories))
                                        <div class="col-lg-2 col-sm-6 d-flex">
                                            <div class="productset flex-fill">
                                                <style>
                                                    .productset .productsetimg img {
                                                        transition: all 0.5s;
                                                        border-radius: 5px 5px 0px 0px;
                                                        max-width: 150px !important;
                                                        max-height: 150px !important;
                                                    }
                                                </style>
                                                <div class="productsetimg">
                                                    <img src="{{ asset('uploads/images/'.$menu->image) }}" alt="img">
                                                    <h6>Qty: {{$menu->quantity}}</h6>
                                                    <div class="check-product">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="productsetcontent">
                                                    <h5>{{$menu->kioskk->name}}</h5>
                                                    <h4>{{$menu->name}}</h4>
                                                    <h6>RM{{ number_format($menu->price, 2) }}</h6>
                                                    <br>
                                                    @if(Auth::user()->user_type == "Customer")
                                                    @if(session('success') && session('menuId') == $menu->id)
                                                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                                        {{ session('success') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    @endif

                                                    @if(session('error') && session('menuId') == $menu->id)
                                                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                                        {{ session('error') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    @endif
                                                    @endif
                                                    @php
                                                    $favouriteMenuIds = Auth::user()->favourites()->pluck('menu_id')->toArray();
                                                    @endphp
                                                    @if(in_array($menu->id, $favouriteMenuIds))
                                                    <form id="favouritedForm"
                                                        action="{{ route('favourite.remove', [$menu->id]) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button id="unfavouriteButton" type="submit"
                                                            class="fa-solid fa-star" style="color: #fbd32c;"></button>
                                                    </form>
                                                    @else
                                                    <form id="favouriteForm"
                                                        action="{{ route('favourite.add', [$menu->id]) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <button id="favouriteButton" type="submit"
                                                            class="fa-regular fa-star" style="color: #fbd32c;"></button>
                                                    </form>
                                                    @endif
                                                    <br>
                                                    <a href="{{ route('menu.info', [$menu->id])}}" type="button"
                                                        class="btn btn-rounded btn-outline-primary">Info</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>


