@extends('frontend.frontend_dashboard')
@section('main')

    @push('styles')
        <style>
            .lower-content{
                overflow-x: auto!important;
            }
        </style>
    @endpush
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


    <!--Page Title-->
    <section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title.jpg') }});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Achieve Note </h1>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                @php

                    $id = Auth::user()->id;
                    $userData = App\Models\User::find($id);
                @endphp
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side mb-5">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>User Profile </h4>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html">
                                            <img src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo) : url('upload/no_image.jpg') }}" alt=""></a></figure>
                                    <h5><a href="blog-details.html">{{ $userData->name }} </a></h5>
                                    <p>{{ $userData->email }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">

                            </div>
                            @include('frontend.dashboard.dashboard_sidebar')
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <div class="d-flex justify-content-end align-center p-3">
                                    <a href="{{route('user.notes.add.get')}}" class="btn btn-primary p-2">
                                        <i class="fa fa-plus"></i> Add New Note
                                    </a>
                                </div>
                                <div class="lower-content pt-1">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Date</th>
                                            <th scope="col" style="min-width: 130px">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($notes as $key => $note)
                                                <tr>
                                                    <th scope="row">{{$key + 1}}</th>
                                                    <td>{{ucfirst($note->title)}}</td>
                                                    <td>{{ucfirst(truncate_words($note->description, 10))}}</td>
                                                    <td>{{$note->date}}</td>
                                                    <td>
                                                        <a href="{{route('user.notes.view', $note->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                        <a href="{{route('user.notes.edit.get', $note->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                        <a href="{{route('user.notes.delete', $note->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
        </div>
    </section>
@endsection
