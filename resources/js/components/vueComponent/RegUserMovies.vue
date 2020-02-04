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

                        <v-btn class="btn" color="purple" text @click="ratingShow = !ratingShow">
                            <v-icon>
                                mdi-certificate
                            </v-icon>
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
            <div class="comentPanel" v-show="ratingShow">
                <v-icon class="closeIcon" @click="ratingShow = !ratingShow">mdi-close-circle-outline</v-icon>
                <v-card class="mx-auto" max-width="344" >
                    <v-textarea v-model="comments" class="commentArea" label="comment">
                    </v-textarea>
                    <v-card-actions class="pa-4">
                        Rate this
                        <v-spacer></v-spacer>
                        <span class="grey--text text--lighten-2 caption mr-2">
                            ({{ rating }})
                        </span>
                        <v-rating
                            v-model="rating"
                            background-color="white"
                            color="yellow accent-4"
                            dense
                            half-increments
                            hover
                            size="18"
                        ></v-rating>
                        <v-btn class="subBtn" @click="submit">
                            submit
                        </v-btn>
                        <v-btn class="wishbtn" color="purple" text @click="wishlist= !wishlist"
                            :class="{active: wishlist}">
                            {{wishAdd(wishlist)}}
                            <v-icon>
                                mdi-file-word-box
                            </v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </div> 
        </div>
</template>

<script>
    export default {
        data:()=>({
            show: false,
            ratingShow: false,
            rating: 0,
            comments: '',
            wishlist: false,
            wishAdded: 0,
            users:[]
        }),
        props: {
            item: Object,
        },
        created(){
           let vm = this;
            axios.get('/api/user/check')
            .then(function (response){
                vm.users= response.data;
                console.log(vm.users)
            });

        },
        methods:{
            submit(){

                let vm=this
                // console.log(vm.users.user_review);
                // if(vm.users.user_review== '1' ){
                

                //     axios.post('/api/review/update',{
                //     comment: this.comments,
                //     rating: this.rating,
                //     movieName: this.item.title,
                //     wishAdded: this.wishAdded,
                //     movieId: this.item.movieId 
                // }).then(function (response){
                //     // console.log(response);
                // });
                // this.ratingShow = !this.ratingShow;
                // this.comments = '';
                // this.rating = 0;
                // }
                // else{
                axios.post('/api/review/store',{
                    comment: this.comments,
                    rating: this.rating,
                    movieName: this.item.title,
                    wishAdded: this.wishAdded,
                    movieId: this.item.movieId 
                }).then(function (response){
                    // console.log(response);
                });
                this.ratingShow = !this.ratingShow;
                this.comments = '';
                this.rating = 0;
                // }
            },

            wishAdd(added){
                let wished;
                if(added == true){
                    wished = 1;
                }
                else{
                    wished = 0;
                }
                this.wishAdded = wished;
                
            },
            movieDetails(movieId){
                window.location.href ='/user/singlePage/'+movieId;
            }
        }
    }
</script>
<style scoped>

    .comentPanel{
        position: absolute;
        top: 12px;
        right: 15px;
        width: 90%;
        background-color: rgba(1, 15, 15, 0.575);
        padding: 85px 10px;
    }
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
    .closeIcon{
        position: absolute;
        top: 60px;
        right: 10px;
        color: darksalmon;
    }
    .commentArea{
        background-color: rgba(165, 250, 221, 0.911); 
        color:orange
    }
    .subBtn{
        position: absolute;
        cursor: pointer;
        bottom: -44px;
        background-color: darksalmon !important;
    }
    .wishbtn{
        position: absolute;
        cursor: pointer;
        bottom: -44px;
        right: 15px;
        color: #09163f;
        background-color: #e9967a
    }
    .active{
        color: #5a0606;
        background-color: #e65656 !important;
    }
</style>
