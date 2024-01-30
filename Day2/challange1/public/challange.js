const profileForm = document.getElementById("profile-form");
const profileSection = document.getElementById("profile-section");

function submitForm() {
    let data = {};
    for (let i = 0; i < profileForm.length - 1; i++) {
        let id = "data-" + profileForm.elements[i].id;
        data[id] = profileForm.elements[i].value == "" ? "-" : profileForm.elements[i].value;
        
        document.getElementById(id).textContent = data[id];
    }
    profileForm.reset();
}