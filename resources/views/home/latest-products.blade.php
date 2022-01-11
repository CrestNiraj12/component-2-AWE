<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        @foreach ($products as $product)
        <div class="col-md-4">
          <div class="product-item">
              <a href="#"><img style="height:170px;" src="{{ $product->image }}" alt="{{ $product->title }}"></a>
              <div class="down-content">
                <a href="#"><h4 style="max-width: 14rem;white-space:nowrap;text-overflow:ellipsis;overflow: hidden;">{{ $product->title }}</h4></a>
                <h6>${{ $product->price }}</h6>
                <p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2; -webkit-box-orient: vertical;">{{ $product->description }}</p>
                <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <span>Reviews (24)</span>
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
