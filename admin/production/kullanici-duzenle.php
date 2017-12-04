          <?php include "header.php"; 
          $button = 'btn-success';
          $kullanicisor=$db->prepare('SELECT * FROM kullanici WHERE kullanici_id=:id');
          $kullanicisor->execute(array(
            'id'=>$_GET['kullanici_id']
          ));
          $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
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
                      <h2>Kullanıcı Düzenleme
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


                      <form id="demo-form2" action="../ayarlar/islem.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text"   disabled="true" name="kullanici_ad"  value="<?php echo $kullanicicek['kullanici_ad']; ?>" id="first-name" required="required"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı TC <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" disabled="true" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc']; ?>" id="first-name" required="required"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durum <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="heard" class="form-control" name="kullanici_durum" required="">
                              <?php 
                              if($kullanicicek['kullanici_durum'] == 0)
                               { ?>
                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>
                              <?php }else{ ?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>
                          <?php   } ?>
                            
                          </select>
                        </div>

                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Yetki <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="heard" class="form-control" name="kullanici_yetki" required="">
                              <?php 
                              if($kullanicicek['kullanici_yetki'] == 5)
                               { ?>
                              <option value="5">Admin</option>
                              <option value="0">Standart</option>
                              <?php }else{ ?>

                              <option value="0">Standart</option>
                              <option value="5">Admin</option>
                          <?php   } ?>
                            
                          </select>
                        </div>

                      </div>
                     


                      
                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">
                          <input type="text" hidden="true" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                          <button  type="submit" name="kullaniciDuzenle" class="btn <?php echo $button ?>">Güncelle</button>
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