<x-admin.layout>
    <x-admin.content>
        <div class="title">Manage Admins</div>
        <Link class="add" href="{{route('admin.manage.admins.add')}}">Add New Admin</Link>
        <div class="wrapper" style="">
            <x-splade-table :for="$admins">
                @cell('action',$admin)
                    <Link href="{{route('admin.manage.admins.edit',['id'=>$admin->id])}}" class="text-green-500"> Edit </Link>
                    <Link href="{{route('admin.manage.admins.delete',['id'=>$admin->id])}}" method="POST" class="text-red-500 ms-2"> Delete </Link>
                @endcell
            </x-splade-table>
        </div>
    </x-admin.content>
</x-admin.layout>
