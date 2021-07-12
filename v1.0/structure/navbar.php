
  <?php

    // This part for getting navigations from database.
    $navigations = new Navigation('navigation', 'sub_nav'); // Tables name

  ?>

  <nav id=sec-navbar>
    <div class=left>
      <form method="post">
        <input class='search-inp' type=text placeholder="Keyword...." class='form-control-sm form-control'>
      </form>
    </div>
    <div class=right>
      <ul>
        <li><a href="#">Contact</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Subscribation</a></li>
        <li><a href="#">Services</a></li>
      </ul>
    </div>
    <div class=clearfix></div>
  </nav>

  <nav id='mainNavbar' class='navbar navbar-expand-lg navbar-dark bg-dark'>

    <a class=navbar-brand href="#"><?php echo $configs['APP_NAME']; ?></a>

    <button class=navbar-toggler type=button data-toggle=collapse data-target=#responsive-nav aria-controls=responsive-nav aria-expanded=false aria-label=Toggle navigation><span class=navbar-toggler-icon></span></button>

    <div class='collapse navbar-collapse' id=responsive-nav>

      <!-- Left Navigations -->

      <ul class='navbar-nav left-links'>

        <?php

          $getNavs = $connect->prepare("SELECT * FROM navigation WHERE per = 1");
          $getNavs->execute();
          $navs = $getNavs->fetchAll(); ?>

        <?php foreach ($navs as $keyNum => $nav): ?>

        <?php

          $getSub = $connect->prepare("SELECT * FROM sub_nav WHERE nav_belongto = " . $nav['nav_id']);
          $getSub->execute();
          $subData = $getSub->fetchAll(); ?>

        <?php if ($nav['has_sub'] == 1): ?>

          <li class='nav-item'><a class='nav-link' href="<?php echo $nav['nav_goto']; ?>"><?php echo $nav['nav_name']; ?></a></li>

        <?php elseif ($nav['has_sub'] == 2): ?>

          <li class='nav-item dropdown'>

            <a class='nav-link dropdown-toggle' href=#  id=sub_nav role=button data-toggle=dropdown aria-haspopup=true aria-expanded=false><?php echo $nav['nav_name']; ?></a>

            <div class=dropdown-menu aria-labelledby=sub_nav>

              <?php foreach ($subData as $key => $sub): ?>

                <a class=dropdown-item href="<?php echo $sub['subnav_goto']; ?>"><?php echo $sub['subnav_name']; ?></a>

              <?php endforeach; ?>

            </div>

          </li>

        <?php endif; ?>

        <?php endforeach; ?>

      </ul>


      <!-- Right Navigations -->

      <ul class='navbar-nav nav ml-auto'>

        <?php if (user_exists()): ?>

          <?php $user = new User(); ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle second-dropdown" href=# id=right-dropdown role=button data-toggle=dropdown aria-haspopup=true aria-expanded=false><img src="<?php echo $user->view('picture_name'); ?>"> <?php echo $user->view('username'); ?> </a>
            <div class="dropdown-menu dropdown-menu-right second-dropdown-content" aria-labelledby="right-dropdown">
              <a class=dropdown-item href="<?php echo $configs['GO']['profile'] ?>"><i class='fas fa-id-badge'></i> Profile</a>
              <a class=dropdown-item href="<?php echo $configs['GO']['settings'] ?>"><i class='fas fa-sliders-h'></i> Settings</a>
              <a class=dropdown-item href="order.php"><i class='fas fa-shopping-cart'></i> My Orders</a>
              <a class=dropdown-item href="<?php echo $configs['GO']['logout'] ?>"><i class='fas fa-sign-out-alt'></i> Sign Out</a>
            </div>
          </li>

        <?php else: ?>

          <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle second-dropdown' href="#" id=sec_nav_acc role=button data-toggle=dropdown aria-haspopup=true aria-expanded=false></a>
            <div class="dropdown-menu dropdown-menu-right second-dropdown-content" aria-labelledby=sec_nav_acc>
              <a class=dropdown-item href='do.php?action=login'><i class='fas fa-sign-in-alt'></i> Login</a>
              <a class=dropdown-item href='do.php?action=register'><i class='fas fa-plus-square'></i> Create Account</a>
            </div>
          </li>

        <?php endif; ?>

      </ul>

    </div>

  </nav>
