<template>
    <carousel 
        ref="test"
        :perPage=1
        :navigationEnabled="true"
        :paginationEnabled="true"
        :autoplay="true"
        :loop="true"
    >
        <slide v-for="content in items" :key="content.id">
            <div class="card-image">
                <figure class="image">
                    <img class="image" :src="imgUrl + content.backdrop_path" alt="Image" 
                    @click="movieDetails(content.id)">
                </figure>

                <div class="media-content">
                    <p id="movie-title" class="title is-4 no-padding">{{content.title}}</p>
                </div>
            </div>
        </slide>
    </carousel>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    components:{
        Carousel,
        Slide
    },
    props: {
        items: Array,
        imgUrl: {
            type: String,
            required: true
        }
    },
    mounted() {
        setTimeout(() => {
            this.$refs['test'].onResize();
            this.$refs['test'].goToPage(0);
        }, 200);
    },
    methods:{
        movieDetails(movieId){
            window.location.href ='/user/singlePage/'+movieId;
        }
    }
}
</script>

<style scoped>
 .image{
     width: 97%;
     cursor: pointer;
 }
 .title{
     color:turquoise;
     font-size: 1rem;
     font-weight: 400;
 }
</style>