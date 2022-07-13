<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/sayronik.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/68328898ed.js" crossorigin="anonymous"></script>
</head>
<body>

<script>
        function likeol(id) {
            var satir = document.getElementById('ada_' + id);
           
            $.ajax({
                url: 'like.php',
                type: 'get',
                data: { "id": id},
                success: function(sonuc) {   
                    if (sonuc == 1) {  
                        $(satir).css('color', 'red');     
                        $(satir).animate({fontSize: '1em'}, "slow");
                    }else if(sonuc == 0)
                        $(satir).css('color', 'blue');
                        
                }
            });
        }

</script> 
</body>

<?php require_once "body.php" ?>
       
</html>