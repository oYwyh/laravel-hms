<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                <h4>Doctor Register</h4><hr>
                <x-splade-form action="{{route('doctor.create')}}" method="POST">
                    <div class="form-group" >
                        <x-splade-input type="text" label="Name" class="input" name="name" />
                    </div>
                    <div class="form-group">
                        <x-splade-input type="text" label="Email" class="input" name="email"/>
                    </div>
                    <div class="form-group">
                        <x-splade-input type="text" label="Phone Number" class="input" name="phone" />
                    </div>
                    <div class="form-group">
                        <x-splade-select name="gender" label="Gender" choices>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </x-splade-select>
                    </div>
                    <div class="form-group" style="text-transform: capitalize;">
                    <x-splade-select name="specialty" label="Speicalty" choices :options="collect($specialties)->map(function ($specialty) {
                        return [
                        'label' => ucwords(str_replace('_', ' ', $specialty)),
                        'value' => $specialty,
                        ];
                    })->toArray()">
                    </x-splade-select>
                    </div>
                    <div class="form-group mt-2 mb-2">
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
                            @foreach ($hours as $hour)
                                <x-splade-checkbox name="sun_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                            @endforeach
                        </x-splade-group>
                    </div>
                    <div class="group-check mt-2 mb-2" id="mon_check">
                        <x-splade-group name="mon_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Monday Hours">
                            @foreach ($hours as $hour)
                                <x-splade-checkbox name="mon_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                            @endforeach
                        </x-splade-group>
                    </div>
                    <div class="group-check mt-2 mb-2" id="tue_check">
                        <x-splade-group name="tue_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Tuesday Hours">
                            @foreach ($hours as $hour)
                                <x-splade-checkbox name="tue_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                            @endforeach
                        </x-splade-group>
                    </div>
                    <div class="group-check mt-2 mb-2" id="wed_check">
                        <x-splade-group name="wed_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Wednesday Hours">
                            @foreach ($hours as $hour)
                                <x-splade-checkbox name="wed_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                            @endforeach
                        </x-splade-group>
                    </div>
                    <div class="group-check mt-2 mb-2" id="thu_check">
                        <x-splade-group name="thu_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Thursday Hours">
                            @foreach ($hours as $hour)
                                <x-splade-checkbox name="thu_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                            @endforeach
                        </x-splade-group>
                    </div>
                    <div class="group-check mt-2 mb-2" id="fri_check">
                        <x-splade-group name="fri_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Friday Hours">
                            @foreach ($hours as $hour)
                                <x-splade-checkbox name="fri_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                            @endforeach
                        </x-splade-group>
                    </div>
                    <div class="group-check mt-2 mb-2" id="sat_check">
                        <x-splade-group name="sat_hour" style="display: flex; flex-direction: row; gap:1rem; flex-wrap:wrap;" label="Saturday Hours">
                            @foreach ($hours as $hour)
                                <x-splade-checkbox name="sat_hour[]" :show-errors="false" value="{{ $hour }}" label="{{ $hour }}" />
                            @endforeach
                        </x-splade-group>
                    </div>
                    <div class="form-group">
                        <x-splade-input type="password" label="Password" class="input" name="password" />
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <x-splade-input type="password" label="Confirm Passowrd" class="input" name="cpassword" />
                    </div>
                    <x-splade-submit vlaue="register" class="mt-2"/>
                    <Link href="{{route('doctor.login')}}" class="mt-2">Alreay Have An Account</Link>
                </x-splade-form>
            </div>
        </div>
    </div>
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
</body>
</html>
