<template>
    <div class="app">
        <preloader
            :active="preloaderActive"
            :show="preloaderShow"
        ></preloader>
        <div class="app__content">
            <router-view></router-view>
        </div>
        <md-dialog class="app__alert"
            :md-active.sync="informationAlert.show"
        >
            <md-dialog-title v-html="informationAlert.title"></md-dialog-title>
            <md-dialog-content v-html="informationAlert.content"></md-dialog-content>
            <md-dialog-actions>
                <md-button class="md-primary" @click="informationAlert.confirm">OK</md-button>
            </md-dialog-actions>
        </md-dialog>
    </div>
</template>
<script>
import Preloader from './components/preloader/Preloader'

export default {
    name: 'app',
    components: {
        Preloader
    },
    data() {
        return {
            preloaderActive: true,
            preloaderShow: true,

            informationAlert: {
                show: false,
                title: '',
                content: '',
                confirm: function() {
                    this.informationAlert.show = false;
                }
            }
        }
    },
    methods: {
        displayInformationAlert(title, content, confirm) {
            this.informationAlert.title = title;
            this.informationAlert.content = content;
            this.informationAlert.show = true;

            if(confirm !== undefined) this.informationAlert.confirm = confirm;
            else this.informationAlert.confirm = () => {
                this.informationAlert.show = false;
            };
        },

        preloaderState(state) {
            if(!state) {
                this.preloaderActive = false;

                setTimeout(() => {
                    this.preloaderShow = false;
                }, 400);
            } else {
                this.preloaderShow = true;

                setTimeout(() => {
                    this.preloaderActive = true;
                }, 50);
            }
        }
    },
    mounted() {
        setTimeout(() => {
            this.preloaderState(false);
        }, 1000);
    }
}
</script>