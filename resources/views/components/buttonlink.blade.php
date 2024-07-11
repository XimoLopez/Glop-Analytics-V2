<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border-2 border-[#2DBD6B] rounded-md font-semibold text-xs text-[#2DBD6B] uppercase tracking-widest hover:bg-[#4DDD8B] hover:text-[#ffffff] hover:border-transparent focus:bg-[#4DDD8B] focus:text-[#ffffff] focus:border-transparent active:bg-[#2DBD6B] active:text-[#ffffff] active:border-transparent focus:outline-none focus:ring-2 focus:ring-[#2DBD6B] focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
