<x-admin.layout>
    <x-admin.content>
        <div class="title">Edit Admin</div>
            <x-splade-form :default="$doctor" :action="Route('admin.manage.doctors.update',['id'=>$id])" method="POST" autocomplete="off">
                <div class="form-group mt-2">
                    <x-splade-input type="text" label="Name" class="form-control" name="name" placeholder="Enter Name" value="{{ old('Name') }}"/>
                    <span class="text-danger">@error('Name'){{ $message }}@enderror</span>
                </div>
                <div class="form-group mt-2">
                    <x-splade-input type="email" label="Email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}"/>
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div class="form-group mt-2">
                    <x-splade-input type="text" label="hospital" class="form-control" name="hospital" placeholder="Enter hospital" value="{{ old('hospital') }}"/>
                    <span class="text-danger">@error('hospital'){{ $message }}@enderror</span>
                </div>
                <div class="form-group mt-2">
                    <x-splade-input type="password" label="Password" class="form-control" name="password" placeholder="Enter new password" value="{{ old('password') }}"/>
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>

                <div class="form-group">
                    <x-splade-submit class="mt-4" label="update" confirm/>
                </div>
            </x-splade-form>
    </x-admin.content>
</x-admin.layout>
