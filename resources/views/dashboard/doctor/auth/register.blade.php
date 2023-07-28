<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                <h4>Doctor Register</h4><hr>
                <x-splade-form action="{{route('doctor.create')}}" method="POST">
                    <div class="form-group" >
                        <x-splade-input type="text" label="Name" class="input" name="name" value="{{old('name')}}"/>
                    </div>
                    <div class="form-group">
                        <x-splade-input type="text" label="Email" class="input" name="email" value="{{old('email')}}"/>
                    </div>
                    <div class="form-group">
                        <x-splade-input type="text" label="Phone Number" class="input" name="phone" value="{{old('phone')}}"/>
                    </div>
                    <div class="form-group">
                        <x-splade-select name="specialty" :options="$specialties" label="specialty">
                        </x-splade-select>
                    </div>
                    <div class="form-group">
                        <x-splade-input type="password" label="Password" class="input" name="password" value="{{old('password')}}"/>
                    </div>
                    <div class="form-group">
                        <x-splade-input type="password" label="Confirm Passowrd" class="input" name="cpassword" value="{{old('cpassword')}}"/>
                    </div>
                    <div class="form-group" class="mt-2">
                        <x-splade-submit value="Register" />
                    </div>
                    <br>
                    <Link href="{{route('doctor.login')}}" class="mt-2">Alreay Have An Account</Link>
                </x-splade-form>
            </div>
        </div>
    </div>
</body>
</html>
