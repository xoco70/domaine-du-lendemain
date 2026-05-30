/**
 * Domaine du Lendemain — interactions front (reprises de la maquette).
 *  - Ouverture / fermeture du menu mobile
 *  - Année courante dans le pied de page
 *  - Apparition au défilement (fade-in)
 */
(function () {
	"use strict";

	// --- Menu mobile ---
	var toggle = document.getElementById("mobile-toggle");
	var menu = document.getElementById("mobile-menu");
	if (toggle && menu) {
		toggle.addEventListener("click", function () {
			var hidden = menu.classList.toggle("hidden");
			toggle.setAttribute("aria-expanded", hidden ? "false" : "true");
		});
		menu.querySelectorAll("a").forEach(function (a) {
			a.addEventListener("click", function () {
				menu.classList.add("hidden");
				toggle.setAttribute("aria-expanded", "false");
			});
		});
	}

	// --- Année courante (pied de page maquette, id="year" si présent) ---
	var year = document.getElementById("year");
	if (year) {
		year.textContent = new Date().getFullYear();
	}

	// --- Apparition au défilement ---
	var fadeEls = document.querySelectorAll(".fade-in");
	if ("IntersectionObserver" in window && fadeEls.length) {
		var io = new IntersectionObserver(
			function (entries) {
				entries.forEach(function (e) {
					if (e.isIntersecting) {
						e.target.classList.add("visible");
						io.unobserve(e.target);
					}
				});
			},
			{ threshold: 0.12 }
		);
		fadeEls.forEach(function (el) {
			io.observe(el);
		});
	} else {
		fadeEls.forEach(function (el) {
			el.classList.add("visible");
		});
	}
})();
