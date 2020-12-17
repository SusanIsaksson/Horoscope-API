window.addEventListener("load", initSite)
document.getElementById("saveBtn").addEventListener("click", setBirthday);
document.getElementById("updateBtn").addEventListener("click", updateZodiac);
document.getElementById("").addEventListener("", viewZodiac);
document.getElementById("deleteBtn").addEventListener("click", deleteZodiac);







async function initSite() {

}

//POST
async function setBirthday() {

}

//GET
async function viewZodiac() {

}

//POST
async function updateZodiac() {

}

//DELETE
async function deleteZodiac() {

}


async function makeRequest(path, method, body) {

    try {
        const response = await fetch (path, {
            method,
            body
        })

    } catch(err) {
        console.log("Fel vid fetch", err)
    }
}