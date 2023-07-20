<x-admin.layout>
    <x-admin.content>
        <div class="box">
            <div class="title">Overview</div>
            <x-splade-form :action="route('admin.admins')">
                <x-splade-input id="date" name="time" placeholder="Time" date />
            </x-splade-form>
        </div>
        <div class="overview">
            <div class="box">
                <div class="title">Total Patients <i class="fa-solid fa-user"></i></div>
                <div class="row">
                    <div class="total">{{count($users)}}</div>
                    <div class="somthing">off</div>
                </div>
            </div>
            <div class="box">
                <div class="title">Total Doctors <i class="fa-solid fa-user-doctor"></i></div>
                <div class="row">
                    <div class="total">{{count($doctors)}}</div>
                    <div class="somthing">off</div>
                </div>
            </div>
            <div class="box">
                <div class="title">Total Admins <i class="fa-solid fa-wrench"></i></div>
                <div class="row">
                    <div class="total">{{count($admins)}}</div>
                    <div class="somthing">off</div>
                </div>
            </div>
        </div>
    </x-admin.content>
</x-admin.layout>
