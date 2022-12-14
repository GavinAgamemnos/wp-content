<?php
/**
 *Template Name: Product Details
 *
 * @author   Gavin Agamemnos
 * @version  1.0.0
 * @package  <Package>
 */

get_header();

/**
 * JSON data
 */

$str = file_get_contents('https://www.supadu.io/tech-assessment/book.json');
$json = json_decode($str, true);

$title = $json['title'];
$author = $json['contributors'][0]['contributor']['name'];
$bio = $json['contributors'][0]['contributor']['bio'];
$image = $json['image'];

$description = $json['description'];
$priceCAD = $json['prices'][0]['amount'];
$priceUSD = $json['prices'][1]['amount'];
$saleDate = $json['sale_date']['date'];
$createSaleDate = new DateTime($saleDate);
$reviews = $json['reviews'];
$retailers = $json['retailers'];
$formats = $json['formats'];

/**
 * End JSON data
 */

/**
	* Get Custom Fields
*/

$BookDetails = get_field('book_details');
$buy = $BookDetails['buy_now'];
$buyLinkText = $buy['bn_link_text'];
$buyLinkURL = $buy['bn_link_url'];
$productInfo = $BookDetails['product_details'];
$awardsInfo = $BookDetails['awards_content'];


?>
	<article>
		<div class="container">
			<div class="row">

				<!--Book cover image column-->

			  <div class="col-12 col-md-6 cover-image">
					<?php if( $image ) : ?><img src="<?php echo $image;?>" alt="Book Cover"><?php endif;?>
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 				viewBox="0 0 257 257" style="enable-background:new 0 0 257 257;" xml:space="preserve" class="ball">
							<circle cx="128.5" cy="128.5" r="128.5" style="fill: #efefef	"/>
						</svg>
				</div>

				<!--Product details column-->

				<div class="col-12 col-md-6 product-details">
					<header>
						<?php if( $createSaleDate ) :?><span class="release"><strong>Release date:</strong>  <?php echo $createSaleDate->format('d-m-Y');?></span><?php endif;?>
						<?php if( $title ) :?><h1><?php echo $title; ?></h1><?php endif;?>
						<?php if( $author ) :?><h2><?php echo $author; ?></h2><?php endif;?>
					</header>

					<?php echo $bio; ?>

					<div class="prices">
						<?php if( $priceCAD ) :?>CAD: <span class="price"><?php echo $priceCAD; ?></span><?php endif;?>
			      <?php if( $priceUSD ) :?>USD: <span class="price"><?php echo $priceUSD; ?></span><?php endif;?>
					</div>

					<div class="row buy">
						<div class="col-6">
							<a class="btn btn-secondary btn-buy" href="<?php if( $buyLinkURL ) : echo $buyLinkURL; endif;?>"><?php if( $buyLinkText ) : echo $buyLinkText; endif;?></a>
						</div>

						<div class="col-6">
							<div class="dropdown">
							 <button
								 class="btn btn-secondary dropdown-toggle"
								 type="button"
								 id="dropdownMenuButton1"
								 data-bs-toggle="dropdown"
								 aria-expanded="false">
								 Other Retailers
							 </button>

								 <?php
								 if( $retailers ) :
									 echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
										 foreach( $retailers as $retailer ) :
											 $retailerName = $retailer['label'];
												echo '<li class="dropdown-item">' . $retailerName. '<li>';
											endforeach;
										echo '</ul>';
									endif;
								 ?>
						 </div>
						</div>

					</div>

					<h3>Other formats:</h3>

						<?php
						if( $formats ) :
							echo '<ul class="formats">';
							foreach( $formats as $format ) :
									if(is_array($format)){
										 echo '<li>' . $format["detail"]. '</li>';
								 }
							endforeach;
							echo '</ul>';
						endif;
							?>
			  </div>
			</div>

			<!--Tabs -->

			<div class="tabs">

				<?php if( $description ) :?>
				  <input class="radiotab" name="tabs" tabindex="0" type="radio" id="description" checked="checked">
				  <label class="label" for="description">Book Description</label>
				  <div class="panel" tabindex="0">
				    <h2>Book Description</h2>
				    <?php echo $description; ?>
				  </div>
				<?php endif;?>

				<?php if( $productInfo ) :?>
				  <input class="radiotab" tabindex="0" name="tabs" type="radio" id="details">
				  <label class="label" for="details">Product Details</label>
				  <div class="panel" tabindex="0">
				    <h2>Product Details</h2>
				    <?php echo $productInfo;?>
				  </div>
				<?php endif;?>

				<?php if( $reviews ) :?>
				  <input class="radiotab" tabindex="0" name="tabs" type="radio" id="reviews">
				  <label class="label" for="reviews" >Reviews</label>
				  <div class="panel" tabindex="0">
				    <h2>Reviews</h2>
								<?php foreach( $reviews as $review ) :
									foreach ($review as $reviewData):

										if(is_array($reviewData)){
											 echo '<div class="review">';
											 echo '<p>' . $reviewData["description"]. '</p>';
											 echo '<p>' . $reviewData["reviewer"]. '</p>';
											 echo '</div>';
									 }
									endforeach;
								endforeach;
								?>
				  </div>
				<?php endif; ?>

				<?php if( $reviews ) :?>
					<input class="radiotab" tabindex="0" name="tabs" type="radio" id="awards">
				  <label class="label" for="awards">Awards</label>
				  <div class="panel" tabindex="0">
					  <h2>Awards</h2>
					  <?php echo $awardsInfo; ?>
				  </div>
				<?php endif;?>
						
			</div>

	</div>
	</article>
<?php
get_footer();
