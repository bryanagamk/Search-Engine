<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tugas Search Engine</title>
    <link rel="stylesheet" href="asset/stylesheets/default.css" type="text/css">
    <link rel="stylesheet" href="asset/stylesheets/pandoc-code-highlight.css" type="text/css">
    <link rel="stylesheet" href="asset/dist/semantic-ui/semantic.min.css" type="text/css">
    <script src="asset/dist/jquery/jquery.min.js"></script>
</head>
<body>

<!--Page Contents-->
<div class="pusher">
    <div class="ui vertical masthead center aligned segment" style="background-image: url('asset/images/parallax.jpg')">
        <div class="ui text container">
            <h1 class="ui inverted header">
                Discover the Word
            </h1>
            <h2 class="ui inverted header">
                Search whatever you want when you want to.
            </h2>
            <form action="search.php" method="get">
                <div class="ui fluid icon input">
                    <input type="text" name="q" placeholder="">
                    <i class="search icon"></i>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="asset/dist/semantic-ui/semantic.min.js"></script>
<style type="text/css">
    .hidden.menu {
        display: none;
    }

    .masthead.segment {
        min-height: 600px;
        padding: 1em 0em;
    }

    .masthead .logo.item img {
        margin-right: 1em;
    }

    .masthead .ui.menu .ui.button {
        margin-left: 0.5em;
    }

    .masthead h1.ui.header {
        margin-top: 2em;
        margin-bottom: 0em;
        font-size: 4em;
        font-weight: normal;
    }

    .masthead h2 {
        font-size: 1.7em;
        font-weight: normal;
    }

    .ui.vertical.stripe {
        padding: 8em 0em;
    }

    .ui.vertical.stripe h3 {
        font-size: 2em;
    }

    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
        margin-top: 3em;
    }

    .ui.vertical.stripe .floated.image {
        clear: both;
    }

    .ui.vertical.stripe p {
        font-size: 1.33em;
    }

    .ui.vertical.stripe .horizontal.divider {
        margin: 3em 0em;
    }

    .quote.stripe.segment {
        padding: 0em;
    }

    .quote.stripe.segment .grid .column {
        padding-top: 5em;
        padding-bottom: 5em;
    }

    .footer.segment {
        padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
        display: none;
    }

    @media only screen and (max-width: 700px) {
        .ui.fixed.menu {
            display: none !important;
        }

        .secondary.pointing.menu .item,
        .secondary.pointing.menu .menu {
            display: none;
        }

        .secondary.pointing.menu .toc.item {
            display: block;
        }

        .masthead.segment {
            min-height: 350px;
        }

        .masthead h1.ui.header {
            font-size: 2em;
            margin-top: 1.5em;
        }

        .masthead h2 {
            margin-top: 0.5em;
            font-size: 1.5em;
        }
    }
</style>
<script>
    $(document)
        .ready(function () {
            // fix menu when passed
            $('.masthead')
                .visibility({
                    once: false,
                    onBottomPassed: function () {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function () {
                        $('.fixed.menu').transition('fade out');
                    }
                })
            ;

            // create sidebar and attach to menu open
            $('.ui.sidebar')
                .sidebar('attach events', '.toc.item')
            ;
        })
    ;
</script>
</body>
</html>