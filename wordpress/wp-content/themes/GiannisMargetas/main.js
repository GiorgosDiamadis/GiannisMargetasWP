var btn = document.querySelector(".btn-search");
var submitBtn = document.querySelector('button[type="submit"]')
var inputSearch = document.querySelector('.input-search');
var searchHeader = document.querySelector(".search-header");
var shareBtn = document.querySelector(".social-toggle");
console.log(shareBtn)
var isOpen = false;

const socialToggle = () => {
    if (shareBtn) {
        shareBtn.addEventListener("click", (e) => {
            if (!isOpen) {
                var allClosed = document.querySelectorAll(".social-icon");
                console.log(allClosed)

                allClosed.forEach((p) => {
                    p.classList.add("open");
                    isOpen = true;
                });
            } else {
                var allOpen = document.querySelectorAll(".social-icon");

                allOpen.forEach((p) => {
                    p.classList.remove("open");
                    isOpen = false;
                });
            }
        });
    }
}
const toPDF = () => {
    var imgs = document.getElementsByTagName('img');
    for (var i = 0; i < imgs.length; i++) {
        var src = imgs[i].getAttribute("src");//.split("../../")[1]
        imgs[i].setAttribute("src", "http://localhost:5000/" + src)

    }


    var t = document.querySelector("#toPDF").cloneNode(true)
    t.setAttribute("id", "");
    var content = t.firstElementChild.children;
    for (i = 0; i < content.length; i++) {
        content[i].style.fontFamily = "roboto";
        if (content[i].firstElementChild) {

            content[i].firstElementChild.style.fontFamily = "roboto";
        }
    }


    var val = htmlToPdfmake(t.innerHTML, {tableAutoSize: true, imagesByReference: true});
    t = null;
    var dd = {content: val.content, images: val.images};
    pdfMake.createPdf(dd).download(`${window.location.pathname.split("post/")[1]}.pdf`);
}


function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("carousel-img");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(() => {
        slideIndex++
        showSlides(slideIndex)
    }, 5000)
}

if (window.location.pathname !== "/") {
    const a = document.querySelectorAll(".navbar .nav-menu .nav-item a")
    const navbar = document.querySelector(".navbar");
    navbar.style.backgroundColor = "black";
} else {
    var slideIndex = 1;
    showSlides(slideIndex);
}


const contactForm = () => {
    const form = document.querySelector("form");
    const btn = document.querySelector("button[type='submit']")
    if (form && btn) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const name = document.getElementById("name").value;
            const mail = document.getElementById("mail").value;
            const body = document.getElementById("body").value;
            var route = 'http://localhost/wp-json/margetas/v1/sendMessage';

            btn.innerHTML = "Μια στιγμή..."
            $.post(route,
                {
                    data: {name, mail, body}
                }).done(function (data) {
                btn.innerHTML = "Το μύνημα στάλθηκε!"
            })
        });
    }
}

contactForm();
socialToggle();

const hamburger = document.querySelector(".hamburger")
hamburger.addEventListener("click", () => {
    const navMenu = document.querySelector(".nav-menu");
    navMenu.classList.toggle("flex");
})

$(document).ready(function () {
    // Images loaded is zero because we're going to process a new set of images.
    var imagesLoaded = 0;
    // Total images is still the total number of <img> elements on the page.
    var totalImages = $("img").length;

    // Step through each image in the DOM, clone it, attach an onload event
    // listener, then set its source to the source of the original image. When
    // that new image has loaded, fire the imageLoaded() callback.
    $("img").each(function (idx, img) {
        $("<img>").on("load", imageLoaded).attr("src", $(img).attr("src"));
    });
	
	if(totalImages === 0){
			allImagesLoaded();
	}

    // Do exactly as we had before -- increment the loaded count and if all are
    // loaded, call the allImagesLoaded() function.
    function imageLoaded() {
        imagesLoaded++;
		
        if (imagesLoaded == totalImages) {
            allImagesLoaded();
        }
    }

    function allImagesLoaded() {
        console.log("ALL IMAGES LOADED");
        var container = document.querySelector("#gridd")

        if (container) {
            var masnryConfig = {}

            if (window.screen.width > 1000) {
                masnryConfig = {
                    itemSelector: ".grid-item",
                    // percentPosition:true,
                    columnWidth: 400,
                    isFitWidth: true,
                    gutter: 60
                }
            } else if (window.screen.width > 534 && window.screen.width < 1000) {
                masnryConfig = {
                    itemSelector: ".grid-item",

                    columnWidth: 400,
                    isFitWidth: true,
                    gutter: 10
                }
            } else {
                masnryConfig = {
                    itemSelector: ".grid-item",
                    columnWidth: 300,
                    isFitWidth: true,
                    gutter: 10
                }
            }


            var msnry = new Masonry(container, masnryConfig)


        }
    }
});
