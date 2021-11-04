<?php get_header(); ?>
<?php colibriwp_theme()->get( 'content' )->render(); ?>


<h1 id="overskrift"> Kurser</h1>

 <h2>Menu</h2>
      <nav>
        <button data-kategori="alle" class="alle">Alle</button>
        <button data-kategori="tema">Tema</button>
        <button data-kategori="Klassetrin">Klassetrin</button>
        <button data-kategori="Varighed">Varighed</button>
        <button data-kategori="type">Type</button>
      </nav>


<section id="kurser-oversigt"></section>
</main><!-- #main -->

<template>
<article>
<img src="" alt="">
<h2></h2>
<button> Læs mere</button>
</article>
</template>

			<script> 
console.log("Hip Hurra")
let temp = document.querySelector("template");
const liste = document.querySelector("#kurser-oversigt");
let kurser = []; 
 let filter = "alle";

 function start() {
        const filterKnapper = document.querySelectorAll("nav button");
        filterKnapper.forEach((knap) =>
          knap.addEventListener("click", filtrerKurser)
        );
       getJson();
      }

	   function filtrerKurser() {
        filter = this.dataset.kategori;
        document.querySelector(".valgt").classList.remove("valgt");
        this.classList.add("valgt");
        visKurser(); //kald funktionen visKurser efter det nye filter er sat
        //header.textContent = this.textContent; //Når der klikkes på en knap, sørger for eventhandeler-funktionen for, at h1 overskriftens indhold opdateres (this henviser til button der er klikket på)
      }


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

		if (filter == kursus.kategori || filter == "alle") {
		const klon = temp.cloneNode(true).content;
		klon.querySelector("img").src = kursus.billede.guid;
				klon.querySelector("h2").textContent = kursus.title.rendered;
		klon.querySelector("article").addEventListener("click", () => {
			location.href = kursus.link;
		});
		liste.appendChild(klon);
		}
	});
}

			</script> 
	</div><!-- #primary -->

<?php
get_footer();

