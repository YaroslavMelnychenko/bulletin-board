<template>
    <div class="home page-default">
        <div class="page-default__content">
            <navbar class="navbar--wrapper-full"></navbar>
            <div class="home__card card-block card-block--offset-top">
                <h1 class="card-block__title">Объявления</h1>
                <div class="card-block__empty"
                    v-if="cards.length == 0"
                >
                    <md-empty-state
                        md-rounded
                        md-icon="info"
                        md-label="Ничего нет :("
                    >
                    </md-empty-state>
                </div>
                <div class="card-block__card">
                    <card class="card--margin-bottom"
                        v-for="(card, index) in cards" :key="index"
                        :image="card.image"
                        :header="card.header"
                        :text="card.text"
                        :author="card.author"
                        :date="card.created_at"
                    ></card>
                </div>
                <div class="card-block__pagination"
                    v-if="cards.length != 0"
                >
                    <div class="card-block__pages">
                        <md-button class="md-primary card-block__page"
                            v-for="page in lastPage"
                            :key="page"
                            :disabled="currentPage == page ? true : false"
                            @click="paginate(page)"
                        >{{ page }}</md-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Navbar from '../../components/navbar/Navbar';
import Card from '../../components/card/Card';

export default {
    name: 'home',
    data() {
        return {
            cards: [],
            
            cardsPerPage: 10,
            currentPage: 1,

            lastPage: 1
        }
    },
    components: {
        Navbar,
        Card
    },
    mounted() {
        this.updateCards()
    },
    methods: {
        updateCards() {
            var instance = this;

            this.$requests.adsPaginationRequest(this.cardsPerPage, this.currentPage, response => {
                instance.cards = response.data.data;
                instance.lastPage = response.data.last_page;
            });
        },

        paginate(page) {
            this.currentPage = page;
            
            window.scrollTo({ top: 0, behavior: 'smooth' });

            this.updateCards();
        }
    }
}
</script>