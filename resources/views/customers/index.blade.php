@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            
            @section('add_button')
            <div class="row pr-4 justify-content-end">
                <div class="btn-group btn-group-sm justify-content-end" role="group">

                
                    <a href="{{ route('customers.customer.create') }}" class="btn btn-success" title="Create New Customer">
                    
                      <span class="font-weight-bold font-size-md"> ADD <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></span>
                    </a>
                </div>
            </div>
 @endsection
        </div>
        
        @if(count($customers) == 0)
            <div class="panel-body text-center">
                <h4>No Customers Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped " id="myTable">
                    <thead>
                        <tr>

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Priority</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                         <tr onclick="window.location='{{ route('customers.customer.show', $customer->id ) }}';" >
                           <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->priority }}</td>

                            <td> 

                                <form method="POST" action="{!! route('customers.customer.destroy', $customer->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('customers.customer.show', $customer->id ) }}" class="btn btn-info" title="Show Customer">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('customers.customer.edit', $customer->id ) }}" class="btn btn-primary" title="Edit Customer">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Customer" onclick="return confirm(&quot;Click Ok to delete Customer.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $customers->render() !!}
        </div>
        
        @endif
    
    </div>

    <script>
      $(document).ready( function () {
        $('#myTable').DataTable({
            "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 5 ] }
          ]
        });

      } );


    </script>
@endsection