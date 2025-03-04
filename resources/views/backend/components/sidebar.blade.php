        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="{{route('admin.dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet">
                                        Dashboard</span></a></li>
                            <li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet">
                                        Messages</span></a></li>
                            {{-- <li><a href="tasks.html"><i class="icon-tasks"></i><span class="hidden-tablet">
                                        Tasks</span></a></li>
                            <li><a href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI
                                        Features</span></a></li>
                            <li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet">
                                        Widgets</span></a></li> --}}
                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                                        class="hidden-tablet"> Category</span><span class="label label-important">3
                                    </span></a>
                                <ul>
                                    <li><a class="submenu" href="{{route('categories.create')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Add Category</span></a></li>
                                    {{-- <li><a class="submenu" href="#"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Edit Category</span></a></li> --}}
                                    <li><a class="submenu" href="{{route('categories.index')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Manage Category</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                                        class="hidden-tablet">Sub Category</span><span class="label label-important">3
                                    </span></a>
                                <ul>
                                    <li><a class="submenu" href="{{route('subcategories.create')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Add SubCategory</span></a></li>
                                    {{-- <li><a class="submenu" href="#"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Edit Category</span></a></li> --}}
                                    <li><a class="submenu" href="{{route('subcategories.index')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Manage subCategory</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span
                                        class="hidden-tablet">Brand</span><span class="label label-important">3
                                    </span></a>
                                <ul>
                                    <li><a class="submenu" href="{{route('brands.create')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Add Brand</span></a></li>
                                    {{-- <li><a class="submenu" href="#"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Edit Category</span></a></li> --}}
                                    <li><a class="submenu" href="{{route('brands.index')}}"><i class="icon-file-alt"></i><span
                                                class="hidden-tablet">Manage Brand</span></a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
