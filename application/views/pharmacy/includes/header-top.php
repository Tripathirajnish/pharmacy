 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="width: 315px;">
        <a href="https://www.ens.enterprises/" class="nav-link"><img src="<?php echo base_url(); ?>images/enslogo.png" class="" alt="Logo" height="30px"></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li-->
    </ul>

    <!-- SEARCH FORM -->
    <!--form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> 
   <li class="form-inline ml-4">
	 <form method="post" action="<?php echo site_url('superadmin/authController/gethospitaldetail') ?>" style="   margin: 20px 0px 0px 0px;
    display: flex; ">
	  <select name="hospital" class="form-control" style="    width: 269px;height: 40px;
    /* border: 2px solid #000; */box-shadow: 0px 0px 3px 0px #888888;padding: 10px;"><option>select hospital</option>
	   <?php 
	   $hospital = $this->db->get('hospital_profile')->result();
	foreach($hospital as $host){ 
	?>
	<option value="<?php echo $host->id; ?>"><?php echo $host->hname; ?></option>
	<?php
	}  ?>
	</select>
	<label><input type="submit" value="Submit" style="height: 40px;border: none;box-shadow: 0px 0px 3px0px #888888;padding: 10px;"></label>
	</form>
	</li>  -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li><?php echo "Welcome : ".ucwords($this->session->userdata('name'));?></li>
      <li><a href="<?php echo site_url('authController/logout') ?>"><button class="btn btn-danger btn-sm">Logout</button></a></li>
    </ul>
  </nav>
  <style>
    .navbar-nav.ml-auto
    {
      flex-direction: column;
      align-items: center;
    }

  </style>

  <!-- /.navbar -->
