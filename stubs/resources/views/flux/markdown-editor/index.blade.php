@props([
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'label' => null,
    'description' => null,
    'invalid' => null,
])

@php
    $invalid ??= ($name && $errors->has($name));

    $containerClasses = Flux::classes()
        ->add('relative rounded-lg border transition-all duration-200')
        ->add($invalid ? 'border-red-500' : 'border-zinc-200 border-b-zinc-300/80 dark:border-white/10')
        ->add('bg-white dark:bg-zinc-900')
        ->add('overflow-hidden group focus-within:ring-[3px] focus-within:ring-indigo-500/15 focus-within:border-indigo-500');
@endphp

<flux:field>
    @if ($label) <flux:label>{{ $label }}</flux:label> @endif

    <div
        x-data="{
            content: @entangle($attributes->wire('model')),
            easyMDE: null,
            async init() {
                if (typeof EasyMDE === 'undefined') { await this.loadAssets(); }

                this.easyMDE = new EasyMDE({
                    element: this.$refs.editor,
                    initialValue: this.content || '',
                    spellChecker: false,
                    status: false,
                    nativeSpellcheck: true,
                    autoDownloadFontAwesome: true,
                    forceSync: true,
                    toolbar: [
                        'bold', 'italic', '|',
                        'heading-1', 'heading-2', 'heading-3', '|',
                        'quote', 'unordered-list', 'ordered-list', '|',
                        'link', 'image', '|', 'preview'
                    ],
                });

                this.easyMDE.codemirror.on('change', () => { this.content = this.easyMDE.value(); });
                this.$watch('content', value => {
                    if (value !== this.easyMDE.value()) this.easyMDE.value(value || '');
                });
            },
            loadAssets() {
                return Promise.all([
                    this.loadScript('https://unpkg.com/easymde/dist/easymde.min.js'),
                    this.loadStyle('https://unpkg.com/easymde/dist/easymde.min.css')
                ]);
            },
            loadScript(src) { return new Promise((r) => { const s = document.createElement('script'); s.src = src; s.onload = r; document.head.appendChild(s); }); },
            loadStyle(href) { return new Promise((r) => { const l = document.createElement('link'); l.rel = 'stylesheet'; l.href = href; l.onload = r; document.head.appendChild(l); }); }
        }"
        wire:ignore
        {{ $attributes->class($containerClasses) }}
        data-flux-control
    >
        <textarea x-ref="editor" class="hidden"></textarea>
    </div>

    @if ($description) <flux:description>{{ $description }}</flux:description> @endif
    <flux:error :name="$name" />
</flux:field>
