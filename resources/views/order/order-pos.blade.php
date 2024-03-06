<x-app-layout>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-sm-12 tabs_wrapper">
                    <div class="page-header ">
                        <div class="page-title">
                            <h4>POS</h4>
                            <h6>Checkout your customer Order</h6>
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
                                <div class="row ">
                                    @foreach ($menus as $menu)
                                        @php
                                            $categories = explode(", ", $menu->category);
                                        @endphp
                                        @if (in_array($category, $categories))
                                            <div class="col-sm-3 d-flex ">
                                                <div class="productset flex-fill @if ($menu->quantity <= 0) fade-effect @endif">
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
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <input type="number" class="form-control" id="quantity" value="1" hidden>
                                                        <button type="button" class="btn btn-primary btn-sm" name="addToCartButton" onclick="addToCart('{{$menu->name}}', '{{$menu->image}}', parseFloat('{{$menu->price}}'), 1, this)">Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach    
                                </div>
                            </div>
                        @endforeach    
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 ">
                    <div class="order-list">
                        <div class="orderid">
                            <h4>Order List</h4>
                            <!-- <h5>Transaction id : #65565</h5> -->
                        </div>
                    </div>
                    <form action="{{ route('invoice.checkout') }}" method="POST" enctype="multipart/form-data" id="pos">
                        @csrf
                        <div class="card card-order">
                            <div class="split-card">
                            </div>
                            <div class="card-body pt-0">
                                <div class="totalitem">
                                    <h4>Total items : <span id="totalItems">0</span></h4>
                                    <a href="#" onclick="clearCart(); return false;">Clear All</a>
                                </div>
                                <div class="product-table" id="cartItems">
                                    <!-- item will be dynamiccally display here -->
                                </div>
                            </div>
                            <div class="split-card">
                            </div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li class="total-value">
                                            <h5>Total </h5>
                                            <h6><span id="totalPrice">RM0.00</span></h6>

                                        </li>
                                    </ul>
                                </div>
                                <div class="setvaluecash">
                                    <style>
                                        .setvaluecash ul li a.active {
                                            border-color: #7367f0;
                                            /* Replace with the desired color for the active state */
                                        }
                                    </style>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" class="paymentmethod" data-value="cash">
                                                <img src="{{ asset('build') }}/assets/img/icons/cash.svg" alt="img" class="me-2">
                                                Cash
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="paymentmethod" data-value="debit">
                                                <img src="{{ asset('build') }}/assets/img/icons/debitcard.svg" alt="img" class="me-2">
                                                Debit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="paymentmethod" data-value="scan">
                                                <img src="{{ asset('build') }}/assets/img/icons/scan.svg" alt="img" class="me-2">
                                                Scan
                                            </a>
                                        </li>
                                    </ul>
                                    <input type="hidden" id="payment_method" name="payment_method" value="">
                                    <!-- Modal -->
                                    <div id="paymentModal" class="modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle"></h5>
                                                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" id="inputAmount" class="form-control" placeholder="Enter amount">
                                                        <br>
                                                        <input type="text" id="inputReference" class="form-control" placeholder="Enter reference number">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                                    <p id="balance"></p>
                                                    <!-- Hidden input for total price -->
                                                    <span id="totalAmount">
                                                        <input type="number" name="total_amount" value="0" hidden>
                                                    </span>
                                                    <span id="totalPaid"></span>
                                                    <span id="totalBalance"></span>
                                                    <span id="scan_debit_reference"></span>
                                                    <span id="paymentMethod"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            $('.paymentmethod .close-modal').click(function() {
                                                // Remove the 'active' class from all payment method options
                                                $('.paymentmethod').removeClass('active');

                                                // Add the 'active' class to the clicked payment method option
                                                $(this).addClass('active');

                                                // Get the selected payment method value
                                                var paymentMethod = $(this).data('value');

                                                // Set the value of the hidden input field
                                                $('#payment_method').val(paymentMethod);
                                            });
                                        });
                                    </script>
                                    <script>
                                        // Get the modal element
                                        var modal = document.getElementById('paymentModal');

                                        // Get the <span> element that closes the modal
                                        var closeBtn = document.getElementsByClassName('close')[0];

                                        // Get the payment method links
                                        var paymentLinks = document.getElementsByClassName('paymentmethod');

                                        // Get the modal elements
                                        var modalTitle = document.getElementById('modalTitle');
                                        var inputAmount = document.getElementById('inputAmount');
                                        var inputReference = document.getElementById('inputReference');
                                        var balance = document.getElementById('balance');
                                        var submitButton = document.getElementById('submitButton');

                                        // Get the total amount from the hidden input field
                                        var totalPriceInput = document.querySelector('input[name="total_amount"]');
                                        var totalAmount = parseFloat(totalPriceInput.value);

                                        // Iterate through payment method links and attach click event listeners
                                        for (var i = 0; i < paymentLinks.length; i++) {
                                            paymentLinks[i].addEventListener('click', function() {
                                                var paymentMethod = this.getAttribute('data-value');

                                                // Set the modal title based on the selected payment method
                                                if (paymentMethod === 'cash') {
                                                    modalTitle.textContent = 'Cash Payment';
                                                    inputAmount.placeholder = 'Enter amount';
                                                    inputReference.style.display = 'none';
                                                } else {
                                                    modalTitle.textContent = 'Debit/Scan Payment';
                                                    inputAmount.placeholder = 'Enter amount';
                                                    inputReference.placeholder = 'Enter reference number';
                                                }

                                                // Open the modal
                                                modal.style.display = 'block';
                                            });
                                        }

                                        // When the user enters the amount, calculate the balance
                                        inputAmount.addEventListener('input', function() {
                                            var paymentMethod = modalTitle.textContent.toLowerCase();
                                            var input = inputAmount.value;

                                            var paidAmount = parseFloat(input);

                                            var calculatedBalance = paidAmount - totalAmount;
                                                balance.textContent = 'Balance: ' + calculatedBalance.toFixed(2);


                                            // if (paymentMethod.includes('cash')) {
                                            //     // var paidAmount = parseFloat(input);

                                            //     // Calculate the balance
                                            //     var calculatedBalance = paidAmount - totalAmount;
                                            //     balance.textContent = 'Balance: ' + calculatedBalance.toFixed(2);
                                            // }
                                        });

                                        // When the user clicks on the submit button
                                        submitButton.addEventListener('click', function(event) {
                                            event.preventDefault(); // Prevent the form from submitting

                                            var paymentMethod = modalTitle.textContent.toLowerCase();
                                            var input = inputAmount.value;
                                            var inputRef = inputReference.value;
                                            var paidAmount = parseFloat(input);
                                            var calculatedBalance = paidAmount - totalAmount  ;

                                            // Perform different actions based on the payment method
                                            if (paymentMethod.includes('cash')) {
                                                // var paidAmount = parseFloat(input);

                                                // Calculate the balance
                                                // var calculatedBalance = paidAmount - totalAmount  ;
                                                balance.textContent = 'Balance: ' + calculatedBalance.toFixed(2);
                                                document.getElementById("totalPaid").innerHTML = '<input type="text" name="totalPaid" value="' + paidAmount.toFixed(2) + '" hidden>';
                                                document.getElementById("totalBalance").innerHTML = '<input type="text" name="totalBalance" value="' + calculatedBalance.toFixed(2) + '" hidden>';
                                                document.getElementById("paymentMethod").innerHTML = '<input type="text" name="paymentMethod" value="cash" hidden>';
                                                document.getElementById("scan_debit_reference").innerHTML = '<input type="text" name="scan_debit_reference" value="' + "Not Applicable" + '" hidden>';
                                            } else if (paymentMethod.includes('debit')){
                                                // Handle debit/scan payment method
                                                document.getElementById("totalPaid").innerHTML = '<input type="text" name="totalPaid" value="' + paidAmount.toFixed(2) + '" hidden>';
                                                document.getElementById("totalBalance").innerHTML = '<input type="text" name="totalBalance" value="' + calculatedBalance.toFixed(2) + '" hidden>';
                                                document.getElementById("scan_debit_reference").innerHTML = '<input type="text" name="scan_debit_reference" value="' + inputRef + '" hidden>';
                                                document.getElementById("paymentMethod").innerHTML = '<input type="text" name="paymentMethod" value="debit" hidden>';
                                            }else if (paymentMethod.includes('scan')){
                                                // Handle debit/scan payment method
                                                document.getElementById("totalPaid").innerHTML = '<input type="text" name="totalPaid" value="' + paidAmount.toFixed(2) + '" hidden>';
                                                document.getElementById("totalBalance").innerHTML = '<input type="text" name="totalBalance" value="' + calculatedBalance.toFixed(2) + '" hidden>';
                                                document.getElementById("scan_debit_reference").innerHTML = '<input type="text" name="scan_debit_reference" value="' + inputRef + '" hidden>';
                                                document.getElementById("paymentMethod").innerHTML = '<input type="text" name="paymentMethod" value="scan" hidden>';
                                            }

                                            // Close the modal
                                            modal.style.display = 'none';

                                            // Manually submit the form after performing the desired actions
                                            document.getElementById("pos").submit();
                                        });

                                        // When the user clicks on the close button or outside the modal, close it
                                        closeBtn.addEventListener('click', function() {
                                            modal.style.display = 'none';
                                        });

                                        window.addEventListener('click', function(event) {
                                            if (event.target == modal) {
                                                modal.style.display = 'none';
                                            }
                                        });

                                        function updateTotalAmount() {
                                            var totalPriceInput = document.querySelector('input[name="total_amount"]');
                                            totalAmount = parseFloat(totalPriceInput.value);
                                        }
                                    </script>

                                </div>
                                <!-- <div class="btn-totallabel">

                                    <button type="submit"> Checkout </button>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to add an item to the cart
        function addToCart(itemName, itemImage, itemPrice, buttonIndex, buttonElement) {
            // Get the necessary information from the form
            var quantity = buttonElement.parentNode.querySelector("#quantity").value;

            // Check if the item already exists in the cart
            var existingItemIndex = cartItems.findIndex(function(item) {
                return item.itemName === itemName;
            });

            if (existingItemIndex !== -1) {
                // Item already exists in the cart, remove it from the cart
                cartItems.splice(existingItemIndex, 1);

                // Render the updated cart
                renderCart();

                // Update the total price
                updateTotalPrice();

                // Update the total items
                updateTotalItems();
                // Call the updateTotalAmount function initially
                updateTotalAmount();

                // Change the button text to "Add to Cart"
                buttonElement.innerHTML = "Add to Cart";

                return;
            }

            // Item does not exist in the cart, create a new cart item object
            var totalPrice = itemPrice * parseInt(quantity);
            var cartItem = {
                itemName: itemName,
                itemImage: itemImage,
                itemPrice: itemPrice,
                quantity: parseInt(quantity),
                totalPrice: totalPrice
            };

            // Add the cart item to the cart
            cartItems.push(cartItem);

            // Change the button text to "Remove from Cart"
            buttonElement.innerHTML = "Remove from Cart";

            // Render the updated cart
            renderCart();

            // Update the total price
            updateTotalPrice();

            // Update the total items
            updateTotalItems();

            // Call the updateTotalAmount function initially
            updateTotalAmount();
        }

        // Function to render the cart items
        function renderCart() {
            var cartItemsContainer = document.getElementById("cartItems");
            if (cartItemsContainer === null) return;

            // Clear the existing content
            cartItemsContainer.innerHTML = "";

            // Render the cart items
            cartItems.forEach(function(item, index) {
                var cartItemElement = createCartItemElement(item, index);
                cartItemsContainer.appendChild(cartItemElement);
            });
        }

        // Function to create a cart item element
        function createCartItemElement(item, index) {
            var cartItemElement = document.createElement("div");
            cartItemElement.className = "card mb-2";
            cartItemElement.innerHTML = `
            <div class="card-body">
                <ul class="product-lists">
                    <li class="product-lists-li">
                        <div class="product-item">
                            <div class="productimg">
                                <div class="productimgs">
                                    <img src="{{ asset('uploads') }}/images/${item.itemImage}" alt="img">
                                </div>
                                <div class="productcontet text-center">
                                    <h4>${item.itemName}</h4>
                                    <input type="text" name="item_name[]" value="${item.itemName}" hidden>
                                    <div class="">
                                        <p class="card-text" hidden>RM${item.itemPrice.toFixed(2)}</p>
                                        <input type="number" name="item_price[]" value="${item.itemPrice.toFixed(2)}" hidden>
                                        <p class="text-center text-truncate total-per-item">RM ${item.totalPrice.toFixed(2)}<input class="cart-item-total" name="item_total_price[]" value="${item.totalPrice.toFixed(2)}" hidden></p>
                                    </div>
                                    <div class="increment-decrement">
                                        <div class="input-groups">
                                            <button type="button" value="-" class="btn btn-rounded btn-outline-primary" onclick="editCartItem(${index}, 'decrement')">-</button>
                                            &nbsp;
                                            <input type="number" class="form-control form-control-sm" id="quantity-${index}" value="${item.quantity}" onchange="updateCartItem(${index})" name="item_quantity[]">
                                            &nbsp;
                                            <button type="button" value="+" class="btn btn-rounded btn-outline-primary" onclick="editCartItem(${index}, 'increment')">+</button>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-rounded btn-outline-danger" onclick="deleteCartItem(${index}); return false;">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
                `;

            return cartItemElement;
        }

        // Function to update the quantity and total price of a cart item
        function updateCartItem(index) {
            var quantityInput = document.getElementById(`quantity-${index}`);
            if (quantityInput === null) return;

            var quantity = parseInt(quantityInput.value);
            var item = cartItems[index];

            item.quantity = quantity;
            item.totalPrice = item.itemPrice * quantity;

            // Render the updated cart
            renderCart();

            // Update the total price
            updateTotalPrice();

            // Update the total items
            updateTotalItems();
            // Call the updateTotalAmount function initially
            updateTotalAmount();
        }

        // Function to edit the quantity of a cart item
        function editCartItem(index, operation) {
            var item = cartItems[index];
            var quantityInput = document.getElementById(`quantity-${index}`);
            if (quantityInput === null) return;

            var quantity = parseInt(quantityInput.value);

            if (operation === 'increment') {
                quantity++;
            } else if (operation === 'decrement' && quantity > 1) {
                quantity--;
            }

            quantityInput.value = quantity;

            item.quantity = quantity;
            item.totalPrice = item.itemPrice * quantity;

            // Render the updated cart
            renderCart();

            // Update the total price
            updateTotalPrice();

            // Update the total items
            updateTotalItems();
            // Call the updateTotalAmount function initially
            updateTotalAmount();
        }

        // Function to delete a cart item
        function deleteCartItem(index) {
            // Remove the item from the cartItems array
            cartItems.splice(index, 1);

            // Render the updated cart
            renderCart();

            // Update the total price
            updateTotalPrice();

            // Update the total items
            updateTotalItems();
            // Call the updateTotalAmount function initially
            updateTotalAmount();

            // Change the "Add to Cart" button back to its original state
            var addToCartButton = document.getElementsByName("addToCartButton")[index];
            addToCartButton.innerHTML = "Add to Cart";
        }

        // Function to update the total price
        function updateTotalPrice() {
            var totalPrice = 0;

            cartItems.forEach(function(item) {
                totalPrice += item.totalPrice;
            });

            // document.getElementById("totalPrice").innerText = "RM" + totalPrice.toFixed(2) ;
            document.getElementById("totalPrice").innerHTML = "RM" + totalPrice.toFixed(2) + '<input type="number" name="total_price" value="' + totalPrice.toFixed(2) + '" hidden>';
            document.getElementById("totalAmount").innerHTML = '<input type="number" name="total_amount" value="' + totalPrice.toFixed(2) + '" hidden>';
            // document.getElementById("totalAmount").innerHTML = '<input type="number" name="total_amount" value="' + totalAmount.toFixed(2) + '" hidden>';
            // Call the updateTotalAmount function initially
            updateTotalAmount();


        }

        // Function to update the total items
        function updateTotalItems() {
            var totalItems = 0;

            cartItems.forEach(function(item) {
                totalItems += item.quantity;
            });

            document.getElementById("totalItems").innerText = totalItems;
        }

        function checkout() {}

        // Function to clear the cart
        function clearCart() {
            // Clear the cartItems array
            cartItems = [];

            // Render an empty cart
            renderCart();

            // Update the total price
            updateTotalPrice();

            // Update the total items
            updateTotalItems();
            // Call the updateTotalAmount function initially
            updateTotalAmount();

            // Change the "Add to Cart" buttons back to their original state
            var addToCartButtons = document.getElementsByName("addToCartButton");
            addToCartButtons.forEach(function(button) {
                button.innerHTML = "Add to Cart";
            });
        }

        // Initialize the cart items array
        var cartItems = [];

        // Render the initial cart
        renderCart();

        // Update the total price
        updateTotalPrice();

        // Update the total items
        updateTotalItems();

        // Call the updateTotalAmount function initially
        updateTotalAmount();
    </script>
</x-app-layout>