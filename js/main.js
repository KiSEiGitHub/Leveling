const allbtn = document.querySelectorAll('#OuiMonsieur');

allbtn.forEach(MyButton => {
    MyButton.addEventListener('click', () => {
        if (MyButton.style.backgroundColor === '') {
            MyButton.style.backgroundColor = 'red'
        } else {
            MyButton.style.backgroundColor = ''
        }

    })
})


