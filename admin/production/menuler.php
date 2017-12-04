          <?php include "header.php"; 
          $button = 'btn-success';
          $menusor=$db->prepare('SELECT * FROM menu');
          $menusor->execute();

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
                    <h2>Menüler
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
                        <small style="color:gray">Sitenizin Menü Ayarlarını Buradan Yapabilirsiniz</small>
                        <?php 
                        }
                       ?>



                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="btn btn-success" href="menu-ekle.php"><i style="color:green" class="fa fa-plus">  YENİ EKLE</i></a>
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
                  <th>Menu Sıra</th>
                  <th>Menu Ad</th>
                  <th>Menu Ust</th>
                  <th>Menu Url</th>
                  <th>Menu Sira</th>
                  <th>Menu Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

               <?php 
               $sayac = 0;
               while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){
                $sayac++;
                ?>

                <tr>
                  <td width="10"><?php echo $sayac?></td>
                  <td><?php echo $menucek['menu_ad']; ?></td>
                  <td><?php echo $menucek['menu_ust']; ?></td>
                  <td><?php echo $menucek['menu_url']; ?></td>
                  <td><?php echo $menucek['menu_sira']; ?></td>
                  <td><?php 
                    if($menucek['menu_durum']== 1 ){?>
                    Aktif
                   <?php }else{ ?>
                    Pasif
                    <?php }
                   ?></td>
                  <td class="text-center"><a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id'] ?>"><i class="success fa fa-wrench"></i></a></td>


                  <td class="text-center"><a href="../ayarlar/islem.php?menuSil=ok&menu_id=<?php echo $menucek['menu_id'] ?>"><i class="success fa fa-trash-o"></i></a></td>
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