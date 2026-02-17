@props([
    'position' => 'bottom right',
])

@php
    $classes = Flux::classes()
        ->add('fixed p-6 bg-transparent z-[100] toast-container flex flex-col gap-3') // إضافة flex-col gap-3 لترتيب التنبيهات
        ->add($position === 'bottom right' ? 'bottom-0 right-0 items-end' : '')
        ->add($position === 'bottom left' ? 'bottom-0 left-0 items-start' : '')
        ->add($position === 'top right' ? 'top-0 right-0 items-end flex-col-reverse' : '')
        ->add($position === 'top left' ? 'top-0 left-0 items-start flex-col-reverse' : '')
        ;
@endphp

<ui-toast
    x-data
    x-on:toast-show.document="$el.showToast($event.detail)"
    data-position="{{ $position }}"
    wire:ignore
>
    <div class="{{ $classes }}" id="flux-toast-container"></div>

    <template id="flux-toast-template">
        <div class="transition-all duration-300 transform translate-y-4 opacity-0" data-flux-toast-dialog>
            <div class="max-w-sm min-w-[300px] p-3 rounded-xl shadow-xl bg-white border border-zinc-200 dark:bg-zinc-800 dark:border-zinc-700">
                <div class="flex items-start gap-3">
                    <div class="flex-1 flex gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=success]_&]:block shrink-0 mt-0.5 size-5 text-lime-600 dark:text-lime-400">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm3.844-8.791a.75.75 0 0 0-1.188-.918l-3.7 4.79-1.649-1.833a.75.75 0 1 0-1.114 1.004l2.25 2.5a.75.75 0 0 0 1.15-.043l4.25-5.5Z" clip-rule="evenodd" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=warning]_&]:block shrink-0 mt-0.5 size-5 text-amber-500 dark:text-amber-400">
                            <path fill-rule="evenodd" d="M6.701 2.25c.577-1 2.02-1 2.598 0l5.196 9a1.5 1.5 0 0 1-1.299 2.25H2.804a1.5 1.5 0 0 1-1.3-2.25l5.197-9ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 1 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="hidden [[data-variant=danger]_&]:block shrink-0 mt-0.5 size-5 text-rose-500 dark:text-rose-400">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>

                        <div class="flex flex-col">
                            <div class="toast-heading font-semibold text-sm text-zinc-900 dark:text-white empty:hidden"></div>
                            <div class="toast-text text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed mt-0.5"></div>
                        </div>
                    </div>

                    <button type="button" class="toast-close-btn p-1 rounded-lg hover:bg-zinc-100 dark:hover:bg-zinc-700 text-zinc-400 hover:text-zinc-600 dark:hover:text-zinc-200 transition-colors">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </template>
</ui-toast>

<script>
    if (! customElements.get('ui-toast')) {
        customElements.define('ui-toast', class extends HTMLElement {
            showToast(detail) {
                const container = this.querySelector('#flux-toast-container');
                const template = this.querySelector('#flux-toast-template').content.cloneNode(true);
                const toastEl = template.querySelector('[data-flux-toast-dialog]');

                if (detail.dataset && detail.dataset.variant) {
                    toastEl.setAttribute('data-variant', detail.dataset.variant);
                }

                if (detail.slots) {
                    if (detail.slots.heading) toastEl.querySelector('.toast-heading').innerText = detail.slots.heading;
                    if (detail.slots.text) toastEl.querySelector('.toast-text').innerText = detail.slots.text;
                }

                container.appendChild(toastEl);

                requestAnimationFrame(() => {
                    toastEl.classList.remove('translate-y-4', 'opacity-0');
                    toastEl.classList.add('translate-y-0', 'opacity-100');
                });

                const closeToast = () => {
                    toastEl.classList.remove('translate-y-0', 'opacity-100');
                    toastEl.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => toastEl.remove(), 300);
                };

                toastEl.querySelector('.toast-close-btn').onclick = closeToast;

                if (detail.duration !== 0) {
                    setTimeout(closeToast, detail.duration || 5000);
                }
            }
        });
    }
</script>
