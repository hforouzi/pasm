<div id="app" class="app-navbar-fixed app-sidebar-fixed">
    <!-- sidebar -->
    <div class="sidebar app-aside" id="sidebar">
        <div class="sidebar-container perfect-scrollbar">
            <nav>

                <!-- start: MAIN NAVIGATION MENU -->
                <div class="navbar-title">
                    <span>Main Navigation</span>
                </div>
                <ul class="main-navigation-menu">
                    <li class="active">
                        <a href="/">
                            <div class="item-content">
                                <div class="item-media">
                                    <i class="ti-home"></i>
                                </div>
                                <div class="item-inner">
                                    <span class="title"> داشبورد </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @foreach(\App\Menu::all(['menu_name',"menu_slug"])as $item)
                        <li>
                            <a href="{{route($item['menu_slug'])}}">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="ti-home"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> {{$item["menu_name"]}} </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach

                </ul>
                <!-- end: MAIN NAVIGATION MENU -->
                <!-- start: CORE FEATURES -->
                <div class="navbar-title">
                    <span>Core Features</span>
                </div>
                <ul class="folders">
                    <li>
                        <a href="pages_calendar.html">
                            <div class="item-content">
                                <div class="item-media">
                                    <span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                </div>
                                <div class="item-inner">
                                    <span class="title"> Calendar </span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="pages_messages.html">
                            <div class="item-content">
                                <div class="item-media">
                                    <span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i> </span>
                                </div>
                                <div class="item-inner">
                                    <span class="title"> Messages </span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- end: CORE FEATURES -->
                <!-- start: DOCUMENTATION BUTTON -->
                <div class="wrapper">
                    <a href="#" class="button-o">
                        <span>راهنما</span>
                        <i class="ti-help"></i>
                    </a>
                </div>
                <!-- end: DOCUMENTATION BUTTON -->
            </nav>
        </div>
    </div>
    <!-- / sidebar -->