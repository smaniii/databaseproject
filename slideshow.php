<!DOCTYPE html>
<html>
<head>
    <style>
        * {box-sizing:border-box}
        body {font-family: Verdana,sans-serif;}
        .mySlides {display:none;}

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }
        #t1 {
            min-width: 500px;
            min-height: 500px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 13px;
            width: 13px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {font-size: 11px}
        }
    </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<?php
$dbh = new PDO('mysql:host=localhost;dbname=eventtracker', 'root', '');
$i = 0;
$arr = array();
foreach($dbh->query("SELECT `blob_data` FROM `images` WHERE `univ_id` = 2 ") as $row) {
    $arr[$i] = $row[0];
    $i++;
}
//var_dump($arr);
//$myJSON = json_encode($arr);
//echo $myJSON;
$i=0;
foreach ($arr as $hi) {

    echo '<img class="mySlides fade" id="'.$i.'" src="data:image/jpeg;base64,' . base64_encode($hi) . '"/>';
    echo '<br><br>';
    $i++;
}
?>
<div style="text-align:center">
    <?php
        for($i;$i>0;$i--){
            echo '<span class="dot"></span>';
        }
    ?>
</div>
<div id="t1">

</div>
<script>
    var slideIndex = 0;
    var slideindex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        slideindex++;
        if (slideIndex> slides.length) {slideIndex = 1}
        if (slideindex> slides.length) {slideindex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        //slides[slideIndex-1].style.display = "block";
        var src = document.getElementById(slideindex-1).getAttribute('src');
        $('body').css('backgroundImage','url('+src+')');
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>

</body>
</html>
