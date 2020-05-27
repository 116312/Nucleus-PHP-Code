<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">

        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{(isset($page) && $page && $page == 'dashboard' ? 'active' : '')}}">
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="{{(isset($page) && $page && $page == 'users' ? 'active' : '')}}">
                    <a href="{{ url('admin/all-users') }}">
                        <i class="material-icons">people</i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="{{(isset($page) && $page && $page == 'workout-cate' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">collections_bookmark</i>
                        <span>Workout Categories</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-cate' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-cate') }}">Add Categories</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-cate' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-cate') }}">Show Categories</a>
                        </li>
                    </ul>
                </li>

                <li class="{{(isset($page) && $page && $page == 'training-plan' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">alarm_on</i>
                        <span>Training Plans</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-training-plan' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-training-plan') }}">Add Plans</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-training-plan' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-training-plan') }}">Show Plans</a>
                        </li>
                    </ul>
                </li>

                 <li class="{{(isset($page) && $page && $page == 'training-goals' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">alarm_on</i>
                        <span>Training Goals</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-training-goals' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-training-goals') }}">Add goals</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-training-goals' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-training-goals') }}">Show goals</a>
                        </li>
                    </ul>
                </li>

                <!--  <li class="{{(isset($page) && $page && $page == 'training-plan' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">alarm_on</i>
                        <span>Workouts</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-training-plan' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-workout-details') }}">Add Details</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-training-plan' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-training-plan') }}">Show Details</a>
                        </li>
                    </ul>
                </li> -->

               <!--  <li class="{{(isset($page) && $page && $page == 'workout-details' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">details</i>
                        <span>Workout Details</span>
                    </a>
                    <ul class="ml-menu"> 

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-workout-details' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-workout-details') }}">Add Workout Details</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-workout-details' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-workout-details') }}">Show Workout Details </a>
                        </li>
                    </ul>
                </li> -->



                <li class="{{(isset($page) && $page && $page == 'premium-workout-details' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">alarm_on</i>
                        <span>Premium Workouts Details</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-premium-workout-details' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-premium-workout-details') }}">Add Details</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-premium-workout-details' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-premium-workout-details') }}">Show Details</a>
                        </li>
                    </ul>
                </li>

               <!--  <li class="{{(isset($page) && $page && $page == 'quick-clip-workout-details' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">alarm_on</i>
                        <span>Quick Clip Workout Details</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-quick-clip-workout-details' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-quick-clip-workout-details') }}">Add Details</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-quick-clip-workout-details' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-quick-clip-workout-details') }}">Show Details</a>
                        </li>
                    </ul>
                </li> -->
                 
                


                 <li class="{{(isset($page) && $page && $page == 'workout-type' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Workout Types</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-workout-type' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-workout-type') }}">Add Workout Type</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-workout-type' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-workout-type') }}">Show Workout Type</a>
                        </li>
                    </ul>
                </li>


                 <li class="{{(isset($page) && $page && $page == 'workout-level' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">filter list</i>
                        <span>Workout Levels</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-workout-level' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-workout-level') }}">Add Workout Level</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-workout-level' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-workout-level') }}">Show Workout Level</a>
                        </li>
                    </ul>
                </li>

                <li class="{{(isset($page) && $page && $page == 'language' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">language</i>
                        <span>Languages</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-language' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-language') }}">Add Language</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-language' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-language') }}">Show Language</a>
                        </li>
                    </ul>
                </li>

                 <li class="{{(isset($page) && $page && $page == 'voice-guidance-type' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">record_voice_over</i>
                        <span>Voice Guidance Type</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-voice-guidance-type' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-voice-guidance-type') }}">Add Guidance Type</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-voice-guidance-type' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-voice-guidance-type') }}">Show Guidance Type</a>
                        </li>
                    </ul>
                </li>

                <li class="{{(isset($page) && $page && $page == 'quick-clips' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">gif</i>
                        <span>Quick Clips</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-quick-clips' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-quick-clips') }}">Add Quick Clips</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-quick-clips' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-quick-clips') }}">Show Quick Clips</a>
                        </li>
                    </ul>
                </li>

                <li class="{{(isset($page) && $page && $page == 'premium-videos' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings_input_svideo</i>
                        <span>Premium Videos</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-premium-videos' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-premium-videos') }}">Add Videos</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-premium-videos' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-premium-videos') }}">Show videos</a>
                        </li>
                    </ul>
                </li>








               <!--  <li class="{{(isset($page) && $page && $page == 'gif-details' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">record_voice_over</i>
                        <span>Gif Details</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-voice-guidance-type' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-gif-details') }}">Add Details</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-voice-guidance-type' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-gif-details') }}">Show Details</a>
                        </li>
                    </ul>
                </li>
 -->

                




                
               



                 <li class="{{(isset($page) && $page && $page == 'challenges-cate' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">golf_course</i>
                        <span>Challenges Category</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-chall-cate' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-chall-cate') }}">Add Categories</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-chall-cate' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-chall-cate') }}">Show Categories</a>
                        </li>
                    </ul>
                </li>


                <li class="{{(isset($page) && $page && $page == 'nucleus-challenges' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">format_quote</i>
                        <span>Nucleus Challenges</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-nuc-chall' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-nuc-chall') }}">Add Challenges</a>
                        </li>

                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-nuc-chall' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-nuc-chall') }}">Show Challenges</a>
                        </li>
                    </ul>
                </li>





                  <li class="{{(isset($page) && $page && $page == 'promo-management' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">format_quote</i>
                        <span>Promotion Management</span>
                    </a>
                    <ul class="ml-menu">
                         <li class="{{(isset($subapage) && $subpage && $subapage == 'promo-category' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">label_outline</i>
                        <span>Workout Category For Promotion</span>
                    </a>

                      <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-promo' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-promo_cate') }}">Add Workout Categories for Promotion</a>
                        </li>

                         <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-promo' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-promo_cate') }}">Show Workout Categories for Promotion</a>
                         </li>

                       </ul>
                    </li>

                    <li class="{{(isset($subapage) && $subpage && $subapage == 'promo-challenge' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">label_outline</i>
                        <span>Challenge For Promotion</span>
                    </a>
                    
                      <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-promo-chall' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-promo_chall') }}">Add Challenges for Promotion</a>
                        </li>

                         <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-promo' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-promo_chall') }}">Show Challenges for Promotion</a>
                         </li>

                       </ul>
                    </li>
                    <li class="{{(isset($subapage) && $subpage && $subapage == 'promo-video' ? 'active' : '')}}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">label_outline</i>
                        <span>Video</span>
                    </a>
                    
                      <ul class="ml-menu">
                        <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'add-promo-video' ? 'active' : '')}}">
                            <a href="{{ url('admin/add-promo_video') }}">Add Videos for Promotion</a>
                        </li>

                         <li class="{{(isset($sub_page) && $sub_page && $sub_page == 'show-promo-video' ? 'active' : '')}}">
                            <a href="{{ url('admin/show-promo_video') }}">Show Videos for Promotion</a>
                         </li>

                       </ul>
                    </li>
                    





                    </ul>
                </li>

                <li >
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Sign Out</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </a>
                </li>
                
               
                
               
            
               


            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2020- 2021<a href="javascript:void(0);">Nucleus</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>