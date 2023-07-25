<x-user.layout>
    <x-user.content>
        <div class="title">Book Appointment</div>
            <x-splade-form :action="Route('user.manage.appointments.create')" method="POST" autocomplete="off">

                <div class="form-group mt-2">
                        <x-splade-select name="doctor" id="doctor-select" label="Doctor" :options="$doctors_names"  />
                    </div>
                {{-- <div class="form-group mt-2">
                    <x-splade-input date name="date" label="Appointment Date" />
                </div> --}}
                <div class="form-group">
                    <x-splade-submit class="mt-4" label="Book" confirm/>
                </div>
            </x-splade-form>
    </x-user.content>
    <x-splade-script>
        const doctorSelect = document.querySelector('#doctor-select');

        doctorSelect.addEventListener('input',(e) => {
            console.log(doctorSelect.value)
        })
    </x-splade-script>
</x-user.layout>
