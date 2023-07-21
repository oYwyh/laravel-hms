<x-admin.layout>
    <x-admin.content>
        <div class="title">Manage Doctors</div>
        <Link class="add" href="{{route('admin.manage.doctors.add')}}">Add New Doctor</Link>
        <div class="wrapper" style="">
            <x-splade-table :for="$doctors">
                @cell('action',$doctor)
                    <Link href="{{route('admin.manage.doctors.edit',['id'=>$doctor->id])}}" class="text-green-500"> Edit </Link>
                    <Link href="{{route('admin.manage.doctors.delete',['id'=>$doctor->id])}}" method="POST" class="text-red-500 ms-2"> Delete </Link>
                @endcell
            </x-splade-table>
        </div>
    </x-admin.content>
</x-admin.layout>
