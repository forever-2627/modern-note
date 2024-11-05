@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->

            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add Loan </h6>

                            <form method="post" action="{{route('staff.loans.store')}}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="user_id">User</label>
                                            <select id="user_id" name="user_id" class="form-control">
                                                @php
                                                    $users = \App\Models\User::where(['role_id' => config('constants.roles.user_role_id')])->get();
                                                @endphp
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->given_name . ' ' . $user->surname . ' (' . $user->email . ') '}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="loan_amount">Loan Amount</label>
                                            <input type="number" id="loan_amount" name="loan_amount" class="form-control" value="{{ old('loan_amount') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="payment_frequency" class="form-label">Payment Frequency</label>
                                            <select name="payment_frequency" class="form-control" id="payment_frequency">
                                                <option selected="" disabled="">Select Payment Frequency</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="fortnightly">For Nightly</option>
                                                <option value="monthly">Monthly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="nof_payments">Number of Payments</label>
                                            <input type="number" id="nof_payments" name="nof_payments" class="form-control" value="{{ old('nof_payments') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="payment_start_date">Payment Start Date</label>
                                            <input type="text" id="payment_start_date" name="payment_start_date" class="form-control" value="{{ old('payment_start_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="payment_amount">Payment Amount</label>
                                            <input type="number" id="payment_amount" name="payment_amount" class="form-control" value="{{ old('payment_amount') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="total_to_be_repaid">Total to be Repaid</label>
                                            <input type="number" id="total_to_be_repaid" name="total_to_be_repaid" class="form-control" value="{{ old('total_to_be_repaid') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="amount_repaid_to_date">Amount Repaid to Date</label>
                                            <input type="number" id="amount_repaid_to_date" name="amount_repaid_to_date" class="form-control" value="{{ old('amount_repaid_to_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="outstanding_balance">Outstanding Balance</label>
                                            <input type="number" id="outstanding_balance" name="outstanding_balance" class="form-control" value="{{ old('outstanding_balance') }}">
                                        </div>
                                    </div>
                                    </div>
                                <button type="submit" class="btn btn-primary float-end"><i class="feather icon-save me-2"></i> Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(document).ready(() => {
                $('#user').select2();
                $('#payment_start_date').datepicker();
            });
        </script>

        {{--Validation--}}
        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        loan_amount: {
                            required : true,
                        },
                        loan_issued: {
                            required : true,
                        },
                        payment_frequency: {
                            required : true,
                        },
                        nof_payments: {
                            required : true,
                        },
                        payment_start_date:{
                            required: true,
                            date: true
                        },
                        payment_amount: {
                            required : true,
                        },
                        total_to_be_repaid:{
                            required: true,
                        },
                        amount_repaid_to_date: {
                            required : true,
                        },
                        outstanding_balance: {
                            required : true,
                        }
                    },
                    messages :{
                        loan_amount: {
                            required : 'This field is required!',
                        },
                        payment_frequency: {
                            required : 'This field is required!',
                        },
                        nof_payments: {
                            required : 'This field is required!',
                        },
                        payment_start_date:{
                            required: 'This field is required!',
                            date: 'Please input date type only'
                        },
                        payment_amount:{
                            required: 'This field is required!',
                        },
                        total_to_be_repaid:{
                            required: 'This field is required!',
                        },
                        amount_repaid_to_date:{
                            required: 'This field is required!',
                        },
                        outstanding_balance:{
                            required: 'This field is required!',
                        },
                    },
                    errorElement : 'span',
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
        </script>
    @endpush
@endsection
