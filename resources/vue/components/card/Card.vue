<template>
    <div class="card md-elevation-4">
        <div class="card__image">
            <img :src="image" alt="Card image">
        </div>
        <div class="card__content">
            <h2 class="card__title">{{ header }}</h2>
            <div class="card__text">{{ text }}</div>
        </div>
        <div class="card__attributes">
            <div class="card__author">{{ author }}</div>
            <div class="card__date">{{ date | dateForHumans }}</div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'card',
    props: {
        image: {
            type: String,
            default: 'https://via.placeholder.com/300x200?text=Advertisement'
        },
        header: {
            type: String,
            default: 'Default header'
        },
        text: {
            type: String,
            default: 'Default text'
        },
        author: {
            type: String,
            default: 'Default author'
        },
        date: {
            type: String,
            default: '2020-03-30T20:42:35.000000Z'
        }
    },
    filters: {
        dateForHumans(date) {
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            var jsDate  = new Date(date.split('T')[0]);

            return jsDate.toLocaleDateString("ru-RU", options); 
        }
    }
}
</script>