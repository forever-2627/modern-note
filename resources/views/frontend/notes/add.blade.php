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
                                    <form id="add_note_form" action="{{route('user.notes.add.post')}}" method="post" class="default-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" id="title"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Achievement </label>
                                            <textarea rows="8" type="text" name="description" class="form-control" id="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Date</label>
                                            <input type="text" name="date" class="form-control" id="date"/>
                                        </div>
                                        @php
                                            $categories = \App\Models\Category::all();
                                        @endphp
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category" class="form-control" id="category">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" @if($category->id == 1)selected @endif>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary py-3 mt-4"><i class="fa fa-save"></i> Save Changes </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')
        <script type="text/javascript">
            $(document).ready(function (){
                $('#add_note_form').validate({
                    rules: {
                        title:{
                            required : true,
                        },
                        description: {
                            required : true,
                            minlength: 5
                        }
                    },
                    messages :{
                        title:{
                            required : 'You have to input tile',
                        },
                        description: {
                            required : 'Description is required',
                        }
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

            $("#date").datepicker({
                dateFormat: "yy-mm-dd" // Adjust date format if needed
            });
        </script>
    @endpush
@endsection
