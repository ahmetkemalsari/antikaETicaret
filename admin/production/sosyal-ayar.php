          <?php include "header.php"; 
          $button = 'btn-success';
          ?>
            <!-- /sidebar menu -->

    

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sosyal Ayarlar
                      <?php 
                        if($_GET['durum']=='ok'){
                          $button = 'btn-success';
                        ?>
                        <small style="color:green">İşlem Başarılı</small>
                        <?php 
                        }else if($_GET['durum']=='no'){
                            $button = 'btn-danger';
                        ?>
                        <small style="color:red">İşlem Başarısız</small>
                        <?php 
                        }else{
                            $button = 'btn-success';
                        ?>
                        <small style="color:gray">Sitenizin Sosyal Ayarlarını Buradan Güncelleyebilirsiniz</small>
                        <?php 
                        }
                       ?>



                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <form id="demo-form2" action="../ayarlar/islem.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ayar_facebook" value="<?php echo $ayarcek['ayar_facebook']; ?>" id="first-name" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tiwitter <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ayar_twitter" value="<?php echo $ayarcek['ayar_twitter'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Youtube<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ayar_youtube" value="<?php echo $ayarcek['ayar_youtube']; ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Google<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="ayar_google" value="<?php echo $ayarcek['ayar_google'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      
                      
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">
                           <!--<button  type="submit" name="sosyalAyarSil" class="btn btn-danger">Sil</button>-->
                          <button  type="submit" name="sosyalAyarKaydet" class="btn <?php echo $button ?>">Güncelle</button>
                        </div>
                      </div>

                    </form>


                  </div>
                </div>
              </div>
            </div>
            


            

            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php 
      include 'footer.php';
         ?>