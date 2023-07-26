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
                <h4>User Register</h4><hr>
                <form action="{{route('user.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" name="name" value="{{old('name')}}">
                        <span class="text-danger">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" name="age" value="{{old('age')}}">
                        <span class="text-danger">
                            @error('age')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group" style="display: flex;flex-direction: column;">
                        <label for="gender">Gender</label>
                        <select name="gender">
                            <option value="" selected>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="text-danger">
                            @error('gender')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}">
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm password</label>
                        <input type="password" class="form-control" name="cpassword" value="{{old('cpassword')}}">
                        <span class="text-danger">
                            @error('cpassword')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group" class="mt-2">
                        <button type="submit" class="btn btn-primary mt-2">
                            Register
                        </button>
                    </div>
                    <br>
                    <a href="{{route('user.login')}}" class="mt-2">Alreay Have An Account</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
