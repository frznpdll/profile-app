<x-elements.layout title='一覧ページ'>

    <div class="mx-auto flex my-5">
        <x-elements.button theme='male' id="male_show" name="male">男性</x-elements.button>
        <x-elements.button theme='female' id="female_show" name="female">女性</x-elements.button>
        <x-elements.button theme='age' id="age_sort" name="age">年齢</x-elements.button>
        <x-elements.button theme='height' id="height_sort" name="height">身長</x-elements.button>
        <x-elements.button theme='income' id="income_sort" name="annual_income">年収</x-elements.button>
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

</x-elements.layout>
