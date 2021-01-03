window.addEventListener("load", initSite)
document.getElementById("saveBtn").addEventListener("click", setBirthday);
document.getElementById("updateBtn").addEventListener("click", updateZodiac);
document.getElementById("deleteBtn").addEventListener("click", deleteZodiac); 

//const birthdayToSave = document.getElementById("birthdayInput")


async function initSite() {}

//POST
async function setBirthday() {

    // const inputBirthday = document.getElementById("birthdayInput").value
    birthdayToSave = document.getElementById("birthdayInput").value

    //tillägg enligt nedan för att spara månad och datum
    birthdayToSave = Array.from(birthdayToSave)
    const month = birthdayToSave.slice(5, 7)
    const day = birthdayToSave.slice(8, 10)
    month = parseInt(month.join(''))
    day = parseInt(day.join(''))

    //ändrade från (!inputBirthday.length)
    if(!birthdayInput.length) {
        console.log("Du måste fylla i ett födelsedatum...")
        return 
    }

    const body = new FormData()
    //body.set("birthDate", inputBirthday) ändrad lika nedan
    body.set("month", month)
    body.set("day", day)

    //const responseStatus = await makeRequest("/server/addhoroscope.php", "POST", body)
    const collectedBirthday = await makeRequest("/server/addhoroscope.php", "POST", body)
    console.log(collectedBirthday)

    //tillägg
    if(collectedBirthday) {
        viewRequest()
    }

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