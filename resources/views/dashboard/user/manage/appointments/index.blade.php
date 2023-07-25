<x-user.layout>
    <x-user.content>
        <div class="title">Manage Appointments</div>
        <Link class="add" href="{{route('user.manage.appointments.book')}}">Book Appointmnet</Link>
        <div class="wrapper" style="">
            <x-splade-table :for="$appointments">
                @cell('action',$user)
                    <Link href="{{route('user.manage.appointments.edit',['id'=>$user->id])}}" class="text-green-500"> Edit </Link>
                    <Link href="{{route('user.manage.appointments.delete',['id'=>$user->id])}}" method="POST" class="text-red-500 ms-2"> Delete </Link>
                @endcell
            </x-splade-table>
        </div>
    </x-user.content>
</x-user.layout>
