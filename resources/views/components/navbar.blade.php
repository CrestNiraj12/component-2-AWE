
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/"><h2>Sasto <em>Store</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
              <a class="nav-link" href="/">Home
              </a>
            </li> 
            <li class="nav-item {{ Request::is('products*') ? "active" : "" }}">
              <a class="nav-link " href="/products">Our Products</a>
            </li>
            <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
              <a class="nav-link " href="/about">About Us</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
              <a class="nav-link " href="/contact">Contact Us</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endguest
            @auth
                @can("access-dashboard")
                  <li class="nav-item">
                      <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                  </li>
                @endcan
                @can("buy-product")
                  <li class="nav-item  {{ Request::is('cart') ? "active" : "" }}">
                      <a class="nav-link" href="/cart">Cart <span id="productsCount" class="hide badge badge-danger"></span></a>
                  </li>
                @endcan
                <li class="nav-item">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
                </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>

    <script>
      $.ajax({
          type: "GET",
          url: "{{ route('cart-products-count') }}",
          dataType: 'json',
          success: function (data) {
            if (data > 0) {
              $("#productsCount").html(data).removeClass("hide");
            }
          },
          error: function (err) {
              console.error(err.responseJSON);
          },
      });
    </script>
