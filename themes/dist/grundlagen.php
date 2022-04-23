<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Document</title>
    
</head>
<body>
    <h1>PHP Grundlagen</h1>
    <p>Das ist ein HTML-Tag</p>

    <?php
     echo '<h3>' . 'Das ist ein PHP text' . '</h3>';

    ?>
    <h2>Variablen in PHP</h2>
    <?php
     $name = 'Sanja Krog';
     echo $name;

     $vorname = 'Sanja';
     $nachname = 'Krog';
     //einfaches kommentar(Einzahlig)
     /*
     Mehrzeilig
     
     */
     $alter= 120;
     echo '<p>' . $vorname . ' ' . $nachname . ' ist ' . $alter . ' Jahre alt' . '</p>';
     $num1= 10;
     $num2= 20;
     $ergebnis = $num1 + $num2;
     echo 'Ergebnis: ' . $ergebnis;

    ?>

    <h2>IF/ELSE</h2>
    <?php
       $num3 = 15;

       if($num3 < 15){
           echo 'Die Person ist junger als 15';
       }elseif($num3 == 15){
           echo 'Die person ist 15 Jahre alt';
       }
       else{
           echo 'Die person ist älter als 15';
       }

    ?>

    <h2>Funktionen</h2>
    <?php
       function meineFunktion($a, $b){
          return $a * $b;
       }
       echo meineFunktion($num1, $num2) . '<br>';
       echo meineFunktion($num2, $num2);
    ?>
    <?php 
         
       function meineUebung1($name, $email, $phone){
         $nameOut = '<p>'. $name . '</p>';
         $emailOut = '<a href="mailto:krog.sanja30@gmail.com">' . $email . '</a>' .'<br>';
         $phoneOut = '<a href="tel:+43 316 1234 567">' . $phone . '</a>';

          return $nameOut . $emailOut . $phoneOut;
       }
         $name = 'Sanja';
         $email = 'krog.sanja30@gmail.com';
         $phone = '+43 316 1234 567';

       echo meineUebung1($name, $email, $phone);
    
    ?>

    <h2>Schleifen</h2>
    <?php 
      $namen = array(
         'Christian',
         'Mario',
         'Elisabeth',
         'Carina',
         'Tomas'
      );
      echo '<ul>';
      foreach($namen as $item){
          echo '<li>'.$item.'</li>';
      }
      echo '</ul>';
    ?>
  
</body>
</html>