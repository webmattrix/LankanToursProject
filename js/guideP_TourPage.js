const dropSelector = document.querySelectorAll('.dropSelect');

dropSelector.forEach(dropSelect=>{

    const Select = dropSelect.querySelector('.selectArea');
    const Sletch = dropSelect.querySelector('.sletch');
    const SelectMenu = dropSelect.querySelector('.selectMenu');
    const SelectedItems = dropSelect.querySelector('.selectMenu li');
    const AreaSelected = dropSelect.querySelector('.selectCon');

    Select.addEventListener('click', ()=>{
        Select.classList.toggle('selectArea-clicked');
        Sletch.classList.toggle('sletch-rotate');
        SelectMenu.classList.toggle('selectMenu-open');
    });

    SelectedItems.forEach(option=>{
        option.addEventListener('click',()=>{
            AreaSelected.innerText = option.innerText;
        })
    })
})