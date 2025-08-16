<header class="main-header">
    <!-- Logo -->
    <a href="home" class="logo">
        <span class="logo-mini">
            <img class="img-responsive" src="https://i.postimg.cc/qvB5jYxb/icono-negro.png" style="padding: 10px">
            <!-- this image are store in a site called postimage so to make any change you need to visi the main site -->
        </span>
        <span class="logo-lg">
            <img class="img-responsive" src="https://i.postimg.cc/YqzPNkYL/logo-blanco-lineal.png" style="padding: 10px 0">
        </span>
    </a>

    <!-- Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button -->
        <a class="sidebar-toggle" data-toggle="push-menu" href="#" role="button">
            <span class="sr-only">Toggle Navigation</span>
        </a>

        <!-- Search bar (will appear when clicked) -->
        <div id="searchContainer" style="display:none;" class="navbar-left">
            <form class="navbar-form" role="search" method="GET" action="search">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
                        <button type="button" class="btn btn-flat" id="closeSearch"><i class="fa fa-times"></i></button>
                    </span>
                </div>
            </form>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- Search Icon (triggers search bar) -->
                <li>
                    <a href="#" id="searchToggle"><i class="fa fa-search"></i></a>
                </li>

                <!-- Date & Time (will show full date when clicked) -->
                <li class="hidden-xs" id="dateTimeDisplay" style="padding:15px;color:white;cursor:pointer;">
                    <i class="fa fa-clock-o"></i> <span id="timeDisplay"><?php echo date("h:i A"); ?></span>
                </li>

                <!-- Notifications -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning" id="notificationCount">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <span id="notificationHeaderCount">0</span> notifications</li>
                        <li>
                            <ul class="menu" id="notificationList">
                                <li><a href="#"><i class="fa fa-refresh fa-spin"></i> Loading notifications...</a></li>
                            </ul>
                        </li>
                        <li class="footer"><a href="notifications">View all</a></li>
                    </ul>
                </li>

                <!-- User Menu -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php 
                            if (!empty($_SESSION["photo"])) {
                                echo '<img src="'.$_SESSION["photo"].'" class="user-image">';
                            } else {
                                echo '<img class="user-image" src="https://i.postimg.cc/G2B2Yqf9/prfplaceholder.png">';
                            }
                        ?>
                        <span class="hidden-xs"><?php echo $_SESSION["name"]; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User Info -->
                        <li class="user-header">
                            <?php 
                                if (!empty($_SESSION["photo"])) {
                                    echo '<img src="'.$_SESSION["photo"].'" class="img-circle">';
                                } else {
                                    echo '<img class="img-circle" src="https://i.postimg.cc/G2B2Yqf9/prfplaceholder.png">';
                                }
                            ?>
                            <!-- <p>
                                <?php echo $_SESSION["name"]; ?> - <?php echo $_SESSION["profile"]; ?>
                                <small>Member since <?php echo date("F Y", strtotime($_SESSION["created_at"])); ?></small>
                            </p> -->
                        </li>

                        <!-- Quick Actions -->
                        <li class="user-body">
                            <div class="row text-center">
                                <div class="col-xs-4">
                                    <a href="messages"><i class="fa fa-envelope"></i> Messages</a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="settings"><i class="fa fa-cog"></i> Settings</a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="help"><i class="fa fa-question-circle"></i> Help</a>
                                </div>
                            </div>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="profile" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Dark Mode Toggle -->
                <li>
                    <a href="#" id="darkModeToggle"><i class="fa fa-moon-o"></i></a>
                </li>

            </ul>
        </div>
    </nav>
</header>

<script>
// Document Ready
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Search Toggle Functionality
    const searchToggle = document.getElementById('searchToggle');
    const searchContainer = document.getElementById('searchContainer');
    const closeSearch = document.getElementById('closeSearch');
    
    searchToggle.addEventListener('click', function(e) {
        e.preventDefault();
        searchContainer.style.display = 'block';
        searchContainer.querySelector('input').focus();
    });
    
    closeSearch.addEventListener('click', function() {
        searchContainer.style.display = 'none';
    });

    // 2. Dynamic Date/Time Display
    const dateTimeDisplay = document.getElementById('dateTimeDisplay');
    const timeDisplay = document.getElementById('timeDisplay');
    
    let showFullDate = false;
    
    function updateDateTime() {
        const now = new Date();
        
        if(showFullDate) {
            timeDisplay.textContent = now.toLocaleString('en-US', { 
                weekday: 'long', 
                month: 'long', 
                day: 'numeric', 
                year: 'numeric',
                hour: '2-digit', 
                minute: '2-digit'
            });
        } else {
            timeDisplay.textContent = now.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit'
            });
        }
    }
    
    dateTimeDisplay.addEventListener('click', function() {
        showFullDate = !showFullDate;
        updateDateTime();
    });
    
    // Update time every minute
    updateDateTime();
    setInterval(updateDateTime, 60000);

    // 3. Dynamic Notifications
    function loadNotifications() {
        // In a real app, you would fetch this from your server
        const notifications = [
            { icon: 'fa-users', color: 'aqua', text: 'New user registered', time: '5 mins ago' },
            { icon: 'fa-warning', color: 'yellow', text: 'Low stock alert', time: '1 hour ago' },
            { icon: 'fa-shopping-cart', color: 'green', text: 'New order placed', time: '2 hours ago' }
        ];
        
        const notificationList = document.getElementById('notificationList');
        const notificationCount = notifications.length;
        
        document.getElementById('notificationCount').textContent = notificationCount;
        document.getElementById('notificationHeaderCount').textContent = notificationCount;
        
        notificationList.innerHTML = '';
        
        notifications.forEach(notification => {
            const li = document.createElement('li');
            li.innerHTML = `
                <a href="#">
                    <i class="fa ${notification.icon} text-${notification.color}"></i> ${notification.text}
                    <small class="pull-right text-muted">${notification.time}</small>
                </a>
            `;
            notificationList.appendChild(li);
        });
    }
    
    // Load notifications initially
    loadNotifications();
    
    // Refresh notifications every 5 minutes
    setInterval(loadNotifications, 300000);

    // 4. Dark Mode Toggle with localStorage persistence
    const darkModeToggle = document.getElementById('darkModeToggle');
    
    // Check for saved theme preference
    if (localStorage.getItem('darkMode') === 'enabled') {
        document.body.classList.add('dark-mode');
        darkModeToggle.innerHTML = '<i class="fa fa-sun-o"></i>';
    }
    
    darkModeToggle.addEventListener('click', function(e) {
        e.preventDefault();
        document.body.classList.toggle('dark-mode');
        
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
            darkModeToggle.innerHTML = '<i class="fa fa-sun-o"></i>';
        } else {
            localStorage.setItem('darkMode', 'disabled');
            darkModeToggle.innerHTML = '<i class="fa fa-moon-o"></i>';
        }
    });

    // 5. Click outside to close search
    document.addEventListener('click', function(e) {
        if (!searchContainer.contains(e.target) && e.target !== searchToggle) {
            searchContainer.style.display = 'none';
        }
    });
});

// Add some basic dark mode styles
const style = document.createElement('style');
style.textContent = `
    .dark-mode {
        background-color: #222;
        color: #f5f5f5;
    }
    .dark-mode .main-header {
        background-color: #1a1a1a;
        border-color: #333;
    }
    .dark-mode .navbar-custom-menu .navbar-nav > li > a {
        color: #f5f5f5;
    }
`;
document.head.appendChild(style);
</script>