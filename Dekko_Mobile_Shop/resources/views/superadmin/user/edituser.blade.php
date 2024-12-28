@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('superadmin.user.update', ['user' => $user->user_id]) }}" id="userForm"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="created_by" value="admin">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" maxlength="255"
            value="{{ old('username', $user->username) }}" required>
        @error('username')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="full_name">Full Name</label>
        <input type="text" class="form-control" id="full_name" name="full_name" maxlength="255"
            value="{{ old('full_name', $user->full_name) }}" required>
        @error('full_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email"
            value="{{ old('email', $user->email) }}" required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" id="phone_number"
            value="{{ old('phone_number', $user->phone_number) }}" name="phone_number">
        @error('phone_number')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" value="{{ old('address', $user->address) }}"
            name="address">
        @error('address')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" id="role" name="role" required>
            <option value="Superadmin" {{ old('role', $user->role) == 'Superadmin' ? 'selected' : '' }}>Superadmin
            </option>
            <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="Employee" {{ old('role', $user->role) == 'Employee' ? 'selected' : '' }}>Employee</option>
        </select>
        @error('role')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password(Optional)</label>
        <input type="password" class="form-control" id="password" value="{{ old('password') }}" name="password">
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex mb-3">
        <div class="d-grid">
            <button class="btn btn-primary btn-block mt-2" type="submit">{{ 'Add User' }}</button>
        </div>
    </div>
</form>
