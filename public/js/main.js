'use strict';

{
    function insertToHtml(list) {
        list.forEach(elm => {
            var insertHTML = "<tr class=\"target\">"
                            + "<td class=\"border px-4 py-2\">" + elm['family_name'] + " " + elm['first_name'] + "</td>"
                            + "<td class=\"border px-4 py-2 text-center\">" + elm['gender'] + "</td>"
                            + "<td class=\"border px-4 py-2 text-center\">" + elm['age'] + "</td>"
                            + "<td class=\"border px-4 py-2 text-center\">" + elm['birthplace'] + "</td>"
                            + "<td class=\"border px-4 py-2 text-center\">" + elm['residence'] + "</td>"
                            + "<td class=\"border px-4 py-2 text-center\">" + elm['height'] + "</td>"
                            + "<td class=\"border px-4 py-2 text-center\">" + elm['edu_back'] + "</td>"
                            + "<td class=\"border px-4 py-2 text-center\">" + elm['annual_income'] + "</td>"
                            + "</tr>"
            var profile = document.querySelector('tbody');
            profile.insertAdjacentHTML('afterbegin', insertHTML);
        })
    }

    function sort() {
        var actives = [];
        const activate = document.querySelectorAll('.activate');
        activate.forEach(active => {
            actives.push(active.name)
        })

        var order = 'NULL';
        if (document.querySelector('.asc')) {
            order = 'asc';
        } else if (document.querySelector('.desc')) {
            order = 'desc';
        }

        const postData = new FormData;
        postData.set('active', JSON.stringify(actives));
        postData.set('order', order);

        fetch('/profile/sort', {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
            body: postData
        })
            .then(response => response.json())
            .then(res => {
                console.log(res);
                deleteTarget();
                insertToHtml(res);
                get_background_color();
            })

            .catch(error => {
                console.log(error);
            })
    }

    function deleteTarget() {

        var doms = document.getElementsByClassName('target');
                while (doms.length) {
                    doms[0].remove();
                }

    }

    function get_background_color() {

        var items = document.querySelectorAll('.target');
        items.forEach((item, index) => {
            if (index % 2 == 0) {
                item.classList.add('bg-gray-100');
            }
        })

    }

    function showAll() {
        fetch('/profile/show_all', {

        })
            .then(response => response.json())
            .then(res => {
                insertToHtml(res);
                get_background_color();

                console.log('通信成功');
                console.log(res);
            })

            .catch(error => {
                console.log(error);
            })
    }

    function change_active(id) {

        id.classList.remove('deactivate');
        id.classList.add('activate');

    }

    function check_active(id) {

        if (id.classList.contains('activate')) {

            id.classList.remove('activate');
            id.classList.add('deactivate');

        }
    }

    function change_order(id) {
        if (id.classList.contains('asc')) {

            id.classList.remove('acs');
            id.classList.add('desc');

        } else if (id.classList.contains('desc')) {

            id.classList.remove('desc');
            id.classList.add('asc');

        } else {

            id.classList.add('asc');

        }
    }

    showAll();

    male_show.addEventListener('click', () => {

        console.log('イベント発火');

        change_active(male_show);
        check_active(female_show);

        sort();

    })

    female_show.addEventListener('click', () => {

        console.log('イベント発火');

        change_active(female_show);
        check_active(male_show);

        sort();

    })


    age_sort.addEventListener('click', () => {

        console.log('イベント発火');

        change_active(age_sort);

        check_active(height_sort);
        check_active(income_sort);

        change_order(age_sort);
        sort();

    })

    height_sort.addEventListener('click', () => {

        console.log('イベント発火');

        change_active(height_sort);

        check_active(age_sort);
        check_active(income_sort);

        change_order(height_sort);
        sort();

    })

    income_sort.addEventListener('click', () => {

        console.log('イベント発火');

        change_active(income_sort);

        check_active(age_sort);
        check_active(height_sort);

        change_order(income_sort);
        sort();

    })
}
