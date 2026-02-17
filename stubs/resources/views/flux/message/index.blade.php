{{--@props([--}}
{{--    'position' => 'bottom right',--}}
{{--])--}}

{{--@php--}}
{{--    $classes = Flux::classes()--}}
{{--        ->add('fixed z-[100] pointer-events-none')--}}
{{--        ->add($position === 'bottom right' ? 'bottom-0 right-0' : '')--}}
{{--        ->add($position === 'bottom left' ? 'bottom-0 left-0' : '')--}}
{{--        ->add($position === 'top right' ? 'top-0 right-0' : '')--}}
{{--        ->add($position === 'top left' ? 'top-0 left-0' : '')--}}
{{--        ;--}}
{{--@endphp--}}

{{--<ui-message-group--}}
{{--    x-data--}}
{{--    x-on:message-show.document="$el.showmessage($event.detail)"--}}
{{--    class="{{ $classes }}"--}}
{{--    position="{{ $position }}"--}}
{{--    wire:ignore--}}
{{-->--}}
{{--    <div id="flux-message-container" class="flex flex-col gap-3 p-6 pointer-events-auto"></div>--}}

{{--    <template id="flux-message-template">--}}
{{--        <div data-flux-message-dialog class="transition-all">--}}
{{--            <div class="max-w-sm min-w-[300px] p-3 rounded-xl shadow-xl bg-white border border-zinc-200 dark:bg-zinc-800 dark:border-zinc-700">--}}
{{--                <div class="flex items-start gap-3">--}}
{{--                    <div class="flex-1 flex gap-3">--}}
{{--                        --}}{{-- الأيقونات بناءً على الـ variant --}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=success]_&]:block shrink-0 mt-0.5 size-5 text-lime-600 dark:text-lime-400">--}}
{{--                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm3.844-8.791a.75.75 0 0 0-1.188-.918l-3.7 4.79-1.649-1.833a.75.75 0 1 0-1.114 1.004l2.25 2.5a.75.75 0 0 0 1.15-.043l4.25-5.5Z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=warning]_&]:block shrink-0 mt-0.5 size-5 text-amber-500 dark:text-amber-400">--}}
{{--                            <path fill-rule="evenodd" d="M6.701 2.25c.577-1 2.02-1 2.598 0l5.196 9a1.5 1.5 0 0 1-1.299 2.25H2.804a1.5 1.5 0 0 1-1.3-2.25l5.197-9ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 1 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=danger]_&]:block shrink-0 mt-0.5 size-5 text-rose-500 dark:text-rose-400">--}}
{{--                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />--}}
{{--                        </svg>--}}

{{--                        <div class="flex flex-col">--}}
{{--                            <div class="message-heading font-semibold text-sm text-zinc-900 dark:text-white empty:hidden"></div>--}}
{{--                            <div class="message-text text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed mt-0.5"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <button type="button" class="message-close-btn p-1 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-700 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200 transition-colors">--}}
{{--                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"></path></svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </template>--}}
{{--</ui-message-group>--}}

{{--<script>--}}
{{--    if (! customElements.get('ui-message-group')) {--}}
{{--        customElements.define('ui-message-group', class extends HTMLElement {--}}
{{--            showmessage(detail) {--}}
{{--                if (detail.dataset && detail.dataset.position) {--}}
{{--                    this.setAttribute('position', detail.dataset.position);--}}
{{--                }--}}

{{--                const container = this.querySelector('#flux-message-container');--}}
{{--                const template = this.querySelector('#flux-message-template').content.cloneNode(true);--}}
{{--                const messageEl = template.querySelector('[data-flux-message-dialog]');--}}

{{--                if (detail.dataset && detail.dataset.variant) {--}}
{{--                    messageEl.setAttribute('data-variant', detail.dataset.variant);--}}
{{--                }--}}

{{--                if (detail.slots) {--}}
{{--                    if (detail.slots.heading) messageEl.querySelector('.message-heading').innerText = detail.slots.heading;--}}
{{--                    if (detail.slots.text) messageEl.querySelector('.message-text').innerText = detail.slots.text;--}}
{{--                }--}}

{{--                container.appendChild(messageEl);--}}

{{--                requestAnimationFrame(() => {--}}
{{--                    messageEl.classList.add('showing');--}}
{{--                });--}}

{{--                const closemessage = () => {--}}
{{--                    messageEl.classList.remove('showing');--}}
{{--                    setTimeout(() => messageEl.remove(), 350);--}}
{{--                };--}}

{{--                messageEl.querySelector('.message-close-btn').onclick = closemessage;--}}

{{--                if (detail.duration !== 0) {--}}
{{--                    setTimeout(closemessage, detail.duration || 5000);--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}


@props([
    'position' => 'bottom right',
])

@php
    // نكتفي بالكلاسات الأساسية لأن التموضع سيتم عبر الـ CSS المخصص بناءً على خاصية position
    $classes = Flux::classes()
        ->add('fixed z-[100] pointer-events-none');
@endphp

<ui-message-group
    x-data
    x-on:message-show.document="$el.showmessage($event.detail)"
    class="{{ $classes }}"
    position="{{ $position }}"
    wire:ignore
>
    {{-- هذه الحاوية التي سيتم إضافة الرسائل داخلها --}}
    <div id="flux-message-container" class="flex flex-col gap-3 p-6 pointer-events-auto"></div>

    <template id="flux-message-template">
        {{-- إضافة data-flux-message-dialog ضروري جداً لأن الـ CSS يبحث عنه --}}
        <div data-flux-message-dialog>
            <div class="max-w-sm min-w-[300px] p-3 rounded-xl shadow-xl bg-white border border-zinc-200 dark:bg-zinc-800 dark:border-zinc-700">
                <div class="flex items-start gap-3">
                    <div class="flex-1 flex gap-3">
                        {{-- أيقونات الألوان --}}
                        <div class="shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=success]_&]:block size-5 text-lime-600 dark:text-lime-400">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm3.844-8.791a.75.75 0 0 0-1.188-.918l-3.7 4.79-1.649-1.833a.75.75 0 1 0-1.114 1.004l2.25 2.5a.75.75 0 0 0 1.15-.043l4.25-5.5Z" clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=warning]_&]:block size-5 text-amber-500 dark:text-amber-400">
                                <path fill-rule="evenodd" d="M6.701 2.25c.577-1 2.02-1 2.598 0l5.196 9a1.5 1.5 0 0 1-1.299 2.25H2.804a1.5 1.5 0 0 1-1.3-2.25l5.197-9ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 1 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=danger]_&]:block size-5 text-rose-500 dark:text-rose-400">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                            </svg>
                        </div>

                        <div class="flex flex-col">
                            <div class="message-heading font-semibold text-sm text-zinc-900 dark:text-white empty:hidden"></div>
                            <div class="message-text text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed mt-0.5"></div>
                        </div>
                    </div>

                    <button type="button" class="message-close-btn p-1 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-700 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200 transition-colors">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </template>
</ui-message-group>

<script>
    if (! customElements.get('ui-message-group')) {
        customElements.define('ui-message-group', class extends HTMLElement {
            showmessage(detail) {
                const container = this.querySelector('#flux-message-container');
                const template = this.querySelector('#flux-message-template').content.cloneNode(true);
                const messageEl = template.querySelector('[data-flux-message-dialog]');

                if (detail.dataset && detail.dataset.variant) {
                    messageEl.setAttribute('data-variant', detail.dataset.variant);
                }

                if (detail.slots) {
                    if (detail.slots.heading) messageEl.querySelector('.message-heading').innerText = detail.slots.heading;
                    if (detail.slots.text) messageEl.querySelector('.message-text').innerText = detail.slots.text;
                }

                container.appendChild(messageEl);

                requestAnimationFrame(() => {
                    messageEl.classList.add('showing');
                });

                const closemessage = () => {
                    messageEl.classList.remove('showing');
                    setTimeout(() => messageEl.remove(), 350);
                };

                messageEl.querySelector('.message-close-btn').onclick = closemessage;

                if (detail.duration !== 0) {
                    setTimeout(closemessage, detail.duration || 5000);
                }
            }
        });
    }
</script>
