<x-doctor.layout>
    <x-doctor.content>
        <div class="title">Manage Appointments</div>
        <div class="wrapper" style="">
            <x-splade-table :for="$appointments" >
                @cell('status',$app)
                    <Link href="{{route('doctor.manage.appointments.info',['patient_id'=>$app->patient_id,'app_id' => $app->id])}}" class="capitalize text-orange-500 ms-2">{{$app->status}}</Link>
                @endcell
                @cell('action',$app)
                    <Link href="{{route('doctor.manage.appointments.cancle',['id'=>$app->id])}}" method="POST" class="text-red-500 ms-2">Cancle</Link>
                @endcell
            </x-splade-table>
        </div>
    </x-doctor.content>
</x-doctor.layout>
