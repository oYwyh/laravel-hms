<x-user.layout>
    <x-user.content>
        <div class="title">Manage Appointments</div>
        <Link class="add" href="{{route('user.manage.appointments.specialty')}}">Book Appointmnet</Link>
        <div class="wrapper" style="">
            <x-splade-table :for="$appointments" >
                @cell('doctor',$user)
                    {{App\Models\Doctor::find($user->doctor_id)->name}}
                @endcell
                @cell('action',$user)
                    <Link href="{{route('user.manage.appointments.delete',['id'=>$user->id])}}" method="POST" class="text-red-500 ms-2">Cancle</Link>
                @endcell
            </x-splade-table>
        </div>
    </x-user.content>
</x-user.layout>
