<?php
include "head.php";
include "navbar.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ana Sayfa</title>

</head>

<body>

    <div class="contanir">
       <i style="color:red;" class="bi bi-star"></i>
                <div class="cat-sty mt-3">
                    <div class="cat-imge">
                        <a class="a-style" href="urunler.php?tag=Cep Telefon"><img class="cat-im" src="img/tel11.png" alt="telefon resim"></a>
                        <p>Cep Telefonu</p>
                    </div>

                    <div class="cat-imge">
                        <a class="a-style" href="urunler.php?tag=Labtop"><img class="cat-im" src="img/lap1.png" alt="telefon resim"></a>
                        <p>Laptob</p>
                    </div>

                    <div class="cat-imge">
                        <a class="a-style" href="urunler.php?tag=Monitör"><img class="cat-im" src="img/tele1.png" alt="telefon resim"></a>
                        <p>Televizyon</p>
                    </div>

                    <div class="cat-imge">
                        <a class="a-style" href="urunler.php?tag=Beyaz Eşya"><img class="cat-im" src="img/beyaz1.png" alt="telefon resim"></a>
                        <p>Beyaz Eşya</p>
                    </div>

                    <div class="cat-imge">
                        <a class="a-style" href="urunler.php?tag=Ev Aletleri"><img class="cat-im" src="img/ev1.png" alt="telefon resim"></a>
                        <p>Ev Aletleri</p>
                    </div>

                    <div class="cat-imge">
                        <a class="a-style" href="urunler.php?tag=Oyun"><img class="cat-im" src="img/xbox.png" alt="telefon resim"></a>
                        <p>X Box</p>
                    </div>
                    
                </div>



                <div class="row pt-3">
                    <div class="col col-lg-8 col-md-7 col-sm-12 col-12" >
                        <div class="col-s-12 col-md-6 col-lg-6 w-100">
                            <a href="urunler.php?tag=Beyaz Eşya"  class="a-sel w-100">
                                <div class="card mb-3 w-100 bg-dark text-light color" onmouseover="show('alis1');" onmouseout="hiden('alis1');">
                                    <img src="img/kampanya1.jpg" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <p class="card-text">Beyaz Eşyalar<span id="alis1" class="sp-al">Alışverişe Başla ></span></p>
                                    </div>

                                </div>
                            </a>
                        </div>




                        <div class="w-100"></div>
                        <div class="col col-s-12 col-md-6 col-lg-6 w-100">
                            <a href="urunler.php?tag=Monitör" class="a-sel">
                                <div class="card mb-3 w-100 bg-dark text-light color col-s-12 col-md-6 col-lg-12 "onmouseover="show('alis2');" onmouseout="hiden('alis2');">
                                    <img src="img/kampanya2.jpg" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <p class="card-text">Monitör <span id="alis2" class="sp-al">Alışverişe Başla ></span></p>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="w-100"></div>
                        <div class="col col-s-12 col-md-6 col-lg-6 w-100">
                            <a href="urunler.php?tag=Telefon Eksesuarlerı" class="a-sel">
                                <div class="card mb-3 w-100  bg-dark text-light color col-s-12 col-md-6 col-lg-6" onmouseover="show('alis3');" onmouseout="hiden('alis3');">
                                    <img src="img/kampanya3.jpg" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <p class="card-text">Telefon Eksesuarları<span id="alis3" class="sp-al">Alışverişe Başla ></span></p>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="w-100"></div>
                        <div class="col col-s-12 col-md-6 col-lg-6 w-100">
                            <a href="urunler.php?tag=Cep Telefon"  class="a-sel">
                                <div class="card mb-3 w-100 bg-dark text-light color  col-s-12 col-md-6 col-lg-6" onmouseover="show('alis4');" onmouseout="hiden('alis4');">
                                    <img src="img/akili.webp" class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <p class="card-text">Cep Telefonlar<span id="alis4" class="sp-al">Alışverişe Başla ></span></p>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col col-lg-4 col-md-5 col-12">
                        <div class="card rounded mx-auto d-block" style="width: 15rem;">
                            <img src="img/gif1.gif" class="card-img-top" alt="...">

                        </div>
                        <div class="card rounded mx-auto d-block" style="width: 15rem;">
                            <img src="img/gif2.gif" class="card-img-top" alt="...">
                        </div>
                        <div class="card rounded mx-auto d-block" style="width: 15rem;">
                            <img src="img/gif2.gif" class="card-img-top" alt="...">
                        </div>
                    </div>








                </div>
               
                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                <script>
                    function show(id) {
                        var x = document.getElementById(id);
                        // id.style.display = "block";
                        x.style.color = "white";

                    }

                    function hiden(id) {
                        var x = document.getElementById(id);
                        // id.style.dispaly = "none";
                        x.style.color = "#212529";
                    }
                    
                </script>

</body>

</html>
<?php
include "footer.php";
?>