'use strict';

{

    create_person.addEventListener('click', () => {
        create_mask.classList.remove('hidden');
        create_menu.classList.remove('hidden');
    })

    create_quit.addEventListener('click', () => {
        if (confirm('内容は削除されますがよろしいですか？')) {
            create_mask.classList.add('hidden');
            create_menu.classList.add('hidden');
        }
    })

    create_mask.addEventListener('click', () => {
        create_quit.click();
    })

}