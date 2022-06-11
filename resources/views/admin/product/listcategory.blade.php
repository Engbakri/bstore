@foreach ($product->categories() as $item)
    {{ $item->category_name }}
@endforeach