<x-user.layout>
    @php
        $inv = DB::table('users')->where('id', Auth::user()->id)->first();
        $invs = explode(',', $inv->investigations);
        $card = DB::table('users')->where('id', Auth::user()->id)->first();
        $cards = explode(',', $card->insurance_card);
        $id = DB::table('users')->where('id', Auth::user()->id)->first();
        $ids = explode(',', $id->insurance_id);
    @endphp
    <x-user.content>
        <div class="medical">
            <div class="title">
                Files
            </div>
            <div class="toggle">
                <ul>
                    <li id="investigations">investigations</li>
                    <li id="insurance">insurance</li>
                </ul>
            </div>
            <div class="investigations active">
                <div class="box">
                    <div class="title">
                        Investigations
                    </div>
                        @if($invs[0] != '')
                            <x-splade-toggle>
                                <x-splade-transition show="!toggled" style="width:100%">
                                    <div class="img-box">
                                        <div class="row">
                                            @foreach ($invs as $inv)
                                                <img src="{{asset($inv)}}" alt="">
                                            @endforeach
                                        </div>
                                            <div class="edit" @click="toggle">Edit</div>
                                    </div>
                                </x-splade-transition>
                                <x-splade-transition show="toggled" style="width:100%;">
                                    <x-splade-form style="width:100%;" :action="route('user.investigation')" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <x-splade-file multiple label="Add Investigations" name="investigations[]" />
                                            <p class="note text-red-500 mt-2">Note: Your investigations well be gone and replaced with the now ones</p>
                                        </div>
                                        <x-splade-submit class="mt-4" style="width: 100%;" label="Add" />
                                    </x-splade-form>
                                </x-splade-transition>
                        </x-splade-toggle>
                        @else
                            <x-splade-form :action="route('user.investigation')" enctype="multipart/form-data">
                                <div class="form-group">
                                    <x-splade-file multiple label="Add Investigations" name="investigations[]" />
                                </div>
                                <x-splade-submit class="mt-4" style="width: 100%;" label="Add" />
                            </x-splade-form>
                        @endif
                </div>
            </div>
            <div class="insurance">
                <div class="box">
                    @if($ids[0] != '' || $cards[0] != '' || $card->insurance != '')
                        <x-splade-toggle>
                            <x-splade-transition  style="width: 100%;" show="!toggled">
                                <div class="txt-box">
                                    <div class="txt">
                                        Insurance company : <span>{{$card->insurance}}</span>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="img-box" id="card">
                                    <div class="txt">
                                        Insurance Card
                                    </div>
                                    <div class="row">
                                        @if($cards[0] != '')
                                            @foreach ($cards as $inv)
                                                <img src="{{asset($inv)}}" alt="">
                                            @endforeach
                                        @else
                                        <div class="err text-red-500">No data here</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="img-box" id="id">
                                    <div class="txt">
                                        Id
                                    </div>
                                    <div class="row">
                                        @if($ids[0] != '')
                                            @foreach ($ids as $inv)
                                                <img src="{{asset($inv)}}" alt="">
                                            @endforeach
                                        @else
                                        <div class="err text-red-500">No data here</div>
                                        @endif
                                    </div>
                                </div>
                                @if($ids[0] == '' && $cards[0] == '')
                                    <div class="edit mt-4"  @click.prevent="toggle">Add</div>
                                @else
                                    <div class="edit mt-4"  @click.prevent="toggle">Edit</div>
                                @endif
                            </x-splade-transition>
                            <x-splade-transition style="width: 100%" show="toggled">
                                <x-splade-form style="width:100%;" :action="route('user.insurance')" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <x-splade-select name="insurance" :options="$insurance">
                                        </x-splade-select>
                                    </div>
                                    <div class="form-group mt-4">
                                        <x-splade-file multiple label="Insurance Card" name="insurance_card[]" />
                                    </div>
                                    <div class="form-group mt-4">
                                        <x-splade-file multiple label="National Id Or Passport (Photo)" name="insurance_id[]" />
                                    </div>
                                    <p class="note text-red-500 mt-2">Note: Your insurance well be gone and replaced with the now ones</p>
                                    <x-splade-submit class="mt-4" style="width: 100%;" label="Add" />
                                </x-splade-form>
                            </x-splade-transition>
                        </x-splade-toggle>
                    @else
                        <x-splade-form style="width:100%;" :action="route('user.insurance')" enctype="multipart/form-data">
                            <div class="form-group">
                                <x-splade-select name="insurance" :options="$insurance">
                                </x-splade-select>
                            </div>
                            <div class="form-group mt-4">
                                <x-splade-file multiple label="Insurance Card" name="insurance_card[]" />
                            </div>
                            <div class="form-group mt-4">
                                <x-splade-file multiple label="National Id Or Passport (Photo)" name="insurance_id[]" />
                            </div>
                            <p class="note text-red-500 mt-2">Note: Your insurance well be gone and replaced with the now ones</p>
                            <x-splade-submit class="mt-4" style="width: 100%;" label="Add" />
                        </x-splade-form>
                    @endif
                </div>
            </div>
        </div>
    </x-user.content>
    <x-splade-script>
        const li = document.querySelectorAll('.toggle ul li')
        const investigations = document.querySelector('.investigations')
        const insurance = document.querySelector('.insurance')

        li.forEach(li => {
            li.addEventListener('click',() => {
                switch(li.id) {
                    case 'investigations':
                        investigations.classList.add('active')
                        insurance.classList.remove('active')
                    break;
                    case 'insurance':
                        investigations.classList.remove('active')
                        insurance.classList.add('active')
                    break;
                }
            })
        })

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
</x-user.layout>
