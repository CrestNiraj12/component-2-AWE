<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="/products">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        @foreach ($products as $product)
        <div class="col-md-4">
          <div class="product-item">
              <a href="{{ "/products/" . $product->id }}"><img src="{{ $product->image }}" alt="{{ $product->title }}"></a>
              <div class="down-content">
                <a href="{{ "/products/" . $product->id }}"><h4>{{ $product->title }}</h4></a>
                <h6>${{ $product->price }}</h6>
                <p>{{ $product->description }}</p>
                <ul class="stars">
                  @include("components.product.avg-rating")
                </ul>
                <span>Reviews ({{ $product->get_review_count() }})</span>
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
