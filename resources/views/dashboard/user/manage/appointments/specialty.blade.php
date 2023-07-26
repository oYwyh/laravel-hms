<x-user.layout>
    <x-user.content>
        <div class="title">Book Appointment</div>
            <x-splade-form :action="Route('user.manage.appointments.getSpec')" method="POST" autocomplete="off">
                <div class="form-group mt-2">
                    <x-splade-select name="specialty" id="spec-select" label="Specialty" :options="$specialties">
                    </x-splade-select>
                </div>
                    <x-splade-submit class="mt-4" style="width:100%;" label="Choose Specialty" />
            </x-splade-form>
    </x-user.content>
</x-user.layout>
