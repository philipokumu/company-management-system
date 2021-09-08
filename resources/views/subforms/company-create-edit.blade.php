<div class="box-body">
    <div class="form-group">
        <label for="name">Company name</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Enter name..." value="{{ old('name', isset($company) ? $company->name : '' ) }}">
        @if ($errors->has('name'))
            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Company email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email..." value="{{ old('email', isset($company) ? $company->email : '' ) }}">
        @if ($errors->has('email'))
            <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="website">Company Website</label>
        <input type="name" class="form-control" id="website" name="website" placeholder="Enter Website..." value="{{ old('website', isset($company) ? $company->website : '' ) }}">
        @if ($errors->has('website'))
            <span id="website-error" class="error text-danger" for="input-website">{{ $errors->first('website') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="logo">Logo</label>
        <input type="file" id="logo" name="logo">
        @if ($errors->has('logo'))
            <span id="logo-error" class="error text-danger" for="input-logo">{{ $errors->first('logo') }}</span>
        @endif

    </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>