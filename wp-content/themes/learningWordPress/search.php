<!-- <h1>Hello world</h1> -->
<?php

$query = rawurlencode($_GET["s"]);

// Show details 
$json_url = file_get_contents("https://api.themoviedb.org/3/search/tv?api_key=4d7db88e6e8c175e817c6df85dc40313&language=en-US&query=" . $query . "&page=1");
$json_a = json_decode($json_url, true);

// People
$json_url_people = file_get_contents("https://api.themoviedb.org/3/search/person?include_adult=false&page=1&query=" . $query . "&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_people = json_decode($json_url_people, true);

// TV tonight
$json_url_tonight = file_get_contents("https://api.themoviedb.org/3/tv/airing_today?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_tonight = json_decode($json_url_tonight, true);

// POPULAR
$json_url_popular = file_get_contents("https://api.themoviedb.org/3/tv/popular?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_popular = json_decode($json_url_popular, true);

get_header(); ?>
	<!-- Site Content -->
	<div class="site-content clearfix">
		<div class="search-results">
			<h2>Search results for: <?php the_search_query(); ?></h2>

			<?php
			while (have_posts()) : the_post(); 

			get_template_part('content', get_post_format());
			
			endwhile;?>
			<?php if($json_a['total_results'] > 0) { ?>
				<div class="show_results">
				<h2>Shows:</h2>
				<ul>
					<?php
						for ($i = 0; $i < count($json_a['results']); $i++)
						{
							$show_poster = "https://image.tmdb.org/t/p/w500" . $json_a['results'][$i]['poster_path'];
							$show_id = $json_a['results'][$i]['id'];
							echo "<div class='element'>";
								echo '<div class="img-container">'; 
								if($json_a['results'][$i]['poster_path'] == NULL) {
										echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPhoto.jpg'/></a>";
								}
								else {
									echo "<a href='/tv-show?show_id=" . $show_id . "'><img src='" . $show_poster . "'/></a>";	
								}
								echo "</div>";
								echo '<div class="content-container">';
									echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a['results'][$i]['original_name'] . "</a>";
								echo "</div>";
							echo "</div>";
						}
					?> 
				</ul>
				</div>
			<?php } ?>
			<?php if($json_a_people['total_results'] > 0) { ?>
				<div class="show_results">
				<h2>People:</h2>
				<ul>
					<?php
						for ($i = 0; $i < count($json_a_people['results']); $i++)
						{
							$cast_poster = "https://image.tmdb.org/t/p/w500" . $json_a_people['results'][$i]['profile_path'];
							$cast_id = $json_a_people['results'][$i]['id'];
							echo "<div class='element'>";
								echo '<div class="img-container">';
									if($json_a_people['results'][$i]['profile_path'] == NULL) {
										echo "<a href='/cast?cast_id=" . $cast_id . "'><img src='" .  get_template_directory_uri() . "/photos/noPerson.jpg'/></a>";
									}
									else {
										echo "<a href='/cast?cast_id=" . $cast_id . "'><img src='" . $cast_poster . "'/></a>";
									}
								echo '</div>';
								echo '<div class="content-container">';
									echo "<a href='/cast?cast_id=" . $cast_id . "'>" .$json_a_people['results'][$i]['name'] . "</a>";
								echo "</div>";
							echo "</div>";
						}
					?> 
				</ul>
				</div>
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

<?php get_footer(); ?>
