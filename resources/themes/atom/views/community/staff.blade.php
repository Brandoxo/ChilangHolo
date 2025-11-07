<x-app-layout>
    @push('title', __('Staff'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <div class="flex flex-col gap-y-4">
            @foreach($employees as $employee)
                <x-content.staff-content-section :badge="$employee->badge" :color="$employee->staff_color">
                    <x-slot:title>
                        {{ $employee->rank_name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $employee->job_description }}
                    </x-slot:under-title>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($employee->users as $staff)
                            <x-community.staff-card :user="$staff"/>
                        @endforeach
                    </div>

                    @if(count($employee->users) === 0)
                        <div class="text-center dark:text-gray-400">
                            {{ __('We currently have no staff in this position') }}
                        </div>
                    @endif
                </x-content.staff-content-section>
            @endforeach
        </div>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __(':hotel staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('About the :hotel staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-4">
                <p>
                    {{ __('Aquí en :hotel, nuestro equipo de personal es una gran familia feliz, cada miembro del personal tiene un papel y deberes diferentes que cumplir.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {{ __('La mayoría de nuestro equipo suele estar formado por jugadores que han estado en :hotel durante bastante tiempo, pero esto no significa que solo reclutemos jugadores antiguos y conocidos, reclutamos a aquellos que se destacan para nosotros.', ['hotel' => setting('hotel_name')]) }}
                </p>
            </div>
        </x-content.content-section>

        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Aplicar para Staff') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Cómo unirse al equipo de staff', ['hotel' => setting('hotel_name')]) }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-4">
                <p>
                    {{ __('De vez en cuando, las solicitudes de personal pueden abrirse. Una vez que lo hagan, siempre nos aseguramos de publicar un artículo de noticias explicando el proceso. Así que asegúrate de estar atento a eso si estás interesado en unirte al equipo de staff de :hotel.', ['hotel' => setting('hotel_name')]) }}
                </p>

                <p>
                    {!! __('También puedes consultar la :startTag página de solicitudes de personal :endTag que mostrará todas nuestras posiciones abiertas actuales.', ['startTag' => '<a href="/community/staff-applications" class="underline">', 'endTag' => "</a>"]) !!}
                </p>
            </div>
        </x-content.content-section>
    </div>
</x-app-layout>
