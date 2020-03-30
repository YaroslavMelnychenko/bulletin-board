<template>
    <form class="sign-in form-default" @submit.prevent="onSubmit">
        <md-field>
            <label for="sign_in_email">Email</label>
            <md-input name="sign_in_email" id="sign_in_email"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="sign_in_password">Пароль</label>
            <md-input name="sign_in_password" id="sign_in_password" type="password"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Войти</md-button>
    </form>
</template>
<script>
export default {
    name: 'sign-in',
    methods: {
        onSubmit() {

        }
    }
}
</script>