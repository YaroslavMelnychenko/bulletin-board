<template>
    <form class="sign-up form-default" @submit.prevent="onSubmit">
        <md-field>
            <label for="sign_up_first_name">Имя</label>
            <md-input name="sign_up_first_name" id="sign_up_first_name"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="sign_up_last_name">Фамилия</label>
            <md-input name="sign_up_last_name" id="sign_up_last_name"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="sign_up_email">Email</label>
            <md-input name="sign_up_email" id="sign_up_email"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="sign_up_password">Пароль</label>
            <md-input name="sign_up_password" id="sign_up_password" type="password"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field
            :md-toggle-password="false"
        >
            <label for="sign_up_password_verify">Повторите пароль</label>
            <md-input name="sign_up_password_verify" id="sign_up_password_verify" type="password"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Зарегистрироваться</md-button>
    </form>
</template>
<script>
export default {
    name: 'sign-up',
    methods: {
        onSubmit() {

        }
    }
}
</script>