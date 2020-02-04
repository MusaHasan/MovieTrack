<template>
        <div>
            <v-card class="mx-auto" max-width="344">
                <v-img class='movieImg'
                    v-bind:src="`https://image.tmdb.org/t/p/w500${item.imageUrl}`"
                    height="250px"
                    @click="movieDetails(item.movieId)"
                ></v-img>

                <div class="cardTxtArea">
                    <v-card-title class="title">
                        {{item.title}}
                    </v-card-title>

                    <v-card-subtitle class="ratingTxt">
                        Avarage Reating: {{item.rating}}
                    </v-card-subtitle>

                    <v-card-actions class="cardBtnIcons">

                        <v-btn class="btn" color="purple" text @click="movieDetails(item.movieId)" >
                            Explore
                        </v-btn>

                        <v-spacer></v-spacer>

                        <v-btn class="btn" icon @click="show = !show">
                            <v-icon class="blur--text">{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                        </v-btn>
                    </v-card-actions>

                    <v-expand-transition>
                        <div v-show="show">
                            <v-divider></v-divider>

                            <v-card-text>
                                {{item.overview}}
                            </v-card-text>
                        </div>
                    </v-expand-transition>
                </div>
            </v-card>
        </div>
</template>

<script>
    export default {
        data:()=>({
            show: false,
        }),
        props: {
            item: Object,
        },
        methods:{
            movieDetails(movieId){
                window.location.href ='/user/singlePage/'+movieId;
            }
        }
    }
</script>
<style scoped>

    .title{
        text-align: center;
        justify-content: center;
        line-height: 1rem;
        font-size: 1rem;
        font-weight: 600;
    }
    .movieImg{
        cursor: pointer;
    }
    .ratingTxt{
        text-align: center;
        color: beige !important;
    }
    .cardBtnIcons .btn{
        padding: 0 20px;
        min-width: 21px;
    }
    .cardTxtArea{
        background-color: rgba(0, 0, 0, 0.48);
        color: #dcbd77;
    }
    
</style>
