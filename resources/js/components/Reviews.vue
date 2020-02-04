<template>
    <v-container class="body">
        <h1>REVIEWS ACTIVITY</h1>

        <!-- RENDER ITEM -->

            <v-list class="ui">
                <items
                    v-for="(item,index) in reviews" :key="(index)"
                    :item="item" 
                />
            </v-list>

        <!-- RENDER ITEM -->
    </v-container>
</template>
<script>
import items from './vueComponent/reviewItem'
export default {
    components:{
        items
    },
    data:()=>({
        reviews:[]
    }),
    created(){
        var vm = this;
        axios.get('/api/user/allmovieapi')
        .then(function (response){
            vm.list= response.data
            console.log(vm.list)
            vm.list.forEach(element =>{
                var item = {
                    movieName: element.movieName,
                    movieId: element.movie_id,
                    comment: element.comment,
                    rating: element.rating,
                    wishAdded: element.wishAdded

                };
                vm.reviews.push(item);
            })
            
        });
        
    },
}
</script>
<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Raleway');

    .body {
    background-color: #0f0d2378;
    color:#FFF;
    font-family: 'Raleway', sans-serif;
    }

    .input:focus,
    select:focus,
    textarea:focus,
    .button:focus {
        outline: none;
    }

    h1 {
    min-width:430px;
    text-align: center;
    letter-spacing: 9px;

    font-size:35px;
    }

    .show {
    color: #1d418b;
    width: 45px;
    height: 45px;
    border-radius: 100%;
    background-color: #fff;
    margin:auto;
    }

    .show:before {
    content: '+';
    position: relative;
    font-size: 70px;
    top: -33px;
    left: 8px;
    }

    #reveal #form-group {
    opacity: 0;
    text-align: center;
    margin: 10px auto;
    height: 0px;
    overflow: hidden;
    width: 50%;
    transition:all 0.3s ease-in-out;
    }

    #reveal:hover #form-group {
    opacity: 1;
    height: auto;

    }

    .input {
    font-size: 15px;
    padding-left: 10px;
    }

    .input, #form-group .button{
    height: 51px;
    font-family: 'Raleway', sans-serif;
    border-radius: 5px;

    background-color: #fff;
    
    font-weight: bold;
    border: 1px dashed #E3A857;
    color: #1d418b;
    }
    #form-group .button {
    height: 35px;
    width: 59px;
    font-size: 20px;
    font-family: 'Raleway', sans-serif;

    }

    #form-group .button:hover {
    height: 35px;
    width: 59px;
    font-family: 'Raleway', sans-serif;
    background-color: #1d418b;
    border: 1px dashed #FFF;
    color: #FFF;
    }
    .ul {
    list-style: none;
    padding: 0;
    }
    .active .bought:after {
    color:red;
    }

    .active {
    
    opacity: 0.4;
    }

</style>