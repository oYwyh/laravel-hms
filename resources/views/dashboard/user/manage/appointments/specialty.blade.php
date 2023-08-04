<x-user.layout>
    <x-user.content>
        <div class="title">Book Appointment</div>
            <x-splade-form :action="Route('user.manage.appointments.getSpec')" method="POST" autocomplete="off">
                <div class="form-group mt-2" style="text-transform: capitalize;">
                    <x-splade-select name="specialty" label="Speicalty" choices :options="collect($specialties)->map(function ($specialties) {
                        return [
                        'label' => ucwords(str_replace('_', ' ', $specialties)),
                        'value' => $specialties,
                        ];
                    })->toArray()">
                    </x-splade-select>
                </div>
                    <x-splade-submit class="mt-4" style="width:100%;" label="Choose Specialty" />
            </x-splade-form>
    </x-user.content>
</x-user.layout>
