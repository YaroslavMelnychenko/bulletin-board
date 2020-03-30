<template>
    <div class="auth">
        <div class="auth__wrapper">
            <md-card class="auth-card">
                <md-card-header class="auth-card__header">
                    <div class="md-title">Аутентификация</div>
                </md-card-header>
                <md-card-content class="auth-card__content">
                    <md-tabs class="auth-card__tabs">
                        <md-tab id="auth_sign_in_tab" md-label="Войти">
                            <sign-in></sign-in>
                        </md-tab>
                        <md-tab id="auth_sign_up_tab" md-label="Зарегистрироваться">
                            <sign-up></sign-up>
                        </md-tab>
                    </md-tabs>
                </md-card-content>
            </md-card>
        </div>
    </div>
</template>
<script>
import SignIn from '../../components/sign-in/SignIn';
import SignUp from '../../components/sign-up/SignUp';

export default {
    name: 'auth',
    components: {
        SignIn,
        SignUp
    }
}
</script>