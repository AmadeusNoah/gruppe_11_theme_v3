<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>


	<button class="alle_knap">Alle</button>



<div class="dropdown_tema">
	<button class="dropbtn">Teamer</button>
	<ul class="dropdown-content">
    	<li class="fn_knap"data-tema="fn">FN</li>
		<li class="oekonomi_knap"data-tema="oekonomi">Økonomi</li>
		<li class="LGBT_knap" data-tema="lgbt">LGBT</li>
	</ul>
</div>

<div class="dropdown_tema">
	<button class="dropbtn">Varighed</button>
	<ul class="dropdown-content">
		<li class="en_dag_knap">1 dag</li>
    	<li class="to_dage_knap">2 dage</li>
		<li class="tre_dage_knap">3 dage</li>
	</ul>
</div>

<div class="dropdown_tema">
	<button class="dropbtn">Klasse</button>
	<ul class="dropdown-content">
    	<li class="grundskolen_knap"data-klasse="grundskolen">Grundskolen</li>
		<li class="efterskole_knap"data-klasse="efterskole">Efterskole</li>
		<li class="uu_knap"data-klasse="ungdomsuddanelser">Ungdomsuddannelser</li>
		<li class="uogl_knap"data-klasse="undervisereogledere">Undervisere og Ledere</li>
		<li class="kom_knap"data-klasse="kommuner">Kommuner</li>
	</ul>
</div>

<section id="kurser-oversigt"></section>
</main><!-- #main -->

<template>
<article>
<img src="" alt="">
<div>
<h3 class="title"></h3>
<p class="kort_beskrivelse"></p>
</div>
<div>
<h4>Information</h4>
<p class="laeringsmaal"></p>
<p class="varighed"></p>
<p class="pris"></p>
</div>
<div class="knapper">
<button class="book">Book </button>
<button class="mere">Læs mere</button>
</div>
</article>
</template>

<script> 
let temp = document.querySelector("template");
const liste = document.querySelector("#kurser-oversigt");
let filter = "alle";

	let alleKurser;
	let filtreredeKurser;
	start();
	document.querySelector(".alle_knap").addEventListener("click",allefunk);
	
	document.querySelector(".fn_knap").addEventListener("click",fnfunk);
	document.querySelector(".oekonomi_knap").addEventListener("click",oekonomifunk );
	document.querySelector(".LGBT_knap").addEventListener("click",lgbtfunk );
	
	document.querySelector(".en_dag_knap").addEventListener("click",endagfunk );
	document.querySelector(".to_dage_knap").addEventListener("click",todagefunk );
	document.querySelector(".tre_dage_knap").addEventListener("click",tredagefunk );
	
	document.querySelector(".grundskolen_knap").addEventListener("click",grundskolefunk );
	document.querySelector(".efterskole_knap").addEventListener("click",efterskolefunk );
	document.querySelector(".uu_knap").addEventListener("click",uufunk );
	document.querySelector(".uogl_knap").addEventListener("click",uoglfunk );
	document.querySelector(".kom_knap").addEventListener("click",komfunk );
 

	function start() {
        const filter_knapper_tema = document.querySelectorAll(".dropdown_tema .dropdown-content"); 
		 getJson();
		
      }

	
	async function getJson() {
	const dbUrl = "https://www.amadeusnoah.dk/kea/semester_2/09_cms/g11_ungdomsbyen/wp-json/wp/v2/kursus";
	const data = await fetch(dbUrl);
	alleKurser = await data.json();
		filtreredeKurser = alleKurser;
		visKurser(alleKurser);
}
	function allefunk(){
alleKurser = alleKurser;
		console.log("alleKurser");
	visKurser(alleKurser) ;
}
	
	
function fnfunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.tema =="FN")
		console.log("HEJ DU GAMLE",alleKurser);
	visKurser(alleKurser) ;
}
	
function oekonomifunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.tema =="Økonomi")
	visKurser(alleKurser) ;
}
	
	function lgbtfunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.tema =="LGBT og Normer")
	visKurser(alleKurser) ;
}
	function endagfunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.varighed =="1 dag")
		console.log("1 dag");
		visKurser(alleKurser) ;
}
	
	function todagefunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.varighed =="2 dage")
		console.log("2 dage");
		visKurser(alleKurser) ;
}
	
	function tredagefunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.varighed =="3 dage")
		console.log("3 dage");
		visKurser(alleKurser) ;
}
	
	function grundskolefunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.klasse =="Grundskolen")
		console.log("HEJ DU UNGE");
		visKurser(alleKurser) ;
}
	
		
	function efterskolefunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.klasse =="Efterskole")
		console.log("HEJ DU UNGE");
		visKurser(alleKurser) ;
}
	
		function uufunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.klasse =="Grundskolen")
		console.log("HEJ DU UNGE");
		visKurser(alleKurser) ;
}
	
			function uoglfunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.klasse =="Undervisere og ledere")
		console.log("HEJ DU UNGE");
		visKurser(alleKurser) ;
}
	
		function komfunk(){

	alleKurser = filtreredeKurser.filter(kursus => kursus.klasse =="Kommuner")
		console.log("HEJ DU UNGE");
		visKurser(alleKurser) ;
}

	
function visKurser(data) { 
	liste.textContent= "";
	console.log(data);
	data.forEach(kursus => {
		console.log(kursus)
		const klon = temp.cloneNode(true).content;
		if (filter == kursus.tema || filter == "alle") {
		klon.querySelector("img").src = kursus.billede.guid;
		klon.querySelector(".title").textContent = kursus.title.rendered;
		klon.querySelector(".kort_beskrivelse").textContent = kursus.kort_beskrivelse;
		klon.querySelector(".laeringsmaal").textContent ="Læringssmål: " + kursus.varighed;
		klon.querySelector(".varighed").textContent ="Varighed: " + kursus.varighed;
		klon.querySelector(".pris").textContent = "Pris: " + kursus.pris + "kr. ";
		klon.querySelector("article").addEventListener("click", () => 
			{location.href = kursus.link;
			});
		liste.appendChild(klon);
		} 
	});
}
			</script> 
	</div><!-- #primary -->

<?php
get_footer();


