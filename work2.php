<!-- Create a web page that incorporates the four check operations : a) Check for prime palindrome number 
b) Check for perfect number c) check for Armstrong number d) Check for Automorphic Number. -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Checker</title>
</head>


<?php 
     if(isset($_POST['sub'])){
        $num=$_POST['num'];
        echo "$num";

        //Prime Palindrome Checker-------------------------------
        $f = 0; 
        for($i=2;$i<$num;$i++)
            if(fmod($num,$i) == 0)
                $f = $f + 1;

        if("$f == 0")
            // Palindrome Checker
            $rev = Palindrome($num);
            function Palindrome($n){  
                $number = $n;  
                $sum = 0;  
                while($number>0) {  
                    $rem = $number % 10;  
                    $sum = $sum * 10 + $rem;  
                    $number = $number/10;  
                }
                return $sum;
            }
            if($rev == $num)
                echo "$num is a Prime Palindrome  Number <br>";

        else
            echo"$num is not a Prime Number <br>";

        //Perfect Checker---------------------------------------------
        $sum = Perfect($num);
        function Perfect($n){
            $sum = 0;
            for ($i = 1; $i < $n; $i++)
                if ($n % $i == 0)
                    $sum = $sum + $i;

            return $sum;
        }
        if($sum == $num)
            echo "$num is a Perfect  Number <br>";
        else
            echo"$num is not Perfect Number <br>";

        // Amstrong Check----------------------------------------------
        $sum = Armstrong($num);
        function Armstrong($n){
            $sum = 0; 
            $x = $n; 
            while($x != 0) { 
                $rem = $x % 10; 
                $sum = $sum + $rem*$rem*$rem; 
                $x = $x / 10; 
            } 
            return $sum;   
        }
        if ($num== $sum)
            echo "$num is a Amstrong  Number <br>";
        else
            echo"$num is not Amstrong Number <br>";
        

        //Automorphic Checker-------------------------------------
        $f=Automorphic($num);
        function Automorphic($n){
            $squar= $n*$n;
            while ($n>0){
                if ($n % 10 != $squar % 10){
                    return 0;
                }
                else
                    $n /= 10;
                    $squar /= 10;
            }
            return 1;
        }
        if($f==1)
            echo "$num is a Automorphic Number <br>";
        else
            echo"$num is not Automorphic Number <br>";       
    }

?>

<body action="work2.php" method="POST">
     <input type="number" name="num" placeholder="Enter the number"><br><br>
     <input type="submit" name="sub" >

    
</body>
</html>



