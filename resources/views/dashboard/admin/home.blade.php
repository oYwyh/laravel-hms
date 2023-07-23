<x-admin.layout>
    <x-admin.content>
        <div class="box">
            <div class="title">Overview</div>
            <x-splade-form :action="route('admin.manage.admins.index')">
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
        {{-- <div class="chart">
            <div class="options">
                <ul class="user">
                    <li id="user">Users</li>
                    <li id="admin">Admins</li>
                    <li id="doctor">Doctors</li>
                    <li id="appointment">Appointment</li>
                </ul>
                <ul class="lol">
                    <li>lol</li>
                </ul>
            </div>
            <div class="row">
                <ul class="type">
                    <li>Bar</li>
                    <li>Line</li>
                    <li>pie</li>
                </ul>
                <chart label="{{implode(',',$labels)}}" datas="{{implode(',',$data)}}"/>
            </div>
        </div> --}}
        <h1>{{ $chart1->options['chart_title'] }}</h1>
        {!! $chart1->renderHtml() !!}
    </x-admin.content>
    {{-- <x-splade-script>

        const chartOpt = document.querySelectorAll('.chart .options .user li');


        chartOpt.forEach(li => {
            li.onclick = () => {
                if (li.id == 'user') {
                }
            }
        });

    </x-splade-script> --}}
    {{-- <chart /> --}}
    {{-- {!! $chart1->renderJs() !!} --}}

</x-admin.layout>
