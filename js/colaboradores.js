const btnSearchDni_insert = document.getElementById('insert-ipt-colaboradorDni');
btnSearchDni_insert.addEventListener("keydown", function (event) {  	
    if (event.key == "Enter") {
        console.log('Hizo enter');
        fetchData()
    }
});
const fetchData = async () => {
    const body = new FormData();
    const res = await fetch("./../../../controllers/controllerApis.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    console.log(data);
}