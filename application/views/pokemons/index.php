<head>
    
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/search-bar.css" />

    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <script src="js/modernizr.custom.97074.js"></script>
    <noscript><link rel="stylesheet" type="text/css" href="css/noJS.css"/></noscript>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style>
        /*#pokemon-tile{
            background-color: <?php echo $pokemon['']; ?>;
        }*/

    </style>
</head>

<div id="page-content" >
<div class="container">
    <div class="row" id="title_search">
        <div class=".col-xs-6 .col-md-4" id="pagetitle"><h2><?php echo $title; ?></h2></div>
        <div class=".col-xs-12 .col-md-8" id="searchbar">
            <div class="expSearchFrom">
                <?php echo form_open('search') ?>
                <input id="field" name="search" type="text" placeholder="Search Pokémon"/>
                <div class="close">
                    <span class="front"></span>
                    <span class="back"></span>
                </div>
            </div>
        </div>
        <input type="submit" style="visibility: hidden;" />
    </div> 
  

    <div id="pokemon-list-wrapper">

        <div class="row" id="pokemon-row">
            <?php
                $divcount=0;
                foreach ($pokemons as $pokemon)
                {
                    $pokeid = $pokemon['pokemon_id'];
                    $pokename = ucfirst($pokemon['pokemon_name']);

                    echo "<div class='col-md-2' id='pokemon-tile'>";
                        echo "<div id='pokemon-icon'>";
                            echo "<span>".$pokeid."</span>";
                           echo "<a href='" . site_url('pokemon/'.$pokemon['pokemon_id']) ."'><img id='img-center' src='/public/sprites/".$pokeid.".png'/></a>";
                            $divcount++;
                        echo "<div id='pokemon-name'>";
                            echo $pokename;
                        echo "</div>";

                        echo "</div>";
                        

                        
                    echo "</div>";

                    if ($divcount==6)
                    {
                        echo "</div><br>";
                        echo "<div class='row' id='pokemon-row'>";
                        $divcount=0;
                    }       
                }
        ?>
    </div>
</div>

</div>


