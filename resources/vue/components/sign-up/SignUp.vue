<template>
    <form class="sign-up form-default" @submit.prevent="onSubmit">
        <md-field
            :class="$v.firstName.$error ? 'md-invalid' : ''"
        >
            <label for="sign_up_first_name">Имя</label>
            <md-input name="sign_up_first_name" id="sign_up_first_name"
                v-model.trim="firstName"
            />
            <span class="md-error"
                v-if="!$v.firstName.required" 
            >имя обязательно</span>
            <span class="md-error"
                v-else-if="!$v.firstName.alpha" 
            >некорректное имя</span>
        </md-field>
        <md-field
            :class="$v.lastName.$error ? 'md-invalid' : ''"
        >
            <label for="sign_up_last_name">Фамилия</label>
            <md-input name="sign_up_last_name" id="sign_up_last_name"
                v-model.trim="lastName"
            />
            <span class="md-error"
                v-if="!$v.lastName.required" 
            >фамилия обязательна</span>
            <span class="md-error"
                v-else-if="!$v.lastName.alpha" 
            >некорректная фамилия</span>
        </md-field>
        <md-field
            :class="$v.email.$error ? 'md-invalid' : ''"
        >
            <label for="sign_up_email">Email</label>
            <md-input name="sign_up_email" id="sign_up_email"
                v-model.trim="email"
            />
            <span class="md-error"
                v-if="!$v.email.required" 
            >почта обязательна</span>
            <span class="md-error"
                v-else-if="!$v.email.email" 
            >некорректная почта</span>
        </md-field>
        <md-field
            :class="$v.password.$error ? 'md-invalid' : ''"
        >
            <label for="sign_up_password">Пароль</label>
            <md-input name="sign_up_password" id="sign_up_password" type="password"
                v-model.trim="password"
            />
            <span class="md-error"
                v-if="!$v.password.required" 
            >пароль не может быть пустым</span>
            <span class="md-error"
                v-else-if="!$v.password.minLength" 
            >минимальная длина {{ $v.password.$params.minLength.min }} символов</span>
        </md-field>
        <md-field
            :md-toggle-password="false"
            :class="$v.passwordVerify.$error ? 'md-invalid' : ''"
        >
            <label for="sign_up_password_verify">Повторите пароль</label>
            <md-input name="sign_up_password_verify" id="sign_up_password_verify" type="password"
                v-model.trim="passwordVerify"
            />
            <span class="md-error"
                v-if="!$v.password.required" 
            >повторите пароль</span>
            <span class="md-error"
                v-else-if="!$v.password.sameAsPassword" 
            >пароль не совпадает</span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Зарегистрироваться</md-button>
    </form>
</template>
<script>
import { required, email, minLength, sameAs, helpers } from 'vuelidate/lib/validators';

const alpha = helpers.regex('alpha', /^[a-zа-яії'`-]*$/i);

export default {
    name: 'sign-up',
    data() {
        return {
            firstName: '',
            lastName: '',
            email: '',
            password: '',
            passwordVerify: ''
        }
    },
    validations: {
        firstName: {
            required,
            alpha
        },
        lastName: {
            required,
            alpha
        },
        email: {
            required,
            email
        },
        password: {
            required,
            minLength: minLength(5)
        },
        passwordVerify: {
            required,
            sameAsPassword: sameAs('password')
        }
    },
    methods: {
        onSubmit() {
            this.$v.$touch();

            var instance = this;

            if(!this.$v.$invalid) {
                this.$requests.signUpRequest({
                    firstName: instance.firstName,
                    lastName: instance.lastName,
                    email: instance.email,
                    password: instance.password
                }, response => {
                    if(response.data == 'ok') {
                        App.displayInformationAlert('Успешно', 'Поздравляю, вы зарегистрированы', () => {
                            instance.$router.go();
                        });
                    } else if(response.data == 'email exists') {
                        App.displayInformationAlert('Ошибка', 'Пользователь с таким email уже зарегистрирован');
                    }
                });
            }
        }
    }
}
</script>