function checkUsername() {
    var elMsg = document.getElementById('feedback');
    if (this.value.length < 5) {
        elMsg.textContent = 'Username must be 5 characters of more';
    } else {
        elMsg.textContent = '';
    }

    //the sanme with check password
    var elUsername = document.getElementById('feedback'); //get username input
    //when it loses focus call checkUsername()
    elUsername.addEventListener('blur', checkUsername, false);
}