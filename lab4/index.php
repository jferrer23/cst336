 <?php
    $backgroundImage = "img/sea.jpg";
    
        // API calls go here
        if(isset($_GET['keyword']) or isset($_GET['category'])) {
            include 'api/pixabayAPI.php';
            $keyword = $_GET['keyword'];
            $category = $_GET['category'];
            if ($category != "n/a" && $category != "")
            {
                $imageURLs = getImageURLs($category);
                $backgroundImage = $imageURLs[array_rand($imageURLs)];
            }
            else if($keyword != "")
            {
                $imageURLs = getImageURLs($keyword);
                $backgroundImage = $imageURLs[array_rand($imageURLs)];
            }

        }
 ?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url("css/styles.css");
             .bg {
                background-image: url('<?=$backgroundImage?>');
                background-size:cover;
                background-repeat: no-repeat;
                color:black;
            }    
        </style>
    </head>
    
    <body class="bg">
        <br /> <br />
        
        <!--- HTML form goes here! ---->
        <form>
        <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"/>
        <input type="submit" value="Search"/>
        <br />
        <div id="orientation">
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical">Vertical</label>
            <br />
        </div>
        <select name ="category">
            <option value="n/a">Select One</option>
            <option value="ocean">Sea</option>
            <option value="forest">Forest</option>
            <option value="mountain">Mountain</option>
            <option value="snow">Snow</option>
        </select>
        </form>
        <br />
        
        <?php
        $first = false;
        if(!isset($imageURLs) && $category == "") {
            echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
            $first = true;
        } 
        else if($keyword == "" and $category == "n/a")
        {
            echo "<h2> You must enter keyword or select category</h2>";
        }
        else {
            //Display carousel here
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" date-ride="carousel">
            <!----- Indicators Here ----->
            <ol class="carousel-indicators">
                <?php
                for($i = 0; $i < 7; $i++)
                {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0)?" class='active'": "";
                    echo "></li>";
                }
                ?>
            </ol>
            <!----- Wrapper for Images here ----->
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 7; $i++)
                    {
                        do{
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while(!isset($imageURLs[$randomIndex]));
                        
                        echo "<div class='item ";
                        echo ($i == 0)?"active": "";
                        echo "'>";
                        echo "<img src='". $imageURLs[$randomIndex] . "'>";
                        echo "</div>";
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <!----- Controls Here ----->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        <?php
        } //endElse
        ?>
        <br />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>