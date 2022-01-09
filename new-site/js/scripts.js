$(".dropdown-button").each(function () {
	let target = $(this).data("target");
	let dropdown = "#" + target;
	let dropdownState = false;

	function dropdownVisibility() {
		if (dropdownState === false) {
			$(dropdown).slideDown("fast");
			dropdownState = true;
		} else {
			$(dropdown).slideUp("fast");
			dropdownState = false;
		}
	}

	function hideDropdownOnClick() {
		if (dropdownState == true) {
			$(document).mouseup(function (e) {
				if (!$(dropdown).is(e.target) && $(dropdown).has(e.target).length === 0) {
					$(dropdown).slideUp("fast");
				}
			});
		}
	}

	$(document).on("click", '[data-target="' + target + '"]', function () {
		dropdownVisibility();
		hideDropdownOnClick();
	});
});


$(document).ready(function () {
    $('a').each((i, el) => {
        let path = $(el).prop('href');
        if(path == location.href && location.href !== 'https://evacme.com.ua/') {
            $(el).removeAttr('href');
        }
    })
	const mobileNav = $("#mobile-nav-397");
	const body = $("#body");
	$("#mobile-nav-397-open").click(function () {
		mobileNav.show();
		$(body).css("overflow", "hidden");
	});
	$("#mobile-nav-397-close").click(function () {
		mobileNav.hide();
		$(body).css("overflow", "auto");
	});
});

// Многоуровневое меню - планшет и больше
$(document).ready(function () {
	function linkHover(link, menu) {
		$(link).hover(
			function () {
				$(this).siblings(menu).show();
			},
			function () {
				$(this).siblings(menu).hide();
			}
		);
	}
	linkHover(".level-1-link", ".level-1-menu");
	linkHover(".level-2-link", ".level-2-menu");
	linkHover(".level-3-link", ".level-3-menu");

	function menuHover(link, menu) {
		$(menu).hover(
			function () {
				$(this).show();
				$(this).siblings(link).addClass("menu-link-hovered");
			},
			function () {
				$(this).hide();
				$(this).siblings(link).removeClass("menu-link-hovered");
			}
		);
	}
	menuHover(".level-1-link", ".level-1-menu");
	menuHover(".level-2-link", ".level-2-menu");
	menuHover(".level-3-link", ".level-3-menu");
});

$(document).ready(function () {
	$(".mobMenuFirst button").click(function () {
		let id = $(this).data('id');

		$.post('new-site/assets/menu/connector.php', {'action': 'menu/get','context': 'mobile', 'id': id, 'lang': $('html').prop('lang')}, (response) => {
			response = JSON.parse(response);
			if(response.success) {
				$('.mobMenuSecond a').each((i, el) => {if(i > 0) $(el).remove()})
				$('.mobMenuSecond p')
				.text($(this).parent().find('a').text())
				.after(response.message);
				$(this).parent().parent().hide();
				$('.mobMenuSecond').show();
			}
		})
		
	});

	$(".mobMenuSecond button").click(function () {
		$(this).parent().parent().hide();
		$(".mobMenuThird").show();
	});

	$(".mobMenuThird button").click(function () {
		$(this).parent().parent().hide();
		$(".mobMenuFour").show();
	});

	$(".button-back").click(function () {
		$(this).parent().hide();
		$(this).parent().prev().show();
	});

	$("#mobile-nav-398-close").click(function () {
		$(this).parent().parent().hide();
	});
});

$(document).ready(function () {
	$("#allSectionButton").click(function () {
		$("#allSections").show();
	});
});

// Показать/скрыть пароль
$(document).ready(function () {
	$(".password-control").click(function () {
		var passwordInput = $(this).prev();
		if (passwordInput.attr("type") == "password") {
			$(this).addClass("password-control--active");
			passwordInput.attr("type", "text");
		} else {
			$(this).removeClass("password-control--active");
			passwordInput.attr("type", "password");
		}
		return false;
	});
});

$(".menu li a[data-menu-open]").hover(
	function () {
		$(this).parents('div').next().show();
	},
	function () {}
);

$(".menu-level-first").hover(function () {
	$(".menu-level-third").hide();
});

$(".menu-level-second").click(function (e) {
	if (e.target == $(this).children().children().find("a")) {
	} else {
		$(".menu-level-third").hide();
	}
});

$('.menu-level-second li').hover(function() {
	let id = $(this).data('id');
	$.post('new-site/assets/menu/connector.php', {'action': 'menu/get','context': 'desktop', 'id': id, 'lang': $('html').prop('lang')}, (response) => {
		response = JSON.parse(response);
		if(response.success) {
			$('.menu-level-third li').remove();
			$('.menu-level-third ul')
			.append(response.message);
		}
	})
}, () => {})

$(".menu-level-first").click(function (e) {
	if (e.target == $(this).children().children().find("a")) {
	} else {
		$(".menu-level-second").hide();
	}
});
$(document).ready(function () {
	$(".messageToAuthorBtn").click(function () {
		$("#messageToAuthor").show();
	});
	$("#messageToAuthor")
	.find(".button--close")
	.click(function () {
		$(this).parent().parent().hide();
	});

	let buttonShowTel = $(".showTel");
	let authorTel = buttonShowTel.data('tel');

	let buttonAfterClick = `<a href="tel:${authorTel}" class="bg-second hover:bg-secondDarken flex items-center justify-center flex-shrink-0 p-2 text-sm text-white transition rounded">${authorTel}</a>`;

	buttonShowTel.one("click", function () {
		$(this).parent().append(buttonAfterClick);
		$(this).remove();
	});
	
	$(".default-select2").select2({
		multiple: false,
		minimumResultsForSearch: Infinity,
	});
});
// // Селекты в фильтрах
// $(document).ready(function () {
// 	// Показать селекты
// 	$("#showFilter").click(function () {
// 		$(".filters").slideToggle();
// 		$(this).find(".show-filter-arrow").toggleClass("-rotate-90");
// 		$(this).find("span").toggleClass("text-accent");
// 	});
// 	// Инициализировать селекты
// 	$(".filters .select").select2({
// 		multiple: false,
// 		minimumResultsForSearch: Infinity,
// 	});
// });

// $(document).ready(function () {
// 	let popup = document.getElementById("popup");
// 	let popupCloseButton = popup.querySelector(".button--close");

// 	function showPopup() {
// 		popup.classList.remove("hidden");
// 	}
// 	function hidePopup() {
// 		popup.classList.add("hidden");
// 	}
// 	function removeImg() {
// 		$(".popup__img").remove();
// 	}

// 	popup.addEventListener("click", (e) => {
// 		if (e.target === popup) {
// 			hidePopup();
// 			removeImg();
// 		}
// 	});

// 	popupCloseButton.addEventListener("click", () => {
// 		hidePopup();
// 		removeImg();
// 	});

// 	document.addEventListener("keydown", (e) => {
// 		if (e.code === "Escape" && popup.classList.contains("flex")) {
// 			hidePopup();
// 			removeImg();
// 		}
// 	});

// 	if ($(window).width() > 768) {
// 		$("#evacuatorLink").click(function (e) {
// 			e.preventDefault();
// 			let src = $(this).attr("href");
// 			let newImg = $("<img role='presentation' alt='' class='popup__img' src='" + src + "'>");
// 			$(".popup__inner").prepend(newImg);
// 			newImg.fadeIn(1000);
// 			showPopup();
// 		});
// 	} else {
// 		$("#evacuatorLink").click(function (e) {
// 			e.preventDefault();
// 		});
// 	}
// });

// $(document).ready(function () {
// 	let complainPopup = document.getElementById("complainPopup");
// 	let openComplainPopup = document.getElementById("complainButton");
// 	let closeComplainPopup = complainPopup.querySelector(".button--close");
// 	let body = $("#body");
// 	openComplainPopup.addEventListener("click", function () {
// 		complainPopup.classList.remove("hidden");
// 		body.css("overflow-y", "hidden");
// 	});

// 	closeComplainPopup.addEventListener("click", function () {
// 		complainPopup.classList.add("hidden");
// 		body.css("overflow-y", "auto");
// 	});
// });
