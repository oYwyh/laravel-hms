
<x-user.layout>
    <x-user.content>
        <div class="title">Book Appointment</div>
            <x-splade-form :action="Route('user.manage.appointments.getTime')" method="POST" autocomplete="off">
                <div class="form-group mt-2">
                    <x-splade-select name="doctor" id="doctor-select" label="Doctor" :options="$doctors_names">
                    </x-splade-select>
                        <div class="form-group">
                            <x-splade-submit class="mt-4" label="Check For Avalible Times" style="width: 100%;" confirm/>
                        </div>
                </div>
            </x-splade-form>
    </x-user.content>
</x-user.layout>
