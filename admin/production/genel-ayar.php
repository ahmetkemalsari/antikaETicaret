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
                      <h2>Genel Ayarlar
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
                          <small style="color:gray">Genel Ayarları Buradan Güncelleyebilirsiniz</small>
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


                      <form action="../ayarlar/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php 
                            if (strlen($ayarcek['ayar_logo'])>0) {?>

                            <img width="200"  src="../../<?php echo $ayarcek['ayar_logo']; ?>">

                            <?php } else {?>


                            <img width="200"  src="../../img/logo-yok.png">


                            <?php } ?>


                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="first-name"  name="ayar_logo"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <input type="hidden" name="eski_yol" value="<?php echo $ayarcek['ayar_logo']; ?>">

                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="logoduzenle" class="btn btn-primary">Güncelle</button>
                        </div>

                      </form>


                      <hr>

                      <form id="demo-form2" action="../ayarlar/islem.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="ayar_title" value="<?php echo $ayarcek['ayar_title']; ?>" id="first-name" required="required"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Açıklaması <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="ayar_description" value="<?php echo $ayarcek['ayar_description'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Anahtar Kelime<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords']; ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Yazar <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="ayar_author" value="<?php echo $ayarcek['ayar_author'] ?>" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>




                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">

                            <!--<button  type="submit" name="genelAyarSil" class="btn btn-danger">Sil</button>-->
                            <button  type="submit" name="genelAyarKaydet" class="btn <?php echo $button ?>">Güncelle</button>
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