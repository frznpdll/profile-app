<x-elements.layout title='一覧ページ'>

    <header class="mx-auto flex my-5 ml-10">
        <x-elements.button theme='gray' id="reset_button">一覧</x-elements.button>
        <x-elements.button theme='indigo' id="create_person">作成</x-elements.button>
    </header>
    <div class="border-b-4"></div>

    <x-elements.new-person></x-elements.new-person>

    <div>
        <div class="mx-auto flex my-5 ml-10">
            <x-elements.button theme='blue' id="male_show" name="male">男性</x-elements.button>
            <x-elements.button theme='red' id="female_show" name="female">女性</x-elements.button>
            <x-elements.button theme='cyan' id="age_sort" name="age">年齢</x-elements.button>
            <x-elements.button theme='green' id="height_sort" name="height">身長</x-elements.button>
            <x-elements.button theme='yellow' id="income_sort" name="annual_income">年収</x-elements.button>
        </div>

        <table class="table-fixed mx-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">氏名</th>
                    <th class="px-4 py-2">性別</th>
                    <th class="px-4 py-2">年齢[歳]</th>
                    <th class="px-4 py-2">出身地</th>
                    <th class="px-4 py-2">居住地</th>
                    <th class="px-4 py-2">身長[cm]</th>
                    <th class="px-4 py-2">学歴</th>
                    <th class="px-4 py-2">年収[万円]</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>



</x-elements.layout>
