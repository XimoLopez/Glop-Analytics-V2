@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#2DBD6B] focus:ring-[#2DBD6B] rounded-md shadow-sm']) !!}>
