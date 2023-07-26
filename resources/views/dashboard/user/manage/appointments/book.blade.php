<x-user.layout>
    @php
    $time = explode(',',Session::get('doc')->time)
    @endphp

    <x-user.content>
        <div class="title">Book Appointment</div>
            <x-splade-form :action="Route('user.manage.appointments.createAppointment')" method="POST" autocomplete="off">
                <div class="form-group mt-2">
                    <x-splade-input type="text" label="Name" name="name" placeholder="{{Session::get('doc')->name}}" disabled />
                </div>
                <div class="form-group mt-2">
                    <x-splade-group name="date" label="Avalible Date">
                        @foreach($time as $item)
                            <x-splade-radio name="date" value="{{$item}}" label="{{$item}}" />
                        @endforeach
                    </x-splade-group>
                </div>
                <x-splade-submit label="Book Appointment" class="mt-4" style="width: 100%;" />
            </x-splade-form>
    </x-user.content>
</x-user.layout>
