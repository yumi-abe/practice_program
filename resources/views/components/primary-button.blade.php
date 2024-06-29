<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-brown-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-brown-400  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
