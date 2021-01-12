window.addEventListener("load", initSite)
document.getElementById("saveBtn").addEventListener("click", saveZodiac);
document.getElementById("updateBtn").addEventListener("click", updateZodiac);
document.getElementById("deleteBtn").addEventListener("click", deleteZodiac); 

async function initSite() {
    getZodiac()
}

//POST
async function saveZodiac() {

    let monthInput
    let dayInput

    const input = document.getElementById("dateInput").value;
    const d = new Date(input);
    if (!!d.valueOf()) {
        monthInput = d.getMonth() + 1;
        dayInput = d.getDate();
    }
   
    if(!input.length) {
        console.log("Du måste fylla i ett födelsedatum")
        return
    }

    const body = new FormData()
    body.set("month", monthInput)
    body.set("day", dayInput)

    console.log(input)

    const collectedZodiac = await makeRequest("./server/addhoroscope.php", "POST", body)
    console.log(collectedZodiac)
    getZodiac()
    

}

//GET
async function getZodiac() {

    const zodiacInput = document.getElementById("yourZodiac")
    const collectedZodiac = await makeRequest("./server/viewhoroscope.php", "GET")
    
    console.log(collectedZodiac)

    //zodiacInput.innerText = collectedZodiac
}    

//POST
async function updateZodiac () {

    let monthInput
    let dayInput

    const input = document.getElementById("dateInput").value;
    const d = new Date(input);
    if (!!d.valueOf()) {
        monthInput = d.getMonth() + 1;
        dayInput = d.getDate();
    }
    if(!monthInput || !dayInput) {
        console.log("Skriv in din födelsedag")
        return
    }

    const body = new FormData()
    body.set("month", monthInput)
    body.set("day", dayInput)
    
    const collectedZodiac = await makeRequest("./server/addhoroscope.php", "POST", body)
    console.log(collectedZodiac)
    getZodiac()
}

//DELETE
async function deleteZodiac() {

    const deleteRequest = await makeRequest("./server/deletehoroscope.php", "DELETE")  
   
    if (deleteRequest) {

        document.getElementById("saveBtn").disabled = false
    }
    console.log(deleteRequest)
    getZodiac()
    
}


async function makeRequest(path, method, body) {
    try {
        const response = await fetch(path, {
            method,
            body
        })
        console.log(response)
        return response.json()

    } catch(err) {
        //return err;
        console.log("Fel vid fetch", err)
    }
}