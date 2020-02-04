<template>
        <v-container>
            <h3 class="title">Recent Movies</h3>
            <v-row >
                <slider :items="contents" :imgUrl="imageUrl"/>
            </v-row>
            <h3 class="title">Top Rated</h3>
            <v-row>
                <v-col md="3" v-for="item in list" :key="item.id">
                    <movies :item="item"/>
                </v-col>
            </v-row>
        </v-container>
</template>

<script>
    import slider from './vueComponent/ImageSlider'
    import movies from './vueComponent/NormalUserMovie'
    export default {
        components:{
            slider,
            movies
        },
        data:()=>({
            contents: [],
            imageUrl: 'https://image.tmdb.org/t/p/w1280',
            loaded: true,
            show: false,
            list:[],
            tempList:[]
        }),
        created() {
            let vm = this;
            fetch('https://api.themoviedb.org/3/movie/top_rated?api_key=e7fd9e644511491efdade2c455621de8&language=en-US&page=1')
            .then(response => response.json())
            .then(data =>{
                vm.tempList= data.results;
                vm.tempList.forEach(function(element){
                    var obj = {
                        movieId:element.id,
                        title:element.title,
                        rating:element.vote_average,
                        imageUrl:element.poster_path,
                        overview:element.overview
                    }
                    vm.list.push(obj);
                    // Top Rated Movies from TMDB
                    // console.log(vm.list)
                });
            });

            fetch('https://api.themoviedb.org/3/movie/now_playing?api_key=e7fd9e644511491efdade2c455621de8&language=en-US&page=1')
            .then(response => response.json())
            .then(data =>{
                vm.contents= data.results;
                this.loaded = false;
                // Recent Movies from TMDB
                // console.log(vm.contents)
            });
        }
    }
</script>

<style scoped>
</style>