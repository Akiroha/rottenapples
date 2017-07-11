
<?php
/*
Template Name: Show Layout
*/ 

$show_id = $_GET["show_id"];
$show_id2 = $_GET["show_id"];

// Show details 
$json_url = file_get_contents("https://api.themoviedb.org/3/tv/" . $show_id . "?language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a = json_decode($json_url, true);

// Cast and Credits 
$json_url_cast = file_get_contents("https://api.themoviedb.org/3/tv/" . $show_id . "/credits?language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_cast = json_decode($json_url_cast, true);

// Similar shows
$json_url_similar = file_get_contents("https://api.themoviedb.org/3/tv/" . $show_id . "/similar?language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_similar = json_decode($json_url_similar, true);

// TV tonight
$json_url_tonight = file_get_contents("https://api.themoviedb.org/3/tv/airing_today?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_tonight = json_decode($json_url_tonight, true);

// POPULAR
$json_url_popular = file_get_contents("https://api.themoviedb.org/3/tv/popular?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_popular = json_decode($json_url_popular, true);

$show_name = $json_a['name'];
$genre = $json_a['type'];
$days = $json_a['days'];
$showtext = "";
$networktext = "";
$airtimes = array();
$networks = array();
$networks2 = array();
$networkshows = array();
$time = strtotime($json_a['time']);
$endtime = date("H:i", strtotime('+'.$json_a['runtime'].'minutes',$time));
$shows = array();
$first_air = $json_a['first_air_date'];
$seasoncount = 0;
$num = 0;

$premiere = date("F j, Y", strtotime($json_a['first_air_date']));

if($json_a['poster_path'] != NULL) {
	$poster = "https://image.tmdb.org/t/p/w500" . $json_a['poster_path'];
}
else {
	$poster = "" . get_template_directory_uri() . "/photos/noPhoto.jpg";
}
$pop_num = $json_a['popularity'];

get_header();
if(have_posts()) :
	while (have_posts()) : the_post(); ?>

	<article class="post-page">
		<!-- column-container -->
		<div class="column-contanier clearfix">

			<div class="main-column">
				<div class="title-header">
					<h1 class="show-title"><?php echo $show_name; ?> (<?php echo strstr($first_air, '-', true); ?>)</h1>
				</div>
				<section class="top-section">
					<div class="show-image">
						<img src="<?php echo $poster; ?>">
					</div>

					<div class="rate-info">
						<div class="rate-info-popularity">
							<div class="popularity">
								<div class="popularity-title">
									<h3><strong>TMDB POPULARITY</strong></h3>
								</div>
								<div class="popularity-content">
									<p><img src="<?php echo get_template_directory_uri();?>/photos/TMDB-logo.png"> <?php echo strstr($pop_num, '.', true);?></p>
								</div>
							</div>
							<div class="average">
								<div class="average-title">
									<h3><strong>AUDIENCE SCORE</strong></h3>
								</div>
								<div class="average-content">
									<p><?php echo $json_a['vote_average']; ?>/10</p>
								</div>
							</div>
						</div>

						<div class="popup-container">
					<!-- Add an optional button to open the popup -->
					  <button class="my_popup_open">Add Rating?</button>

					  <!-- Add content to the popup -->
					  <div id="my_popup">
					  <?php 
							if ($_SERVER['REQUEST_METHOD'] == 'POST') {
								// retrieve form data
								$error = array();

								if (!empty($_POST['nickname2']))
									$nickname2 = $_POST['nickname2'];
								else
									$error[] = "Please enter nickname";

								if (!empty($_POST['watch2']))
									$watch2 = $_POST['watch2'];
								else
									$error[] = "Please let us know if you would watch this show or not";

								if (!empty($_POST['star2']))
									$star2 = $_POST['star2'];
								else
									$error[] = "Please rate the show";

								if (!empty($_POST['review2']))
									$review2 = $_POST['review2'];
								else
									$error[] = "Please write a review";

								if (!empty($error)){
									foreach ($error as $msg) {
										echo $msg;
										echo '<br>';
									}
								}
								else {
									include "db_connection.php";

									// sql to insert data to table
									$sql = "INSERT INTO review (showID, nickname, watch, star, review, postDate)
											VALUES ('$show_id', '$nickname2', '$watch2', '$star2', '$review2', now())";

									if ($conn->query($sql) === TRUE) {
										echo "Thanks for your review";
									} else {
										echo "Error: " . $sql . "<br>" . $conn->error;
									}

									$conn->close();
								}
							}
						?>
					  	<form action="" method="post">
								<div class="nickname">
										<input type="text" name="nickname2" placeholder="Nickname">
								</div>
								<div class="rate-info-rating-checkbox">
									<div class="rate-info-rating-checkbox">
										<select type="text" name="watch2">
										<option value="yes">Want To Watch</option>
										<option value="no">Not Interested</option>
										</select>
									</div>
									<div class="stars">
										<input type="radio" name="star2" class="star-1" id="star-1" value="1" />
								        <label class="star-1" for="star-1">1</label>
								        <input type="radio" name="star2" class="star-2" id="star-2" value="2" />
								        <label class="star-2" for="star-2">2</label>
								        <input type="radio" name="star2" class="star-3" id="star-3" value="3" />
								        <label class="star-3" for="star-3">3</label>
								        <input type="radio" name="star2" class="star-4" id="star-4" value="4" />
								        <label class="star-4" for="star-4">4</label>
								        <input type="radio" name="star2" class="star-5" id="star-5" value="5" />
								        <label class="star-5" for="star-5">5</label>
								        <span></span>
									</div>
								</div>
								<div class="rate-info-rating-review">
									<textarea class="review" name="review2" placeholder="Add a Review" cols="50"></textarea>
								</div>
								<input type="submit" value="Post">
							</form>
					    <!-- Add an optional button to close the popup -->
					    <button class="my_popup_close">Close</button>

					  </div>

					  <!-- Include jQuery -->
					  <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>

					  <!-- Include jQuery Popup Overlay -->
					  <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>

					  <script>
					    $(document).ready(function() {

					      // Initialize the plugin
					      $('#my_popup').popup();

					    });
					  </script>
					 </div>
						
					</div>
				</section>
				<section class="show-info">
					<h2>SHOW INFO</h2>
					<ul style="list-style: none;">
							<li><?php echo $json_a['overview']; ?></li>
							<br>
							<li><strong>Created by</strong>: <?php for ($i = 0; $i < count($json_a['created_by']); $i++) {
													echo "[" . $json_a['created_by'][$i]['name'] . "] ";
												}
											?>
							</li>
							<li><strong>Genre(s)</strong>: <?php for ($i = 0; $i < count($json_a['genres']); $i++) {
													echo "[" . $json_a['genres'][$i]['name'] . "] ";
												}
											?>
							</li>
							<li><strong>Premiere Date</strong>: <?php echo $premiere; ?></li>
							<li><strong>Network(s)</strong>: <?php for ($i = 0; $i < count($json_a['networks']); $i++) {
													echo "[" . $json_a['networks'][$i]['name'] . "] ";
												}
											?>
							</li>
							<li><strong>Seasons</strong>: <?php echo $json_a['number_of_seasons']; ?></li>
							<li><strong>Episodes</strong>: <?php echo $json_a['number_of_episodes']; ?></li>
						</ul>
				</section>
				<?php if ($json_a_cast['cast'] != NULL) { ?>
					<section class="cast-info-panel">
						<h2>CAST</h2>
						<div class="cast-container">
							<?php for ($i = 0; $i < count($json_a_cast['cast']); $i++) {
								$cast_id = $json_a_cast['cast'][$i]['id'];
								$cast_poster = "https://image.tmdb.org/t/p/w500" . $json_a_cast['cast'][$i]['profile_path'];
								echo '<div class="element">';
									echo '<div class="img-container">';
										if($json_a_cast['cast'][$i]['profile_path'] == NULL) {
											echo "<a href='/cast?cast_id=" . $cast_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPerson.jpg'/></a>";
										}
										else {
											echo "<a href='/cast?cast_id=" . $cast_id . "'><img src='" . $cast_poster . "'/></a>";
										}
									echo '</div>';
									echo '<div class="content-container">';
										echo "<h3><a href='/cast?cast_id=" . $cast_id . "'>" . $json_a_cast['cast'][$i]['name'] . "</a></h3>";
										if ($json_a_cast['cast'][$i]['character'] != NULL) { 
											echo "<p>as " . $json_a_cast['cast'][$i]['character'] . "</p>";
										} else {
											echo "<p>as Self</p>";
										}
									echo '</div>';
								echo '</div>';
								}
							?>
						<?php if(count($json_a_cast['cast']) > 3) { ?>
							<input id="castButton" type="button" name="castButton" value="Show Full Cast"/>
						<?php } ?>
						</div>
					</section>
				<?php } ?>

				<?php if ($json_a_similar['results'] != NULL) { ?>
					<section class="show-similar">
						<h2>SHOWS LIKE <?php echo strtoupper($show_name); ?></h2>
						<div class="similar-container">
							<?php for ($i = 0; $i < count($json_a_similar['results']); $i++) {
								$show_id = $json_a_similar['results'][$i]['id'];
								$similar_poster = "https://image.tmdb.org/t/p/w500" . $json_a_similar['results'][$i]['poster_path'];
								echo '<div class="element">';
									echo '<div class="img-container">';
									if($json_a_similar['results'][$i]['poster_path'] == NULL) {
										echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
									}
									else {
										echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $similar_poster . "'/></a>";
									}
										echo "<p><a href='/tv-show?show_id=" . $show_id . "'>" . $json_a_similar['results'][$i]['name'] . "</a></p>";
									echo '</div>';
								echo '</div>';
								}
							?>
						<?php if(count($json_a_similar['results']) > 3) { ?>
							<input id="showSimilar" type="button" name="answer" value="Show More Like <?php echo $show_name; ?>"/>
						<?php } ?>
						</div>
					</section>
				<?php } ?>
				<?php

				// connect to DB
				include "db_connection.php";

				$q = "SELECT * FROM review WHERE showID = '$show_id2'";
				$r = $conn->query($q); //r variable is an object reference that stores connection of query

				?>

				<?php if($r->num_rows > 0) { ?>
					<section class="rate-info-panel">
						<h2>Reviews</h2>
						<?php
							echo "<div class='reviews'>";
								while($row = $r->fetch_assoc()){
									echo "<div class='quote-bubble'>";
										echo "<div class='review-quote'>";
											echo $row['review'];
										echo "</div>";
										echo "<div class='review-date'>";
											echo $row['postDate'] . " | ";
											echo "Rating: " . $row['star'] . "/5";
										echo "</div>";
										echo "<div class='review-media'>";
											echo "<img src='" .  get_template_directory_uri() . "/photos/noPerson.jpg'/>";
											echo $row['nickname'];
										echo "</div>";
										$num++;
										echo "<br>";
									echo "</div>";
								}
							echo "</div>";
						?>
						<div class="showButton">
						<?php if($num > 3) { ?>
							<input id="showReviews" type="button" name="answer" value="Show More Reviews"/>
						<?php } ?>
						</div>
					</section>
				<?php } ?>
			</div>
				<aside class="tv-list-column">
				<h3>TV TONIGHT</h3>
				<ul style="list-style: none;">
				<li>
				<?php 
					for ($i = 0; $i < count($json_a_tonight['results']); $i++)
					{
						$show_id = $json_a_tonight['results'][$i]['id'];
						echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a_tonight['results'][$i]['name'] ."</a>";
					}
				?>
				</li>
				</ul>
				<h3>POPULAR</h3>
				<ul style="list-style: none;">
				<li>
				<?php 
					for ($i = 0; $i < count($json_a_popular['results']); $i++)
					{
						$pop_num2 = $json_a_popular['results'][$i]['popularity'];
						$show_id = $json_a_popular['results'][$i]['id'];
						//echo strstr($pop_num2, '.', true); 
						echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a_popular['results'][$i]['name'] ."</a>";
					}
				?>
				</li>
				</ul>
				</aside>
			</div>
			

		</div><!-- /column-container -->
	</article>
		<?php endwhile;

		else :
			echo '<p>No content found</p>';

		endif;
		

get_footer();
?>