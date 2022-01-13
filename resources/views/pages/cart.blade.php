<x-app-layout>
    <link rel="stylesheet" href="{{ asset("css/plugins.css") }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/responsive.css") }}">

    <div class="container" style="padding-top: 140px">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 main-col">
                <form action="{{ route("update-cart") }}" method="POST" class="cart style2">
                    @csrf
                    @method("PUT")
                    <table>
                        <thead class="cart__row cart__header">
                            <tr>
                                <th colspan="2" class="text-center">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Total</th>
                                <th class="action">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($cart->products) > 0)
                            @foreach ($cart->products as $product)
                            <input type="hidden" name="products[{{ $loop->index }}][0]" value="{{ $product->id }}" />
                            <tr class="cart__row border-bottom line1 cart-flex border-top">
                                <td class="cart__image-wrapper cart-flex-item">
                                    <a href="{{ "/products/" . $product->id }}"><img class="cart__image" src="{{ $product->image }}" alt="{{ $product->title }}"></a>
                                </td>
                                <td class="cart__meta small--text-left cart-flex-item">
                                    <div class="list-view-item__title">
                                        <a href="{{ "/products/" . $product->id }}">{{ $product->title }}</a>
                                    </div>
                                    
                                    <div class="cart__meta-text">
                                        Category: {{ $product->category->title }}
                                    </div>
                                </td>
                                <td class="cart__price-wrapper cart-flex-item">
                                    <span class="money">${{ $product->price }}</span>
                                </td>
                                <td class="cart__update-wrapper cart-flex-item text-right">
                                    <div class="cart__qty text-center">
                                        <div class="qtyField" >
                                            <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa fa-minus"></i></a>
                                            <input class="cart__qty-input qty" type="text" name="products[{{ $loop->index }}][1]" id="qty" value="{{ $product->pivot->quantity }}" pattern="[0-9]*">
                                            <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right small--hide cart-price">
                                    <div><span class="money">${{ $product->price * $product->pivot->quantity }}</span></div>
                                </td>
                                <td class="text-center small--hide"><a href="{{ route("remove-from-cart", $product->id) }}" class="btn btn--secondary cart__remove" title="Remove item"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @endforeach
                           @else
                            <tr><td colspan="4" style="font-size: 16px">No products in your cart</td></tr>
                        @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-left"><a href="/products" class="btn--link cart-continue"><i class="fa fa-arrow-circle-left"></i> Continue shopping</a></td>
                                @if (count($cart->products) > 0)
                                    <td colspan="3" class="text-right"><button style="cursor: pointer" type="submit" name="update" class="btn--link cart-update"><i class="fa fa-refresh"></i> Update</button></td>
                                @endif
                            </tr>
                        </tfoot>
                </table>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 cart__footer">
                <div class="solid-border">
                  <div class="row">
                      <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Total</strong></span>
                    <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">${{ $cart->getTotalAmount() }}</span></span>
                  </div>
                  <div class="cart__shipping">Free Shipping!</div>
                  @if (count($cart->products) > 0) 
                   <a href="/checkout" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout">Checkout</a>
                   @endif
                </div>

            </div>
        </div>
    </div>
    
</div>
</x-app-layout>