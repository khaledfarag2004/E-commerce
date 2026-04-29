<style>
    body {
        margin: 0;
        font-family: 'Open Sans', sans-serif;
        background: #f4f6f9;
    }

    /* Main Content */
    .main {
        margin-left: 220px;
        padding: 20px;
    }

    /* Header */
    .header {
        background: #fff;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header h1 {
        color: #2E7D32;
        margin: 0;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    th, td {
        padding: 14px;
        text-align: center;
        font-size: 15px;
    }
    th {
        background: #2E7D32;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    tr:nth-child(even) {
        background: #f9f9f9;
    }
    tr:hover {
        background: #e8f5e9;
        transition: background 0.3s;
    }

    /* Buttons */
    .btn {
        padding: 8px 14px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        transition: all 0.3s;
    }
    .btn-edit {
        background: #FF9800;
        color: #fff;
    }
    .btn-edit:hover {
        background: #e68900;
    }
    .btn-delete {
        background: #e53935;
        color: #fff;
    }
    .btn-delete:hover {
        background: #c62828;
    }
    .btn-add {
        background: #2E7D32;
        color: #fff;
        margin-bottom: 15px;
    }
    .btn-add:hover {
        background: #1B5E20;
    }
</style>
@extends('dashboard.layout.index')

@section('content')
    <div class="main">
        <div class="header">
            <h1>Roles List</h1>
            <p>Manage your roles</p>
        </div>

        <a href="{{ route('roles.create') }}">
            <button class="btn btn-edit">Add Roles</button>
        </a>
        <br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>permission</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td> {{ $role->id }}</td>
                    <td> {{ $role->name }}</td>
                    <td> {{ $role->permission }}</td>
                    @if( $role->status == 1 )
                        <td class="status-active">Active</td>
                    @else
                        <td class="status-inactive">Disactive</td>
                    @endif

                    <style>
                        .status-active {
                            color: green;        /* أخضر */
                            font-size: 15px;     /* كبير */
                            font-weight: bold;   /* طخين */
                            text-align: center;  /* في النص */
                        }

                        .status-inactive {
                            color: red;          /* أحمر */
                            font-size: 15px;     /* كبير */
                            font-weight: bold;   /* طخين */
                            text-align: center;  /* في النص */
                        }
                    </style>

                    <td>


                        <!-- Delete -->
                        @if( $role->name !== 'Superadmin' && $role->name !== 'User')
                            <!-- Edit -->
                            <a href="{{ route('roles.edit', $role->id) }}">
                                <button class="btn btn-edit">Edit</button>
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
