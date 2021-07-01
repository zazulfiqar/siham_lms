<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="{{ route('my_account') }}">

                            @if(isset(Auth::user()->photo))
                                <img src="{{url('/siham_lms/storage/app/public/'.Auth::user()->photo	)}}" width="38" height="38"
                                     class="rounded-circle" alt="photo">
                            @endif
                        </a>
                    </div>

                    <div class="media-body">
                        @if(isset(Auth::user()->name))
                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                        @endif
                        <div class="font-size-xs opacity-50">
                            <i class="icon-user font-size-sm"></i> @if(isset(Auth::user()->user_type)) &nbsp;{{ ucwords(str_replace('_', ' ', Auth::user()->user_type)) }} @endif
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="{{ route('my_account') }}" class="setting"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (Route::is('dashboard')) ? 'active' : '' }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{--Academics--}} {{-- @if(Qs::userIsAcademic())--}} {{--
                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['tt.index', 'ttr.edit', 'ttr.show', 'ttr.manage']) ? 'nav-item-expanded nav-item-open' : '' }} ">--}} {{-- <a href="#" class="nav-link"><i class="icon-graduation2"></i> <span> Academics</span></a>--}} {{--
                    <ul class="nav nav-group-sub" data-submenu-title="Manage Academics">--}} {{-- Timetables--}} {{--
                        <li class="nav-item"><a href="{{ route('tt.index') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['tt.index']) ? 'active' : '' }}">Timetables</a>--}} {{-- </li>--}} {{-- </ul>--}} {{-- </li>--}} {{-- @endif--}} {{--Administrative--}}
                @if(Qs::userIsAdministrative())
                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.invoice', 'payments.receipts', 'payments.edit', 'payments.manage', 'payments.show',]) ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="icon-office"></i> <span> Administrative</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Administrative">

                        {{-- Payments--}} @if(Qs::userIsTeamAccount())
                        <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.edit', 'payments.manage', 'payments.show', 'payments.invoice']) ? 'nav-item-expanded' : '' }}">

                            <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.edit', 'payments.create', 'payments.manage', 'payments.show', 'payments.invoice']) ? 'active' : '' }}"><i
                                            class="fa fa-money" aria-hidden="true"></i>Payments</a>

                            <ul class="nav nav-group-sub">
                                <li class="nav-item">
                                    <a href="{{ route('payments.create') }}" class="nav-link {{ Route::is('payments.create') ? 'active' : '' }}">
                                        <i class="fa fa-money" aria-hidden="true"></i>Create Payment
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('payments.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['payments.index', 'payments.edit', 'payments.show']) ? 'active' : '' }}">
                                        <i class="fa fa-list" aria-hidden="true"></i>Manage Payments
                                    </a>
                                </li>
                                {{--
                                <li class="nav-item"><a href="{{ route('payments.manage') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['payments.manage', 'payments.invoice', 'payments.receipts']) ? 'active' : '' }}">Student--}}
                                        {{--                                                Payments</a></li>--}}

                            </ul>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif @if(Qs::userIsTeamSA())

                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="icon-users"></i> <span> Users</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Manage Students">
                        @if(Qs::userIsTeamSA())
                        <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                            <a href="#" class="nav-link"><i class="icon-users"></i> <span> Students</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Students">
                                <li class="nav-item">

                                    <a href="{{ route('status.inactive_students') }}" class="nav-link {{ (Route::is('status.inactive_students')) ? 'active' : '' }}">
                                        <i class="fa fa-ban"></i>Inactive Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('status.active_students') }}" class="nav-link {{ (Route::is('status.active_students')) ? 'active' : '' }}">

                                        <i class="fa fa-check"></i>Active Student</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('students.create') }}" class="nav-link {{ (Route::is('students.create')) ? 'active' : '' }}">
                                        <i class="fa fa-plus"></i>Add New Student</a>
                                </li>

                            </ul>
                        </li>
                        @endif @if(Qs::userIsTeamSA())
                        <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                            <a href="#" class="nav-link"><i class="icon-users"></i> <span>Teachers</span></a>
                            <ul class="nav nav-group-sub" data-submenu-title="Manage Teachers">
                                <!--<li class="nav-item">-->
                                <a href="{{ route('status.inactive_teachers') }}" class="nav-link {{ (Route::is('status.inactive_teachers')) ? 'active' : '' }}">
                                    <i class="fa fa-ban"></i>Inactive Teacher</a>
                                <!--</li>-->
                                <li class="nav-item">
                                    <a href="{{ route('status.active_teachers') }}" class="nav-link {{ (Route::is('status.active_teachers')) ? 'active' : '' }}">
                                        <i class="fa fa-check"></i>Active Teacher</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teachers.create') }}" class="nav-link {{ (Route::is('teachers.create')) ? 'active' : '' }}">
                                        <i class="fa fa-plus"></i>Add New Teacher
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif @if(Qs::userIsTeamSA()) {{-- Student Promotion--}} {{--
                        <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage']) ? 'nav-item-expanded' : '' }}"><a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage' ]) ? 'active' : '' }}">Student Promotion</a>--}} {{--
                            <ul class="nav nav-group-sub">--}} {{--
                                <li class="nav-item"><a href="{{ route('students.promotion') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion']) ? 'active' : '' }}">Promote Students</a></li>--}} {{--
                                <li class="nav-item"><a href="{{ route('students.promotion_manage') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion_manage']) ? 'active' : '' }}">Manage Promotions</a></li>--}} {{-- </ul>--}} {{-- </li>--}} {{--
                        Student Graduated--}} {{--
                        <li class="nav-item"><a href="{{ route('students.graduated') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.graduated' ]) ? 'active' : '' }}">Students Graduated</a></li>--}} @endif

                    </ul>
                </li>
                @endif @if(Qs::userIsTeamSA())

                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="fa fa-university"></i> <span> Classes & Sections </span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Manage Students">
                        {{-- Admit Student--}} {{--Manage Classes--}}
                        <li class="nav-item">
                            <a href="{{ route('classes.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['classes.index','classes.edit']) ? 'active' : '' }}"><i
                                        class="icon-windows2"></i> <span> Classes</span></a>
                        </li>

                        {{--Manage Sections--}}
                        <li class="nav-item">
                            <a href="{{ route('sections.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['sections.index','sections.edit',]) ? 'active' : '' }}"><i
                                        class="icon-fence"></i> <span>Sections</span></a>
                        </li>
                    </ul>
                </li>
                @endif @if(Qs::userIsTeamSA()) {{--Manage Dorms--}} {{--
                <li class="nav-item">--}} {{-- <a href="{{ route('dorms.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['dorms.index','dorms.edit']) ? 'active' : '' }}"><i class="icon-home9"></i> <span> Dormitories</span></a>--}} {{-- </li>--}}



                <li class="nav-item">
                    <a href="{{ route('courses.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}">
                        <i class="fa fa-book"></i> <span>Courses</span>
                    </a>
                </li>

                <!-- <li class="nav-item">-->
                <!--    <a href="{{ route('exams.index') }}"-->
                <!--       class="nav-link ">-->
                <!--        <i class="fa fa-clock-o" aria-hidden="true"></i>-->
                <!--        <span>Upload Exam</span></a>-->
                <!--</li>-->

                {{--Manage Subjects--}}
                <li class="nav-item nav-item-submenu ">
                    <a href="#" class="nav-link"><i class="icon-pin"></i> <span>Subjects Management</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Manage Subjects">
                        <li class="nav-item">
                            <a href="{{ route('subjects.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}"><i></i>
                                                     <span>Subjects</span>
                                                 </a>
                        </li>

                    </ul>
                </li>

                {{-- Evaluation --}} @endif @if(Qs::userIsTeamSAT())
                <!-- <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="fa fa-sticky-note"></i> <span> Reporting</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Manage Students">
                        {{-- Admit Student--}} {{-- Student Information--}}
                        <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'nav-item-expanded' : '' }}">
                            <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'active' : '' }}">
                                <i class="icon-users" aria-hidden="true"></i>Class wise Students
                            </a>
                            <ul class="nav nav-group-sub">
                                @foreach(App\Models\MyClass::orderBy('name')->get() as $c)
                                <li class="nav-item">
                                    <a href="{{ route('students.list', $c->id) }}" class="nav-link ">
                                        <i class="fa fa-university" aria-hidden="true"></i> {{ $c->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        {{-- Teacher Information --}} @if(Qs::userIsTeamSA())

                        <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'nav-item-expanded' : '' }}">
                            <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'active' : '' }}">
                                <i class="icon-users" aria-hidden="true"></i>Teacher
                            </a>
                            <ul class="nav nav-group-sub">

                                <a href="{{ route('teachers.list') }}" class="nav-link ">
                                    <i class="icon-users" aria-hidden="true"></i>Teacher's Record</a>

                            </ul>
                        </li>
                        @endif
                 

                    </ul>
                </li> -->
                @endif {{-- Exam--}} {{-- @if(Qs::userIsTeamSAT())--}} {{--
                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['exams.index', 'exams.edit', 'grades.index', 'grades.edit', 'marks.index', 'marks.manage', 'marks.bulk', 'marks.tabulation', 'marks.show', 'marks.batch_fix',]) ? 'nav-item-expanded nav-item-open' : '' }} ">--}} {{-- <a href="#" class="nav-link"><i class="fa fa-pencil-square"></i> <span> Exams</span></a>--}} {{--
                    <ul class="nav nav-group-sub" data-submenu-title="Manage Exams">--}} {{-- @if(Qs::userIsTeamSA())--}} {{-- --}}{{-- Exam list--}} {{--
                        <li class="nav-item">--}} {{-- <a href="{{ route('exams.index') }}" --}} {{-- class="nav-link {{ (Route::is('exams.index')) ? 'active' : '' }}">--}}

                {{--                                        <i class="fa fa-list-alt" aria-hidden="true"></i>Exam List</a>--}} {{-- </li>--}} {{-- --}}{{-- Grades list--}} {{--
                        <li class="nav-item">--}} {{-- <a href="{{ route('grades.index') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['grades.index', 'grades.edit']) ? 'active' : '' }}">--}}
                {{--                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>--}}
                {{--                                        Grades</a>--}} {{-- </li>--}} {{-- --}}{{-- Tabulation Sheet--}} {{--
                        <li class="nav-item">--}} {{-- <a href="{{ route('marks.tabulation') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['marks.tabulation']) ? 'active' : '' }}">Tabulation--}}
                {{--                                        Sheet</a>--}} {{-- </li>--}} {{-- Marks Batch Fix--}} {{--
                        <li class="nav-item">--}} {{-- <a href="{{ route('marks.batch_fix') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['marks.batch_fix']) ? 'active' : '' }}">Batch--}}
                {{--                                        Fix</a>--}} {{-- </li>--}} {{-- @endif--}} {{-- @if(Qs::userIsTeamSAT())--}} {{-- Marks Manage--}} {{--
                        <li class="nav-item">--}} {{-- <a href="{{ route('marks.index') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['marks.index']) ? 'active' : '' }}">--}}
                {{--                                        <i class="fa fa-list-ul" aria-hidden="true"></i>Marks</a>--}} {{-- </li>--}} {{-- Marksheet--}} {{--
                        <li class="nav-item">--}} {{-- <a href="{{ route('marks.bulk') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['marks.bulk', 'marks.show']) ? 'active' : '' }}">--}}
                {{--                                        <i class="fa fa-list-alt" aria-hidden="true"></i>Marksheet</a>--}} {{-- </li>--}} {{-- @endif--}} {{-- </ul>--}} {{-- </li>--}} {{-- @endif--}} {{--End Exam--}} {{-- Frontend website --}} @if(Qs::userIsTeamSA())


                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['exams.index', 'exams.edit', 'grades.index', 'grades.edit', 'marks.index', 'marks.manage', 'marks.bulk', 'marks.tabulation', 'marks.show', 'marks.batch_fix',]) ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="icon-books"></i>
                            <span> Website Management (CMS)</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="">
                        @if(Qs::userIsTeamSA())



                        <li class="nav-item nav-item-submenu ">
                            <a href="#" class="nav-link"><i class="icon-office"></i> <span> Home Page</span></a>

                            <ul class="nav nav-group-sub" data-submenu-title="Administrative">

                                <li class="nav-item">
                                    <a href="{{ route('homepage.index') }}" class="nav-link {{ (Route::is('frontcourse.index')) ? 'active' : '' }}">
                                        <i class="fa fa-book"></i> Home Page
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('homepagegallery.index') }}" class="nav-link {{ (Route::is('frontcourse.index')) ? 'active' : '' }}">
                                        <i class="fa fa-book"></i> Home Page Gallery
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('homepagevideo.index') }}" class="nav-link {{ (Route::is('frontcourse.index')) ? 'active' : '' }}">
                                        <i class="fa fa-book"></i> Home Page Video
                                    </a>
                                </li>
                            </ul>





                            <li class="nav-item">
                                <a href="{{ route('frontcourse.index') }}" class="nav-link {{ (Route::is('frontcourse.index')) ? 'active' : '' }}">
                                    <i class="fa fa-book"></i> Course</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('frontpricing.index') }}" class="nav-link {{ (Route::is('frontpricing.index')) ? 'active' : '' }}">
                                    <i class="fa fa-usd" aria-hidden="true"></i>Pricing</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('fronttestimonial.index') }}" class="nav-link {{ (Route::is('fronttestimonial.index')) ? 'active' : '' }}">
                                    <i class="fa fa-quote-left" aria-hidden="true"></i>Testimonial</a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('frontblog.index') }}" class="nav-link {{ (Route::is('frontblog.index')) ? 'active' : '' }}">
                                    <i class="fa fa-rss-square" aria-hidden="true"></i>Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('frontfaq.index') }}" class="nav-link {{ (Route::is('frontfaq.index')) ? 'active' : '' }}">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i>Faq</a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('frontgallery.index') }}" class="nav-link {{ (Route::is('frontgallery.index')) ? 'active' : '' }}">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>Gallery</a>
                            </li>



                            @endif


                    </ul>
                    </li>

                    {{--
                    <li class="nav-item nav-item-submenu">


                        <a href="#" class="nav-link"><i class="fa fa-list-alt"></i> <span> Applications </span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">

                            <li class="nav-item">
                                <a href="{{ route('students.general_app') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.general_app']) ?  : '' }}"><i
                                        class="icon-user"></i> <span>General Application</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('students.drop_a_complain') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.drop_a_complain']) ?  : '' }}"><i
                                        class="icon-user"></i> <span>Drop a Complain</span></a>
                            </li>
                        </ul>
                    </li> --}} @endif {{-- frontend website end --}} @if(Qs::userIsTeamSA())
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="fa fa-list-alt"></i> <span> Applications </span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">

                            <li class="nav-item">
                                <a href="{{ route('students.general_app') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.general_app']) ?  : '' }}">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <span>General Application</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('students.drop_a_complain') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.drop_a_complain']) ?  : '' }}">
                                    <i class="fa fa-dropbox" aria-hidden="true"></i> <span>Drop a Complain</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item nav-item-submenu ">
                        <a href="#" class="nav-link"><i class="fa fa-check-circle" aria-hidden="true"></i> <span>Evaluation</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Manage Subjects">
                            <li class="nav-item">
                                <a href="{{ route('student_evaluation.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}">
                                    <i class="icon-user" aria-hidden="true"></i> <span>Students Evaluation</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('teacher_evaluation.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}">
                                    <i class="icon-user" aria-hidden="true"></i> <span>Teachers Evaluation</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    @endif @if(Qs::userIsTeamSA())
                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="fa fa-bullhorn" aria-hidden="true"></i> <span> Announcements </span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">

                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'nav-item-expanded' : '' }}">
                                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'active' : '' }}">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Instructions
                                </a>
                                <ul class="nav nav-group-sub">

                                    <a href="{{ route('std_ins.index') }}" class="nav-link "><i class="icon-user" aria-hidden="true"></i>Students
                                        Instructions</a>

                                </ul>
                                <ul class="nav nav-group-sub">

                                    <a href="{{ route('teacher_ins.index') }}" class="nav-link "><i class="icon-user" aria-hidden="true"></i>Teachers
                                        Instructions</a>
                                </ul>
                            </li>

                            {{-- Teacher Information --}} @if(Qs::userIsTeamSA())

                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'nav-item-expanded' : '' }}">
                                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'active' : '' }}">
                                    <i class="fa fa-bell" aria-hidden="true"></i>Notification
                                </a>
                                <ul class="nav nav-group-sub">

                                    <a href="{{ route('std_noti.index') }}" class="nav-link "><i class="icon-user" aria-hidden="true"></i>Students
                                            Notification</a>

                                </ul>
                                <ul class="nav nav-group-sub">

                                    <a href="{{ route('teacher_noti.index') }}" class="nav-link "><i class="icon-user" aria-hidden="true"></i>Teachers
                                            Notification</a>

                                </ul>
                            </li>

                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'nav-item-expanded' : '' }}">
                                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['teachers.list', 'teachers.edit', 'teachers.show']) ? 'active' : '' }}">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Updates
                                </a>
                                <ul class="nav nav-group-sub">

                                    <a href="{{ route('std_updates.index') }}" class="nav-link "><i class="icon-user" aria-hidden="true"></i>Students Class
                                            Updates</a>

                                </ul>
                                <ul class="nav nav-group-sub">

                                    <a href="{{ route('teacher_updates.index') }}" class="nav-link "><i class="icon-user" aria-hidden="true"></i>Teachers
                                            Updates</a>

                                </ul>
                            </li>


                            @endif
                            <!--                            {{--                            @if(Qs::userIsTeamSA())--}}-->

                            <!--                            {{--                            Student Promotion--}}-->
                            <!--                            {{--                            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage']) ? 'nav-item-expanded' : '' }}"><a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage' ]) ? 'active' : '' }}">Student Promotion</a>--}}-->
                            <!--                            {{--                            <ul class="nav nav-group-sub">--}}-->
                            <!--                            {{--                                <li class="nav-item"><a href="{{ route('students.promotion') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion']) ? 'active' : '' }}">Promote Students</a></li>--}}-->
                            <!--                            {{--                                <li class="nav-item"><a href="{{ route('students.promotion_manage') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.promotion_manage']) ? 'active' : '' }}">Manage Promotions</a></li>--}}-->
                            <!--                            {{--                            </ul>--}}-->

                            <!--                            {{--                            </li>--}}-->

                            <!--                            {{--                            Student Graduated--}}-->
                            <!--                            {{--                            <li class="nav-item"><a href="{{ route('students.graduated') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.graduated' ]) ? 'active' : '' }}">Students Graduated</a></li>--}}-->
                            <!--                            {{--                            @endif--}}-->

                        </ul>
                    </li>
                    @endif @if(Qs::userIsTeacher())

                    <li class="nav-item">
                        <a href="{{ route('teacher.my_courses') }}" class="nav-link ">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <span>My Courses</span></a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="{{ route('teacher.my_students') }}" class="nav-link ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>My Students</span></a>
                    </li> -->



                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="fa fa-table"
                                                        aria-hidden="true"></i><span>Upload Study Material </span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">




                    <li class="nav-item">
                        <a href="{{ route('teacher.uploadlecture') }}" class="nav-link ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Upload Study Material</span></a>
                    </li>


                    <li class="nav-item ">
                        <a href="{{ route('teacher_assignment.index') }}" class="nav-link ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Upload Assignment</span></a>
                    </li>

                    <!--<li class="nav-item">-->
                    <!--    <a href="{{ route('exams.index') }}"-->
                    <!--       class="nav-link "-->
                    <!--    >-->
                    <!--        <i class="fa fa-clock-o" aria-hidden="true"></i>-->
                    <!--        <span>Upload Exam</span></a>-->
                    <!--</li>-->


                    <li class="nav-item">
                        <a href="{{ route('teacher.paper') }}" class="nav-link ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Create Paper</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('teacher.resultlist') }}" class="nav-link ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Result List</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teacher.scheduleAClass') }}" class="nav-link ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Schedule A Class</span></a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ route('teachers.view.survey') }}" class="nav-link ">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>View Student Feedback</span></a>
                    </li>
                </ul>

                    <li class="nav-item">
                        <a href="{{ route('teachers.teacer_rules') }}" class="nav-link ">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Rules And Regulations</span></a>
                    </li>




                    @endif @if(Qs::userIsStudent())

                    <li class="nav-item">
                        <a href="{{ route('students.class_schedule') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.class_schedule']) ?  : '' }}">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> <span>Online Class Schedule</span></a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('students.course_register') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.course_register']) ?  : '' }}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Registered Courses</span></a>
                    </li>




                    <li class="nav-item">
                        <a href="{{ route('students.offered_courses') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.offered_courses']) ?  : '' }}">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>

                            <span>Offered Courses</span></a>
                    </li>




                    <li class="nav-item">
                        <a href="{{ route('students.survey') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['students.survey']) ?  : '' }}">
                            <i class="fa fa-file-text" aria-hidden="true"></i> <span>Survey for students</span></a>
                    </li>

                    <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                        <a href="#" class="nav-link"><i class="fa fa-table"
                                                        aria-hidden="true"></i><span> Study Material </span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">

                            {{--
                            <li class="nav-item">--}} {{--
                                <a href="{{ route('students.general_app') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['students.general_app']) ?  : '' }}">
                                    <i--}} {{-- class="icon-user"></i> <span>Lectures</span></a>--}} {{-- </li>--}} {{--
                            <li class="nav-item">--}} {{--
                                <a href="{{ route('students.general_app') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['students.general_app']) ?  : '' }}">
                                    <i--}} {{-- class="icon-user"></i> <span>Assignments</span></a>--}} {{-- </li>--}} {{-- student.lecture.show --}}

                            <li class="nav-item">
                                <a href="{{ route('student.lecture.show') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['student.lecture.show']) ?  : '' }}"><i
                                        class="icon-user"></i> <span>Lectures</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('student_assignment.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['student_assignment.index']) ?  : '' }}"><i
                                        class="icon-user"></i> <span>Assignment</span></a>
                            </li>

                            {{--
                            <li class="nav-item">--}} {{--
                                <a href="{{ route('students.semester_app') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['students.semester_app']) ?  : '' }}">
                                    <i--}} {{-- class="icon-user"></i> <span>Quizes</span></a>--}} {{-- </li>--}} {{--
                            <li class="nav-item">--}} {{--
                                <a href="{{ route('students.semester_app') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['students.semester_app']) ?  : '' }}">
                                    <i--}} {{-- class="icon-user"></i> <span>Exam</span></a>--}} {{-- </li>--}}

                        </ul>
                    </li>


                    {{-- chat section starts --}} {{--
                    <li class="nav-item">--}} {{--
                        <a href="{{ route('students.survey') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['students.survey']) ?  : '' }}">
                            <i--}} {{-- class="fa fa-comments" aria-hidden="true"></i> <span>Chats</span></a>--}} {{-- </li>--}} {{-- chat section ends --}}


                    <li class="nav-item">
                        <a href="{{ route('std_paper.paper.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['std_paper.paper.index']) ?  : '' }} "><i
                                class="fa fa-comments" aria-hidden="true"></i> <span>Start Online Exam</span></a>
                    </li>



                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="fa fa-list-alt" aria-hidden="true"></i> <span> Application </span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">

                            <li class="nav-item">
                                <a href="{{ route('individual_students.general_app') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['individual_students.general_app']) ?  : '' }}"><i
                                        class="fa fa-list-alt" aria-hidden="true"></i> <span>General Application</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('individual_students.drop_a_complain') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['individual_students.drop_a_complain']) ?  : '' }}">
                                    <i class="fa fa-dropbox" aria-hidden="true"></i><span>Drop a Complain</span></a>
                            </li>
                        </ul>
                    </li>

                    {{--
                    <li class="nav-item">--}} {{-- <a href="{{ route('students.curriculum') }}" --}} {{-- class="nav-link {{ in_array(Route::currentRouteName(), ['students.curriculum']) ?  : '' }}"><i class="fa fa-list-alt" aria-hidden="true"></i> <span>Curriculum</span></a>--}}
                        {{-- </li>--}}


                    <li class="nav-item">
                        <a href="{{ route('students.student_rules') }}" class="nav-link ">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Rules And Regulations</span></a>
                    </li>

                    @endif @if(Qs::userIsTeamSA())


                    <li class="nav-item">
                        <a href="{{ route('policies.index') }}" class="nav-link ">

                            <i class="fa fa-list"></i>
                            <span>Policy</span></a>
                    </li>
                    @endif {{-- marksheet --}} {{-- @include('pages.'.Qs::getUserType().'.menu')--}} {{-- marksheet is hidden --}} {{--Manage Account--}}

                    <li class="nav-item">
                        <a href="{{ route('my_account') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['my_account']) ? 'active' : '' }}"><i
                            class="icon-user"></i> <span>My Account</span></a>
                    </li>

                    {{--
                    <li class="nav-item">--}} {{-- <a href="{{ route('students.general_app') }}">--}}

                {{--                        <i class="icon-user"></i> <span>Online Class Schedule</span></a>--}} {{-- </li>--}}

            </ul>
        </div>
    </div>
</div>