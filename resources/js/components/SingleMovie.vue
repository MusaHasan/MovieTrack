<template>
    <v-container>
        <v-img :aspect-ratio="100/9" v-bind:src="`https://image.tmdb.org/t/p/original${movieData.poster_path}`">
          <v-row class="dataField lightbox pa-2 fill-height">
            <v-col md="4">
                <v-img
                  v-bind:src="`https://image.tmdb.org/t/p/original${movieData.poster_path}`"
                  height="450px"
                  @click="showImg=!showImg"
                ></v-img>
            </v-col>

            <v-col md="8">
              <h2>{{movieData.title}}</h2>
              <p>user rating {{movieData.vote_average}} released-{{movieData.release_date}}</p> 
              <h3>Overview</h3>
              <p>{{movieData.overview}}</p>
            </v-col>
          </v-row>
        </v-img>

        <h3 class="my-4 cmnTxt">Comments:-</h3>

        <v-row>
          <v-list class="m-4 comentItm" three-line>
            <template v-for="(comment, index) in users">
              <v-list-item :key="index">
                <v-list-item-avatar class="mx-4">
                  <v-img src='https://cdn.vuetifyjs.com/images/lists/5.jpg'></v-img>
                </v-list-item-avatar>

                <v-list-item-content>
                  <v-list-item-title v-html="comment.name"></v-list-item-title>
                  <v-list-item-title v-html="comment.updated_at"></v-list-item-title>
                  <v-list-item-subtitle v-html="comment.comment"></v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
            </template>
          </v-list>
        </v-row>
    </v-container>
</template>
<script>
  export default {
    props:['movieid'],
    data: () => ({
      showImg : false,
      movieData: Object,
      users:[]
    }),
    created() {
      let vm = this;
      fetch('https://api.themoviedb.org/3/movie/'+vm.movieid+'?api_key=e7fd9e644511491efdade2c455621de8&language=en-US')
      .then(response => response.json())
      .then(data =>{
        vm.movieData= data;
      }),
      axios.get('/api/singlePageComments/'+vm.movieid)
      .then(function (response){
        vm.users= response.data
        console.log(vm.users)
        
      });
    }
  }
</script>
<style scoped>
  .dataField{
    height: 30rem;
    background-color: #2a3948d1;
    color: aliceblue;
    padding: 0 1.5rem;
  }
  .comentItm{
    width: 90%;
    border-top: 1px solid rgb(14, 6, 66);
    border-bottom: 1px solid rgb(14, 6, 66);
  }
  .cmnTxt{
    width: fit-content;
    color: rgba(225, 228, 185, 0.89);
    border-bottom: 1px solid rgb(255, 255, 255);
  }
</style>