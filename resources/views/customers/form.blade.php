
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" cols="50" rows="10" id="first_name" required="true" placeholder="Enter first name here...">{{ old('first_name', optional($customer)->first_name) }}</input>
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" cols="50" rows="10" id="last_name" required="true" placeholder="Enter last name here...">{{ old('last_name', optional($customer)->last_name) }}</input>
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" cols="50" rows="10" id="email" required="true" placeholder="Enter email here...">{{ old('email', optional($customer)->email) }}</input>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    <label for="phone_number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-10">
        <input class="form-control" name="phone_number" cols="50" rows="10" id="phone_number" required="true" placeholder="Enter phone number here...">{{ old('phone_number', optional($customer)->phone_number) }}</input>
        {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('priority') ? 'has-error' : '' }}">
    <label for="priority" class="col-md-2 control-label">Priority</label>
    <div class="col-md-10">
        <input  class="form-control" name="priority" type="number" id="priority" value="{{ old('priority', optional($customer)->priority) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter priority here...">
        {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
    </div>
</div>

