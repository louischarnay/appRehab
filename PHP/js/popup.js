let modals = document.getElementsByClassName("modal");
let bts = document.getElementsByClassName("btModal");
let btsClose = document.getElementsByClassName("btClose");
console.log(modals.length)
console.log(bts.length)
console.log(btsClose.length)
for (let cpt = 0; cpt < bts.length; cpt++){
    bts[cpt].addEventListener('click', function(){
        modals[cpt].style.display = "block"
    })
}

for (let cpt = 0; cpt < btsClose.length; cpt++){
    btsClose[cpt].addEventListener('click', function(){
        modals[cpt].style.display = "none"
    })
}