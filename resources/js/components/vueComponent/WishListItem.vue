<template>
    <v-list-item class="li">
        {{ item.movieName }}
        <div class="item-actions">
            <a target="_blank" :href="`/user/singlePage/${item.movieId}`">
                <v-btn class="button">
                    <v-icon aria-hidden="true">mdi-dice-6</v-icon>
                </v-btn>
            </a> 
            <v-btn class="button bought" @click="$emit('check')"> </v-btn> 
            <v-btn class="button" @click="$emit('remove')">
                <v-icon aria-hidden="true">mdi-window-close</v-icon>
            </v-btn>
        </div>
    </v-list-item>
</template>
<script>
    export default {
        props: {
            item: Object
        }
    }
</script>
<style scoped>

    .li {
        display: block;
        overflow: hidden;
        text-align: center;
        border-bottom: 1px solid #F8DE7E;
        padding:10px;
        height: 20px;
        background: #fff;
        color:#E3A857;
        margin-bottom: 3px;
        -webkit-transition: -webkit-all 0.5s cubic-bezier(.25,.1,.25,1);
        transition: all 0.5s cubic-bezier(.25,.1,.25,1);
    }

    .li:hover {
        height: 110px;

    }

    .li .item-actions {
        opacity: 0;
        padding-top: 10px;
    
    } 

    .li .item-actions .button {
        width:58px;
        height: 60px;
        border-radius: 100%;
        background-color: #fff;
        font-size: 20px;
        font-weight: bold;
        border: 1px dashed #E3A857;
        color: #1d418b;
    }

    .li .item-actions .button:hover {

        background-color: #1d418b;
        border: 1px dashed #FFF;
        color: #FFF;
    }

    .li:hover .item-actions {
        opacity: 1;
    } 

    .li .bought:after {
        content: '✓';
        box-shadow: none;
        flex: auto;
    }

</style>