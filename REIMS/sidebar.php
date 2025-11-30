<nav>
      <div class="logo-name">
        <div class="logo-image">
          <img src="./image/logo.png" alt="" />
        </div>

        <span class="logo_name">REIMS</span>
      </div>

      <div class="menu-items">
        <ul class="nav-links">
          <li>
            <a href="index.php">
              <i class="uil uil-estate"></i>
              <span class="link-name">Dashboard</span>
            </a>
          </li>
          
          <li>
            <a href="equipment_list.php">
              <i class="uil uil-weight"></i>
              <span class="link-name">Equipment list</span>
            </a>
          </li>
          <li>
            <a href="category.php">
            <i class="uil uil-database-alt"></i>
              <span class="link-name">Category</span>
            </a>
          </li>
          <li>
            <a href="dept.php">
            <i class="uil uil-building"></i>
              <span class="link-name">Department</span>
            </a>
          </li>
          <li>
            <a href="search.php">
              <i class="uil uil-search"></i>
              <span class="link-name">Search</span>
            </a>
          </li>
          
          
        </ul>

        <ul class="logout-mode">
        <li>
            <a href="user.php">
              <i class="uil uil-user-square"></i>
              <span class="link-name"><?=$user['username']?></span>
            </a>
          </li>
          <li>
          
            <!-- <a href="./login.php">
              <i class="uil uil-signin"></i>
              <span class="link-name">Logout</span>
            </a>-->
            <a href="database/logout.php">
            <i class="uil uil-power"></i>
              <span class="link-name">Logout</span>
            </a> 
          </li>

          <li class="mode">
            <a href="#">
              <i class="uil uil-moon"></i>
              <span class="link-name">Dark Mode</span>
            </a>

            <div class="mode-toggle">
              <span class="switch"></span>
            </div>
          </li>
        </ul>
      </div>
    </nav>