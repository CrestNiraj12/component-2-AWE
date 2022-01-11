<x-app-layout>
<div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>new arrivals</h4>
            <h2>sasto products</h2>
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
              <div class="select-group form-select custom-search-form">
                <form id="sortForm" method="GET" action="{{ route("search") }}">
                  <input type="hidden" name="cat" id="catValue" />
                  <input type="hidden" name="search_query" id="search_query" />
                  <select id="sort" name="sort" class="form-select" value="{{ $sort ?? "" }}">
                    <option value="ASC" {{ isset($sort) ? ($sort == "ASC" ? "selected" : "") : ""  }}>Ascending</option>
                    <option value="DESC" {{ isset($sort) ? ($sort == "DESC" ? "selected" : "") : ""  }}>Descending</option>
                    <option value="PRICE_ASC" {{ isset($sort) ? ($sort == "PRICE_ASC" ? "selected" : "") : ""  }}>Low to High Price</option>
                    <option value="PRICE_DESC" {{ isset($sort) ? ($sort == "PRICE_DESC" ? "selected" : "") : ""  }}>High to Low Price</option>
                    <option value="RECENT" {{ isset($sort) ? ($sort == "RECENT" ? "selected" : "") : ""  }}>Recent</option>
                  </select>
                </form>
              </div>
                <ul>
                    <li class="{{ (str_contains(Request::fullUrl(), "cat=All") or Request::is('products')) ? "active" : "" }}" data-value="All"><a href="{{ "/products/search?cat=All&search_query=" . ($search_query ?? "") }}">All Products</a></li>
                    @foreach ($categories as $category)
                        <li class="{{ (str_contains(Request::fullUrl(), "cat=".$category->title)) ? "active" : "" }}" data-value="{{ $category->title }}"><a href="{{ "/products/search?cat=" . $category->title . "&search_query=" . ($search_query ?? "")}}">{{ $category->title }}s</a></li>
                    @endforeach
                </ul>
                <form id="searchForm" method="GET" action="{{ route("search") }}">
                    <input type="hidden" name="cat" id="cat" />
                    <div class="input-group custom-search-form">
                        <input id="search_query" type="text" class="form-control" value="{{ $search_query ?? "" }}" name="search_query" placeholder="Search...">
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
                      <a href="{{ "/products/" . $product->id }}"><img src="{{ $product->category->image  }}" alt="{{ $product->title }}"></a>
                      <div class="down-content">
                        <a href="{{ "/products/" . $product->id }}"><h4>{{ $product->title }}</h4></a>
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
        $(document).on('change', "#sort", sort);

        function search(e) {
            e.preventDefault();
            var activeCatFilter = $('.products .filters li[class="active"]').attr('data-value');
            $('#cat').val(activeCatFilter);
            $("#searchForm").submit();
        }

        function sort(e) {
            e.preventDefault();
            var activeCatFilter = $('.products .filters li[class="active"]').attr('data-value');
            var searchQuery = $('#searchForm #search_query').val();
            $('#catValue').val(activeCatFilter);
            $("#search_query").val(searchQuery);
            $("#sortForm").submit();
        }
    }

</script>
</x-app-layout>