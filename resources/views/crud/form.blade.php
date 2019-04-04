@if(isset($customer))
{!! Form::model($customer,['method'=>'put','id'=>'frm']) !!}
@else
{!! Form::open(['id'=>'frm']) !!}
@endif
<div class="modal-header">
    <h5 class="modal-title">{{isset($customer)?'Edit':'New'}} Customer</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group row required">
        {!! Form::label("name","Name",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),'placeholder'=>'Name','id'=>'focus']) !!}
            <span id="error-name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("user_name","User name",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("user_name",null,["class"=>"form-control".($errors->has('user_name')?" is-invalid":""),'placeholder'=>'User name']) !!}
            <span id="error-user_name" class="invalid-feedback"></span>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label("gender","Gender",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::select("gender",['Male'=>'Male','Female'=>'Female'],null,["class"=>"form-control"]) !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("password","Password",["class"=>"col-form-label col-md-3"]) !!}
        @if(empty($customer['password']))
        <div class="col-md-9">
            {!! Form::password("password", ["class"=>"form-control".($errors->has('password')?" is-invalid":""),'placeholder'=>'Password']) !!}
            <span id="error-password" class="invalid-feedback"></span>
        </div>
        @else
        <div class="col-md-9">
            {!! Form::text("password", $customer['password'], ["class"=>"form-control".($errors->has('password')?" is-invalid":""),'placeholder'=>'Password']) !!}
            <span id="error-password" class="invalid-feedback"></span>
        </div>
        @endif
    </div>


    <div class="form-group row required">
        {!! Form::label("email","Email",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),'placeholder'=>'Email']) !!}
            @if(!empty($item_id))
            {!! Form::hidden("item_id",$item_id) !!}
            @endif
            <span id="error-email" class="invalid-feedback"></span>
        </div>
    </div>  

    <div class="form-group row required">
        {!! Form::label("phone","Phone",["class"=>"col-form-label col-md-3"]) !!}
        <div class="col-md-9">
            {!! Form::text("phone",null,["class"=>"form-control".($errors->has('phone')?" is-invalid":""),'placeholder'=>'Phone']) !!}
            <span id="error-phone" class="invalid-feedback"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"> Close</button>
    {!! Form::submit("Save",["class"=>"btn btn-primary"])!!}
</div>
<input type="hidden" name="item_id" value="hello">
{!! Form::close() !!}