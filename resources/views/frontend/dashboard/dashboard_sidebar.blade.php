@push('styles')
    <style>
        .blog-sidebar .category-widget .category-list li button {
            position: relative;
            display: block;
            font-size: 16px;
            line-height: 26px;
            color: #93959e;
            font-weight: 500;
            padding-left: 15px;
            background: white;
        }

        .blog-sidebar .category-widget .category-list li button:hover{
            color: #2dbe6c;
        }

        .sub-menu{
            display: flex;
            flex-direction: column;
            padding-left: 25px;
        }
    </style>
@endpush

<div class="widget-content">
    <ul class="category-list ">
        <li><a href="{{route('user.dashboard')}}"><i class="fa fa-sticky-note" aria-hidden="true"></i> Dashboard </a></li>
        <li class="current"><a href="{{route('user.notes')}}"><i class="fab fa fa-indent "></i> All Notes</a></li>
        <li><a href="{{route('user.dashboard')}}"><i class="fa fa-video" aria-hidden="true"></i> Media Consumption </a></li>
        <li><a href="{{route('user.dashboard')}}"><i class="fa fa-search" aria-hidden="true"></i> Search</a></li>
        <li>
            <form method="post" action="{{route('logout')}}">
                @csrf
                <button type="submit"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i> Logout</button>
            </form>
        </li>
    </ul>
</div>

@push('script')
    <script>
        $('.nav-item-parent').on('click', function() {
            const child = $(this).children('.collapse'); // Replace '.child' with the specific class or element you want
            if (child.hasClass('show')) {
                child.removeClass('show');
            } else {
                child.addClass('show');
            }
        });
    </script>
@endpush