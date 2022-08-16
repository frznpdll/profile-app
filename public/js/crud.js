'use strict';

{
    function addPerson() {

        var input_gender_value = '';
        const input_gender = document.querySelectorAll('#input_gender');
        input_gender.forEach(gender => {
            if (gender.checked) {
                input_gender_value = gender.value;
            }
        })


        var person = {
            family_name: input_family_name.value,
            first_name: input_first_name.value,
            gender: input_gender_value,
            age: input_age.value,
            birthplace: input_birthplace.value,
            residence: input_residence.value,
            height: input_height.value,
            edu_back: input_edu_back.value,
            annual_income: input_annual_income.value,
        }

        console.log(person);

        const postData = new FormData;
        postData.set('person', JSON.stringify(person))

        fetch('/profile/create', {
            method: 'POST',
            headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content},
            body: postData
        })
            .then(response => response.json())
            .then(res => {
                console.log(res);
            })

            .catch(error => {
                console.log(error);
            })
    }

    create_add.addEventListener('click', () => {

        addPerson();

    })
}
