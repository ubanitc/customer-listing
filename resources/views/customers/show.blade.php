@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Customer' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('customers.customer.destroy', $customer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('customers.customer.index') }}" class="btn btn-primary" title="Show All Customer">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('customers.customer.create') }}" class="btn btn-success" title="Create New Customer">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('customers.customer.edit', $customer->id ) }}" class="btn btn-primary" title="Edit Customer">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Customer" onclick="return confirm(&quot;Click Ok to delete Customer.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">

        <div class="shadow p-3 mt-3 mb-5 bg-white rounded">
            <dt>First Name</dt>
            <dd>{{ $customer->first_name }}</dd>
            <dt>Last Name</dt>
            <dd>{{ $customer->last_name }}</dd>
            <dt>Email</dt>
            <dd>{{ $customer->email }}</dd>
            <dt>Phone Number</dt>
            <dd>{{ $customer->phone_number }}</dd>
            <dt>Priority</dt>
            <dd>{{ $customer->priority }}</dd>
            <dt>Created At</dt>
            <dd>{{ $customer->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $customer->updated_at }}</dd>
</div>
        </dl>

    </div>
</div>

@endsection