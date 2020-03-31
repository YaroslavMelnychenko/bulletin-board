<template>
    <form class="sign-in form-default" @submit.prevent="onSubmit">
        <md-field
            :class="$v.email.$error ? 'md-invalid' : ''"
        >
            <label for="sign_in_email">Email</label>
            <md-input name="sign_in_email" id="sign_in_email"
                v-model.trim="email"
            />
            <span class="md-error"
                v-if="!$v.email.required" 
            >введите почту</span>
            <span class="md-error"
                v-else-if="!$v.email.email" 
            >некорректная почта</span>
        </md-field>
        <md-field
            :class="$v.password.$error ? 'md-invalid' : ''"
        >
            <label for="sign_in_password">Пароль</label>
            <md-input name="sign_in_password" id="sign_in_password" type="password"
                v-model.trim="password"
            />
            <span class="md-error"
                v-if="!$v.password.required" 
            >введите пароль</span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Войти</md-button>
    </form>
</template>
<script>
import { required, email } from 'vuelidate/lib/validators';

export default {
    name: 'sign-in',
    data() {
        return {
            email: '',
            password: ''
        }
    },
    validations: {
        email: {
            required,
            email
        },
        password: {
            required
        }
    },
    methods: {
        onSubmit() {
            this.$v.$touch();

            var instance = this;

            if(!this.$v.$invalid) { 
                this.$requests.signInRequest({
                    email: instance.email,
                    password: instance.password
                }, response => {
                    if(response.data == 'ok') {
                        instance.$router.replace({ name: 'Profile' });
                    } else if(response.data == 'user not exists') {
                        App.displayInformationAlert('Ошибка', 'Пользователя с такой электронной почтой не существует');
                    } else if(response.data == 'wrong password') {
                        App.displayInformationAlert('Ошибка', 'Неверный пароль');
                    }
                });
            } 
        } 
    }
}
</script>