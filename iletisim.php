<?php

include "head.php";
include "navbar.php";

?>

<body>  
  <br><br><br>
  <div class="container1">
      <div class="container">
     <div class="wrapper" style="margin: 56px;">
    
      
            <h2 class="h1-responsive font-weight-bold text-center my-4 ile">İletişim</h2>
            
            <p class="text-center w-responsive mx-auto mb-5">Sormak istediğiniz bir şey var mı? Lütfen doğrudan bizimle iletişime geçmekten çekinmeyin.<br> Ekibimiz size yardımcı olmak için birkaç saat içinde size geri dönecektir..</p>

            <div class="row">

           
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                   
                    <div class="row">

                       
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                            <label for="name" class="ile">İsim</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                       

                       
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                            <label for="email" class="ile">Email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        

                    </div>
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                            <label for="subject" class="ile">Konu</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                   

                    
                    <div class="row">

                        
                        <div class="col-md-12">

                            <div class="md-form">
                            <label class="ile" for="message">Mesaj</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea "></textarea>
                            </div>

                        </div>
                    </div>
                    

                </form>
                 <br>
                <div class="text-center text-md-left">
                    <a class="btn btn-primary bacile" onclick="document.getElementById('contact-form').submit();">Gönder</a>
                </div>
                <div class="status"></div>
            </div>
           
            <div class="col-md-3 text-center mt-4">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x ile"></i>
                        <p>Halep,Suriye </p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x ile"></i>
                        <p>+905377792608</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x ile"></i>
                        <p>halepKale@Resturant.com</p>
                    </li>
                </ul>
            </div>
    
        </div>
    </div>
    </div>
</div>

</body>