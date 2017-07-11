
<?php
/*
Template Name: Cast Layout
*/ 

$cast_id = $_GET["cast_id"];

// Person main content 
$json_url = file_get_contents("https://api.themoviedb.org/3/person/" . $cast_id . "?language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a = json_decode($json_url, true);

// TV tonight
$json_url_tonight = file_get_contents("https://api.themoviedb.org/3/tv/airing_today?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_tonight = json_decode($json_url_tonight, true);

// POPULAR
$json_url_popular = file_get_contents("https://api.themoviedb.org/3/tv/popular?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_popular = json_decode($json_url_popular, true);

// Other Shows
$json_url_shows = file_get_contents("https://api.themoviedb.org/3/person/" . $cast_id . "/tv_credits?language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_shows = json_decode($json_url_shows, true);

// Photos
$json_url_photos = file_get_contents("https://api.themoviedb.org/3/person/" . $cast_id . "/images?language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_photos = json_decode($json_url_photos, true);

$birthdate = date("F j, Y", strtotime($json_a['birthday']));

$website = $json_a['homepage'];

get_header();
echo $website;
if(have_posts()) :
	while (have_posts()) : the_post(); ?>

	<article class="post-page">
		<!-- column-container -->
		<div class="column-contanier clearfix">

			<div class="main-column">
				<div class="title-header">
					<?php echo "<h1>" . $json_a['name'] . "</h1>"; ?>
				</div>
				<section class="cast-top-section">
					<div class="cast-image">
						<?php 
						if ($json_a['profile_path'] != NULL) {
							$cast_poster = "https://image.tmdb.org/t/p/w500" . $json_a['profile_path']; 
						} else {
							$cast_poster = "" . get_template_directory_uri() . "/photos/noPerson.jpg";
						}
						?>
						<img src="<?php echo $cast_poster; ?>">
					</div>
				</section>
				<section class="show-info">
					<h2>CAST INFO</h2>
					<div class="cast-info">
						<ul style="list-style: none;">
							<li><?php echo $json_a['biography']; ?></li>
							<br>
							<li>Birthday: <?php echo $birthdate; ?></li>
							<?php if($json_a['place_of_birth'] != NULL) { ?>
								<li>Birthplace: <?php echo $json_a['place_of_birth']; ?><li>
							<?php } ?>
							<?php if($json_a['homepage'] != NULL) { ?>
								<li><a href="'$website'">Official Website</a></li>
							<?php } ?>
						</ul>
					</div>
				</section>

				<?php if($json_a_photos['profiles'] != NULL) { ?>
				<section class="cast-photos">
					<h2>PHOTOS</h2>
					<div class="photo-container">
						<?php for ($i = 0; $i < count($json_a_photos['profiles']); $i++) {
							$cast_poster = "https://image.tmdb.org/t/p/w500" . $json_a_photos['profiles'][$i]['file_path'];
							echo '<div class="element">';
								echo '<div class="img-container">';
									echo "<img src='https://image.tmdb.org/t/p/w500" . $json_a_photos['profiles'][$i]['file_path'] . "'>";
								echo '</div>';
							echo '</div>';
							}
						?>
					<?php if(count($json_a_photos['profiles']) > 3) { ?>
						<input id="photos" type="button" name="answer" value="More Photos"/>
					<?php } ?>
					</div>
				</section>
				<?php } ?>

				<?php if($json_a_shows['cast'] != NULL) { ?>
				<section class="show-similar">
					<h2>OTHER SHOWS</h2>
					<div class="similar-container">
						<?php for ($i = 0; $i < count($json_a_shows['cast']); $i++) {
							$show_id = $json_a_shows['cast'][$i]['id'];
							$show_poster = "https://image.tmdb.org/t/p/w500" . $json_a_shows['cast'][$i]['poster_path'];
							echo '<div class="element">';
								echo '<div class="img-container">';
									if($json_a_shows['cast'][$i]['poster_path'] == NULL) {
										echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
									}
									else {
										echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
									}
									echo "<p><a href='/tv-show?show_id=" . $show_id . "'>" . $json_a_shows['cast'][$i]['name'] . "</a></p>";
								echo '</div>';
							echo '</div>';
							}
						?>
					<?php if(count($json_a_shows['cast']) > 3) { ?>
						<input id="otherShows" type="button" name="answer" value="More Shows"/>
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