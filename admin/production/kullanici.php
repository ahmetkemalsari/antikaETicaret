          <?php include "header.php"; 
          $button = 'btn-success';
          $kullanicisor=$db->prepare('SELECT * FROM kullanici');
          $kullanicisor->execute();

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
                    <h2>Kullanıcılar
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
                        <small style="color:gray">Kulanıcı İşlemlerini bu sayfadan yapabilirsiniz</small>
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
                       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Kayıt Tarih</th>
                  <th>Ad Soyad</th>
                  <th>Mail Adresi</th>
                  <th>Telefon</th>
                  <th>Yetki</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

               <?php 
               while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)){
                ?>

                <tr>
                  <td><?php echo $kullanicicek['kullanici_zaman']; ?></td>
                  <td><?php echo $kullanicicek['kullanici_adsoyad']; ?></td>
                  <td><?php echo $kullanicicek['kullanici_mail']; ?></td>
                  <td><?php echo $kullanicicek['kullanici_gsm']; ?></td>
                  <td> <?php 
                              if($kullanicicek['kullanici_yetki'] == 5)
                               { ?>
                                Admin
                              <?php }else{ ?>
                              Standart
                             
                          <?php   } ?></td>
                  <td class="text-center"><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><i class="success fa fa-wrench"></i></a></td>


                  <td class="text-center"><a href="../ayarlar/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullaniciSil=ok"><i class="success fa fa-trash-o"></i></a></td>
                </tr>

                <?php } ?>

            


              </tbody>
            </table>


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