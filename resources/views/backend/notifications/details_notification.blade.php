@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">

        <div class="row">
            <div class="col-md-6 offset-md-2 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Notification Detail () </h6>

                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tbody>
                                <tr>
                                    <td>Title </td>
                                    <td><code>{{}}</code></td>
                                </tr>
                                <tr>
                                    <td>Notification Type </td>
                                    <td><code>{{}} Message</code></td>
                                </tr>
                                <tr>
                                    <td>Username </td>
                                    <td><code>{{}}</code></td>
                                </tr>
                                <tr>
                                    <td>Email </td>
                                    <td><code>{{}}</code></td>
                                </tr>
                                <tr>
                                    <td>Phone Number </td>
                                    <td><code>{{}}</code></td>
                                </tr>
                                <tr>
                                    <td>Message </td>
                                    <td>
                                        <code style="text-wrap: balance;">
                                            {{}}
                                        </code>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection