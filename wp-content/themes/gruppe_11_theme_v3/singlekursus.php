<?php get_header(); ?>
<?php colibriwp_theme()->get( 'single' )->render(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<h1 id="overskrift"> Retter</h1>
<section id="ret-oversigt"></section>
</main><!-- #main -->

<article>
		<img class="pic" src="" alt="">
	<div>
<h2></h2>
<p class="text"></p>
<p class="pris"></p>
</div>
</article>


<script>
let ret; document.addEventListener("DOMContentLoaded", getJson);

async function getJson() {
	console.log("id er", <?php echo get_the_ID() ?>);
	//hent et enkelt ret ud fra ID
	let jsonData = await fetch ('https://www.amadeusnoah.dk/kea/semester_2/09_cms/g11_ungdomsbyen/wp-json/wp/v2/kursus<?php echo get_the_ID() ?>');
	ret = await jsonData.json();
	visKursus();
}
function visKursus() {
	document.querySelector("h2").textContent = kursus.titel;
	document.querySelector(".text").innerHTML = kursus.beskrivelse;
	document.querySelector(".pic").src = kursus.billede.guid;
}

    document
          .querySelector(".luk")
          .addEventListener("click", () => {
  history.back();
		  })
	</script>

		
	</div><!-- #primary -->



<?php get_footer();
