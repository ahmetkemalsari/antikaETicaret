          <?php include "header.php"; 
          $button = 'btn-success';
          $kategorisor=$db->prepare('SELECT * FROM kategori');
          $kategorisor->execute();

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
                    <h2>Kategoriler
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
                        <small style="color:gray">Sitenizin Kategori Ayarlarını Buradan Yapabilirsiniz</small>
                        <?php 
                        }
                       ?>



                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="btn btn-success" href="kategori-ekle.php"><i style="color:green" class="fa fa-plus">  YENİ EKLE</i></a>
                      </li>

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                  <th>kategori Sıra</th>
                  <th>kategori Ad</th>
                  <th>kategori Ust</th>
                  <th>kategori Sira</th>
                  <th>kategori Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

               <?php 
               $sayac = 0;
               while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){
                $sayac++;
                ?>

                <tr>
                  <td width="10"><?php echo $sayac?></td>
                  <td><?php echo $kategoricek['kategori_ad']; ?></td>
                  <td><?php echo $kategoricek['kategori_ust']; ?></td>
                  <td><?php echo $kategoricek['kategori_sira']; ?></td>
                  <td><?php 
                    if($kategoricek['kategori_durum']== 1 ){?>
                    Aktif
                   <?php }else{ ?>
                    Pasif
                    <?php }
                   ?></td>
                  <td class="text-center"><a href="kategori-duzenle.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>"><i class="success fa fa-wrench"></i></a></td>


                  <td class="text-center"><a href="../ayarlar/islem.php?kategoriSil=ok&kategori_id=<?php echo $kategoricek['kategori_id'] ?>"><i class="success fa fa-trash-o"></i></a></td>
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