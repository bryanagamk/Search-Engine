<?php
/**
 * Created by PhpStorm.
 * User: bro
 * Date: 6/1/2018
 * Time: 1:49 PM
 */
/*$pdo = new PDO('mysql:host=localhost;dbname=searchengine', 'root', '');

$search = $_GET['q'];
$searche = explode(" ", $search);

$x = 0;
$construct = "";
$params = array();
foreach ($searche as $term) {
    $x++;
    if ($x == 1) {
        $construct .= "title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
    } else {
        $construct .= " AND title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
    }
    $params[":search$x"] = $term;
}


$results = $pdo->prepare("SELECT * FROM index_tab WHERE $construct");
$results->execute($params);

if ($results->rowCount() == 0) {
    echo "0 result found! <br />";
} else {
    echo $results->rowCount() . " results found! <hr />";
}

foreach ($results->fetchAll() as $result) {
    echo $result["title"] . "<br/>";
    if ($result["description"] == "") {
        echo "No Description Available! <br/>";
    } else {
        echo $result["description"] . "<br/>";
    }
    echo $result["url"] . "<br/>";
    echo "<hr/>";
}*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" name="viewport"/>
    <meta content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." name="description"/>
    <meta content="Semantic-UI, Theme, Design, Template" name="keywords"/>
    <meta content="PPType" name="author"/>
    <meta content="#ffffff" name="theme-color"/>
    <title>Search Engine.</title>
    <link rel="stylesheet" href="asset/stylesheets/default.css" type="text/css">
    <link rel="stylesheet" href="asset/stylesheets/pandoc-code-highlight.css" type="text/css">
    <link rel="stylesheet" href="asset/dist/semantic-ui/semantic.min.css" type="text/css">
    <script src="asset/dist/jquery/jquery.min.js"></script>
</head>
<body>
<div class="pusher">
    <div class="ui vertical segment">
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=searchengine', 'root', '');

        $search = $_GET['q'];

        // TODO: #1 Tokenizing
        $searche = explode(" ", $search);
        // TODO: #2 Filtering
        // TODO: #3 Stemming
        // TODO: #4 Tagging
        // TODO: #5 Analyzing

        $x = 0;
        $construct = "";
        $params = array();
        foreach ($searche as $term) {
            $x++;
            if ($x == 1) {
                $construct .= "title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
            } else {
                $construct .= " AND title LIKE CONCAT('%',:search$x,'%') OR description LIKE CONCAT('%',:search$x,'%') OR keywords LIKE CONCAT('%',:search$x,'%')";
            }
            $params[":search$x"] = $term;
        }


        $results = $pdo->prepare("SELECT * FROM index_tab WHERE $construct");
        $results->execute($params);
        if ($results->rowCount() == 0) {
            ?>
            <div class="ui text inverted red padded container raised very segment">
                <h1 class="ui header">
                    <?php echo "0 results found!";?>
                </h1>
            </div>
            <?php
        } else {
            ?>
            <div class="ui text inverted blue padded container raised very segment">
                <h1 class="ui header">
                <?php echo $results->rowCount() . " results found!";?>
                </h1>
            </div>
            <?php
        }
        foreach ($results->fetchAll() as $result) {
            ?>
            <div class="ui text padded container raised very segment">

                <h2 class="ui header"> <!--Title-->
                    <?php echo $result["title"]; ?>
                </h2>
                <p> <!--Descriptions-->
                    <?php if ($result["description"] == "") {
                        echo "No Description Available! <br/>";
                    } else {
                        echo $result["description"] . "<br/>";
                    } ?>
                </p>
                <p> <!--Link-->
                    <a href="<?php echo $result["url"]; ?>"><?php echo $result["url"]; ?></a>
                </p>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>