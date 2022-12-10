@extends('app')

@section('content')



<!-- Start Content-->
<div class="container-fluid">

<!-- Begin page -->
<div class="wrapper">

<div class="content-page">
<div class="content">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            <h4 class="page-title">Profile</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                @if(Session::has('avatar'))
                <img src="{{ asset('uploads/profile/'. Session::get('avatar'))}}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">              
                                       
                @else
                            <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
                @endif

                <h4 class="mb-0 mt-2">{{$member->name}}</h4>
                <p class="text-muted font-14">{{$member->role->role}}</p>

                <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                <div class="text-start mt-3">
                    <h4 class="font-13 text-uppercase">{{__('About Me')}}:</h4>
                    <p class="text-muted font-13 mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type.
                    </p>
                    <p class="text-muted mb-2 font-13"><strong>{{__('Full Name')}} :</strong>
                        <span class="ms-2">
                            {{$member->name}}
                        </span>
                    </p>

                    <p class="text-muted mb-2 font-13"><strong>{{__('Mobile')}} :</strong>
                        <span class="ms-2">
                            {{$member->phone}}
                        </span>
                    </p>

                    <p class="text-muted mb-2 font-13"><strong>{{__('Email')}} :</strong>
                        <span class="ms-2 ">
                            {{$member->email}}
                        </span>
                    </p>

                    <p class="text-muted mb-1 font-13"><strong>{{__('Location')}} :</strong>
                        <span class="ms-2">
                            USA
                        </span>
                    </p>
                </div>

                <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                    </li>
                </ul>
            </div> <!-- end card-body -->
        </div> <!-- end card -->

        <!-- Messages-->
        {{-- <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-3">Messages</h4>

                <div class="inbox-widget">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Tomaslau</p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Stillnotdavid</p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Kurafire</p>
                        <p class="inbox-item-text">Nice to meet you</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Shahedk</p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author">Adhamdannaway</p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">
                            <a href="#" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                        </p>
                    </div>
                </div> <!-- end inbox-widget -->
            </div> <!-- end card-body-->
        </div>  --}}
        <!-- end card-->

    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            About
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                            Timeline
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="aboutme">

                        <h5 class="text-uppercase"><i class="mdi mdi-briefcase me-1"></i>
                            Experience</h5>

                        <div class="timeline-alt pb-0">
                            <div class="timeline-item">
                                <i class="mdi mdi-circle bg-info-lighten text-info timeline-icon"></i>
                                <div class="timeline-item-info">
                                    <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                    <p class="font-14">websitename.com <span class="ms-2 font-12">Year: 2015 - 18</span></p>
                                    <p class="text-muted mt-2 mb-0 pb-3">Everyone realizes why a new common language
                                        would be desirable: one could refuse to pay expensive translators.
                                        To achieve this, it would be necessary to have uniform grammar,
                                        pronunciation and more common words.</p>
                                </div>
                            </div>

                            <div class="timeline-item">
                                <i class="mdi mdi-circle bg-primary-lighten text-primary timeline-icon"></i>
                                <div class="timeline-item-info">
                                    <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                    <p class="font-14">Software Inc. <span class="ms-2 font-12">Year: 2012 - 15</span></p>
                                    <p class="text-muted mt-2 mb-0 pb-3">If several languages coalesce, the grammar
                                        of the resulting language is more simple and regular than that of
                                        the individual languages. The new common language will be more
                                        simple and regular than the existing European languages.</p>

                                </div>
                            </div>

                            <div class="timeline-item">
                                <i class="mdi mdi-circle bg-info-lighten text-info timeline-icon"></i>
                                <div class="timeline-item-info">
                                    <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                    <p class="font-14">Coderthemes Design LLP <span class="ms-2 font-12">Year: 2010 - 12</span></p>
                                    <p class="text-muted mt-2 mb-0 pb-2">The European languages are members of
                                        the same family. Their separate existence is a myth. For science
                                        music sport etc, Europe uses the same vocabulary. The languages
                                        only differ in their grammar their pronunciation.</p>
                                </div>
                            </div>

                        </div>
                        <!-- end timeline -->

                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant me-1"></i>
                            Projects</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Clients</th>
                                        <th>Project Name</th>
                                        <th>Start Date</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="assets/images/users/avatar-2.jpg" alt="table-user" class="me-2 rounded-circle" height="24"> Halette Boivin</td>
                                        <td>App design and development</td>
                                        <td>01/01/2015</td>
                                        <td>10/15/2018</td>
                                        <td><span class="badge badge-info-lighten">Work in Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img src="assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 rounded-circle" height="24"> Durandana Jolicoeur</td>
                                        <td>Coffee detail page - Main Page</td>
                                        <td>21/07/2016</td>
                                        <td>12/05/2018</td>
                                        <td><span class="badge badge-danger-lighten">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img src="assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 rounded-circle" height="24"> Lucas Sabourin</td>
                                        <td>Poster illustation design</td>
                                        <td>18/03/2018</td>
                                        <td>28/09/2018</td>
                                        <td><span class="badge badge-success-lighten">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img src="assets/images/users/avatar-6.jpg" alt="table-user" class="me-2 rounded-circle" height="24"> Donatien Brunelle</td>
                                        <td>Drinking bottle graphics</td>
                                        <td>02/10/2017</td>
                                        <td>07/05/2018</td>
                                        <td><span class="badge badge-info-lighten">Work in Progress</span></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><img src="assets/images/users/avatar-5.jpg" alt="table-user" class="me-2 rounded-circle" height="24"> Karel Auberjo</td>
                                        <td>Landing page design - Home</td>
                                        <td>17/01/2017</td>
                                        <td>25/05/2021</td>
                                        <td><span class="badge badge-warning-lighten">Coming soon</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end tab-pane -->
                    <!-- end about me section content -->

                    <div class="tab-pane show active" id="timeline">

                        <!-- comment box -->
                        <div class="border rounded mt-2 mb-3">
                            <form action="#" class="comment-area-box">
                                <textarea rows="3" class="form-control border-0 resize-none" placeholder="Write something...."></textarea>
                                <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-account-circle"></i></a>
                                        <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-map-marker"></i></a>
                                        <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-camera"></i></a>
                                        <a href="#" class="btn btn-sm px-2 font-16 btn-light"><i class="mdi mdi-emoticon-outline"></i></a>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-dark waves-effect">Post</button>
                                </div>
                            </form>
                        </div> <!-- end .border-->
                        <!-- end comment box -->

                        <!-- Story Box-->
                        <div class="border border-light rounded p-2 mb-3">
                            <div class="d-flex">
                                <img class="me-2 rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="32">
                                <div>
                                    <h5 class="m-0">Jeremy Tomlinson</h5>
                                    <p class="text-muted"><small>about 2 minuts ago</small></p>
                                </div>
                            </div>
                            
                            <p>Story based around the idea of time lapse, animation to post soon!</p>

                            <img src="assets/images/small/small-1.jpg" alt="post-img" class="rounded me-1" height="60" />
                            <img src="assets/images/small/small-2.jpg" alt="post-img" class="rounded me-1" height="60" />
                            <img src="assets/images/small/small-3.jpg" alt="post-img" class="rounded" height="60" />

                            <div class="mt-2">
                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-heart-outline"></i> Like</a>
                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                            </div>
                        </div>

                        <!-- Story Box-->
                        <div class="border border-light rounded p-2 mb-3">
                            <div class="d-flex">
                                <img class="me-2 rounded-circle" src="assets/images/users/avatar-4.jpg" alt="Generic placeholder image" height="32">
                                <div>
                                    <h5 class="m-0">Thelma Fridley</h5>
                                    <p class="text-muted"><small>about 1 hour ago</small></p>
                                </div>
                            </div>
                            <div class="font-16 text-center fst-italic text-dark">
                                <i class="mdi mdi-format-quote-open font-20"></i> Cras sit amet nibh libero, in
                                gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                porta. Mauris massa.
                            </div>

                            <div class="mx-n2 p-2 mt-3 bg-light">
                                <div class="d-flex">
                                    <img class="me-2 rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="32">
                                    <div>
                                        <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                        Nice work, makes me think of The Money Pit.

                                        <br />
                                        <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                                        <div class="d-flex mt-3">
                                            <a class="pe-2" href="#">
                                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt="Generic placeholder image" height="32">
                                            </a>
                                            <div>
                                                <h5 class="mt-0">Thelma Fridley <small class="text-muted">5 hours ago</small></h5>
                                                i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex mt-2">
                                    <a class="pe-2" href="#">
                                        <img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt="Generic placeholder image" height="32">
                                    </a>
                                    <div class="w-100">
                                        <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="mdi mdi-heart"></i> Like (28)</a>
                                <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="mdi mdi-share-variant"></i> Share</a>
                            </div>
                        </div>

                        <!-- Story Box-->
                        <div class="border border-light p-2 mb-3">
                            <div class="d-flex">
                                <img class="me-2 rounded-circle" src="assets/images/users/avatar-6.jpg" alt="Generic placeholder image" height="32">
                                <div>
                                    <h5 class="m-0">Martin Williamson</h5>
                                    <p class="text-muted"><small>15 hours ago</small></p>
                                </div>
                            </div>
                            <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                            <iframe src='https://player.vimeo.com/video/87993762' height='300' class="img-fluid border-0"></iframe>
                        </div>

                        <div class="text-center">
                            <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                        </div>

                    </div>
                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                        <!-- *** @ user data*** -->
                       @php
                           $userData = DB::table('user_details')->where('user_id',decrypt(session()->get('userId')))->first();
                       @endphp
                        <form action="{{ route('userdetails.update',$member)}}" method="POST" >
                            @csrf
                            @method('post')
                            <input type="number" hidden name="user_id" value="{{$member->id}}">
                            {{-- <input type="number" hidden name="userdetails_id" value="{{$member->userDetails->id}}"> --}}
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> {{__('Personal Info')}}</h5>
                             <input type="text" hidden value="{{decrypt(session()->get('roleIdentity'))}}" id="authName">
                             {{-- <input type="text"  value="{{Input::get('id')}}" id="authName"> --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="userbio" class="form-label">{{__('Bio')}}</label>
                                        <textarea class="form-control" id="userbio" rows="4"
                                        name="userbio"
                                        placeholder="Write something...">{{$userData?->bio}}</textarea>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <!-- ! users table -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstname" class="form-label">{{__('First Name')}} :</label>
                                        <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="name" value="{{$member->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">{{__('Last Name')}}</label>
                                        <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                           

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">{{__('Email Address')}} :</label>
                                        <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email" value="{{$member->email}}" readonly>
                                        <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">{{__('Phone')}} :</label>
                                        <input type="tel" class="form-control" name="phone" id="userpassword" placeholder="Enter password" value="{{$member->phone}}" readonly>
                                        <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                    </div>
                                </div> <!-- end col -->
                                <span class="d-flex justify-content-end float-end">
                                    <a href="#" class="btn btn-warning float-end">{{__('Change Password')}} ?</a>
                                </span>
                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> {{__('Company Info')}}</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fathername" class="form-label">
                                            {{__('Father\'s Name')}} :
                                        </label>
                                        <input type="text" class="form-control" id="fathername" 
                                        name="userFatherName"
                                        placeholder="Enter father's name" value="{{$userData?->father_name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="mothername" class="form-label">
                                            {{__('Mother\'s Name')}} :
                                        </label>
                                        <input type="text" class="form-control" id="mothername" name="mothername" placeholder="Enter mother's name" value="{{$userData?->mother_name}}">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">
                                            {{__('Designation')}} : </label>
                                            @if(decrypt(session()->get('roleIdentity')) === 'admin')
                                            {{-- <select id="inputState" class="form-select">
                                                <option>{{_('Designation')}}</option>
                                                @php
                                                 $designations = DB::table('designatins')   
                                                @endphp
                                                    @forelse ($designations as $designation)
                                                    <option value="">
                                                        {{$designation->designation}}
                                                    </option>
                                                    @empty
                                                    <option>No data Found!</option>
                                                    @endforelse
                                            </select> --}}
                                            @else
                                            <input readonly type="text" class="form-control" id="mothername" name="designation" value="">
                                            @endif
                                           
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="usergender" class="form-label">{{__('Gender')}}</label>
                                        <select id="usergender" name="usergender"class="form-select">
                                            <option>{{_('Select Gender')}}</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Others</option>
                                        </select>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <hr> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="preaddress" class="form-label">{{__('Present Address')}}</label>
                                        <textarea class="form-control" rows="6" id="preaddress" name="preaddress" placeholder="1234 Main St"></textarea>
                                    </div>
                                </div>
                                 @php
                                    $countires = DB::table('countries')->get();

                                 @endphp
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="country" class="form-label">{{__('Country')}}</label>
                                    <select id="inputState" name="country"class="form-select" >
                                       
                                        <option>{{_('Select Country')}}</option>
                                        @forelse ($countires as $country)
                                        <option value="{{$country->id}}">{{$country->country}}</option>
                                            
                                        @empty
                                        <option>No data Found</option>
                                            
                                        @endforelse
                                    </select>
                                </div>  
                                @php
                                    $divisions = DB::table('divisions')->get();
                                        
                                @endphp
                                <div class="mb-3">
                                    <label for="division" class="form-label">{{__('Division')}}</label>
                                    <select id="divisons" name="division" class="form-select">
                                      
                                        <option>{{_('Select Division')}}</option>

                                    @forelse ($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->divison}}</option>
                                        
                                    @empty
                                    <option>No data Found</option>
                                        
                                    @endforelse
                                    </select>
                                </div>
                                @php
                                    $districts = DB::table('districts')->get();
                                        
                                @endphp
                                <div class="mb-3">
                                    <label for="district" class="form-label">{{__('District')}}</label>
                                    <select id="district" name="district" class="form-select">
                                        
                                        <option>{{_('Select District')}}</option>

                                    @forelse ($districts as $district)
                                    <option value="{{$district->id}}">{{$district->district}}</option>
                                        
                                    @empty
                                    <option>No data Found</option>
                                        
                                    @endforelse
                                    </select>
                                </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                                   <hr>       
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="peraddress" class="form-label">{{__('Permanent Address')}}</label>
                                        <textarea class="form-control" name="peraddress" rows="6" id="inputAddress" placeholder="1234 Main St"> 

                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label for="slectcountry" class="form-label">{{__('Country')}}</label>
                                    <select id="slectcountry" name="slectcountry" class="form-select">
                                        <option>{{_('Select Country')}}</option>
                                        @forelse ($countires as $country)
                                        <option value="{{$country->id}}">{{$country->country}}</option>
                                            
                                        @empty
                                        <option>No data Found</option>
                                            
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="slectdivision" class="form-label">{{__('Division')}}</label>
                                    <select id="slectdivision" name="slectdivision" class="form-select">
                                    <option>{{_('Select Division')}}</option>

                                        @forelse ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->divison}}</option>
    
                                        @empty
                                            <option>No data Found</option>
    
                                        @endforelse
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="slectdistrict" class="form-label">{{__('District')}}</label>
                                    <select id="slectdistrict" name="slectdistrict" class="form-select">
                                        <option>{{_('Select District')}}</option>

                                        @forelse ($districts as $district)
                                            <option value="{{$district->id}}">{{$district->district}}</option>
    
                                            @empty
                                            <option>No data Found</option>
    
                                            @endforelse
                                    </select>
                                </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            {{-- <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                            <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-tw" class="form-label">Twitter</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                            <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-insta" class="form-label">Instagram</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                            <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-lin" class="form-label">Linkedin</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                                            <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-sky" class="form-label">Skype</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                                            <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-gh" class="form-label">Github</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-github"></i></span>
                                            <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row --> --}}

                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row-->

</div> <!-- End Content -->

<!-- Footer Start -->
<footer class="footer">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <script>
                document.write(new Date().getFullYear())
            </script> © Hyper - Coderthemes.com
        </div>
        <div class="col-md-6">
            <div class="text-md-end footer-links d-none d-md-block">
                <a href="javascript: void(0);">About</a>
                <a href="javascript: void(0);">Support</a>
                <a href="javascript: void(0);">Contact Us</a>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- end Footer -->

</div> <!-- content-page -->

</div> <!-- end wrapper-->
</div>
<!-- END Container -->

@endsection

@push('scripts')

<script>

    // function selectedCountry(value){
    //     let divisons = $('#divisons');
    //     let authName = $('#authName').val();


    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     const host = `${window.location.origin}/${authName}/division/${value}`;
  
    //     $.ajax({
    //         type: "GET",
    //         url: host,
    //         // dataType: "dataType",
    //         success: function (response) {
    //             console.log(response);
    //         }
    //     });
    // }
</script>

@endpush

