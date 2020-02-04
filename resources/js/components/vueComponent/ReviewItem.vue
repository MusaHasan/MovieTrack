<template>
  <v-list-item class="li">
      <div class="item-actions">
        <h4>{{item.movieName}}</h4> 
        <h4> your reatings: <span class="rating">{{item.rating}}</span></h4>
        <p>{{item.comment}}</p>
        <h4>wishlist added: {{wishAdded}}</h4>
      </div> 
    </v-list-item>
    
</template>

<script>
export default {
    props:{
      item: Object
    },
    data:()=>({
      wishAdded : ''
    }),
    created(){
      if(this.item.wishAdded==1){
        this.wishAdded = 'Yes';
      }else{
        this.wishAdded = 'No';
      }
    }
}
</script>

<style>
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
        height: 150px;
    }
    .rating{
      color: #d12f2f;
    }
</style>