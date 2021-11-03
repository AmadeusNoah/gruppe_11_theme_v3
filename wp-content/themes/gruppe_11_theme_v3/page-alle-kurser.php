<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>


<h1 id="overskrift"> Kurser</h1>
<section id="kurser-oversigt"></section>
</main><!-- #main -->

<template>
<article>
<h2></h2>
<img src="" alt="">
<p></p>
</article>
</template>

			<script> 
console.log("Hip Hurra")
let temp = document.querySelector("template");
const liste = document.querySelector("#kurser-oversigt");
let kurser = []; 
// let posts;
const dbUrl = "https://www.amadeusnoah.dk/kea/semester_2/09_cms/g11_ungdomsbyen/wp-json/wp/v2/kursus";
async function getJson() {
	const data = await fetch(dbUrl);
	kurser = await data.json();
	visKurser();
}

function visKurser() {
	console.log(kurser); 
	liste.textContent= "";
	kurser.forEach(kursus => {
		const klon = temp.cloneNode(true).content;
		klon.querySelector("h2").textContent = kursus.title.rendered;
		klon.querySelector("img").src = kursus.billede.guid;
		klon.querySelector("p").innerHTML = kursus.pris + " kr.";
		klon.querySelector("article").addEventListener("click", () => {
			location.href = kursus.link;
		})
		liste.appendChild(klon);
	})
}

getJson();


			</script> 
	</div><!-- #primary -->

<?php
get_footer();

