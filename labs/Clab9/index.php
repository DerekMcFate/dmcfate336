<?php
    include 'inc/header.php';
    $imageURLs = array("alex.jpg", "bear.jpg", "carl.jpg",
                                        "charlie.jpg", "lion.jpg", "otter.jpg",
                                        "sally.jpg", "samantha.jpg", "ted.jpg", "tiger.jpg");
?>
        <!-- add Carousel component -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            
            <ol class="carousel-indicators">
                <?php 
                    for($i = 0; $i < count($imageURLs); $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i' ";
                        echo ($i == 0) ? "class='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < count($imageURLs); $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        } while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="carousel-item ';
                        echo ($i==0)?"active": "";
                        echo '">';
                        echo '<img src="img/' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            
        </div>
        <br /><br />
        <a class="btn btn-outline-primary" href="adoptions.php" role="button">Adopt Now</a>
        
        <br><br>
        <hr>

<?php
    include 'inc/footer.php';
?>