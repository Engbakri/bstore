@foreach ($ads as $item)
    {{ $item->slider_title }}
@endforeach

@foreach ($categories as $item)
    {{ $item->category_name }}
@endforeach
