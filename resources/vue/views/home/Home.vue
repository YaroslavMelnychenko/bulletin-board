<template>
    <div class="home page-default">
        <div class="page-default__content">
            <navbar class="navbar--wrapper-full"></navbar>
            <div class="home__card card-block card-block--offset-top">
                <h1 class="card-block__title">Объявления</h1>
                <div class="card-block__card">
                    <card class="card--margin-bottom"></card>
                    <card class="card--margin-bottom"></card>
                    <card class="card--margin-bottom"></card>
                </div>
                <div class="card-block__pagination">
                    <div class="card-block__pages">
                        <md-button class="md-primary card-block__page" disabled>1</md-button>
                        <md-button class="md-primary card-block__page">2</md-button>
                        <md-button class="md-primary card-block__page">3</md-button>
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
    components: {
        Navbar,
        Card
    }
}
</script>