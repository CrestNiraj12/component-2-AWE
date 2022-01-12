@for ($i=0;$i < $product->get_avg_rating();$i++)
    <i class="fa fa-star"></i>
@endfor
@if ($product->get_avg_rating() < 5)
    @for ($i=0;$i < 5 - $product->get_avg_rating();$i++)
        <i class="fa fa-star-o"></i>
    @endfor
@endif