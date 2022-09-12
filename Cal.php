<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <title>Yanの電卓</title>
        <link rel="stylesheet" href="div.css">
        <script src="JavaScript.js" defer></script>
    </head>

<body>
    <h1>♥簡易電卓♥</h1>
    
    <!--計算機-->
    <div class="container">
        <?php
        $filename = "calData.txt";
        ?>
        
        <!--計算過程を保存する-->
        <?php
        if(isset($_POST['output_input']) && isset($_POST['output2_input'])){
            $fp=fopen($filename, 'a');
            $output=$_POST['output_input'];
            $output2=$_POST['output2_input'];
            $num=count(file($filename));
            $num++;
            fwrite($fp, $num."<>".$output."<>".$output2.PHP_EOL);
            fclose($fp);
        }
        ?>
        
        
        <!--計算の表示-->
        <form action="" name="outputForm" method="POST">
        <div id="output" class="output" name="output">
            <?php
            if(!isset($_POST['output_input'])){
                echo 0;
            }
            else {
                $output_input = $_POST['output_input'];
                $line=file($filename);
                for($i=0; $i<count($line); $i++){
                    $data=explode("<>", $line[$i]);
                    if($data[1] == $output_input){
                        echo $data[1];
                        break;
                   }
                }
            }
            ?>
        </div>
        <div id="output2" class="output2" name="output2">
            <?php
               if(!isset($_POST['output_input'])){
                   echo 0;
               }else{
                   $output_input = $_POST['output_input'];
                   $line2=file($filename);
                   for($i=0; $i<count($line2); $i++){
                       $data2=explode("<>", $line2[$i]);
                       if($data2[1] == $output_input){
                           echo $data2[2];
                           break;
                       }
                   }
               }
            ?>
        </div>
        <input type="text" id="output_input" name="output_input" value=""> //hidden
        <input type="text" id="output2_input" name="output2_input" value=""> //hidden
        </form>
        
        <!--keyboard-->
        <table width="400px" height="500px">
        <tr>
        <td colspan="2"><button id="AC" class="buttonClear">AC</button></td>
    
        <td><button id="percentage" class="buttonFunction">%</button></td>
        
        <td><button id="divided" class="buttonFunction">÷</button></td>
        </tr>
        
        <tr>
        <td><button id="7" class="buttonNum">7</button></td>
        <td><button id="8" class="buttonNum"/>8</button></td>
        <td><button id="9" class="buttonNum"/>9</button></td>
        <td><button id="cross" class="buttonFunction">x</button></td>
        </tr>
        
        <tr>
        <td><button id="4" class="buttonNum">4</button></td>
        <td><button id="5" class="buttonNum">5</button></td>
        <td><button id="6" class="buttonNum">6</button></td>
        <td><button id="minus" class="buttonFunction">-</button></td>
        </tr>
        
        <tr>
        <td><button id="1" class="buttonNum">1</button></td>
        <td><button id="2" class="buttonNum">2</button></td>
        <td><button id="3" class="buttonNum">3</button></td>
        <td><button id="plus" class="buttonFunction">+</button></td>
        </tr>
        
        <tr>
        <td colspan="2";><button id="0" class="buttonZero">0</button></td>
        <td><button id="dot" class="buttonFunction">.</button></td>
        <td><button id="equal" class="buttonEqual">=</button></td>
        </tr>
        
        </table>
        </div>

        <span style="color: red">ご利用ありがとうございます。</span><br>
        <snap style="font-size:20px; color:red; background-color: yellow;">~計算記録~</snap><br>
        <!--削除-->
        <form action="" name="delete" method="post">
            <input type="hidden" name="delData" id="delData">
            <input type="submit" name="delData" value="データ一括削除">
        </form>
        
        <?php
        if(isset($_POST['delData'])){
            $delete=$_POST['delData'];
            $fp2=fopen($filename, 'w');
            fwrite($fp2, "");
            fclose($fp2);
            echo "データ削除された";
        }
        ?>

        <!--計算記録-->
        <?php
        $array=file($filename, FILE_IGNORE_NEW_LINES);
        if(file_exists($filename)){
            foreach($array as $value){
                $txt=explode("<>", $value);
                echo "<button class='calData'>".$txt[1]."</button>"."<br>";
            }
        }
        ?>
                
    </body>
</html>