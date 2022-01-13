<x-app-layout>
<link rel="stylesheet" href="{{ asset("css/plugins.css") }}">
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset("css/style.css") }}">
<link rel="stylesheet" href="{{ asset("css/responsive.css") }}">

<div id="page-content" style="padding-top: 80px">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Checkout</h1></div>
          </div>
    </div>
    <!--End Page Title-->
    <form action="{{ route("payment") }}" method="POST" novalidate>
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                <div class="customer-box customer-coupon">
                    <div id="have-coupon" class="collapse coupon-checkout-content">
                        <div class="discount-coupon">
                            <div id="coupon" class="coupon-dec tab-pane active">
                                <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                <label class="required get" for="coupon-code"><span class="required-f">*</span> Coupon</label>
                                <input id="coupon-code" required="" type="text" class="mb-3">
                                <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row billing-fields">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                <div class="create-ac-content bg-light-gray padding-20px-all">
                        <fieldset>
                            <h2 class="login-title mb-3">Billing details</h2>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-firstname">First Name <span class="required-f">*</span></label>
                                    @auth 
                                    <input name="first_name" value="{{ old("first_name") ?? Auth::user()->getFirstName() }}" id="input-firstname" type="text">
                                    @endauth 
                                    @guest
                                    <input name="first_name" value="{{ old("first_name") ?? "" }}" id="input-firstname" type="text">
                                    @endguest
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-lastname">Last Name <span class="required-f">*</span></label>
                                    @auth 
                                        <input name="last_name" value="{{ old("last_name") ?? Auth::user()->getLastName() }}" id="input-lastname" type="text">
                                    @endauth
                                    @guest
                                        <input name="last_name" value="{{ old("last_name") ?? "" }}" id="input-lastname" type="text">
                                    @endguest
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                    @auth 
                                        <input name="email" value="{{ old("email") ?? Auth::user()->email }}" id="input-email" type="email">
                                    @endauth
                                    @guest
                                        <input name="email" value="{{ old("email") ?? "" }}" id="input-email" type="email">
                                    @endguest
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-telephone">Phone <span class="required-f">*</span></label>
                                    <input name="phone" value="{{ old("phone") ?? "" }}" value="" id="input-telephone" type="text">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                    <label for="input-company">Company</label>
                                    <input name="company" value="{{ old("company") ?? "" }}" id="input-company" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-address-1">Address <span class="required-f">*</span></label>
                                    <input name="address_1" value="{{ old("address_1") ?? "" }}" id="input-address-1" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                    <label for="input-address-2">Street Address <span class="required-f">*</span></label>
                                    <input name="address_2" value="{{ old("address_2") ?? "" }}" id="input-address-2" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-city">City <span class="required-f">*</span></label>
                                    <input name="city" value="{{ old("city") ?? "" }}" id="input-city" type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-postcode">Postal Code <span class="required-f">*</span></label>
                                    <input name="postal_code" value="{{ old("postal_code") ?? "" }}" id="input-postcode" type="text">
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-country">Country <span class="required-f">*</span></label>
                                    <select name="country" id="input-country">
                                        <option value=""> --- Please Select --- </option>
                                        <option value="Nepal" {{ old("country") != null ? (old("country") == "Nepal" ? "selected" : "") : "" }}>Nepal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                    <label for="input-zone">Region / State <span class="required-f">*</span></label>
                                    <select name="state" id="input-zone">
                                        <option value=""> --- Please Select --- </option>
                                        <option value="Province No. 1" {{ old("state") != null ? (old("state") == "Province No. 1" ? "selected" : "") : "" }}>Province No. 1</option>
                                        <option value="Province No. 2" {{ old("state") != null ? (old("state") == "Province No. 2" ? "selected" : "") : "" }}>Province No. 2</option>
                                        <option value="Province No. 3" {{ old("state") != null ? (old("state") == "Province No. 3" ? "selected" : "") : "" }}>Province No. 3</option>
                                        <option value="Gandaki Pradesh" {{ old("state") != null ? (old("state") == "Gandaki Pradesh" ? "selected" : "") : "" }}>Gandaki Pradesh</option>
                                        <option value="Province No. 5" {{ old("state") != null ? (old("state") == "Province No. 5" ? "selected" : "") : "" }}>Province No. 5</option>
                                        <option value="Karnali Pradesh" {{ old("state") != null ? (old("state") == "Karnali Pradesh" ? "selected" : "") : "" }}>Karnali Pradesh</option>
                                        <option value="Sudurpashchim Pradesh" {{ old("state") != null ? (old("state") == "Sudurpashchim Pradesh" ? "selected" : "") : "" }}>Sudurpashchim Pradesh</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="your-order-payment">
                    <div class="your-order">
                        <h2 class="order-title mb-4">Your Order</h2>

                        <div class="table-responsive-sm order-table"> 
                            <table class="bg-white table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-left">Product Name</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->products as $product)
                                        <tr>
                                            <td class="text-left">{{ $product->title }}</td>
                                            <td>${{ $product->price }}</td>
                                            <td>{{ $product->pivot->quantity }}</td>
                                            <td>${{ $product->price * $product->pivot->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="font-weight-600">
                                    <tr>
                                        <td colspan="3" class="text-right">Shipping </td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">Total</td>
                                        <td>${{ $cart->getTotalAmount() }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    <hr />

                    <div class="your-payment">
                        <h2 class="payment-title mb-3">payment method</h2>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion" class="payment-section">
                                    <div class="card margin-15px-bottom border-radius-none">
                                        <div class="card-header">
                                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"> Stripe </a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <p class="no-margin font-15">Pay via Stripe; you can pay with your credit card if you don't have a Stripe account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="order-button-payment">
                                <button type="submit" class="btn" value="Place order" type="submit">Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<!--End Body Content-->
</x-app-layout>