<div id="craete_modal">

    <div id="create_mask" class="hidden bg-black bg-opacity-40 fixed inset-0 z-10"></div>

    <div id="create_menu" class="hidden bg-white absolute left-0 right-0 z-20 p-5 mx-10 border rounded">

        <div class="grid grid-cols-4 gap-4">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label for="input-family-name">氏名：</label>
            </div>
            <div class="form-group mt-4 block">
                <x-elements.text>input_family_name</x-elements.text>
            </div>
            <div class="form-group mt-4 block">
                <x-elements.text>input_first_name</x-elements.text>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4 mt-5">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label>性別：</label>
            </div>
            <div class="form-group mt-1 block">
                <label class="mr-3">
                <input type="radio" id="input_gender" name="gender" value="male" class="text-gray-700"> 男性
                </label>
                <label>
                <input type="radio" id="input_gender" name="gender" value="female" class=""> 女性
                </label>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label for="input_age">年齢：</label>
            </div>
            <div class="form-group mt-4 block">
                <x-elements.text>input_age</x-elements.text>
            </div><div class="mt-6 block">
                歳
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label for="input_birthplace">出身地：</label>
            </div>
            <div class="form-group mt-4 block">
                <x-elements.text>input_birthplace</x-elements.text>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label for="input_residence">居住地：</label>
            </div>
            <div class="form-group mt-4 block">
                <x-elements.text>input_residence</x-elements.text>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label for="input_heigth">身長：</label>
            </div>
            <div class="form-group mt-4 block">
                <x-elements.text>input_height</x-elements.text>
            </div>
            <div class="mt-6 block">
                cm
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label for="input_edu_back">学歴：</label>
            </div>
            <div class="form-group mt-4 block">
                <select name="edu-back" id="input_edu_back" class="form-control block w-full border border-solid border-gray-300 text-gray-700 rounded px-3 py-1.5 text-base">
                    <option value="高卒">高卒</option>
                    <option value="大卒">大卒</option>
                    <option value="大学院卒">大学院卒</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="ml-auto mt-auto py-1.5 text-base">
                <label for="input_annual_income">年収：</label>
            </div>
            <div class="form-group mt-4 block">
                <x-elements.text>input_annual_income</x-elements.text>
            </div>
            <div class="mt-6 block">
                cm
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4 mt-8">
            <div></div>
            <x-elements.button theme='blue' id="create_add">追加</x-elements.button>
            <x-elements.button theme='red' id="create_quit">戻る</x-elements.button>
        </div>
    </div>
</div>
