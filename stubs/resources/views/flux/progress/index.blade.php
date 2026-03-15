@props([
    'value' => 0,
    'size' => 'sm',
    'color' => 'zinc',
])

@php
    $height = match ($size) {
        'xs' => 'h-1',
        'sm' => 'h-1.5',
        'md' => 'h-2',
        'lg' => 'h-3',
        default => 'h-1.5',
    };

    $barClasses = Flux::classes()
        ->add('h-full rounded-full transition-all duration-500')
        ->add(match ($color) {
            'zinc'    => 'bg-zinc-800 dark:bg-white',
            'red'     => 'bg-red-500 dark:bg-red-600',
            'amber'   => 'bg-amber-400 dark:bg-amber-500',
            'emerald' => 'bg-emerald-500 dark:bg-emerald-600',
            'blue'    => 'bg-blue-600 dark:bg-blue-500',
            default   => 'bg-zinc-800 dark:bg-white',
        });

    $containerClasses = Flux::classes()
        ->add($height . ' w-full rounded-full overflow-hidden')
        ->add('bg-zinc-800/10 dark:bg-white/10');
@endphp

<div {{ $attributes->class($containerClasses) }}>
    <div
        {{ $attributes->class($barClasses) }}
        style="width: {{ min(max($value, 0), 100) }}%"
    ></div>
</div>
