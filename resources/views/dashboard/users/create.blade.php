@extends('dashboard.layout.index')

@section('content')
    <div class="main">
        <div class="header">
            <h1>Add New User</h1>
            <p>Fill in the form to add a new user</p>
        </div>

        @csrf
        @if ($errors->any())
            <div class="alert alert-danger p-2">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif





        <form style="background:#fff;padding:25px;border-radius:8px;box-shadow:0 2px 5px rgba(0,0,0,0.1);max-width:600px;" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" >
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Name</label>
            <input type="text" name="name" placeholder="Enter name" style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Email</label>
            <input type="email" name="email" placeholder="Enter email" style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Phone</label>
            <input type="text" name="phone" placeholder="Enter phone" style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Image</label>

            <input type="file" name="avatar">

            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Address</label>
            <input type="text" name="address" placeholder="Enter address" style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <label for="role_id" style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">
                Role
            </label>
            <select name="role_id" id="role_id"
                    style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;
               background-color:#f9f9f9;color:#333;font-size:14px;
               transition:all 0.3s ease;">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        {{ old('role_id', $model->role_id ?? null) == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>

            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Password</label>
            <input type="password" name="password" placeholder="Enter password" style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">
            <button type="submit" style="background:#2E7D32;color:#fff;border:none;padding:10px 20px;border-radius:6px;cursor:pointer;font-weight:bold;">
                Save User
            </button>
        </form>
    </div>
@endsection
