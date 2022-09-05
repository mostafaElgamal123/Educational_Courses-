<?php use App\Models\Contact;  use App\Models\ApplyNow;  ?>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{url('/dashborad')}}" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/roles')}}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>
                    roles
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/roles/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add role</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/roles')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View roles</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/users')}}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>
                    users
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/users/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add user</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/users')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View users</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/medias')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    media
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/categories')}}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Categories
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/categories/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/categories')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View categories</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    About
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/abouts/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add about</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/abouts')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View About</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    why choose us
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/whychoose/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add why choose us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/whychoose')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View why choose us</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Instructors
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/instructors/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add Instructor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/instructors')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Instructor</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    courses
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/courses/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add course</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/courses')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View courses</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    testimonials
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/testimonials/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add testimonial</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/testimonials')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View testimonials</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                   Diploma Outlines
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/diplomaoutlines/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add Diploma Outline</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/diplomaoutlines')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Diploma Outlines</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-check"></i>
                <p>
                   Feedback
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{url('/feedbackS/create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>add Feedback</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/feedbackS')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Feedback</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{url('/applynows')}}" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                   Apply Nows
                </p>
                <span class="badge badge-warning navbar-badge">{{ApplyNow::all()->count()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{url('/contacts')}}" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    message
                </p>
                <span class="badge badge-warning navbar-badge">{{Contact::all()->count()}}</span>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->