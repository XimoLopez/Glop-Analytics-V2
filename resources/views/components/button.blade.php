<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#2DBD6B] border-2 border-transparent rounded-md font-semibold text-xs text-white justify-center uppercase tracking-widest hover:bg-[#4DDD8B] focus:bg-[#4DDD8B] active:bg-[#2DBD6B] focus:outline-none focus:ring-2 focus:ring-[#2DBD6B] focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
