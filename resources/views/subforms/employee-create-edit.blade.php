<div class="box-body">
    <div class="form-group">
        <label for="name">First name</label>
        <input type="name" class="form-control" id="first_name" name="first_name" placeholder="Enter name..." value="{{ old('first_name', isset($employee) ? $employee->first_name : '' ) }}">
        @if ($errors->has('first_name'))
            <span id="first_name-error" class="error text-danger" for="input-first_name">{{ $errors->first('first_name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="last_name">Last name</label>
        <input type="name" class="form-control" id="last_name" name="last_name" placeholder="Enter name..." value="{{ old('last_name', isset($employee) ? $employee->last_name : '' ) }}">
        @if ($errors->has('last_name'))
            <span id="last_name-error" class="error text-danger" for="input-last_name">{{ $errors->first('last_name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email..." value="{{ old('email', isset($employee) ? $employee->email : '' ) }}">
        @if ($errors->has('email'))
            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone..." value="{{ old('phone', isset($employee) ? $employee->phone : '' ) }}">
        @if ($errors->has('phone'))
            <span id="phone-error" class="error text-danger" for="input-phone">{{ $errors->first('phone') }}</span>
        @endif
    </div>

    </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>