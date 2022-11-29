$("#header-block").hover(function (){
    $(".meme").fadeIn();
}).mouseout(function (){
    $(".meme").fadeOut();
})

let r_toggles = document.getElementsByClassName("r_button");
for(let iter of r_toggles) {
    iter.onclick = () => {
        for(let iter of r_toggles)
            iter.classList.remove("active");
        iter.classList.add("active");
        document.getElementById("buf").setAttribute("value", iter.getAttribute("value"));
    }
}

cd