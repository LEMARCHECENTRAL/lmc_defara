document.getElementById('generateButton').addEventListener('click', function(){

    const randomNumber = Math.floor(Math.random() * 10000000000) + 1;
    document.getElementById('number').value = randomNumber + "LAB";
});

