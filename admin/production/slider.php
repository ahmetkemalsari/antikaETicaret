          <?php include "header.php"; 
          $button = 'btn-success';
          $slidersor=$db->prepare('SELECT * FROM slider');
          $slidersor->execute();

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
                    <h2>Slider
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
                        <small style="color:gray">Sitenider Bulunan Slider Resimleri</small>
                        <?php 
                        }
                       ?>



                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="btn btn-success" href="slider-ekle.php"><i style="color:green" class="fa fa-plus">  YENİ EKLE</i></a>
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
                  <th>Sıra</th>
                  <th>Resim</th>
                  <th>Ad</th>
                  <th>Url</th>
                  <th>Sira</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

               <?php 
               $sayac = 0;
               while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){
                $sayac++;
                ?>

                <tr>
                  <td width="10"><?php echo $sayac?></td>
                  <td><img width="150" height="70" src="../../<?php echo $slidercek['slider_resimyol']; ?>"></td>
                  <td><?php echo $slidercek['slider_ad']; ?></td>
                  <td><?php echo $slidercek['slider_link']; ?></td>
                  <td><?php echo $slidercek['slider_sira']; ?></td>
                  <td><?php 
                    if($slidercek['slider_durum']== 1 ){?>
                    Aktif
                   <?php }else{ ?>
                    Pasif
                    <?php }
                   ?></td>
                  <td class="text-center"><a href="slider-duzenle.php?slider_id=<?php echo $slidercek['slider_id'] ?>"><i class="success fa fa-wrench"></i></a></td>


                  <td class="text-center"><a href="../ayarlar/islem.php?slidersil=ok&slider_id=<?php echo $slidercek['slider_id'] ?>&slider_resimyol=<?php echo $slidercek['slider_resimyol'] ?>"><i class="success fa fa-trash-o"></i></a></td>
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