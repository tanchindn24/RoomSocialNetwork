@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Posts List</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('provider.index')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Posts List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row project-cards">
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-0 me-0"></div><a class="btn btn-primary" href="{{route('provider.posts.create')}}"> <i data-feather="plus-square"></i>Create New Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="top-tabContent">
                                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                    <div class="row">
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Endless admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Themeforest, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">12 </div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">5</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">7</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+10 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>70% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Universal admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+3 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Poco admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">20</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+2 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Universal admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+3 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Endless admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Themeforest, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">12 </div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">5</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">7</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+10 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>70% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Poco admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">20</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+2 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                                    <div class="row">
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Endless admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Themeforest, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">12 </div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">5</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">7</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+10 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>70% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Universal admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">24</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">24</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">40</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+3 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Poco admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">40</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">40</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">20</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+2 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Universal admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">24</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">24</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">40</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+3 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Endless admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Themeforest, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">12 </div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">5</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">7</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+10 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>70% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Doing</span>
                                                <h6>Poco admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-primary">40</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-primary">40</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-primary">20</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+2 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                    <div class="row">
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Endless admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Themeforest, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">12 </div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">5</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">7</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+10 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>70% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Universal admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+3 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Poco admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">20</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+2 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Universal admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">24</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+3 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-primary">Done</span>
                                                <h6>Endless admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Themeforest, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">12 </div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">5</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">7</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+10 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>70% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success progress-bar-striped" role="progressbar" style="width: 70%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4 col-lg-6">
                                            <div class="project-box"><span class="badge badge-success">Done</span>
                                                <h6>Poco admin Design</h6>
                                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                                    <div class="media-body">
                                                        <p>Envato, australia</p>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                <div class="row details">
                                                    <div class="col-6"><span>Issues </span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Resolved</span></div>
                                                    <div class="col-6 text-success">40</div>
                                                    <div class="col-6"> <span>Comment</span></div>
                                                    <div class="col-6 text-success">20</div>
                                                </div>
                                                <div class="customers">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/5.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block"><img class="img-30 rounded-circle" src="../assets/images/user/1.jpg" alt="" data-original-title="" title=""></li>
                                                        <li class="d-inline-block ms-2">
                                                            <p class="f-12">+2 More</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-status mt-4">
                                                    <div class="media mb-0">
                                                        <p>100% </p>
                                                        <div class="media-body text-end"><span>Done</span></div>
                                                    </div>
                                                    <div class="progress" style="height: 5px">
                                                        <div class="progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
