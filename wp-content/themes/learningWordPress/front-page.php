<!-- <h1>Hello world</h1> -->
<?php

// TV tonight
$json_url_tonight = file_get_contents("https://api.themoviedb.org/3/tv/airing_today?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_tonight = json_decode($json_url_tonight, true);

// POPULAR
$json_url_popular = file_get_contents("https://api.themoviedb.org/3/tv/popular?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_popular = json_decode($json_url_popular, true);

get_header(); ?>

	<!-- site-content -->
	<div class="site-content clearfix">

		<?php if(have_posts()) :
			while (have_posts()) : the_post(); 
			
			the_content();

			endwhile;

			else :
				echo '<p>No content found</p>';

			endif; ?>

			<!-- home-columns -->
			<div class="home-columns clearfix">

				<!-- one-half -->
				<div class="one-half">
					<h1>ON TONIGHT</h1>
					<div class="tonight-container">
					<ul>
						<?php
							for ($i = 0; $i < count($json_a_tonight['results']); $i++)
							{
								$show_poster = "https://image.tmdb.org/t/p/w500" . $json_a_tonight['results'][$i]['poster_path'];
								$show_id = $json_a_tonight['results'][$i]['id'];
								echo "<div class='element'>";
									echo '<div class="img-container">'; 
										if($json_a_tonight['results'][$i]['poster_path'] == NULL) {
										echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}	
									echo "</div>";
									echo '<div class="content-container">';
										echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a_tonight['results'][$i]['name'] . "</a>";
									echo "</div>";
								echo "</div>";
							}
						?> 
					</ul>
					</div>
					<div class="tonightButton">
					<?php if(count($json_a_tonight['results']) > 9) { ?>
						<input id="tonightMore" type="button" name="answer" value="Show More On Tonight"/>
					<?php } ?>
					</div>
				</div><!-- /one-half -->

				<!-- one-half -->
				<div class="one-half-last">
					<h1>POPULAR SHOWS</h1>
					<div class="popular-container">
						<ul>
						<?php
							for ($i = 0; $i < count($json_a_popular['results']); $i++)
							{
								$show_poster = "https://image.tmdb.org/t/p/w500" . $json_a_popular['results'][$i]['poster_path'];
								$show_id = $json_a_popular['results'][$i]['id'];
								echo "<div class='element'>";
									echo '<div class="img-container">'; 
										if($json_a_popular['results'][$i]['poster_path'] == NULL) {
										echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
										}
										else {
											echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";
										}	
									echo "</div>";
									echo '<div class="content-container">';
										echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a_popular['results'][$i]['name'] . "</a>";
									echo "</div>";
								echo "</div>";
							}
						?> 
					</ul>
					</div>
					<div class="popularButton">
					<?php if(count($json_a_tonight['results']) > 9) { ?>
						<input id="popularMore" type="button" name="answer" value="Show More Popular"/>
					<?php } ?>
					</div>
				</div><!-- /one-half -->

			</div><!-- /home-columns -->

	</div><!-- /site-content -->
	
<?php get_footer();
?>