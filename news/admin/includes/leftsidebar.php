            <div class="left side-menu ">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>

                            <li class="has_sub">
                                <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> داشبرد </span> </a>
                         
                            </li>
                            <?php 
                if ($_SESSION['user_roll'] == "admin")
                include('lsb-adminView.php');
            
                else if ($_SESSION['user_roll'] == "editor")
                include('lsb-editorView.php');
               
                ?>

     

                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

 

                </div>
                <!-- Sidebar -left -->

            </div>