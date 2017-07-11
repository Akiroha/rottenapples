<!-- <h1>Hello world</h1> -->
<?php
/*
Template Name: Genre Layout
*/ 

$genre_id = get_field('genre_id');

// Genres 
$json_url = file_get_contents("https://api.themoviedb.org/3/genre/tv/list?language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a = json_decode($json_url, true);

// Page 1
$json_url1 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a1 = json_decode($json_url1, true);

// Page 2
$json_url2 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=2&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a2 = json_decode($json_url2, true);

// Page 3
$json_url3 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=3&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a3 = json_decode($json_url3, true);

// Page 4
$json_url4 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=4&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a4 = json_decode($json_url4, true);

// Page 5
$json_url5 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=5&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a5 = json_decode($json_url5, true);

// Page 6
$json_url6 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=6&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a6 = json_decode($json_url6, true);

// Page 7
$json_url7 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=7&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a7 = json_decode($json_url7, true);

// Page 8
$json_url8 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=8&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a8 = json_decode($json_url8, true);

// Page 9
$json_url9 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=9&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a9 = json_decode($json_url9, true);

// Page 10
$json_url10 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=10&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a10 = json_decode($json_url10, true);

// Page 11
$json_url11 = file_get_contents("https://api.themoviedb.org/3/tv/on_the_air?page=11&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a11 = json_decode($json_url11, true);

// Variables
$a = 0; $one = 0;
$b = 0; $two = 0;
$c = 0; $three = 0;
$d = 0; $four = 0;
$e = 0; $five = 0;
$f = 0; $six = 0;
$g = 0; $seven = 0;
$h = 0; $eight = 0;
$i = 0; $nine = 0;
$j = 0; $ten = 0;
$k = 0; $eleven = 0;


get_header();
if(have_posts()) :
	while (have_posts()) : the_post(); ?>

	<article class="post page">

		<!-- column-container -->
		<div class="column-contanier clearfix">

			<!-- title-column -->
			<div class="title-column">
				<h2><?php the_title(); ?></h2>
					<?php if ($genre_id != 0) { ?>
					<div class="title-column-page">
						<ul style = "list-style: none;">
						
						<?php for ($i = 0; $i < count($json_a1['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a1['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a1['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a1['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a1['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a1['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}	
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a1['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a2['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a2['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a2['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a2['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a2['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a2['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a2['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a3['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a3['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a3['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a3['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a3['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a3['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a3['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a4['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a4['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a4['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a4['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a4['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a4['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a4['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a5['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a5['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a5['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a5['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a5['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a5['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a5['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a6['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a6['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a6['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a6['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a6['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a6['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a6['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a7['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a7['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a7['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a7['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a7['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a7['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a7['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a8['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a8['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a8['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a8['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a8['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a8['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a8['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a9['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a9['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a9['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a9['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a9['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a9['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a9['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a10['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a10['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a10['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a10['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a10['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a10['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a10['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

						<?php for ($i = 0; $i < count($json_a11['results']); $i++) { ?>
							<?php for ($k = 0; $k < count($json_a11['results'][$i]['genre_ids']); $k++) { ?>
								<?php if ($json_a11['results'][$i]['genre_ids'][$k] == $genre_id) { ?>
									<?php $show_poster = "https://image.tmdb.org/t/p/w500" . $json_a11['results'][$i]['poster_path']; ?>
									<?php $show_id = $json_a11['results'][$i]['id']; ?>
									<?php echo "<div class='element'>";
										echo '<div class="img-container">'; 
										if($json_a11['results'][$i]['poster_path'] == NULL) {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}		
										echo "</div>";
										echo '<div class="content-container">';
											echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a11['results'][$i]['name'] . "</a>";
										echo "</div>";
									echo "</div>"; ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>

					</ul>
					</div>
				<?php } ?>

			</div><!-- title-column -->

			<!-- text-column -->
			<div class="text-column">
				<ul style = "list-style: none;">
					<div class="one-half-genres">
						<li><a href="/genres/action-adventure"><img src="<?php echo get_template_directory_uri() . "/photos/action-adventure.png"; ?>"></a></li>
						<li><a href="/genres/animation"><img src="<?php echo get_template_directory_uri() . "/photos/Animation.png"; ?>"></a></li>
						<li><a href="/genres/comedy"><img src="<?php echo get_template_directory_uri() . "/photos/comedy.jpg"; ?>"></a></li>
						<li><a href="/genres/crime"><img src="<?php echo get_template_directory_uri() . "/photos/crime.jpg"; ?>"></a></li>
						<li><a href="/genres/documentary"><img src="<?php echo get_template_directory_uri() . "/photos/documentary.jpg"; ?>"></a></li>
						<li><a href="/genres/drama"><img src="<?php echo get_template_directory_uri() . "/photos/drama.jpg"; ?>"></a></li>
						<li><a href="/genres/family"><img src="<?php echo get_template_directory_uri() . "/photos/family.jpg"; ?>"></a></li>
						<li><a href="/genres/kids"><img src="<?php echo get_template_directory_uri() . "/photos/kids.jpg"; ?>"></a></li>
					</div>
					<div class="two-half-genres">
						<li><a href="/genres/mystery"><img src="<?php echo get_template_directory_uri() . "/photos/mystery.png"; ?>"></a></li>
						<li><a href="/genres/news"><img src="<?php echo get_template_directory_uri() . "/photos/news.png"; ?>"></a></li>
						<li><a href="/genres/reality"><img src="<?php echo get_template_directory_uri() . "/photos/reality.png"; ?>"></a></li>		
						<li><a href="/genres/sci-fifantasy"><img src="<?php echo get_template_directory_uri() . "/photos/sci-fi.jpg"; ?>"></a></li>				
						<li><a href="/genres/soap"><img src="<?php echo get_template_directory_uri() . "/photos/soap.jpg"; ?>"></a></li>
						<li><a href="/genres/talk"><img src="<?php echo get_template_directory_uri() . "/photos/talk.jpg"; ?>"></a></li>
						<li><a href="/genres/warpolitics"><img src="<?php echo get_template_directory_uri() . "/photos/political.jpg"; ?>"></a></li>
						<li><a href="/genres/western"><img src="<?php echo get_template_directory_uri() . "/photos/western.jpg"; ?>"></a></li>
					</div>
				</ul>
			</div><!-- /text-column -->

		</div><!-- /column-container -->

	</article>
	
	<?php endwhile;

	else :
		echo '<p>No content found</p>';

	endif;
	
get_footer();
?>