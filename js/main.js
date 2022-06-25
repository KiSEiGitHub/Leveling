import {Swiper} from "swiper";

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
const btnpref = document.querySelector('#btn_pref');

btnpref.addEventListener('click', () => {
    location.reload();
})

