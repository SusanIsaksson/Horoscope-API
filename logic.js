window.addEventListener("load", initSite)
document.getElementById("saveBtn").addEventListener("click", setBirthday);
document.getElementById("updateBtn").addEventListener("click", updateZodiac);
document.getElementById("deleteBtn").addEventListener("click", deleteZodiac); 


async function initSite() {}

//POST
async function setBirthday() {

    const inputBirthday = document.getElementById("birthdayInput").value
    
    if(!inputBirthday.length) {
        console.log("Du måste fylla i ett födelsedatum...")
        return 
    }

    const body = new FormData()
    //body.set("birthDate", inputBirthday)

    const responseStatus = await makeRequest("/server/addhoroscope.php", "POST", body)
    console.log(responseStatus)

}

//GET
async function getZodiac() {
    let viewContainer = document.getElementById("yourZodiac")

    let collectedBirthday = await makeRequest("/server/viewhoroscope.php", "GET", undefined)

    console.log(collectedBirthday)

    if(!collectedBirthday) {
        viewContainer.innerText = "Ingen födelsedatum är sparat..."
        return 
    }

    viewContainer.innerText = collectedBirthday
}

//POST
async function updateZodiac() {

    console.log("TEST AV UPDATE")

}

//DELETE
async function deleteZodiac() {

    console.log("TEST AV DELETE")

}


async function makeRequest(path, method, body) {

    try {
        const response = await fetch(path, {
            method:method,
            body
        })
        //console.log(response)

        if(response.status !=200) {
            throw new Error(response.statusText, response.status)
        }
        return await response.json()

    } catch(err) {
        console.log("Fel vid fetch", err)
    }
}