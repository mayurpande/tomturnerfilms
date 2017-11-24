 
<?php
  require_once('database.php');
  try{
     
    $result = $conn->query('SELECT * FROM documentaries');

  }catch(Exception $e){
    echo $e->getMessage();
    die();
  }

 $docs = $result->FetchAll(PDO::FETCH_ASSOC);


?>

<?php 
$section = "portfolio";
include("inc/header.php");
?>
        
	    <section>
			<div class="showreel-container">
				<iframe src="https://player.vimeo.com/video/148640837?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
		</section>
      
		<section>
        
			<div id="controls" id="Controls">
          
				<button class="filter" data-filter="all">All</button>
				<button class="filter" data-filter=".documentaries">Documentary</button>
				<button class="filter" data-filter=".commercial">Commercial</button>
				<button class="filter" data-filter=".charity">Charity/NGO/Commisions</button>
				<button class="filter" data-filter=".music">Music</button>
				<button class="filter" data-filter=".drama">Drama</button>
        
			</div>
        

       
			
			
			 <div id="Container" class="container">
                    <?php
                    foreach ($docs as $doc) {
                        $docId = $doc['id'];
                        ?>
                        <div class="mix <?php echo $doc['filter_doc']; ?>" data-myorder="<?php echo $docId; ?>">
                            <a href="portfolio.php?id=<?php echo $docId; ?>">
								<img src="img/<?php echo $doc['thumb_img']; ?>" alt="<?php echo $doc['title']; ?> Thumbnail" />
							</a>
                        </div>
                    <?php } ?>
             
				<div class="gap"></div>
                <div class="gap"></div>
			</div>
        
      </section>
      
      
    </div>
    
	</div><!-- end wrapper -->
	</div><!-- end wrap -->
    
	<?php include("inc/footer.php"); ?>