<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2/28/2019
 * Time: 12:12 AM
 */
?>

<html>
<header>
    <title>Danh sach danh mục bài viết</title>
    <link type="text/css" rel="stylesheet" href="<?= $GLOBALS['base_url'] ?>/assets/css/bootstrap.min.css" />
    <meta charset="UTF-8" />
</header>
<body>
<h1 style="padding-top: 140px;"></h1>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://mcdonalds.vn/uploads/2018/banner-slider/matcha_homeslide.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://mcdonalds.vn/uploads/2018/banner-slider/newGMAL_homeslide.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="https://mcdonalds.vn/uploads/2018/banner-slider/bic_slide_vi.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container">
    <div style="padding-top: 30px">
    <div style="background-image: url(https://mcdonalds.vn/uploads/2018/home/1170x300-GMALpx.jpg);">
       <div class="row">
               <div class="col-md-6 ">
                   <div class="text-content-first">
                       <p>Ưu đãi độc quyền &amp; hơn thế nữa</p>
                       <h2 style="color: #fff;">ỨNG DỤNG McDONALD'S</h2>
                       <a href="#" style="border: #BD0017  ;border-radius: 30px; background: #BD0017;" class="btn btn-primary btn-lg active download" role="button" aria-pressed="true">TẢI ỨNG DỤNG</a>
                   </div>
               </div>
               <div class="col-md-6">
               </div>
       </div>
    </div>
    </div>
</div>

<div style="padding-top: 30px" class="container">
    <div class="row">
        <div class="col-md-6">

            <div style=" border-radius: 4px; background-image: url(https://www.mcdonalds.vn/uploads/2018/home/mccafe_desktop.jpg);">
                <a href="#"><p CLASS="mc-cafe">McCAFÉ</p></a>

            </div>
        </div>
        <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">

                        <div style=" border-radius: 4px; background-image: url(https://www.mcdonalds.vn/uploads/2018/home/home-stories.jpg);">
                            <a href="#"><p class="history">
                             CÂU CHUYỆN VỀ McDONALD'S
                                </p></a>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div style=" border-radius: 4px; background-image: url(https://www.mcdonalds.vn/uploads/2018/home/hr-pc.jpg);">
                            <a href="#"><p class="recruitment">
                                TUYỂN DỤNG
                                </p></a>
                        </div>
                    </div>

                    <div style=" margin-left: 13px ; margin-top: 13px; border-radius: 4px; background-image: url(https://www.mcdonalds.vn/uploads/2018/home/home-banner-hamburger.jpg);">
                        <a href="#"><p class="mc-donald">
                            HAMBURGER<br>
                            KHÁM PHÁ VỊ NGON LỪNG DANH
                        </p>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 10px">

    <div style=" border-radius: 4px; background-image: url(http://www.mcdonalds.vn//uploads/2018/home/MDS_banner_1600x250.jpg);">
        <div class="tarticle tbanner-home">
            <p class="ttitle-banner-home-1"  style="color: #fff;font-size: 50px; padding-left: 110px"><STRONG>McDELIVERY™</STRONG></p>
            <p class="tsub-title-banner-home-1" style="color: #ffffff;font-size: 17px;">Dịch vụ giao hàng của McDonald's. Đặt hàng đơn giản, giao hàng nhanh chóng.</p>
            <div style="padding-left: 160px;">
            <button style="background-color: #FFFFFF; color: #BD0017; font-size: 20px; border-radius: 24px;border: #FFFFFF" type="button" class="btn btn-lg btn-primary" >ĐẶT HÀNG NGAY</button>

         </div>
    </div>
</div>



</body>
<style>
    /*.baner-1{*/
    /*padding-right: -5px;*/
    /*padding-left: -50px;*/
    /*}*/
    .menu-name{
        margin-top: 120px;
        margin-bottom: 30px;
        color: #888888;
        font-family: Cambria;
        font-size: 30px;
        width: 100%;
    }
    .img-name{
        width: 100%;
        height: auto;
        max-width: 100%;

    }
    .title-1{
        font-size: 30px;
        line-height: 1.3;
        margin: 12px 0;
        color: #428bca;
    }

    .title-2{

        padding-left: 20px;
        padding-bottom: 20px;
        display: block;
        width: 100px;
        max-width: 100%;
        height: auto;
    }
    .title-3{
        margin-top: 130px;
        width: 100%;
        height: 100%;
    }
    .text-content-first{
        padding-top: 140px;
        padding-bottom: 26px;
        padding-left: 60px;
        color: #FFF;
    }
    .download {
        width: 240px;
        height: 48px;
        line-height: 48px;
        background: #BD0017;
        color: #fff !important;
        text-align: center;
        text-decoration: none !important;
    }
    .md1{
        width: 270px;height:210px;
        padding-left: 0px;
    }
    .mc-cafe{
        padding-top: 355px;
        padding-bottom: 5px;
        padding-left: 45px;
        color: #fff;
        font-size: 60px;
        /*font-weight: 500 !important;*/

    }
    .history{
        padding-top: 133px;
        padding-bottom: 20px;
        padding-left: 15px;
        color: #FFFFFF;
        font-size: 19px;
    }
    .recruitment{
        padding-top: 160px;
        padding-bottom: 20px;
        padding-left: 15px;
        color: #FFFFFF;
        font-size: 19px;
    }
    .mc-donald{
        color: #FFFFFF;
        font-size: 16px ;
        padding-left: 15px;
        padding-right: 284px;
        padding-bottom: 8px;
        padding-top: 138px;
    }
    .tbanner-home{
        padding-left: 143px;
        padding-top: 30px;
        padding-bottom: 40px;
    }


</style>
</html>
