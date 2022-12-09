<script setup>
import About from '../components/About.vue';
import SearchBar from '../components/SearchBar.vue';
import ButtonAddPost from '../components/ButtonAddPost.vue';
import Categorie from '../components/Categorie.vue';
import TitreCard from '../components/TitreCard.vue';
import MiniPost from '../components/MiniPost.vue';
</script>


<template>

<!-- CATEGORIES + ADD-POST + BARRE DE RECHERCHE -->
<div class="grid grid-cols-1 gap-4 md:grid-cols-4 px-4 ">
    <div class="col-span-4 py-11">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gabble-green p-1 text-white overflow-y-auto">
                <Categorie/>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 justify-center items-center">
                <div>
                    <!-- <ButtonAddPost/> -->
                    <ButtonAddPost id="show-modal" @click="toggleNewPostModal('1')"/>
                    <!-- <div>
                        <p class="text-white">users id : {{UserId}} </p>
                    </div> -->
                </div>

                <div class="mt-2 col-span-3 bg-gabble-green bg-gabble-green text-white">
                <SearchBar/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3 COLONNES AFFICHAGE DES POSTS + ABOUT -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 px-4">
    <div class="border-4 rounded-2xl border-bone">
        <TitreCard :titre="AvisRecents"/>
        <div v-for="post in lastPosts" class="text-white">
            
            <MiniPost :id=post.id />
        </div>
    </div>

    <div class="border-4 rounded-2xl border-downy">
        <TitreCard :titre="MieuxNotes"/>
        <div v-for="post in bestPosts" class="text-white">
            <MiniPost :id=post.id />
        </div>
    </div>

    <div class="border-4 rounded-2xl border-hoki">
        <TitreCard :titre="PlusCommentes"/>
        <div v-for="post in popularPosts" class="text-white">
            <MiniPost :id=post.id />
        </div>
    </div>

    <div class="bg-oracle rounded-2xl">
        <About/>
    </div>
</div>



</template>



<script>


export default {

    data() {
        return {
        AvisRecents:"Avis Récents",
        MieuxNotes:"Les mieux notés",
        PlusCommentes:"Les + commentés",
        UserId : "1",
        bestPosts:'',
        popularPosts:'',
        lastPosts:'',
        }
    },

    methods : {
        getBestPosts(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/getbestpost", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)
                this.bestPosts=result;
            })
            .catch(error => console.log('error', error));

        },

        getMostPopularPosts(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/mostpopularposts", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)
                this.popularPosts=result;
            })
            .catch(error => console.log('error', error));            


        },

        getLastPosts(){

            var requestOptions = {
            method: 'GET',
            redirect: 'follow'
            };

            fetch(this.$path + "api/getlastposts", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                this.lastPosts=result;
            })
            .catch(error => console.log('error', error));
        },

    },
    beforeMount() {
        this.getBestPosts();
        this.getLastPosts();
        this.getMostPopularPosts();
    },
    components: { MiniPost }

    
}
</script>