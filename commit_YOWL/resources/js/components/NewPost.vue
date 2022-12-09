<template>

<div class="grid  place-items-center">

  <form  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-[375px]">
 <!-- ------------------ title ------------------ -->
 <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Titre
      </label>
      <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" v-model="title" placeholder="Entrez un titre">
    </div>


  <!-- ------------------ URL ------------------ -->
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="url">
        URL
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="url" type="text" v-model="url" placeholder="copy URL">
  
    </div>

    <!-- ------------------ CATEGORIES ------------------ -->
    <div class="menu categories mt-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
              Catégorie
            </label>
            <div class="bg-downy rounded">
                <details class = "group py-2 px-2 text-left font-bold mt-3">
                    <summary
                        class = "flex cursor-pointer px-2 py-2 text-black hover:bg-white hover:text-san-juan"
                        >
                        <span class = "text-sm font-medium">Choisissez une Catégorie</span>
                        
                        <span
                            class = "ml-auto shrink-0 transition duration-300 group-open:-rotate-180"
                            >
                            <svg
                                xmlns   = "http://www.w3.org/2000/svg"
                                class   = "h-5 w-5"
                                viewBox = "0 0 20 20"
                                fill    = "currentColor"
                                >
                                <path   
                                fill-rule = "evenodd"
                                d         = "M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule = "evenodd"
                                />
                            </svg>
                        </span>
                    </summary>

                <div class="flex items-center pl-3" v-for="(item, index) in items" :key="index">
                  <label  class="py-2 ml-2 w-full text-sm md:text-base font-medium text-eagle-green">
                  <input type="radio"  :value="item.value" v-model="checkedValues" class="w-4 h-4 text-san-juan border-gray-400 rounded focus:ring-2 focus:ring-[#ef233c] dark:focus:cardinal"/>
                 {{ item.label }}
                  </label>
                </div>
              
<!-- title:{{title}}
url: {{url}}
box: {{checkedValues}}
commentaire: {{content}}
tag: {{tags}}
stars: {{stars}} -->

                </details>
            </div>
       
    </div>

    <!-- ------------------ COMMENTAIRES ------------------ -->
    <div class="mb-4 mt-6">
      <label class="flex text-gray-700 text-sm font-bold mb-2" for="comment">
        Commentaire
      </label>
      <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="comment" v-model="content" placeholder="leave your comment"></textarea>    
    
    </div> 

    <!-- ------------------ ETOILES ------------------ -->
    <label class="block text-gray-700 text-sm font-bold mb-4" for="category">
              Notez
    </label>
   
    <div class=" -mt-4">
      <ul class="">
    <li>
      <label for="5">
        <input checked type="radio" id="5" name="stars" class="" value="5" v-model="stars" >
        <i class="bi bi-star-fill text-yellow-400 ml-2"></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
      </label>
    </li>
    
    <li>
      <input type="radio" id="4" name="stars" value="4" v-model="stars">
      <label for="4" class="ml-2" >
        <i class="bi bi-star-fill text-yellow-400 "></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
     </label>
    </li>
    <li>
      <input type="radio" id="3" name="stars" value="3" v-model="stars">
      <label for="3" class="ml-2">
        <i class="bi bi-star-fill text-yellow-400 "></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
      </label>
    </li>
    <li>
      <input type="radio" id="2" name="stars" value="2" v-model="stars" class="" >
      <label for="2" class="ml-2">
        <i class="bi bi-star-fill text-yellow-400 "></i>
        <i class="bi bi-star-fill text-yellow-400 ml-1"></i>
      </label>
    </li>
    <li class="mb-2">
      <input type="radio" id="1"  name="stars" value="1" v-model="stars">
      <label for="1" class="ml-2">
        <i class="bi bi-star-fill text-yellow-400 "></i>
      </label>
    </li>
  
  </ul>
   </div>



    <!-- ------------------ TAGS ------------------ -->
    <div class="mb-6 mt-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">
        Tags
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tags" type="text" v-model="tags" placeholder="tags">
    
    </div>
   
    <!-- ------------------ VALIDER / CLOSE ------------------ -->
    <div class="flex items-center justify-between">
      <button  @click= "createPost()" class="bg-downy hover:bg-san-juan border-4 hover:border-cardinal hover:text-slate-200 text-eagle-green font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        VALIDER
      </button>
      <router-link to="/">
      <button class="inline-block align-baseline font-bold text-sm text-cardinal hover:text-eagle-green" @click="$emit('close')">
        CLOSE
      </button>
    </router-link>
    </div>

  </form>

</div>


</template>




<script>

export default {

  props: 
      {
      showNewPostModal:Boolean,
      myUserId:Number,
      },
  
  data() {
  return {
      url: "",
      content: "",
      tags: "",
      category:'',
      checkedNames: [],
      model: this.value,
      items: [],
      checkedValues: [],
      image_icon: 'imageicon',
      title:'',
      stars_count:parseInt(this.stars),
      post_id:'',
      tag_id:'',
      toogle:false,
      stars:5,

    
  }
  },
  


  methods: {
  

    createPost(){

      if(this.title==''){
        this.$swal("Merci de choisir un titre pour votre commentaire!")
        }  
      else if(this.url==''){
        this.$swal("Merci de choisir un Url pour votre commentaire!")
                  }
      else if(this.checkedValues==''){
        this.$swal("Merci de choisir une catégorie pour votre commentaire!")
                  }
      else if(this.content==''){
        this.$swal("Merci bien d'écrire votre commentaire!")
                  }             
      else if(this.tags==''){
        this.$swal("Merci d'ajouter un tag pour votre commentaire!")
                  }
      else{
      this.getTagByName();
    }

    },
      
    createPostEnd(){
          
            this.stars_count=this.stars;
           
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/createpost?title="+this.title+"&category_id="+this.checkedValues+"&url="+this.url+"&image_icon="+this.image_icon+"&stars_count="+this.stars_count, requestOptions)
            .then(response => response.json())
            .then(result =>{ 
                console.log(result);
                if (result.message=="Unauthenticated."){
                    
                    this.$swal("Super initiative.Pour créer un commit il faut s'identifier!").then(result=>{
                    window.location.href = this.$path + "login";
                
                })
                
            }
            else if(result[0]==1){
              // alert('This post exist');
             let post_id=result[1].id;
              this.$swal("Oups ce url existe déja!").then(result=>{
                window.location.href = this.$path+'post/'+post_id;   //REDIRECTION VERS LE POST POUR POUVOIR LE COMMENTER Changer la direction
                })
              
            }
                else{
                this.post_id=result[1].id;
                console.log('id:'+this.post_id);
                this.storeStars(this.post_id,this.stars_count)
                this.createPostTag();
            }
            })
            .catch(error => {
              this.$swal("Oups ce url existe déja!").then(result=>{
                window.location.href = this.$path;   //REDIRECTION VERS LE POST POUR POUVOIR LE COMMENTER Changer la direction
                })

                // this.$swal('login in to your account').then(result=>{
                //     window.location.href = this.$path + "login";
                //     console.log('error in fectch createpost:'+error);   
                // })     
            });
        },

        getcategories(){
          var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
              method: 'GET',
              headers: myHeaders,
              redirect: 'follow'
            };
            
            fetch(this.$path + "api/categories", requestOptions)
              .then(response => response.json())
              .then(result => {
                for (const key in result) {
                  const obj = new Object();
                  obj.label =result[key].name ;
                  obj.value = result[key].id;
                  this.items.push(obj);
               }
  
              })
              .catch(error => console.log('error', error));

        },

       getTagByName(){
 
          var requestOptions = {
            method: 'GET',
         
            redirect: 'follow'
          };

          fetch(this.$path + "api/gettagbyname?name="+this.tags, requestOptions)
            .then(response => response.json())
            .then(result => {
              console.log(result);
              if (result==0){
                // methode creation du tag et recuperer le id du tag créé.
                 this.createTag();
              }else{
                console.log('tag trouvé');
                this.tag_id=result[0].id;
                console.log(this.tag_id);
              }
              
            })
            .catch(error => console.log('error', error));
        },

        createTag(){
          var myHeaders = new Headers();
          myHeaders.append("Accept", "application/json");

          var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
          };

          fetch(this.$path + "api/createtag?name="+this.tags, requestOptions)
            .then(response => response.json())
            .then(result => {  

              this.tag_id=result.id;
              console.log('id:'+this.tag_id);
  
            }).then(result=>{
              // finalisation de la création du post
              this.createPostEnd();})

            .catch(error => console.log('error', error));
        },

        createPostTag(){

          var myHeaders = new Headers();
          myHeaders.append("Accept", "application/json");

          var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
          };

          fetch(this.$path + "api/createposttag?post_id="+this.post_id+"&tag_id="+this.tag_id, requestOptions)
            .then(response => response.text())
            .then(result => {  
              console.log(result);
              this.$swal("Super, votre commentaire est en ligne!").then(result=>{
                          window.location.href = this.$path;})

            })
            .catch(error => console.log('error', error));
        },

      storeStars(post_id,stars){
        
        var myHeaders = new Headers();
        myHeaders.append("Accept", "application/json");
        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        redirect: 'follow'
        };

        fetch(this.$path + "api/storestars?post_id="+post_id+"&stars="+ stars, requestOptions)
        .then(response => response.json())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));

      },
  








  // Accolade fermeture de methods
  },
  created(){

  this.getcategories();
  },

  // Accolade fermeture de export default
}

</script>
<style>
select {
  /* Style the select input */
  padding: 0.5em 1em;
  border: 1px solid #ccc;
  border-radius: 4px;
  cursor: pointer;
}

select option {
  /* Style the options */
  padding: 0.5em 1em;
  cursor: pointer;

  /* Set the icon as the background image of the option */
  background-image: url('https://example.com/icon1.png');
  background-position: center center;
  background-size: contain;
}

/* Style the selected option */
select option:checked {
  background-color: #ddd;
}
</style>