<div class="row margin_bottom ">

    <div class="boxleft margin_right">

        <div class="row margin_bottom">

            <div class="boxtitle">
                GIỎ HÀNG CỦA BẠN
            </div>

            <div class="row boxcontent cart formcontent">

                <table style="background-color: #fff; width: 100%; text-align: left;">

                    <?php
                        viewcart(1);
                    ?>

                </table>
                
            </div>

        </div>

        <div class="row margin_bottom bill">
            <a href="index.php?act=bill">
                <input type="button" value="BẮT ĐẦU ĐẶT HÀNG"> 
            </a>
            
            <a href="index.php?act=deletecart"> 
                <input type="button" value="XOÁ GIỎ HÀNG"> 
            </a>
        </div>

    </div>
    <div class="boxright ">
        <?php
            include "view/boxright.php"
        ?>
    </div>
    
    