let btns = document.querySelectorAll('.btn');

for (let btn of btns) {
    btn.addEventListener("mouseover", function () {
        this.querySelector('.btn__arrow').classList.add('animated-arrow');
    });
}



const searchBars = document.querySelectorAll(".search-bar");


function searchBarFunction () {
    for (var searchBar of searchBars) {
        setInterval(function() {
            if(document.activeElement === searchBar.querySelector('input')) {
                searchBar.classList.add('searchbar-dynamic-focus');
            } else {
                searchBar.classList.remove('searchbar-dynamic-focus');
            }
            if(searchBar.querySelector('input').value === '') {
                searchBar.classList.remove('search-bar-cross-visible');
                searchBar.classList.add('search-bar-cross-not-visible');
            } else {
                searchBar.classList.remove('search-bar-cross-not-visible');
                searchBar.classList.add('search-bar-cross-visible');
            }
        }, 100);
        searchBar.querySelector('.btn-search-bar').addEventListener("click", function(){
            // alert(searchBar.querySelector('.search-bar__input').value);
            searchBar.querySelector('.search-bar__input').value = "";
        });
    }
};
searchBarFunction ();



setInterval(function() {
    const resultSearchBarCard = document.getElementById('searchbar-card-item').value;
    if (stringControlSearchBar != resultSearchBarCard) {
        if (resultSearchBarCard == "") {

        } else {
        }
    }
    stringControlSearchBar = resultSearchBarCard;
}, 1000);

var page = 1;
const itemspage1 = document.querySelectorAll('.page1');
const itemspage2 = document.querySelectorAll('.page2');

setInterval(function() {
    if (page == 1) {
        for (var item of itemspage2) {
            item.classList.add('d-none');
        }
        for (var item of itemspage1) {
            item.classList.remove('d-none');
        }
    } else if (page == 2) {
        for (var item of itemspage1) {
            item.classList.add('d-none');
            
        }
        for (var item of itemspage2) {
            item.classList.remove('d-none');
        }
    }
}, 1000);



let burgerMenuNav = document.getElementById('burger-menu-nav');
let burgerMenuControl = 0;

burgerMenuNav.addEventListener("click", function(){
    if (burgerMenuControl == 0) {
        document.getElementById('nav2').classList.remove('default-close');
        document.getElementById('nav2').classList.remove('nav-close');
        document.getElementById('nav2').classList.add('nav-open');
        

        burgerMenuControl = 1;
    } else {
        document.getElementById('nav2').classList.remove('nav-open');
        document.getElementById('nav2').classList.add('nav-close');
        

        burgerMenuControl = 0;
    }

})