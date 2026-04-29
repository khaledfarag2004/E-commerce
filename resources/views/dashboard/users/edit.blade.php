@extends('dashboard.layout.index')

@section('content')
    <div class="main">
        <div class="header">
            <h1>Edit User</h1>
            <p>Update the user information</p>
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


        <form action="{{ route('users.update',$user->id) }}" method="POST"
              style="background:#fff;padding:25px;border-radius:8px;box-shadow:0 2px 5px rgba(0,0,0,0.1);max-width:600px;" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Name -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                   style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <!-- Email -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <!-- Phone -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                   style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Address</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}"
                   style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <label>Image</label>
            <input type="file" name="avatar"><br>
            <!-- Password -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Password</label>
            <input type="password" name="password" placeholder="Enter new password (optional)"
                   style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">

            <!-- Status -->
            <label style="display:block;margin-bottom:8px;font-weight:bold;color:#333;">Status</label>
            <select name="status" style="width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:6px;">
                <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Disactive</option>
            </select>

            <!-- Role -->
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




            <button type="submit" style="background:#FF9800;color:#fff;border:none;padding:10px 20px;border-radius:6px;cursor:pointer;font-weight:bold;">
                Update User
            </button>
        </form>
    </div>
@endsection
