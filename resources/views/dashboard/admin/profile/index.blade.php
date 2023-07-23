<x-admin.layout>
    <x-admin.content>
        <div class="profile">
            <div class="title">Manage Profile</div>
            <div class="box">
                <div class="box">
                    <img src="{{asset('images/doc.jpg')}}" alt="">
                </div>
                <x-splade-form :default="$admin" id="info">
                    <div class="group">
                        <x-splade-input type="text" class="input" name="name" label="Name" disabled/>
                        <x-splade-input type="text" class="input" name="email" label="Email" disabled/>
                    </div>
                    <div class="group">
                        <x-splade-input type="text" class="input" name="phone" label="Phone" disabled/>
                    </div>
                </x-splade-form>
            </div>
        </div>
    </x-admin.content>

</x-admin.layout>
