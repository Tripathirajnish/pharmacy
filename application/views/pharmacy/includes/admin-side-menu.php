  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
      <h3 class="brand-text font-weight-light text-white text-center"><?php if($this->session->userdata('session_id') == 1){ echo ucwords($this->session->userdata('session_name'));}else{ echo ucwords($this->session->userdata('name')); }?></h3>
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <p class="brand-link">HOME</p>
          <li class="nav-item">
            <a href="<?= base_url('DashboardController'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>    DASHBOARD </p>
            </a>
          </li>
		 <!-- <li class="nav-item">
            <a href="<?= base_url('Api/ApiController'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>API</p>
            </a>
          </li> -->

         <!--  <li class="nav-item">
            <a href="<?= base_url('hospitalController'); ?>?id=<?php echo $this->session->userdata('session_id');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                HOSPITAL PROFILE
              </p>
            </a>
          </li>
          <?php if($this->session->userdata('session_id') == 1){ ?>
          <li class="nav-item">
            <a href="<?= base_url('authController/hospitalregister'); ?>?id=<?php echo $this->session->userdata('session_id');?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ADD HOSPITAL
              </p>
            </a>
          </li>
		 
		   <li class="nav-item">
            <a href="<?= base_url('hospitallist'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                VIEW HOSPITAL
              </p>
            </a>
          </li>
		   <?php } ?> -->
		   <!-- <li class="nav-item">
            <a href="<?= base_url('patientController'); ?> " class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                REGISTER PATIENT
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('opdController'); ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                OPD/IPD
              </p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?= base_url('dischargeController'); ?> " class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DISCHARGE/SHIFT
              </p>
            </a>
          </li>
		    <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                STAFF
              </p>
			   <i class="fa fa-angle-right" style="font-size:18px"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('staffController/Staff'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD STAFF</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('staffController'); ?>" class="nav-link llgetstaff">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VIEW STAFF</p>
                </a>
              </li>
			  
            </ul>
          </li> -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-chart-pie nav-icon"></i>
              <p>
                DEPARTMENT
              </p>
			  <i class="fa fa-angle-right" style="font-size:18px"></i>
			  </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('departmentController/department'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD DEPARTMENT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('departmentController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VIEW DEPARTMENT</p>
                </a>
              </li>
            </ul>
          </li> -->
		    <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-chart-pie nav-icon"></i>
              <p>
               DOCTOR SPECIALIST
              </p>
			  	<i class="fa fa-angle-right" style="font-size:18px"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('DoctorDepartmentController/Doctordepartment'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD  DOCTOR SPECIALIST</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('DoctorDepartmentController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VIEW  DOCTOR SPECIALIST</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                DOCTOR
              </p>
			  <i class="fa fa-angle-right" style="font-size:18px"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('doctorController/doctorForm'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD DOCTOR</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('doctorController/doctor'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VIEW DOCTOR</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                BILLING
               <i class="fa fa-angle-right" style="font-size:18px"></i>             
			   </p>
            </a>
            <ul class="nav nav-treeview">
          -     <li class="nav-item">
                <a href="<?= base_url('patientController/patients_list'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registered Patients</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?= base_url('doctorController/doctor'); ?>?id=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD Bill</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= base_url('dischargeController/dischargebill'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Discharge BILL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('OpdController/OpdLabEntryList'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD LAB ENTRY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('IpdController/IpdLabEntryList'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IPD LAB ENTRY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('OpdController/dischargebillentry'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DISCHARGE BILL ENTRY</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                DAILY REPORTS
              <i class="fa fa-angle-right" style="font-size:18px"></i>              
			  </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('dailyreportController/registerPatient'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>REGISTER PATIENT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dailyreportController/occupiedPatient'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OCCUPIED PATIENT</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= base_url('dailyreportController/doctor'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD Bill</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dailyreportController/opdPatient'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD ENTRY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dailyreportController/ipdPatient'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IPD ENTRY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dailyreportController/opdlab'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD LAB ENTRY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dailyreportController/ipdlab'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IPD LAB ENTRY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dailyreportController/dischargePatient'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DISCHARGE BILL</p>
                </a>
              </li>
            </ul>
          </li> -->
         <!--- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                EXPORT DATA
              </p>
            </a>
          </li> 
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                COLLECTION
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>EMPLOYEE SCROLL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CURRENCY REPORT</p>
                </a>
              </li>
            </ul>
          </li>  -->
          <!-- <p class="brand-link">OTHERS</p>
           <li class="nav-item">
            <a href="<?= base_url('patientController/list'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                PATIENT REPORT
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('prescriptionController'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                PRESCRIPTION
              </p>
            </a>
          </li>
		            <li class="nav-item has-treeview">
            <a href="<?= base_url('exportController'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                EXPORT DATA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> -->
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('wardController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD WARD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('bedController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD BED</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('BedController/bedlistController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIST OF BED</p>
                </a>
              </li>
            </ul> -->
          <!-- </li> -->
		   <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               ADMINISTRATION
			   <i class="fa fa-angle-right" style="font-size:18px"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
			<li class="nav-item">
                <a href="<?= base_url('permissionController'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'permission'){echo 'active'; }?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PERMISSION</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('roleController'); ?>" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>ROLE</p>
                </a>
          </li>
		   <li class="nav-item">
                <a href="<?= base_url('roleController/tax'); ?>" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>TAX</p>
                </a>
          </li>
            </ul>
          </li> -->
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               LAB TEST
                <i class="fa fa-angle-right" style="font-size:18px"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('labController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD A LAB</p>
                </a>
              </li> -->
              
            <!--  <li class="nav-item">
                <a href="<?= base_url('labtestController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD A LAB TEST</p>
                </a>
              </li> -->
             <!-- <li class="nav-item">
                <a href="<?= base_url('OpdController/opdlabbill'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>OPD LAB BILL</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('IpdController/ipdlabbill'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>IPD LAB BILL</p>
                </a>
              </li>
              
            </ul>
          </li> -->
          <!-- <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                WARD
                <i class="fa fa-angle-right" style="font-size:18px"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('wardController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD WARD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('bedController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD BED</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('BedController/bedlistController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIST OF BED</p>
                </a>
              </li>
            </ul>
          </li> -->
		  <!--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                HOSPITAL SERVICE
              </p>
			 <i class="fa fa-angle-right" style="font-size:18px"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('HospitalserviceController'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD HOSPITAL SERVICE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('HospitalserviceController/resources'); ?>" class="nav-link llgetstaff">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD HOSPITAL RESOURCE</p>
                </a>
              </li>
			  
            </ul>
          </li> -->
      <!--    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                INSURENCE
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>INSURANCE TYPE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>INSURANCE COMPANY</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               HOSPITAL SERVICE
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD HOSPITAL SERVICE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD HOSPITAL RESOURCE</p>
                </a>
              </li>
            </ul>
          </li>  -->
         <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                PHARMACY REPORT
                <i class="fa fa-angle-right" style="font-size:18px"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
			  <li class="nav-item">
                <a href="<?= base_url('pharmacyReportController/sale_medicine_report'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sale Medicine Report</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= base_url('pharmacyReportController/purchase_medicine_report'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Medicine Report</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                PHARMACY
			 <i class="fa fa-angle-right" style="font-size:18px"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			<li class="nav-item">
                <a href="<?= base_url('pharmacyController/supplier'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD SUPPLIER</p>
                </a>
              </li>

			  <li class="nav-item">
                <a href="<?= base_url('pharmacyController/Category'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD CATEGORY</p>
                </a>
              </li>
			 <!-- <li class="nav-item">
                <a href="<?= base_url('pharmacyReportController/categorylist'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VIEW CATEGORY</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('pharmacyController/Sale_product_list'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SALE PRODUCT</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?= base_url('pharmacyController/pharmacy'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PHARMACY MEDICINE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pharmacyController/productList'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VIEW MEDICINE</p>
                </a>
              </li>
			<!--  <li class="nav-item">
                <a href="<?= base_url('ImportController/index'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MEDICINE IMPORT</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?= base_url('pharmacyController/stock'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>STOCK IN MEDICINE</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('pharmacyController/salemedicine'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SALES MEDICINE</p>
                </a>
              </li>
			    <li class="nav-item">
                <a href="<?= base_url('pharmacyController/expirymedicine'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expiry MEDICINE</p>
                </a>
              </li>
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Request
                <i class="fa fa-angle-right" style="font-size:18px"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('RequestController/returnproductlist'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine Return</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= base_url('RequestController/requestproductlist'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine Request</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?= base_url('RequestController/repurchase'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Repurchase Medicine</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <style>
 .fa-angle-right{
	font-size: 17px;
    position: absolute;
    right: 36px;
 }
 .flip {
  transform: rotate(90deg);
   }
  </style>
  <script>
  $(document).ready(function(){
	  $('.getstaff').click(function(){
		  var data = '';
		$.ajax({
				url:"<?=base_url('staffController/getdepartment')?>",
				type:'POST',
				data: { data:data},
				 success: function(response){
					if(response){
					$('.custom_addlist').children().remove();;
					$('.custom_addlist').append(response);
					}
				}
			});
		});
		$('.getcstmstaff').click(function(){
		 // alert(';;;;');
		});
	  $( ".nav-link" ).click( function() {
		  $(this).find(".fa-angle-right").toggleClass('flip');
    });
    });
  </script>
  
  