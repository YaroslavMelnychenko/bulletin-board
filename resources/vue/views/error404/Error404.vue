<template>
    <div class="error404">
        <div class="error404__block">
            <md-icon class="error404__icon md-size-5x">error</md-icon>
            <h1 class="error404__header md-display-3">Не найдено :(</h1>
            <router-link class="error404__link md-display-2" :to="{ name: 'Auth' }">Домой</router-link>
        </div>
    </div>
</template>
<script>
export default {
    name: 'error404'
}
</script>