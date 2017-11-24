<?php
  require_once('database.php');
  if(!empty ($_GET['id'])){
    $id = intval($_GET['id']);
    
      try{
        $result = $conn->prepare('SELECT * FROM documentaries WHERE id = ?');
        $result->bindParam(1,$id);
        $result->execute();
  
      }catch(Exception $e){
        echo $e->getMessage();
        die();
      }
    
      //stores 1000 array of films in $films
      //different method fetch
      $doc = $result->Fetch(PDO::FETCH_ASSOC);
      if($doc == FALSE){
        echo 'sorry a doc could not be found with the id provided';
        die();
      }
  }
  

  
 
?>
		<?php 
			$section = "portfolio";
			include("inc/header.php"); 
		?>

			<h1 id="h">
				<?php
					echo $doc['title'];
				?>
			</h1>
			

			<?php
				/*if ($doc['id']==1){
					echo'<div class="docImage">'.$doc['link'].'</div>';
				
				}else*/
                                if((!(is_null($doc['link2']))) && (!(is_null($doc['link3'])))){
					echo '<div class="docs">'.$doc['link'].'</div>';
					echo '<br /><br />';
					echo '<div class="docs">'.$doc['link2'].'</div>';
					echo '<br /><br />';
					echo '<div class="docs">'.$doc['link3'].'</div>';
				}else{
					echo '<div class="docs">'.$doc['link'].'</div>';
				}
				
			?>

		
			
			
			<br /><br />
		
		<div id="role">
			<?php
				if(is_null($doc['description']) && is_null($doc['extra_description'])){
					echo $doc['length'];
				}else if(is_null($doc['length']) && is_null($doc['extra_description'])){
					echo $doc['description'];
				}else if(is_null($doc['length']) && is_null($doc['description'])){
					echo $doc['extra_description'];
				}else if(is_null($doc['extra_description'])){
					echo $doc['length'];
					echo '<br /><br />';
					echo $doc['description'];
				}else if(is_null($doc['description'])){
					echo $doc['length'];
					echo '<br /><br />';
					echo $doc['extra_description'];
				}else if(is_null($doc['length'])){
					echo $doc['description'];
					echo '<br /><br />';
					echo $doc['extra_description'];
				}else{
					echo $doc['length'];
					echo '<br /><br />';
					echo $doc['description'];
					echo '<br /><br />';
					echo $doc['extra_description'];
				}
				
			?>
		</div>
		
		<div id="prod_desc">
			<p>
				<?php
					if(is_null($doc['role']) && is_null($doc['extra_info'])){
						echo $doc['production_credit'];
					}else if(is_null($doc['production_credit']) && is_null($doc['extra_info'])){
						echo 'Credit: ';
						echo $doc['role'];
					}else if(is_null($doc['production_credit']) && is_null($doc['role'])){
						echo $doc['extra_info'];
					}else if(is_null($doc['extra_info'])){
						echo $doc['production_credit'];
						echo '<br /><br />';
						echo 'Credit: ';
						echo $doc['role'];
					}else if(is_null($doc['role'])){
						echo $doc['production_credit'];
						echo '<br /><br />';
						echo $doc['extra_info'];
					}else if(is_null($doc['production_credit'])){
						echo 'Credit: ';
						echo $doc['role'];
						echo '<br /><br />';
						echo $doc['extra_info'];
					}else{
						echo $doc['production_credit'];
						echo '<br /><br />';
						echo 'Credit: ';
						echo $doc['role'];
						echo '<br /><br />';
						echo $doc['extra_info'];
					}
					
				?>
			</p>
		</div>
		<div><br /><br /></div>
	
	
	</div>
	</div>
    
 <?php include("inc/footer.php") ?>