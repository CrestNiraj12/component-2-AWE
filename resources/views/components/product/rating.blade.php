<span class="product-review spr-starratings spr-review-header-starratings">
    <span class="reviewLink">
        @for ($i=0;$i < $user->pivot->rating;$i++)
            <i class="fa fa-star"></i>
        @endfor
        @if ($user->pivot->rating < 5)
        @for ($i=0;$i < 5 - $user->pivot->rating;$i++)
            <i class="fa fa-star-o"></i>
        @endfor
        @endif
    </span>
</span>