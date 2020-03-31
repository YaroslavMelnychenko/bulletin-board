<template>
    <form class="add-adv default-form" @submit.prevent="onSubmit">
        <md-field
            :class="$v.title.$error ? 'md-invalid' : ''"
        >
            <label for="add_adv_title">Заголовок</label>
            <md-input name="add_adv_title" id="add_adv_title"
                v-model.trim="title"
            />
            <span class="md-error"
                v-if="!$v.title.required" 
            >введите заголовок</span>
        </md-field>
        <md-field
            :class="imageError ? 'md-invalid' : ''"
        >
            <label for="add_adv_image">Изображение</label>
            <md-file name="add_adv_image" id="add_adv_image" accept="image/*"
                v-model="imageName"
                @change="onImageChange"
            />
            <span class="md-error" v-if="imageError">это не изображение</span>
        </md-field>
        <md-field
            :class="$v.text.$error ? 'md-invalid' : ''"
        >
            <label for="add_adv_text">Текстовое описание</label>
            <md-textarea class="add-adv__textarea" name="add_adv_text" id="add_adv_text" md-autogrow
                v-model.trim="text"
            ></md-textarea>
            <span class="md-error"
                v-if="!$v.text.required" 
            >введите текст</span>
        </md-field>
        <md-button type="submit" class="form-default__button md-raised md-primary">Добавить</md-button>
    </form>
</template>
<script>
import { required } from 'vuelidate/lib/validators';

export default {
    name: 'add-adv',
    data() {
        return {
            title: '',
            image: null,
            imageName: '',
            imageError: false,
            text: ''
        }
    },
    validations: {
        title: {
            required
        },
        text: {
            required
        }
    },
    methods: {
        onSubmit() {
            this.$v.$touch();

            var instance = this;

            if(!this.$v.$invalid && !this.imageError) { 
                
                const config = { 'content-type': 'multipart/form-data' }
                const formData = new FormData();

                formData.append('title', this.title);
                formData.append('text', this.text);
                
                if(this.image !== null) {
                    formData.append('image', this.image);
                }

                this.$requests.adCreateRequest(formData, response => {
                    if(response.data == 'ok') {
                        App.displayInformationAlert('Успешно', 'Объявление создано');
                        instance.resetForm();
                    }
                });

            }
        },

        onImageChange(e) {
            var file = e.target.files[0];
            
            if(file !== undefined && file.type.split('/')[0] != 'image') {
                this.imageError = true;
                this.image = null;
            } else {
                this.imageError = false;
                this.image = file;
            }
        },

        resetForm() {
            this.image = null;
            this.imageName = '';
            this.imageError = false;
            this.title = '';
            this.text = '';
            this.$v.$reset();
        }
    }
}
</script>