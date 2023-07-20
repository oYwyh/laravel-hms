<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['appear','show'])
<x-splade-transition :appear="$appear" :show="$show" {{ $attributes }}>

{{ $slot ?? "" }}
</x-splade-transition>