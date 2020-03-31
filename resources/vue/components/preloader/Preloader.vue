<template>
    <div :class="['preloader', show ? 'preloader--show' : '', active ? 'preloader--active' : '']">
        <div class="preloader__text">BulletinBoard</div>
    </div>
</template>
<script>
export default {
    name: 'preloader',
    props: {
        show: {
            type: Boolean,
            default: true
        },
        active: {
            type: Boolean,
            default: true
        }
    }
}
</script>