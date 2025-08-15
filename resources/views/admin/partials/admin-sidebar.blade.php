<div class="bg-white border-end vh-100 p-3" style="width: 250px;">
    <h5 class="fw-bold">Admin Portal</h5>
    <p class="text-muted small">Sacred Management</p>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="#" class="nav-link">Dashboard Overview</a></li>
        <li class="nav-item"><a href="#" class="nav-link">User Management</a></li>
        <li class="nav-item">
            <a href="{{ route('admin.courses.index') }}" class="nav-link {{ request()->is('admin/courses') ? 'active fw-bold' : '' }}">
                Courses Management
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->is('admin/orders') ? 'active fw-bold' : '' }}">
                Orders Management
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.yoga_sessions.index') }}" class="nav-link {{ request()->is('admin/yoga-sessions') ? 'active fw-bold' : '' }}">
            Session Management
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.yoga_categories.index') }}">
                🧘 Yoga Categories
            </a>
        </li>

        <li class="nav-item"><a href="#" class="nav-link">Blog Posts</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Testimonials</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Mail Subscribers</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Team Members</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Payment Tracking</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Order Tracking</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Profile Settings</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-danger">Logout</a></li>
    </ul>
</div>
