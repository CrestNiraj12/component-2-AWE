<x-app-layout>

<link rel="stylesheet" href="{{ asset("css/plugins.css") }}">
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset("css/style.css") }}">
<link rel="stylesheet" href="{{ asset("css/responsive.css") }}">

<div id="ProductSection-product-template" style="padding-top: 140px" class="product-template__container prstyle1 container">
    <!--product-single-->
    <div class="product-single">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="product-details-img">
                    <div class="zoompro-wrap product-zoom-right pl-20">
                        <div class="zoompro-span">
                            <img class="zoompro blur-up lazyload" data-zoom-image="{{ $product->image }}" alt="{{ $product->title }}" src="{{ $product->image }}" />
                        </div>
                        <div class="product-labels"><span class="lbl pr-label1">new</span></div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="product-single__meta">
                        <h1 class="product-single__title">{{ $product->title }}</h1>
                        <div class="prInfoRow">
                            <div class="product-stock"> @if ($product->units > 0) <span class="instock ">In Stock</span> @else <span class="outstock hide">Unavailable</span> @endif </div>
                            <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div>
                        </div>
                        <p class="product-single__price product-single__price-product-template">
                            <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                <span id="ProductPrice-product-template"><span class="money">${{ $product->price }}</span></span>
                            </span>
                        </p>
                    <div class="product-single__description rte">
                        <p style="overflow: hidden;text-overflow: ellipsis;
                            display: -webkit-box;
                            -webkit-line-clamp: 4;
                            line-clamp: 4;
                            -webkit-box-orient: vertical;">{{ $product->description }}</p>
                    </div>
                    
                    <div class="display-table shareRow">
                            <div class="display-table-cell medium-up--one-third">
                                <div class="wishlist-btn">
                                    <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                </div>
                            </div>
                            <div class="display-table-cell text-right">
                                <div class="social-sharing">
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                        <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                    </a>
                                    <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                        <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                    </a>
                                    <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                        <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                    </a>
                                 </div>
                            </div>
                        </div>
                        
                    
                </div>
        </div>
    </div>
    <!--End-product-single-->
    <!--Product Tabs-->
    <div class="tabs-listing">
        <ul class="product-tabs">
            <li rel="tab1"><a class="tablink">Product Details</a></li>
            <li rel="tab2"><a class="tablink">Product Reviews</a></li>
        </ul>
        <div class="tab-container">
            <div id="tab1" class="tab-content">
                <div class="product-description rte">
                    <p>{{ $product->description }}</p>
                </div>
            </div>
            
            <div id="tab2" class="tab-content">
                <div id="shopify-product-reviews">
                    <div class="spr-container">
                        <div class="spr-header clearfix">
                            <div class="spr-summary">
                                <span class="product-review"><a class="reviewLink"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i> </a><span class="spr-summary-actions-togglereviews">Based on 6 reviews</span></span>
                            </div>
                        </div>
                        <div class="spr-content">
                            <div class="spr-form clearfix">
                                <form method="post" action="#" id="new-review-form" class="new-review-form">
                                    <h3 class="spr-form-title">Write a review</h3>
                                    <fieldset class="spr-form-contact">
                                        <div class="spr-form-contact-name">
                                          <label class="spr-form-label" for="review_author_10508262282">Name</label>
                                          <input class="spr-form-input spr-form-input-text " id="review_author_10508262282" type="text" name="review[author]" value="" placeholder="Enter your name">
                                        </div>
                                        <div class="spr-form-contact-email">
                                          <label class="spr-form-label" for="review_email_10508262282">Email</label>
                                          <input class="spr-form-input spr-form-input-email " id="review_email_10508262282" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                        </div>
                                    </fieldset>
                                    <fieldset class="spr-form-review">
                                      <div class="spr-form-review-rating">
                                        <label class="spr-form-label">Rating</label>
                                        <div class="spr-form-input spr-starrating">
                                          <div class="product-review"><a class="reviewLink" href="#"><i class="fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i></a></div>
                                        </div>
                                      </div>
                                
                                      <div class="spr-form-review-body">
                                        <label class="spr-form-label" for="review_body_10508262282">Review</label>
                                        <div class="spr-form-input">
                                          <textarea class="spr-form-input spr-form-input-textarea " id="review_body_10508262282" data-product-id="10508262282" name="review[body]" rows="10" placeholder="Write your comments here"></textarea>
                                        </div>
                                      </div>
                                    </fieldset>
                                    <fieldset class="spr-form-actions">
                                        <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                    </fieldset>
                                </form>
                            </div>
                            <div class="spr-reviews">
                                <div class="spr-review">
                                    <div class="spr-review-header">
                                        <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                        <h3 class="spr-review-header-title">Lorem ipsum dolor sit amet</h3>
                                        <span class="spr-review-header-byline"><strong>dsacc</strong> on <strong>Apr 09, 2019</strong></span>
                                    </div>
                                    <div class="spr-review-content">
                                        <p class="spr-review-content-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    <!--End Product Tabs-->
    
    <!--Related Product Slider-->
    <div class="mt-5 related-product grid-products">
        <div class="section-header">
            <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
        </div>
        <div class="productPageSlider">
            @foreach ($relatedProducts as $product)
            <div class="col-12 item">
                <div class="product-image">
                    <a href="{{ "/products" . $product->id }}">
                        <img class="lazyload" data-src="{{ $product->image }}" src="{{ $product->image }}" alt="{{ $product->title }}" title="product">
                    </a>
                </div>
                <div class="product-details text-center">
                    <div class="product-name" style="overflow: hidden;white-space:nowrap;text-overflow:ellipsis">
                        <a href="{{ "/products" . $product->id }}">{{ $product->title }}</a>
                    </div>
                    <div class="product-price">
                        <span class="price">${{ $product->price }}</span>
                    </div>
                    
                    <div class="product-review">
                        <i class="font-13 fa fa-star"></i>
                        <i class="font-13 fa fa-star"></i>
                        <i class="font-13 fa fa-star"></i>
                        <i class="font-13 fa fa-star-o"></i>
                        <i class="font-13 fa fa-star-o"></i>
                    </div>
                </div>
                <!-- End product details -->
            </div>
            @endforeach
           
            </div>
        </div>
    <!--End Related Product Slider-->
    </div>
<!--#ProductSection-product-template-->
</div>
<!--MainContent-->
</div>
<!--End Body Content-->
</div>
</x-app-layout>