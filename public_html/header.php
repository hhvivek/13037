    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    
    
    
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
    
                <?php
                      $row=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE username='".$myusername."'"));
                ?> 

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <script src="/webcam.min.js"></script>
        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        
        <script>$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>

<style>
footer{display:none;}
</style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
   
    <div id="main-wrapper">
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        
                        <b>
                           
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        
                        <span>
                         
                         <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                           
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                
                
                <div class="navbar-collapse">
                    
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                        
                        
                    </ul>
                    
                    
                    <ul class="navbar-nav my-lg-0">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo $row['img']; ?>/<?php echo $row['username']; ?>.jpg" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $row['name']; ?></h4>
                                                <p class="text-muted"><?php echo $row['email']; ?></p><a href="profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="email.php"><i class="ti-email"> </i> Compose Mail </a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="change-password.php"><i class="ti-settings"></i> Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <li><?php if($row['type']!='employee')
                        {
                        ?>
                            <a class="" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                        <?php
                        }
                        ?>
                            
                        </li>
                        
                        
                        
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Profile</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="profile.php">View/Modify Profile</a></li>
                                
                                <li><a href="change-password.php">Change Password</a></li>
                                
                            </ul>
                        </li>
                        
                        <?php if($row['type']=='admin' OR $row['type']=='manager')
                        {
                        ?>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Employee</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li><a href="add-employee.php">Add Employee</a></li>
                                <li><a href="modify-employee.php">View/Modify Employee</a></li>
                                
                                <li><a href="remove-employee.php">Remove Employee</a></li>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                         <?php if($row['type']=='admin')
                        {
                        ?>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Manager</span></a>
                            <ul aria-expanded="false" class="collapse">
                               
                               
                               
                                <li><a href="add-manager.php">Add Manager</a></li>
                                <li><a href="modify-manager.php">View/Modify Manager</a></li>
                                <li><a href="remove-manager.php">Remove Manager</a></li>
                               
                            </ul>
                        </li>
                        <?php
                        }
                        ?> 
                        
                        
                        <?php if($row['type']=='manager' OR $row['type']=='admin')
                        {
                        ?>
                        
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false">
                                <i class="mdi mdi-table"></i><span class="hide-menu">Employee Attendence</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                
                                
                                <li><a href="check-attendence-ticket.php">Check Attendance Tickets</a></li>
                                
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        
                        <?php if($row['type']=='employee')
                        {
                        ?>
                        <li>
                            <a class="" href="https://thelstera.com/mark-attendance.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Mark Attendance</span></a>
                            <a class="" href="request-attendance-ticket.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Attendance Ticket</span></a>

                            
                        </li>
                        
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                
            </div>
            
            <div class="sidebar-footer">
                <!-- item-->
                <a href="log-off.php" class="link" data-toggle="tooltip" title="Log Off"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="email.php" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->
                <a href="logout.php" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            
        </aside>
        
        