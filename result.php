<?php
ini_set('display_errors', 'none');
include 'analyzing.php';

$input = $_GET['q'];
$input2 = explode(" ", $input);
$result = explodeInput($input);

$countwords = 0;
$array = array();
//print_r($result);
$temp = [];
for ($i = 0; $i < count($input2); $i++) {
//    rsort($result[$i]);
    $temp[$i] = $result[$i];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hasil Search Engine</title>
    <link rel="stylesheet" href="asset/stylesheets/default.css" type="text/css">
    <link rel="stylesheet" href="asset/stylesheets/pandoc-code-highlight.css" type="text/css">
    <link rel="stylesheet" href="asset/dist/semantic-ui/semantic.min.css" type="text/css">
    <script src="asset/dist/jquery/jquery.min.js"></script>
</head>
<body>

<!--Page Contents-->
<div class="pusher">
    <div class="ui vertical stripe segment">

        <?php if(is_nan($result[0][0])) { ?>
            <div class="ui text inverted red padded container raised very segment">
                <h1 class="ui header">
                    Kosong
                </h1>
            </div>
        <?php }else{
            for ($i = 0; $i < count($input2);$i++) { ?>
                <div class="ui text inverted blue padded container raised very segment">
                    <h1 class="ui header">
                        <?php echo $input2[$i] . " Result !!";?>
                    </h1>
                </div>

                <div class="ui text padded container raised very segment">

                <?php
                for ($j = 0; $j < count($temp[$i]); $j++) {
                    if ($temp[$i][$j] != 0) { ?>
                        <h2 class="ui header"> <!--Title-->
                            <?php echo "Paragraf - " . ($j + 1) . "<br>"; ?>
                        </h2>
                        <p> <!--Descriptions-->
                            <?php
                            if ($temp[$i][$j] != 0)
                                echo "TF-IDF = " . $temp[$i][$j]; ?>
                        </p>

                        <?php
                    }
                }
                echo "</div>";
            }
        } ?>

    </div>
</div>
</body>
</html>