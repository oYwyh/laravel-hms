<x-user.layout>
    <x-user.content>
        <div class="title">Book Appointment</div>
            <x-splade-form :action="Route('user.manage.appointments.createAppointment')" method="POST" autocomplete="off">
                <div class="form-group mt-2">
                    <x-splade-input type="text" label="Name" name="name" placeholder="{{Session::get('doc')->name}}" disabled />
                </div>
                <div class="form-group mt-2">
                    <x-splade-group name="date" label="Available Date">
                        @foreach($date as $day => $hours)
                            <p>- {{$carbon->parse($day)->format('l, F jS')}}</p> <!-- Add the day name here -->
                            @foreach($hours as $hour)
                                @php
                                    $lol = explode('-',$hour);
                                @endphp
                                @foreach ($lol as $lol)
                                    <x-splade-radio name="date" value="{{$day . 'T' . $lol . ':00:00'}}" label="{{$carbon->parse($day . 'T' . $lol . ':00:00')->format('g:i A')}}" />
                                @endforeach
                            @endforeach
                        @endforeach
                    </x-splade-group>

                <p class="note mt-4 text-red-500">Note: You can provide us with your investigations & insurance via files section</p>
                <x-splade-submit label="Book Appointment" class="mt-4" style="width: 100%;" />
            </x-splade-form>
    </x-user.content>
</x-user.layout>
