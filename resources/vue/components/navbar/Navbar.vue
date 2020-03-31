<template>
    <div class="navbar">
        <md-toolbar class="md-primary">
            <span class="md-title">{{ userFullName }}</span>
            <div class="md-toolbar-section-end">
                <md-button :to="{ name: 'Home' }" 
                    :disabled="$router.currentRoute.name == 'Home' ? true : false"
                >Главная</md-button>
                <md-button :to="{ name: 'Profile' }"
                    :disabled="$router.currentRoute.name == 'Profile' ? true : false"
                >Личный кабинет</md-button>
            </div>
        </md-toolbar>
    </div>
</template>
<script>
export default {
    name: 'navbar',
    data() {
        return {
            userFullName: ''
        }
    },
    mounted() {
        var instance = this;

        this.$requests.loginRequest(response => {
            if(response.data == 'login') {
                instance.userFullName = JSON.parse(response.headers['user-full-name']);
            }
        });
    }
}
</script>