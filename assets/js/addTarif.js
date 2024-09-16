const tarif_list = document.getElementById('tarif-list');
const tarif_input = document.getElementById('tarif-input');
const btn = document.getElementById('tarif-btn');
const day = document.getElementById('day');
const price = document.getElementById('price-day');

function addToList(day,price) {
    tarif_list.innerHTML += `<li class="list-group-item">${day} - ${price}</li>`;
}

btn.addEventListener("click", ()=>
    {
        if(day.value != '' && price.value != '') {
            tarif_input.value += `"${day.value}":${price.value},`;
            addToList(day.value,price.value);
        }
    }
);

