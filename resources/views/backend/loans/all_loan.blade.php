@extends('admin.admin_dashboard')
@section('admin')
    @push('styles')

    @endpush

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb justify-content-end">
                <a href="{{route('staff.loans.create')}}" class="btn btn-inverse-info"> <i class="feather icon-plus"></i> Add Loan </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Loans</h6>

                        <div class="table-responsive" style="overflow: hidden;">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sequence<br/> Number</th>
                                    <th>Surname</th>
                                    <th>Given<br/> Name</th>
                                    <th>Email</th>
                                    <th>Phone <br/>Number</th>
                                    <th>Address</th>
                                    <th>Loan <br/>Amount</th>
                                    <th>Payment<br/> Frequency</th>
                                    <th>Number<br/> of Payments</th>
                                    <th>Payment <br/>Start Date</th>
                                    <th>Payment <br/>Amount</th>
                                    <th>Total <br/>To Be Repaid</th>
                                    <th>Amount <br/>Repaid <br/>To Date</th>
                                    <th>Outstanding<br/> Balance</th>
                                    <th>Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loans as $key => $item)
                                    @php
                                        $user = \App\Models\User::find($item->user_id);
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ sprintf('%06d', $item->id)  }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->given_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $item->loan_amount }}</td>
                                        <td>{{ ucfirst($item->payment_frequency) }}</td>
                                        <td>{{ $item->nof_payments }}</td>
                                        <td>{{ $item->payment_start_date }}</td>
                                        <td>{{ $item->payment_amount }}</td>
                                        <td>{{ $item->total_to_be_repaid }}</td>
                                        <td>{{ $item->amount_repaid_to_date }}</td>
                                        <td>{{ $item->outstanding_balance }}</td>
                                        <td>
                                            <a href="{{route('staff.loans.view', $item->id)}}" class="btn btn-inverse-info" title="Details"> <i data-feather="eye"></i> </a>
                                            <a href="{{route('staff.loans.edit', $item->id)}}" class="btn btn-inverse-warning" title="Edit"> <i data-feather="edit"></i> </a>
                                            <a href="{{route('staff.loans.delete', $item->id)}}" class="btn btn-inverse-danger" id="delete" title="Delete"> <i data-feather="trash-2"></i>  </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @push('script')

    @endpush






@endsection