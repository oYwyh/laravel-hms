<x-admin.layout>
    <x-admin.content>
        <div class="title">Manage Users</div>
        <Link class="add" href="{{route('admin.manage.users.add')}}">Add New User</Link>
        <div class="wrapper" style="">
            <x-splade-table :for="$users">
                @cell('action',$user)
                    <Link href="{{route('admin.manage.users.edit',['id'=>$user->id])}}" class="text-green-500"> Edit </Link>
                    <Link href="{{route('admin.manage.users.delete',['id'=>$user->id])}}" method="POST" class="text-red-500 ms-2"> Delete </Link>
                @endcell
            </x-splade-table>
        </div>
    </x-admin.content>
</x-admin.layout>
