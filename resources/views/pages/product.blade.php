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
                        <h1>{{ $product->title }}</h1>
                        <div class="prInfoRow">
                            <div class="product-stock"> @if ($product->units > 0) <span class="instock ">In Stock</span> @else <span class="outstock hide">Unavailable</span> @endif </div>
                            <div class="product-review">
                                <a class="reviewLink" href="#tab2">
                                    @include("components.product.avg-rating")
                                    <span class="spr-badge-caption">{{ count($product->reviewed_by_users) }} reviews</span></a></div>
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
                                <span class="product-review">
                                    <a class="reviewLink">
                                       @include("components.product.avg-rating")
                                    </a><span class="spr-summary-actions-togglereviews">Based on {{ $product->get_review_count() }} reviews</span></span>
                            </div>
                        </div>
                        <div class="spr-content">
                            <div class="spr-form clearfix">
                                @auth
                                @can("review-product")
                                <form method="POST" action="{{ route("product.review") }}" id="new-review-form" class="new-review-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    <h3 class="spr-form-title">Write a review</h3>
                                    <fieldset class="spr-form-review">
                                      <div class="spr-form-review-rating">
                                        <label class="spr-form-label">Rating</label>
                                        <div class="spr-form-input spr-starrating">
                                            <div id="myRating"></div>
                                        </div>
                                      </div>
                                
                                      <div class="spr-form-review-body">
                                        <label class="spr-form-label" for="review_body_10508262282">Review</label>
                                        <div class="spr-form-input">
                                          <textarea class="spr-form-input spr-form-input-textarea " id="review_body_10508262282" data-product-id="10508262282" name="comment" rows="10" placeholder="Write your comments here" required></textarea>
                                        </div>
                                      </div>
                                    </fieldset>
                                    <fieldset class="spr-form-actions">
                                        <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                    </fieldset>
                                </form>
                                @endcan
                                @endauth
                                @cannot("review-product")
                                    <p>You need to be logged in as Customer to review the product. Please <a href="/login">login</a>.
                                @endcannot
                            </div>
                            @if($product->get_review_count() > 0)
                                <div class="spr-reviews">
                                    @foreach ($product->reviewed_by_users as $user)
                                        <div class="spr-review">
                                            <div class="spr-review-header">
                                                @include("components.product.rating")
                                                <h3 class="spr-review-header-title">{{ $user->name }}</h3>
                                                <span class="spr-review-header-byline"><strong>posted</strong> on <strong>{{  $user->pivot->created_at->diffForHumans() }}</strong></span>
                                            </div>
                                            <div class="spr-review-content">
                                                <p class="spr-review-content-body">{{ $user->pivot->comment }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No reviews found!</p>
                            @endif
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
                    <a href="{{ "/products/" . $product->id }}">
                        <img class="lazyload" data-src="{{ $product->image }}" src="{{ $product->image }}" alt="{{ $product->title }}" title="product">
                    </a>
                </div>
                <div class="product-details text-center">
                    <div class="product-name" style="overflow: hidden;white-space:nowrap;text-overflow:ellipsis">
                        <a href="{{ "/products/" . $product->id }}">{{ $product->title }}</a>
                    </div>
                    <div class="product-price">
                        <span class="price">${{ $product->price }}</span>
                    </div>
                    
                    <div class="product-review">
                        @include("components.product.avg-rating")
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
<script src="{{ asset("js/emotion-ratings.min.js")}}"></script>

<script>
    var emotionsArray = {
        angry: "&#x1F620;",
        disappointed: "&#x1F61E;",
        meh: "&#x1F610;", 
        happy: "&#x1F60A;",
        smile: "&#x1F603;",
        wink: "&#x1F609;",
        laughing: "&#x1F606;",
        inLove: "&#x1F60D;",
        heart: "&#x2764;",
        crying: "&#x1F622;",
        star: "&#x2B50;",
    };

    var emotionsArray = ['angry','disappointed','meh', 'happy', 'inLove'];
    $("#myRating").emotionsRating({
        emotions: emotionsArray,
        emotionSize: 20,
        inputName: "rating"
    });
</script>
</x-app-layout>