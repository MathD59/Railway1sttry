<script setup>

import ResultSearch from '../components/ResultSearch.vue';
import { isProxy, onUpdated, toRaw } from 'vue';
import FiltreCategory from '../components/FiltreCategory.vue';
import SearchBar from '../components/SearchBar.vue';

</script>


<template lang="">
    
    <!-- FILTRE CATEGORIES + LISTE DES RESULTATS -->
    <div class="grid grid-cols-1 md:grid-cols-4 md:gap-4 px-4 pt-2">
        <div class="lg:mt-6 lg:overflow-y-auto lg:h-[calc(100vh-112px)]">
            <FiltreCategory @newposts="onNewPosts" />
            
        </div>
        <div class="grid col-span-3 px-4 overflow-y-auto h-[calc(100vh-112px)]">
            
              
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="inline-flex rounded-lg max-h-16 border-4 border-downy">
                    
                    <input type="search" v-model="searcharea" id="default-search" class=" text-white block w-fullrelative w-full h-18  shadow-lg rounded-lg bg-black/60" placeholder="Search your favorite post" required>
                    <button @click="searchLike()" class="text-white h-13 right-2.5 bottom-2.5 bg-san-juan focus:ring-4 focus:outline-none focus:ring-cardinal font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            
            
            
            
            
            
            
            <div v-for="post in posts">
                <ResultSearch  :post_id=post.id />
                
            </div>
        </div>
        
        
    </div>
    
</template>


<script>
export default {
    
    data(){
        return{
            posts:'',
            filtposts:'',
            searcharea:'',
            newposts:'',
        }
    },
    
    methods:{
        
        getPosts(){
            var requestOptions = { 
                method: 'GET', 
                redirect: 'follow' 
            }; 
            fetch(this.$path + "api/getposts", requestOptions) 
            .then(response =>   response.json()) 
            .then(result => { 
                this.posts=result;
                console.log(result);
            })
            .catch(error => console.log('error', error)); 
        },
        
        onNewPosts(newposts){
            this.posts = newposts;
            console.log(this.posts);
        },
        
        searchLike(){
            var requestOptions = {
            method: 'POST',
            redirect: 'follow'
            };

            fetch(this.$path + "api/sposts?searcharea="+this.searcharea, requestOptions)
            .then(response => response.json())
            .then(result => { 
                this.posts=result;
                console.log(result);})
            .catch(error => console.log('error', error));
        }

        

        
    },
    
    mounted(){
        this.getPosts();
    },
    
    
    
    
}

</script>
