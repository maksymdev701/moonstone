<?php
    $base_url=base_url();
?>
<div class="content-page">
   <div class="content">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div class="page-title-box">
                  <h4 class="page-title">Edit <?php echo$page;?></h4>
                  <div class="add-page">
                     <a href="<?php echo base_url(); ?>admin/users" style="float:right;"><i class="fa fa-backward" aria-hidden="true" style="margin-right: 4px;"></i>Back</a>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12 col-lg-12 col-xl-12">
            <?php if ($this->session->flashdata('error')) { ?>
              <div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p><?php echo $this->session->flashdata('error'); ?></p>
              </div>
            <?php } ?>
            <?php if ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p><?php echo $this->session->flashdata('success'); ?></p>
              </div>
            <?php } ?>
            </div>
            <div class="col-xs-12 col-lg-12 col-xl-12">
            <div class="card-box">
                  <div class="table-rep-plugin">
                     <div class="">
                        <form class="da-home-form form-horizontal" method="post" action="<?php echo base_url(); ?>admin/user/edit/<?php echo $user_data[0]['user_id'];?>" enctype="multipart/form-data">
                           <div class="row">
                              <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-xl-6">
                                    <fieldset class="form-group">
                                       <label for="name">Name<span class="required">*</span></label>
                                       <input type="text" name="name" class="form-control" id="name"
                                          placeholder="Enter Name" required="" value="<?php if(isset($_POST["name"])){ echo $_POST["name"];}else{ echo $user_data[0]['name'];}?>">
                                    </fieldset>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-xl-6">
                                    <fieldset class="form-group">
                                       <label for="lastname">Last Name<span class="required">*</span></label>
                                       <input type="text" name="lastname" class="form-control" id="lastname"
                                          placeholder="Enter Last Name" required="" value="<?php if(isset($_POST["lastname"])){ echo $_POST["lastname"];}else{ echo $user_data[0]['lastname'];}?>">
                                    </fieldset>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-xl-6">
                                    <fieldset class="form-group">
                                       <label for="email">Email<span class="required">*</span></label>
                                       <input type="email" name="email" class="form-control" id="email"
                                          placeholder="Enter email" required="" value="<?php if(isset($_POST["email"])){ echo $_POST["email"];}else{ echo $user_data[0]['email'];}?>">
                                    </fieldset>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-xl-6">
                                    <fieldset class="form-group">
                                       <label for="phone_number">Phone number<span class="required">*</span></label>
                                       <input type="text" name="phone_number" class="form-control" id="phone_number"
                                          placeholder="Enter phone number" required="" value="<?php if(isset($_POST["phone_number"])){ echo $_POST["phone_number"];}else{ echo $user_data[0]['phone_number'];}?>">
                                    </fieldset>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-xl-6">
                                    <?php
                                          $active="checked";
                                          $inactive="";
                                          $archive="";
                                          if($user_data[0]['is_active']==2){
                                             $inactive="checked";
                                             $active="";
                                             $archive="";
                                          }
                                          
                                    ?>
                                    <fieldset class="form-group">
                                       <label class="status1">Status<span class="required">*</span></label>
                                       <div class="">
                                          <div class="radio">
                                             <input type="radio" name="status" id="status1" value="1" <?php echo $active;?>>
                                             <label for="status1" >
                                             Active
                                             </label>
                                          </div>
                                          <div class="radio">
                                             <input type="radio" name="status" id="status2" value="2" <?php echo $inactive;?>>
                                             <label for="status2">
                                             Inactive
                                             </label>
                                          </div>
                                          
                                       </div>
                                    </fieldset>
                              </div>

                           </div>

                            <button type="submit" name="Submit" value="Update" id="Submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url(); ?>admin/users" class="btn btn-primary">Cancel</a>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function() {
      $(".alert-success").hide();
      $(".alert-success p").text('');
      $(".alert-danger").hide();
      $(".alert-danger p").text('');      
    }, 3500);
  });
</script>