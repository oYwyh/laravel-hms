<x-user.layout>
    <x-user.content>
        <div class="box">
            <div class="title">Overview</div>

        </div>
        <div class="overview">
            <div class="profile-box">
                <div class="main">
                    <div class="row">
                        <div class="img-box">
                            <img src="{{Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('images/doc.jpg')}}" alt="">
                        </div>
                        <div class="column">
                            <p class="name">{{$user->name}}</p>
                            <p class="age">{{$user->age}} years old</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="label">Height</div>
                            <div class="txt">{{$user->height}}</div>
                        </div>
                        <div class="column">
                            <div class="label">Weight</div>
                            <div class="txt">{{$user->weight}}</div>
                        </div>
                        <div class="column">
                            <div class="label">Blood Type</div>
                            <div class="txt">{{$user->blood}}</div>
                        </div>
                    </div>
                </div>
                <div class="nor-row">
                    <div class="nor-column">
                        <p class="label">Phone Number</p>
                        <p class="txt">{{$user->phone}}</p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Email</p>
                        <p class="txt">{{$user->email}}</p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Passport</p>
                        <p class="txt">{{$user->passport}}</p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Card Number</p>
                        <p class="txt">{{$user->id}}</p>
                    </div>
                    <div class="nor-column">
                        <p class="label">Medical Condition</p>
                        <p class="txt">{{$user->conditions ? $user->conditions : 'None'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-user.content>
</x-user.layout>
