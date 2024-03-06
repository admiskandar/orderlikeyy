<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Menu List</h4>
                    <h6>Manage your Menu</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('menu.my.menu.add') }}" class="btn btn-added"><img src="{{ asset('build') }}/assets/img/icons/plus.svg" alt="img" class="me-1">Menu</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('build') }}/assets/img/icons/search-white.svg" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Kiosk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <style>
                                .image-column {
                                    width: 50px;
                                    /* Set your desired width */
                                    max-height: 150px;
                                    /* Let the height adjust based on the image aspect ratio */
                                }

                                .image-column img {
                                    max-width: 100%;
                                    max-height: 100%;
                                }
                            </style>
                            <tbody>
                                @foreach($menus as $menu)
                                <tr>
                                    <td>{{$menu->name}}</td>
                                    <td>RM {{ number_format($menu->price, 2) }}</td>
                                    <td>{{$menu->category}}</td>
                                    <td>{{$menu->quantity}}</td>
                                    <td class="image-column">
                                        <a href="{{ asset('uploads/images/'.$menu->image) }}" class="image-popup">
                                            <img src="{{ asset('uploads/images/'.$menu->image) }}" class="img-fluid" alt="product">
                                        </a>
                                    </td>
                                    <td>{{$menu->kiosk}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- <a class="me-3" href="{{ route('menu.info', [$menu->id])}}">
                                                <img src="{{ asset('build') }}/assets/img/icons/eye.svg" alt="img">
                                            </a> -->
                                            <a class="me-3" href="{{ route('menu.my.menu.edit', [$menu->id])}}">
                                                <img src="{{ asset('build') }}/assets/img/icons/edit.svg" alt="img">
                                            </a>
                                            <a class="confirm-text" href="{{ route('menu.my.menu.destroy', [$menu->id])}}">
                                                <img src="{{ asset('build') }}/assets/img/icons/delete.svg" alt="img">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>