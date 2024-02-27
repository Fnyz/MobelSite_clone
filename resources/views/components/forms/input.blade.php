<div>
    <label>{{$label}}</label>
    <input type="{{$type}}" placeholder="{{$message}}"  {{ $attributes->merge(['style' => 'border:1px solid #000;' . $style]) }}>
</div>