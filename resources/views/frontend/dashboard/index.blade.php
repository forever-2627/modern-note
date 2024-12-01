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
                                    <h3 class="mb-0">Pinned Notes</h3>
                                    <div class="d-flex flex-wrap align-center p-3 ">
                                        @foreach($notes as $note)
                                            <div class="card shadow-lg border-0 m-3" style="width: 240px">
                                                <div class="card-header border-0">
                                                    <b>{{$note->title}}</b>
                                                </div>
                                                <div class="card-body">
                                                    {{ucfirst(truncate_words($note->description, 10))}}
                                                </div>
                                                <div class="card-footer border-0 d-flex justify-content-end">
                                                    <a href="{{route('user.notes.view', $note->id)}}" class="btn btn-primary mr-2"><i class="fa fa-eye"></i> View </a>
                                                    <a href="{{route('user.notes.unpin', $note->id)}}" class="btn btn-danger"><i class="fa fa-eraser"></i> Unpin </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
