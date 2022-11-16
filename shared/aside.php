<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar btn-dark ">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="/ODC Back end/08/index.php">
      <i class="bi bi-grid"></i>
      <span>Home</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <?php if(isset($_SESSION['admin'])){ ?>
  <li class="nav-item">
    <a class="nav-link collapsed " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <!-- <i class="bi bi-menu-button-wide"></i> -->
      <i class="fa-solid fa-user-lock"></i>
      <!-- <i class="fa-solid fa-user-minus"></i> -->
      <!-- <i class="fa-regular fa-trash-can text-danger"></i> -->
      <span>Admin</span><i class="margin-admin fa-solid fa-caret-down "></i>
    </a>
    <ul id="components-nav" class="nav-content collapse btn-light " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/ODC Back end/08/admin/create.php">
        <i class="fa-solid fa-user-plus"></i><span>Add Admin</span>
        </a>
      </li>
      <li>
        <a href="/ODC Back end/08/admin/list.php">
        <i class="fa-regular fa-rectangle-list"></i><span>List Admin</span>
        </a>
      </li>
    </ul>
  </li><!-- End Admin Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="fa-solid fa-scale-balanced"></i><span>Lawyers</span><i class="margin-lawyer fa-solid fa-caret-down"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse btn-light" data-bs-parent="#sidebar-nav">
      <li>
        <a href="/ODC Back end/08/lawyer/create.php">
        <i class="fa-solid fa-user-plus"></i></i><span>Add Lawyer</span>
        </a>
      </li>
      <li>
        <a href="/ODC Back end/08/lawyer/list.php">
        <i class="fa-regular fa-rectangle-list"></i></i><span>List Lawyer</span>
        </a>
      </li>
    </ul>
  </li><!-- End Lawyers Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="fa-brands fa-critical-role"></i><span>Roles</span><i class="margin-role fa-solid fa-caret-down"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse btn-light " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/ODC Back end/08/role/create.php">
          <i class="fa-solid fa-circle-plus"></i><span>Add Roles</span>
        </a>
      </li>
      <li>
        <a href="/ODC Back end/08/role/list.php">
        <i class="fa-regular fa-rectangle-list"></i><span>List Roles</span>
        </a>
      </li>
    </ul>
  </li><!-- End Roles Nav -->
<?php } ?>
<?php  if(isset($_SESSION['admin']) ||  isset($_SESSION['lawyer']) ){ ?>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
      <i class="fa-regular fa-newspaper"></i>Articales</span><i class="margin-articale fa-solid fa-caret-down"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse btn-light " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/ODC Back end/08/articales/create.php">
          <i class="fa-solid fa-file-circle-plus"></i><span>Add Articale</span>
        </a>
      </li>
      <li>
        <a href="/ODC Back end/08/articales/list.php">
        <i class="fa-regular fa-rectangle-list"></i></i><span>List Articale</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Articales Nav -->
  <?php } ?>



<?php  if((!isset($_SESSION['admin'])) && (! isset($_SESSION['lawyer']) )){ ?>
  <li class="nav-item ">
    <a class="nav-link collapsed" href="/ODC Back end/08/auth/pages-login.php">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->
<?php } ?>
</ul>

</aside><!-- End Sidebar-->