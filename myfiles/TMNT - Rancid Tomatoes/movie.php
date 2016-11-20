<!DOCTYPE html>
<html>
	

	<head>
		<title>Racid Tomatoes</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="movie.css">
    </head>

    <body>
    	<?php
		//$movie_pages=4;
		if (isset($_GET["film"])) {
			$film = $_GET["film"];
		}
		?>
    	<div id="banner">
    		<img src="images/banner.png" alt="banner">
    	</div>
    	<h1>
    		<?php $filmInfo = file("{$film}/info.txt", FILE_IGNORE_NEW_LINES); ?>
    		<?= $filmInfo ?>
		</h1>

		<div id="overall">
            <div id="Overview">
                <img src="<?= $film ?>/overview.png" alt="overview">
                <dl class="OverViewdl">
               		<?php $filmOverV = file("{$film}/overview.txt", FILE_IGNORE_NEW_LINES);
					$overviewLength=count($filmOverV);
					for ($i = 0; $i <= $overviewLength-1; $i++) { 
						$ov = explode(":", $filmOverV[i]); ?>
						<dt><?= $ov[0]?></dt>
						<dd>
							<ul>
							<?php $ovSum=count($ov);
								for($j=1; $j<=$ovSum; $j++){ ?>
									<li><?= $ov[$j] ?></li>
							<?php } ?>
							</ul>
						</dd>							
					<?php		} ?>
				</dl>
            </div>
        </div>

        <div id="reviews">
        	<div id="reviewsbar">
        		<?php //$image="";
        			if($filmInfo[2] >= 60){ ?>
        				<!-- $image="images/freshbig.jpg"; -->
        				<img id="reviewsbarimg" src="images/freshbig.jpg" alt="overview">
        			<?php } else { ?>
        				<!-- $image="images/rottenbig.png"; -->
        				<img id="reviewsbarimg" src="images/rottenbig.jpg" alt="overview">
        		<?php } ?>
        		<div id="rate">
        			<?= $filmInfo[2]?>
        		</div>
        	</div>
        	<?php $rev= glob("{$film}/review*.txt");
        		$revN= count($rev);
        		$revHN= ((int) ($revN/2)+($revN%2));
        		for($ac=0;$ac<=$revN-1;$ac++){
        			if($revHN==$ac OR $ac==0){ ?>
        				<div class="reviewcol">
        					
        		<?php } ?>
        					<div class="reviewquote">
        						<?php 
        							$review=file($rev[$ac], FILE_IGNORE_NEW_LINES);
        							if($review[1]=="FRESH"){ ?>
        								<img class="likeimg" src="images/fresh.gif" alt="fresh">
        						<?php } else { ?>
        								<img class="likeimg" src="images/rotten.gif" alt="rotten">
        						<?php } ?>
        						&quot<?= $review[0] ?>&quot
        					</div>
        					<div class="personalquote">
        						<img class="personimg" src="images/critic.gif" alt="critic">
        						<?= $review[2] ?> <br>
        						<?= $review[3] ?>
        					</div>
        				<?php if( $ac==($revHN-1) OR $ac==($revN)) { ?>
        				</div>	
        				<?php }
        		} ?>
        </div>
        	
        <div id="bottombar">
            (1-<?= $revN ?> ) of <?= $revN ?>
        </div>   
        
        <div id="w3ccheck">
          	<a href="http://validator.w3.org/check/referer"><img src="images/w3c-html.png" alt="Valid HTML5"></a> <br>
           	<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="images/w3c-css.png" alt="Valid CSS"></a>
		</div>
    </body>
</html>