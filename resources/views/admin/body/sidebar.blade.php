<nav class="sidebar">
 <div class="sidebar-header">
	 <a href="#" class="sidebar-brand">
		 ISBM<span>Admin</span>
	 </a>
	 <div class="sidebar-toggler not-active">
		 <span></span>
		 <span></span>
		 <span></span>
	 </div>
 </div>
 <div class="sidebar-body">
	 <ul class="nav">
		 @if(auth()->user()->role_id == config('constants.roles.admin_role_id'))
			 <li class="nav-item nav-category">Admin</li>
			 <li class="nav-item">
				 <a href="{{route('admin.dashboard')}}" class="nav-link">
					 <i class="link-icon" data-feather="box"></i>
					 <span class="link-title">Dashboard</span>
				 </a>
			 </li>
		 @endif
			 <li class="nav-item nav-category">Main</li>
			 <li class="nav-item">
				 <a href="{{route('staff.loans')}}" class="nav-link">
					 <i class="link-icon" data-feather="dollar-sign"></i>
					 <span class="link-title">Loan Management</span>
				 </a>
			 </li>
             <li class="nav-item">
                 <a href="{{route('staff.users')}}" class="nav-link">
                     <i class="link-icon" data-feather="users"></i>
                     <span class="link-title">User Management</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="{{route('staff.messages')}}" class="nav-link">
                     <i class="link-icon" data-feather="message-circle"></i>
                     <span class="link-title">Messages</span>
                 </a>
             </li>
			 <li class="nav-item">
				 <a href="{{route('staff.notifications')}}" class="nav-link">
					 <i class="link-icon" data-feather="bell"></i>
					 <span class="link-title">Notifications</span>
				 </a>
			 </li>
			 <li class="nav-item nav-category">Others</li>
			 <li class="nav-item">
				 <a href="{{route('staff.calculator')}}" class="nav-link">
					 <span class="fal fa-calculator"></span>
					 <span class="link-title">Calculator</span>
				 </a>
			 </li>
	 </ul>
 </div>
</nav>
@push('script')

@endpush