<template>
    <form class="add-adv default-form" @submit.prevent="onSubmit">
        <md-field>
            <label for="add_adv_title">Заголовок</label>
            <md-input name="add_adv_title" id="add_adv_title"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="add_adv_image">Изображение</label>
            <md-file name="add_adv_image" id="add_adv_image" accept="image/*"/>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-field>
            <label for="add_adv_text">Текстовое описание</label>
            <md-textarea class="add-adv__textarea" name="add_adv_text" id="add_adv_text" md-autogrow></md-textarea>
            <span class="md-error" v-if="false"></span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Добавить</md-button>
    </form>
</template>
<script>
export default {
    name: 'add-adv',
    methods: {
        onSubmit() {
            
        }
    }
}
</script>