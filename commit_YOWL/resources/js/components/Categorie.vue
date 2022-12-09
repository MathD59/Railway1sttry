<template lang="">

<div class="inline-flex" v-for="categorie in categories"> 

<button type="button" class="text-slate-200 border-2 bg-gradient-to-r from-downy to-san-juan hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 hover:text-san-juan focus:ring-4 focus:outline-none focus:ring-cardinal dark:focus:ring-teal-700 font-semibold rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">{{categorie}}</button>
</div>

</template>


<script>
export default {
  data() {
    return {
      categories:['Arts','Education & Formation','Humour','Réseaux Sociaux', 'Services','Vacances & Loisirs','Transport'],
    }
  },
  methods : {

    //---------------------------------------------
    //---------- AFFICHER LES CATEGORIES  ---------
    //---------------------------------------------
    getAllCategories(){
      var requestOptions = {
        method: 'GET',
        redirect: 'follow'
      };
    fetch("http://127.0.0.1:8000/"+this.categories, requestOptions)
      .then(response => response.json())
      .then(result => {console.log(result),this.categories = result})
      .catch(error => console.log('error', error));
      console.log("résulat de toutes les catégories : "+this.categories);
    },
 
    },

    beforeMount(){
    this.getAllCategories();
    },

}   
</script>
