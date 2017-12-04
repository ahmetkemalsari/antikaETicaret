          <?php include "header.php"; 
          $button = 'btn-success';
          $kategorisor=$db->prepare('SELECT * FROM kategori WHERE kategori_id=:id');
          $kategorisor->execute(array(
            'id'=>$_GET['kategori_id']
          ));
          $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
          ?>
          <!-- /sidebar kategori -->



          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">

              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Kategori Düzenleme Sayfasi
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
                          <small style="color:gray">Sitenizdeki Kategorileri Bu Sayfadan Düzenleyebilirsiniz</small>
                          <?php 
                        }
                        ?>



                      </small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-kategori" role="kategori">
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Adı <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="kategori_ad"  value="<?php echo $kategoricek['kategori_ad']; ?>" id="first-name" required="required"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">kategori Durum <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="heard" class="form-control" name="kategori_durum" required="">
                              <?php 
                              if($kategoricek['kategori_durum'] == 0)
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                              <textarea  class="ckeditor" id="editor1" name="kategori_detay"><?php echo $kategoricek['kategori_detay']; ?></textarea>
                            </div>
                          </div>

                          <script type="text/javascript">

                           CKEDITOR.replace( 'editor1',

                           {

                            filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                            filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                            filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                            forcePasteAsPlainText: true

                          } 

                          );

                        </script>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Sıra <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="kategori_sira"  value="<?php echo $kategoricek['kategori_sira']; ?>" id="first-name" required="required"  class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      


                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-right">
                            <input type="text" hidden="true" name="kategori_id" value="<?php echo $kategoricek['kategori_id']; ?>">
                            <button  type="submit" name="kategoriDuzenle" class="btn <?php echo $button ?>">Güncelle</button>
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