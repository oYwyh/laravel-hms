<x-doctor.layout>
    <x-doctor.content>
        <div class="profile">
            <div class="title">Manage Profile</div>
            <div class="wrapper">
                <x-splade-toggle>
                        <x-splade-transition
                            show="!toggled">
                            <x-splade-form :default="$doctor" method="POST" class="info">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('images/doc.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="name" label="Name" disabled/>
                                        <x-splade-input type="text" class="input" name="email" label="Email" disabled/>
                                    </div>
                                    <div class="group">
                                        <x-splade-select name="gender" disabled class="input" label="gender">
                                            <option value="male">Male</option>
                                            <option value="male">Female</option>
                                        </x-splade-select>
                                        <x-splade-input type="text" disabled  class="input" name="phone" label="Phone Number" />
                                    </div>
                                    <div class="group">
                                        <x-splade-input name="specialty" disabled class="input" label="specialty"/>
                                    </div>
                                    <div class="group" style="margin-top:1rem;display: flex; gap:0 !important; flex-direction: column !important;">
                                        <p class="label">Work Times</p>
                                        <div style="padding-left: 1rem;">
                                            @foreach($date as $day => $hours)
                                                <p>- {{$carbon->parse($day)->format('l')}}</p> <!-- Add the day name here -->
                                                @foreach($hours as $hour)
                                                    @php
                                                        $lol = explode('-',$hour);
                                                    @endphp
                                                    @foreach ($lol as $lol)
                                                        <span class="time" style="padding-left: 1rem;">
                                                            {{$carbon->parse($day . 'T' . $lol . ':00:00')->format('g:i A')}}
                                                        </span>                                                @endforeach
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </x-splade-form>
                        </x-splade-transition>
                        <x-splade-transition show="toggled">
                            <x-splade-form  :action="route('doctor.profile.update')" :default="$doctor" show="!toggled" class="info" enctype="multipart/form-data">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('images/doc.jpg')}}" alt="">
                                    </div>
                                    <x-splade-file name="image" />
                                </div>
                                <div class="column">
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="name" label="Name" />
                                        <x-splade-input type="text" class="input" name="email" label="Email" />
                                    </div>
                                    <div class="group">
                                        <x-splade-input type="password" class="input" name="password" label="password" />
                                    </div>
                                    <div class="group">
                                        <x-splade-select name="gender" choices class="input" label="gender">
                                            <option value="male">Male</option>
                                            <option value="male">Female</option>
                                        </x-splade-select>
                                        <x-splade-input type="text" class="input" name="phone" label="Phone Number" />
                                    </div>
                                    <div class="group" style="width:100%;">
                                        <x-splade-select name="specialty" label="Speicalty" choices :options="collect($specialties)->map(function ($specialty) {
                                            return [
                                            'label' => ucwords(str_replace('_', ' ', $specialty)),
                                            'value' => $specialty,
                                            ];
                                        })->toArray()">
                                        </x-splade-select>
                                    </div>
                                    <div class="group mt-2 mb-2">
                                        <x-splade-group name="day" id="days" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Days">
                                            <x-splade-checkbox name="day[]" class="check-day" :show-errors="false" value="sunday" label="Sunday" />
                                            <x-splade-checkbox name="day[]" class="check-day" :show-errors="false" value="monday" label="Monday" />
                                            <x-splade-checkbox name="day[]" class="check-day" :show-errors="false" value="tuesday" label="Tuesday" />
                                            <x-splade-checkbox name="day[]" class="check-day" :show-errors="false" value="wednesday" label="Wednesday" />
                                            <x-splade-checkbox name="day[]" class="check-day" :show-errors="false" value="thursday" label="Thursday" />
                                            <x-splade-checkbox name="day[]" class="check-day" :show-errors="false" value="friday" label="Friday" />
                                            <x-splade-checkbox name="day[]" class="check-day" :show-errors="false" value="saturday" label="Saturday" />
                                        </x-splade-group>
                                    </div>
                                    <div class="group-check mt-2 mb-2" id="sun_check">
                                        <x-splade-group name="sun_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Sunday Hours">
                                            @foreach ($freeHours as $hour)
                                                <x-splade-checkbox name="sun_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                                            @endforeach
                                        </x-splade-group>
                                    </div>
                                    <div class="group-check mt-2 mb-2" id="mon_check">
                                        <x-splade-group name="mon_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Monday Hours">
                                            @foreach ($freeHours as $hour)
                                                <x-splade-checkbox name="mon_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                                            @endforeach
                                        </x-splade-group>
                                    </div>
                                    <div class="group-check mt-2 mb-2" id="tue_check">
                                        <x-splade-group name="tue_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Tuesday Hours">
                                            @foreach ($freeHours as $hour)
                                                <x-splade-checkbox name="tue_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                                            @endforeach
                                        </x-splade-group>
                                    </div>
                                    <div class="group-check mt-2 mb-2" id="wed_check">
                                        <x-splade-group name="wed_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Wednesday Hours">
                                            @foreach ($freeHours as $hour)
                                                <x-splade-checkbox name="wed_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                                            @endforeach
                                        </x-splade-group>
                                    </div>
                                    <div class="group-check mt-2 mb-2" id="thu_check">
                                        <x-splade-group name="thu_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Thursday Hours">
                                            @foreach ($freeHours as $hour)
                                                <x-splade-checkbox name="thu_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                                            @endforeach
                                        </x-splade-group>
                                    </div>
                                    <div class="group-check mt-2 mb-2" id="fri_check">
                                        <x-splade-group name="fri_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Friday Hours">
                                            @foreach ($freeHours as $hour)
                                                <x-splade-checkbox name="fri_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                                            @endforeach
                                        </x-splade-group>
                                    </div>
                                    <div class="group-check mt-2 mb-2" id="sat_check">
                                        <x-splade-group name="sat_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Saturday Hours">
                                            @foreach ($freeHours as $hour)
                                                <x-splade-checkbox name="sat_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                                            @endforeach
                                        </x-splade-group>
                                    </div>
                                    <x-splade-submit class="mt-4" style="width:100%;" label="update" />
                                </div>
                            </x-splade-form>
                            <x-splade-script>
                                const days = document.querySelectorAll('#days .check-day');
                                days.forEach(day => {
                                    day.addEventListener('input', () => {
                                        const text = day.querySelector('label input')
                                        const three  = text.value.substring(0,3);
                                        const form = document.querySelector(`#${three}_check`);
                                        console.log(form);
                                        form.classList.toggle('active')
                                    })
                                })
                            </x-splade-script>
                        </x-splade-transition>
                    <button class="edit" v-show="!toggled" @click.prevent="toggle">Edit</button>
                </x-splade-toggle>
            </div>
        </div>
    </x-doctor.content>
</x-doctor.layout>
