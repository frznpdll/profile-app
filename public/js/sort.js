'use strict';

{

    // データベースから取得したデータをhtmlに返して表示させる
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

    // 非同期処理の内容
    // 並べ替えを行う項目とその順番のデータを受け取り，fetchでサーバーに接続する
    // JSON形式で得られた結果を表示させる
    function sort() {

        // 並べ替える項目の取得(最大は性別と順番の２つ)
        var actives = [];
        const activate = document.querySelectorAll('.activate');
        activate.forEach(active => {
            actives.push(active.name)
        })

        // 並べ替える順番の取得，昇順か降順のどちらか
        var order = 'NULL';
        if (document.querySelector('.asc')) {
            order = 'asc';
        } else if (document.querySelector('.desc')) {
            order = 'desc';
        }

        // 送信データの作成
        const postData = new FormData;
        postData.set('active', JSON.stringify(actives));
        postData.set('order', order);

        // ajax通信を行う
        fetch('/profile/sort', {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
            body: postData
        })
            .then(response => response.json())
            .then(res => {                      // 結果の取得
                deleteTarget();                 // 表示している全てのデータを削除
                insertToHtml(res);              // ajax通信で得られた結果を表示
                get_background_color();         // 色付け
            })

            .catch(error => {                   // エラー処理
                console.log(error);
            })
    }

    // データベースから得られた全てのデータを削除する
    function deleteTarget() {

        var doms = document.getElementsByClassName('target');
                while (doms.length) {
                    doms[0].remove();
                }

    }

    // 表の色付けを行う
    function get_background_color() {

        var items = document.querySelectorAll('.target');
        items.forEach((item, index) => {
            if (index % 2 == 0) {
                item.classList.add('bg-gray-100');
            }
        })

    }

    // データベースに存在する全てのデータを取得する
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

    // 性別に関する項目のオン・オフを切り替える
    function change_gender_active(id) {

        if (id.classList.contains('deactivate')) {

            id.classList.remove('deactivate');
            id.classList.add('activate');

        } else if (id.classList.contains('activate')) {

            id.classList.remove('activate');
            id.classList.add('deactivate');

        }

    }

    // 順番に関する項目のオン・オフを切り替える
    function change_sort_active(id) {

        id.classList.remove('deactivate');
        id.classList.add('activate');

    }

    // 性別において，選択した他の項目をオフにする
    function check_gender_active(id) {

        if (id.classList.contains('activate')) {

            id.classList.remove('activate');
            id.classList.add('deactivate');

        }
    }

    // 順番に関して，選択した他の項目をオフにして，方向に関するデータを消す
    function check_sort_active(id) {

        if (id.classList.contains('activate')) {

            id.classList.remove('activate');
            id.classList.remove('asc');
            id.classList.remove('desc');
            id.classList.add('deactivate');

        }
    }

    // 順番の方向を加えたり，逆にする
    function change_order(id) {
        if (id.classList.contains('asc')) {

            id.classList.remove('asc');
            id.classList.add('desc');

        } else if (id.classList.contains('desc')) {

            id.classList.remove('desc');
            id.classList.add('asc');

        } else {

            id.classList.add('asc');

        }
    }

    // 以下からが実行される

    showAll();

    // 男性のボタンが押されたら実行
    // 男性だけ表示されるのを切り替える
    male_show.addEventListener('click', () => {

        console.log('イベント発火');

        change_gender_active(male_show);
        check_gender_active(female_show);

        sort();

    })

    // 女性のボタンが押されたら実行
    // 女性だけ表示されるのを切り替える
    female_show.addEventListener('click', () => {

        console.log('イベント発火');

        change_gender_active(female_show);
        check_gender_active(male_show);

        sort();

    })

    // 年齢のボタンが押されたら実行
    // 昇順と降順を切り替える
    age_sort.addEventListener('click', () => {

        console.log('イベント発火');

        change_sort_active(age_sort);

        check_sort_active(height_sort);
        check_sort_active(income_sort);

        change_order(age_sort);
        sort();

    })

    // 身長のボタンが押されたら実行
    // 昇順と降順を切り替える
    height_sort.addEventListener('click', () => {

        console.log('イベント発火');

        change_sort_active(height_sort);

        check_sort_active(age_sort);
        check_sort_active(income_sort);

        change_order(height_sort);
        sort();

    })

    // 年収のボタンが押されたら実行
    // 昇順と降順を切り替える
    income_sort.addEventListener('click', () => {

        console.log('イベント発火');

        change_sort_active(income_sort);

        check_sort_active(age_sort);
        check_sort_active(height_sort);

        change_order(income_sort);
        sort();

    })
}
