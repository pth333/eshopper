@php
$files = 'http://127.0.0.1:8000'
@endphp

@foreach($dataSearch as $data)
<div class="media">
    <a href="{{ route('showProduct', ['id' => $data->id]) }}" class="pull-left"><img src="{{ $files.$data->feature_image_path}}" width="50" class="media-object"></a>
    <div class="media-body">
        <a href="{{ route('showProduct', ['id' => $data->id]) }}">
            <h4 class="media-heading">{{ $data->name}}</h4>
        </a>
        <p></p>
    </div>
</div>
@endforeach