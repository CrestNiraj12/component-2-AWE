<x-app-layout>
<div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>new arrivals</h4>
            <h2>sixteen products</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="filters">
                <ul>
                    <li class="{{ (str_contains(Request::fullUrl(), "cat=All") or Request::is('products')) ? "active" : "" }}" data-filter="All"><a href="{{ "/products/search?cat=All&search_query=" . ($search_query ?? "") }}">All Products</a></li>
                    @foreach ($categories as $category)
                        <li class="{{ (str_contains(Request::fullUrl(), "cat=".$category->title)) ? "active" : "" }}" data-filter="{{ $category->title }}"><a href="{{ "/products/search?cat=" . $category->title . "&search_query=" . ($search_query ?? "")}}">{{ $category->title }}s</a></li>
                    @endforeach
                </ul>
                <form id="searchForm" method="GET" action="{{ route("search") }}">
                    <input type="hidden" name="cat" id="cat" />
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" value="{{ $search_query ?? "" }}" name="search_query" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit" id="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div> 
                </form> 
          </div>
          
        </div>
        <div class="col-md-12">
          <div class="filters-content">
              @if (Request::is("products/search"))
                <h6>Search Result: {{ $paginator->total() }} results found!</h6>
              @endif
              <div class="row grid mt-4">
                  @foreach ($paginator->items() as $product)
                  <div class="col-lg-4 col-md-4 all {{ strtolower($product->category->title) }}">
                    <div class="product-item">
                      <a href="#"><img src="{{ $product->category->image  }}" alt="{{ $product->title }}"></a>
                      <div class="down-content">
                        <a href="#"><h4>{{ $product->title }}</h4></a>
                        <h6>${{ $product->price }}</h6>
                        <p>{{ $product->description }}</p>
                        <ul class="stars">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews (12)</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
          </div>
        </div>
        @include("components.paginator")
      </div>
    </div>
  </div>
  <script type="text/javascript">
    window.onload = function () {
        $(document).on('click', "#search", search);

        function search(e) {
            e.preventDefault();
            var activeCatFilter = $('.products .filters li[class="active"]').attr('data-filter');
            $('#cat').val(activeCatFilter);
            $("#searchForm").submit();
        }
    }

</script>
</x-app-layout>