<template>
    <form class="profile-edit default-form" @submit.prevent="onSubmit">
        <md-field>
            <label for="profile_edit_first_name">Имя</label>
            <md-input name="profile_edit_first_name" id="profile_edit_first_name"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="profile_edit_last_name">Фамилия</label>
            <md-input name="profile_edit_last_name" id="profile_edit_last_name"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="profile_edit_email">Email</label>
            <md-input name="profile_edit_email" id="profile_edit_email"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="profile_edit_password">Новый пароль</label>
            <md-input name="profile_edit_password" id="profile_edit_password" type="password"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Применить</md-button>
    </form>
</template>
<script>
export default {
    name: 'profile-edit',
    methods: {
        onSubmit() {
            
        }
    }
}
</script>