<x-doctor.layout>
    <x-doctor.content>
        <div class="wrapper">
            <x-splade-toggle>
                <div class="title">
                    Info
                </div>
                <div class="toggle">
                    <ul>
                        <li  @click.prevent="setToggle(false)">Patient</li>
                        <li  @click.prevent="setToggle(true)">Diagnosis</li>
                    </ul>
                </div>
                <x-splade-transition show="!toggled">
                    <div class="title">Patient</div>
                    <x-splade-form :default="$patient">
                        <div class="row-group">
                            <x-splade-input name="name" class="input" disabled label="Patient Name" />
                            <x-splade-input name="phone" class="input" disabled label="Patient Phone Number" />
                        </div>
                        <div class="row-group">
                            <x-splade-input name="age" class="input" disabled label="Patient Age" />
                            <x-splade-input name="gender" class="input" disabled label="Patient Gender" />
                        </div>
                        <div class="row-group">
                            <x-splade-input name="blood" class="input" disabled label="Patient Blood Type" />
                            <x-splade-input name="disease" class="input" disabled label="Patient Chronic Disease" />
                        </div>
                        <div class="row-group">
                            <x-splade-input name="height" class="input" disabled label="Patient Height" />
                            <x-splade-input name="weight" class="input" disabled label="Patient Weight" />
                        </div>
                        <div class="column-group">
                            <div class="label">Investigations</div>
                            <div class="row">
                                @foreach (explode(',',$patient->investigations) as $item)
                                    <div class="img-box">
                                        <img src="{{asset($item)}}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row-group mt-2">
                            <x-splade-input name="insurance" class="input" disabled label="Insurance company" />
                        </div>
                        <div class="column-group">
                            <div class="label">Insurance Card</div>
                            <div class="row">
                                @foreach (explode(',',$patient->insurance_card) as $item)
                                    <div class="img-box">
                                        <img src="{{asset($item)}}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </x-splade-form>
                    <x-splade-script>
                        const img = document.querySelectorAll('.img-box img')
                        img.forEach(img => {
                            img.addEventListener('click',() => {
                                if (document.fullscreenElement) {
                                    document.exitFullscreen();
                                }else {
                                    img.requestFullscreen();
                                }
                            })
                        })
                    </x-splade-script>
                </x-splade-transition>
                <x-splade-transition show="toggled">
                    <div class="title" style="font-size: 30px; margin-top:1rem;">Doctor Diagnosis</div>
                    <x-splade-form :action="route('doctor.manage.appointments.saveInfo')" :default="$app_id">
                        <div class="group">
                            <x-splade-input name="app_id" style="display: none;"/>
                        </div>
                        <div class="group">
                            <x-splade-textarea name="history" autosize label="History" />
                        </div>
                        <div class="group">
                            <x-splade-input name="diagnosis" label="Diagnosis" />
                        </div>
                        <div class="group mt-2">
                            <x-splade-select name="laboratory" id="lab" :options="$lab" label="Laboratory Request" choices multiple />
                        </div>
                        <div class="group mt-2">
                            <x-splade-select name="radiology" id="rad" :options="$rad" label="Radiology Request" choices multiple />
                        </div>
                        <div class="group mt-2">
                            <x-splade-select name="medicine" id="med" :options="$med" label="Medicine Request" choices multiple />
                        </div>
                        <x-splade-submit label="Save" class="mt-4" style="width:100%;" />
                    </x-splade-form>
                </x-splade-transition>

            </x-splade-toggle>

        </div>
    </x-doctor.content>

</x-doctor.layout>
