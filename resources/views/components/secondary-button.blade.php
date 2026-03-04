@props([
    'type' => 'button',
    'disabled' => false,
])

<button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->class([
        // layout — Flowbite alternative: same size as primary
        'inline-flex items-center justify-center gap-2',
        'px-5 py-2.5 rounded-lg',
        'text-sm font-medium',
        'transition-colors duration-150',
    
        // light mode — white bg, gray border, gray text
        'text-gray-900 bg-white',
        'border border-gray-200',
        'hover:bg-gray-100 hover:text-brand-green',
        'focus:outline-none focus:ring-4 focus:ring-gray-100',
    
        // dark mode
        'dark:bg-gray-800 dark:text-gray-200',
        'dark:border-gray-600',
        'dark:hover:bg-gray-700 dark:hover:text-white',
        'dark:focus:ring-gray-700',
    
        // disabled
        'disabled:opacity-50',
        'disabled:cursor-not-allowed',
        'disabled:pointer-events-none',
    ]) }}>
    {{ $slot }}
</button>
