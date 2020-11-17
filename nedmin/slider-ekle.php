<?php  include 'header.php' ?>

<?php  include 'sidebar.php' ?>


<!-- index göbek  -->

<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">SLİDER EKLİYOSUNUZ</h1>




                <?php 
                if ($_GET['durum']=="ok") { ?>

                    <h1 style="color:blue;" class="page-subhead-line">Slider başarıyla eklendi... </h1>


                <?php  } elseif ($_GET['durum']=="no") { ?>

                    <h1 style="color:red;" class="page-subhead-line">Slider eklenemedi... </h1>

                <?php } elseif ($_GET['durum']=="invalid_extension") { ?>
                   <h1 style="color:red;" class="page-subhead-line"> Lütfen png,jpeg veya jpg uzantılı resim seçin. </h1>



               <?php }   else { ?>


                   <h1 class="page-subhead-line">Sitenize slider ekliyorsunuz... </h1>
              <?php }







           ?>









       </div>
   </div>
   <!-- /. ROW  -->


   <form action="netting/islem.php" method="POST" enctype="multipart/form-data">


      <div class="col-md-12">



          <div class="form-group col-md-3">

            <input style="width: 100%" class="btn btn-success" type="submit" name="slider_ekle" value="Slider Kaydet">

        </div>


    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-lg-4">Slider Resim</label>
            <div class="">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                    <div>
                        <span class="btn btn-file btn-success"><span class="fileupload-new">Resim Seç</span><span class="fileupload-exists">Değiştir</span><input type="file" name="slider_gorsel"></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Sil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-12">
       <div class="form-group col-md-6">
        <label>Slider Adı</label>
        <input class="form-control" type="text" name="slider_ad" placeholder="Slider Adını Giriniz"  >

    </div>
</div>

<div class="col-md-12">
   <div class="form-group col-md-6">
    <label>Slider Url</label>
    <input class="form-control" type="text" name="slider_url" placeholder="Slider yönlendirmek için link giriniz"  >

</div>
</div>

<div class="col-md-12">
   <div class="form-group col-md-2">
    <label>Slider Sıra</label>
    <input class="form-control" type="number" name="slider_sira" placeholder="Slider sırası"  >

</div>
</div>








</form>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->







<?php  include 'footer.php' ?>