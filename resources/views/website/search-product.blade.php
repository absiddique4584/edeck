@if($search_p->isEmpty())
    <h3 class="text-center text-danger"><strong>Product Not Found!</strong></h3>
@else

    <ul>
        @foreach($search_p as $product)
            <li><a href="">{{ $product->name }}</a></li>
        @endforeach
    </ul>
@endif
