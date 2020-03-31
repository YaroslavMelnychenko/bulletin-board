<template>
    <form class="profile-edit default-form" @submit.prevent="onSubmit">
        <md-field
            :class="$v.firstName.$error ? 'md-invalid' : ''"
        >
            <label for="profile_edit_first_name">Имя</label>
            <md-input name="profile_edit_first_name" id="profile_edit_first_name"
                v-model.trim="firstName"
            />
            <span class="md-error"
                v-if="!$v.firstName.alpha" 
            >некорректное имя</span>
        </md-field>
        <md-field
            :class="$v.lastName.$error ? 'md-invalid' : ''"
        >
            <label for="profile_edit_last_name">Фамилия</label>
            <md-input name="profile_edit_last_name" id="profile_edit_last_name"
                v-model.trim="lastName"
            />
            <span class="md-error"
                v-if="!$v.lastName.alpha" 
            >некорректная фамилия</span>
        </md-field>
        <md-field
            :class="$v.email.$error ? 'md-invalid' : ''"
        >
            <label for="profile_edit_email">Email</label>
            <md-input name="profile_edit_email" id="profile_edit_email"
                v-model.trim="email"
            />
            <span class="md-error"
                v-if="!$v.email.email" 
            >некорректная почта</span>
        </md-field>
        <md-field
            :class="$v.password.$error ? 'md-invalid' : ''"
        >
            <label for="profile_edit_password">Новый пароль</label>
            <md-input name="profile_edit_password" id="profile_edit_password" type="password"
                v-model.trim="password"
            />
            <span class="md-error"
                v-if="!$v.password.minLength" 
            >минимальная длина {{ $v.password.$params.minLength.min }} символов</span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Применить</md-button>
    </form>
</template>
<script>
import { email, minLength, sameAs, helpers } from 'vuelidate/lib/validators';

const alpha = helpers.regex('alpha', /^[a-zа-яії'`-]*$/i);

export default {
    name: 'profile-edit',
    data() {
        return {
            firstName: '',
            lastName: '',
            email: '',
            password: ''
        }
    },
    validations: {
        firstName: {
            alpha
        },
        lastName: {
            alpha
        },
        email: {
            email
        },
        password: {
            minLength: minLength(5)
        }
    },
    methods: {
        onSubmit() {
            this.$v.$touch();

            var instance = this;

            if(!this.$v.$invalid) {
                
                if(!this.checkForm()) {
                    App.displayInformationAlert('Ошибка', 'Заполните хотя бы одно поле');
                } else {

                    var data = {};

                    this.firstName != '' ? data.firstName = this.firstName : false;
                    this.lastName != '' ? data.lastName = this.lastName : false;
                    this.email != '' ? data.email = this.email : false;
                    this.password != '' ? data.password = this.password : false;

                    this.$requests.userEditRequest(data, response => {
                        if(response.data == 'ok') {
                            instance.resetForm();

                            App.displayInformationAlert('Успешно', 'Данные профиля обновлены', () => {
                                instance.$router.go();
                            });
                        }
                    });

                }

            }
        },

        checkForm() {
            return (this.firstName || this.lastName || this.email || this.password);
        },

        resetForm() {
            this.firstName = '';
            this.lastName = '';
            this.email = '';
            this.password = '';
            this.$v.$reset();
        }
    }
}
</script>