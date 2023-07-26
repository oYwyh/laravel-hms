<x-user.layout>
    <x-user.content>
        <div class="profile">
            <div class="title">Manage Profile</div>
            <div class="wrapper">
                <x-splade-toggle>
                        <x-splade-transition
                            show="!toggled">
                            <x-splade-form :default="$user"  method="POST" class="info">
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
                                        <x-splade-input type="text" disabled  class="input" name="passport" label="Passport" />
                                    </div>
                                    <div class="group">
                                        <x-splade-input type="text" disabled  class="input" name="height" label="height (cm)" />
                                        <x-splade-input type="text" disabled  class="input" name="weight" label="weight" />
                                        <x-splade-select name="blood" disabled  class="input" label="Blood Type">
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                        </x-splade-select>
                                    </div>
                                    <div class="group">
                                        <x-splade-input disabled type="text" class="input" name="disease" label="chronic disease" />
                                    </div>
                                </div>
                            </x-splade-form>
                        </x-splade-transition>
                        <x-splade-transition show="toggled">
                            <x-splade-form  :action="route('user.profile.update')" :default="$user" show="!toggled" class="info" enctype="multipart/form-data">
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
                                        <x-splade-select name="gender" class="input" label="gender">
                                            <option value="male">Male</option>
                                            <option value="male">Female</option>
                                        </x-splade-select>
                                        <x-splade-input type="text" class="input" name="phone" label="Phone Number" />
                                        <x-splade-input type="text" class="input" name="passport" label="Passport" />
                                    </div>
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="height" label="height (cm)" />
                                        <x-splade-input type="text" class="input" name="weight" label="weight" />
                                        <x-splade-select name="blood" class="input" label="Blood Type">
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="AB+">AB+</option>
                                            <option value="O+">O+</option>
                                            <option value="A-">A-</option>
                                            <option value="B-">B-</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O-">O-</option>
                                        </x-splade-select>
                                    </div>
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="disease" label="chronic disease" />
                                    </div>
                                    <x-splade-submit class="mt-4" style="width:100%;" label="update" />
                                </div>
                            </x-splade-form>
                        </x-splade-transition>
                    <button class="edit" v-show="!toggled" @click.prevent="toggle">Edit</button>
                </x-splade-toggle>
            </div>
        </div>
    </x-user.content>
</x-user.layout>
