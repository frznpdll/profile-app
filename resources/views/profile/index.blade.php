<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>並べ替えアプリ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name='csrf-token' content="{{ csrf_token() }}">   {{-- 非同期処理に用いるCSRFトークン --}}
</head>
<body>
    {{-- bladeとtailwindcssを使ってページを作成した --}}

    <div class="container mx-auto mt-9 max-w-screen-lg">

        {{-- 並べ替えを行う項目を選択するボタン --}}
        <div class="mx-auto flex my-5 ml-10">
            
            <x-elements.button theme='blue' id="male_show" name="male">男性</x-elements.button>
            <x-elements.button theme='red' id="female_show" name="female">女性</x-elements.button>
            <div class="border-r-4"></div>
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
    <script src="js/sort.js"></script>
</body>
</html>
