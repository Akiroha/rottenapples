<!-- <h1>Hello world</h1> -->
<?php

$page_num = $_GET["page_num"];
if (empty($page_num)) {
	$page_num = 1;
}

$date = "";
$showtext = "";
$networktext = "";
$airtimes = array();
$networks = array();
$networks2 = array();
$networkshows = array();
$times = array();
$endtimes = array();
$shows = array();
$networkcount = 0;
$show_id = "";

// Top Rated
$json_url = file_get_contents("https://api.themoviedb.org/3/tv/top_rated?page=" . $page_num . "&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a = json_decode($json_url, true);
						
// TV tonight
$json_url_tonight = file_get_contents("https://api.themoviedb.org/3/tv/airing_today?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_tonight = json_decode($json_url_tonight, true);

// POPULAR
$json_url_popular = file_get_contents("https://api.themoviedb.org/3/tv/popular?page=1&language=en-US&api_key=4d7db88e6e8c175e817c6df85dc40313");
$json_a_popular = json_decode($json_url_popular, true);

get_header(); ?>
	<!-- site-content -->
	<div class="site-content clearfix">

		<!-- show-column -->
		<div class="show-column">
			<h2>Top Rated Shows</h2>
			<div class="page-count" style="width: 15%; margin:0 auto;">
				<h3>Page <?php echo $page_num; ?></h3>
			</div>
			<div class="show-navigation">
				<div class="previous-button">
				<?php if($page_num != 1) { ?>
					<a href="/toprated-shows?page_num=1">First Page</a>
				<?php } ?>
				<?php if($page_num > 1) { ?>
					<a href="/toprated-shows?page_num=<?php echo $page_num - 1; ?>">Previous</a>
				<?php } ?>
				</div>
				
				<div class="next-button">
				<?php if($page_num < $json_a['total_pages']) { ?>
					<a href="/toprated-shows?page_num=<?php echo $page_num + 1; ?>">Next</a>
				<?php } ?>
				<?php if($page_num != $json_a['total_pages']) { ?>
					<a href="/toprated-shows?page_num=<?php echo $json_a['total_pages']; ?>">Last Page</a>
				<?php } ?>
				</div>
			</div>
				<div class="show-column-page">
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
									echo "<a href='/tv-show?show_id=" . $show_id . "'>" .$json_a['results'][$i]['name'] . "</a>";
								echo "</div>";
							echo "</div>";
						}
					?> 
				</ul>
			</div>
		<div class="show-navigation">
			<div class="previous-button">
				<?php if($page_num != 1) { ?>
					<a href="/toprated-shows?page_num=1">First Page</a>
				<?php } ?>
				<?php if($page_num > 1) { ?>
					<a href="/toprated-shows?page_num=<?php echo $page_num - 1; ?>">Previous</a>
				<?php } ?>
			</div>
			
			<div class="next-button">
				<?php if($page_num < $json_a['total_pages']) { ?>
					<a href="/toprated-shows?page_num=<?php echo $page_num + 1; ?>">Next</a>
				<?php } ?>
				<?php if($page_num != $json_a['total_pages']) { ?>
					<a href="/toprated-shows?page_num=<?php echo $json_a['total_pages']; ?>">Last Page</a>
				<?php } ?>
			</div>
		</div>
		</div><!-- /show-column -->
		
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

	</div><!-- /site-content -->

<?php get_footer();
?>