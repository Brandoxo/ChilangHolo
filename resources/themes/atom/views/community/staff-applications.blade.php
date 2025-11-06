<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @forelse($positions as $position)
                <x-content.staff-content-section :badge="$position->permission->badge" :color="$position->permission->staff_color">
                    <x-slot:title>
                        {{ $position->permission->rank_name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $position->permission->job_description }}
                    </x-slot:under-title>

                    <div class="text-center dark:text-gray-400">
                        <div class="mb-4 text-sm">
                            {!! $position->description !!}
                        </div>
                    </div>

                    <div class="flex justify-between">
                        @if(auth()->user()->hasAppliedForPosition($position->permission->id))
                            <x-form.danger-button>
                                {{ __('You have already applied for :position', ['position' => $position->permission->rank_name]) }}
                            </x-form.danger-button>
                        @else
                            <a href="{{ route('staff-applications.show', $position) }}" class="w-full">
                                <x-form.secondary-button>
                                    {{ __('Apply for :position', ['position' => $position->permission->rank_name]) }}
                                </x-form.secondary-button>
                            </a>
                        @endif
                        </div>
                </x-content.staff-content-section>
            @empty
                <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900 col-span-full">
                    <x-slot:title>
                        {{ __('Posiciones Cerradas') }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ __('Actualmente no hay posiciones abiertas') }}
                    </x-slot:under-title>

                    <div class="px-2 text-sm dark:text-gray-200 space-y-4">
                        <p>
                            {{ __('Por favor, vuelve más tarde para verificar si tenemos alguna posición abierta en ese momento. ¡Gracias por tu interés!', ['hotel' => setting('hotel_name')]) }}
                        </p>
                    </div>
                </x-content.content-section>
            @endforelse
        </div>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Aplicar para :hotel staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Selecciona una posición para comenzar', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-4">
                <p>
                    {{ __('Aquí en :hotel abrimos las solicitudes de personal de vez en cuando. A veces encontrarás esta página vacía, otras veces puede estar llena de posiciones. Si alguna vez te encuentras con una posición en la que sientes que encajarías perfectamente, no dudes en postularte.', ['hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-section>
    </div>
</x-app-layout>
