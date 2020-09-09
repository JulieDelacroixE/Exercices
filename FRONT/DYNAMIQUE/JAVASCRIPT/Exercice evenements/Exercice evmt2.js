function getRandom(){
    result = Math.floor(Math.random()*100);
    return result;
}
    let nb = getRandom();
    console.log(nb);

function verif(nb){
    let t = document.getElementById("textBox1");
    let u = parseInt(t.value);
        if (u == nb) {
            document.getElementById("label1").innerText = "Vous avez gagné !";
        }
        if (u > nb){
            document.getElementById("label1").innerText = "Plus petit !";
        }
        else if (u < nb) {
            document.getElementById("label1").innerText = "Plus grand !";
        }
}
