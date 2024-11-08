@extends('frontend.frontend_dashboard')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title.jpg') }});">
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>Achieve Note </h1>
            </div>
        </div>
    </section>

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container blog-details sec-pad-2" style="overflow: scroll">
        <div class="auto-container">
            <div class="row clearfix">
                @php

                    $id = Auth::user()->id;
                    $user = App\Models\User::find($id);
                @endphp
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h4>User Profile </h4>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html">
                                            <img src="{{ (!empty($user->photo)) ? url('upload/user_images/'.$user->photo) : url('upload/no_image.jpg') }}" alt=""></a></figure>
                                    <h5><a href="blog-details.html">{{ $user->name }} </a></h5>
                                    <p>{{ $user->email }} </p>
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
                                <div class="lower-content">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{$note->title}}" disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label>Achievement </label>
                                        <textarea rows="8" type="text" name="description" class="form-control" disabled>{{$note->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Date</label>
                                        <input type="text" name="date" class="form-control" value="{{$note->date}}" disabled/>
                                    </div>
                                    @php
                                        $categories = \App\Models\Category::all();
                                    @endphp
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" class="form-control" disabled>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($category->id == $note->category_id)selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
