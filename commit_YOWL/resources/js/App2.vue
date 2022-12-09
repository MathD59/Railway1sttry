<script setup>

</script>

<template lang="">
    <div>
    
        <div>
            <button @click="routage('register')" class="bg-red-600 text-white p-1 ml-2 mb-2 rounded-sm">Register</button>
            <button @click="routage('login')" class="bg-lime-600 text-white p-1 ml-2 mb-2 rounded-sm">login</button>
            <button @click="createPost()" class="w-32 h-8 bg-bleu-600 hover:bg-500">Envoyer Post</button>
            <button @click="getPost(1)" class="w-32 h-8 bg-bleu-600 hover:bg-500">Get Post</button>
            <button @click="createComment(1,'commenatire du post id 3')" class="w-32 h-8 bg-bleu-600 hover:bg-500">Create Comment</button>
            <button @click="getComment(1)" class="w-32 h-8 bg-bleu-600 hover:bg-500">Get Comment</button>
            <button @click="storeStars(1,this.stars)" class="w-32 h-8 bg-bleu-600 hover:bg-500">Set Stars</button>
            <select v-on:change="updateSelectedOption">
            <option v-for="option in options" :value="option.value">
                {{ option.text }}
            </option>
            </select>
            <p>Stars: {{this.stars}}</p>
            <button @click="createLike(1)">Like</button>
            <br>
            <button @click="deleteLike(1)">Unset Like</button>
            <br>
            <br>
            <button @click=" createPostAlert(10)" class="bg-lime-600 text-white p-1 ml-2 mb-2">Create Post Alert</button>
            <br><br>
            <button @click="getAllAlertsPosts()" class="bg-red-600 text-white p-1 ml-2 mb-2">Get all Post alerts</button>
            <br><br>
            <button @click="getAlertPostById(1)" class="bg-purple-600 text-white p-1 ml-2 mb-2">Get alert Post By Id</button>
            <br><br> 
            <button @click="deletePostAlertById(1)" class="bg-sky-600 text-white p-1 ml-2 mb-2">Delete alert Post By Id</button>
            <br><br>
            <button class="bg-red-600 text-white p-1 ml-2 mb-2" @click=" getLastPosts()">Posts plus recents</button>
            <br><br>
            <button class="bg-red-600 text-white p-1 ml-2 mb-2" @click="getdataperdaykpi(date)">get data per day KPI</button>
            <br><br>
            <input type="date" v-model="date">
            <br>
            <p>{{this.date}}</p>
            <br>
            <button class="bg-slate-600 text-white p-1 ml-2 mb-2" @click="getdatakpi()">get data KPI</button>
            <br><br>
            <p>{{this.datakpi}}</p>
            
        
            <ul>
            <li class="bg-gray-100 border border-gray-300 " v-for="(item, index) in last_posts" >
                {{ index+1 }}: {{ item.title }} --> {{item.created_at}}
            </li>
            </ul>
            
            <br><br>
            <button class="bg-blue-600 text-white p-1 ml-2 mb-2" @click="getBestPosts()">Post les mieux notés</button>
            <br>
        
            <ul>
            <li class="bg-gray-100 border border-gray-300 " v-for="(item, index) in best_posts" >
                {{ index+1 }}: {{ item.title }} --> {{item.stars}} stars
            </li>
            </ul>
            
            <br><br>

            <button class="bg-lime-500 text-white p-1 ml-2 mb-2" @click="getMostPopularPosts()">post le + commentés</button>
            <br>
        
            <ul>
            <li class="bg-gray-100 border border-gray-300 " v-for="(item, index) in most_Popular_posts" >
                {{ index+1 }}: {{ item.title}} 
            </li>
            </ul>

            <ul>
           <br>
           <h3 class="bg-red-500 text-white font-medium">Post Alerts</h3>
            <li class="bg-gray-100 border border-gray-300 " v-for="(item, index) in posts_alerts" >
                {{ index+1 }}: Alert by {{ item.user_name}} in post {{item.post_id}}
            </li>
            </ul>
            
            <br><br>
            

            <!-- <button @click="createPost()" class="w-32 h-8 bg-bleu-600 hover:bg-500">Get stars</button>
            <button @click="createPost()" class="w-32 h-8 bg-bleu-600 hover:bg-500">Envoyer Post</button>
            <button @click="createPost()" class="w-32 h-8 bg-bleu-600 hover:bg-500">Envoyer Post</button>
            <button @click="createPost()" class="w-32 h-8 bg-bleu-600 hover:bg-500">Envoyer Post</button> -->
        </div>
        <br>
        <div>
            <button @click="updateComment(3,'troisième commentaire',15)">Comment</button>
        </div>
        
    </div>
</template>
<script>

export default {
    data(){
        return{
            id:'13',
            title: 'premier post',
            category_id:5,
            url:'https:www.google.fr',
            image_icon: 'imagen  icon',
            resultado:'',
            titulo:'',
            stars_count:5,
            stars: '',
            options: [
                        { value: 1, text: ' 1 star' },
                        { value: 2, text: ' 2 stars' },
                        { value: 3, text: ' 3 stars' },
                        { value: 4, text: ' 4 stars' },
                        { value: 5, text: ' 5 stars' },
                        ],
            last_comments:'',
            last_posts:'',
            best_posts:'',
            most_Popular_posts:'',
            register: this.$path+'register',
            posts_alerts:'',
            date:'',
            datakpi:'',
            
        }
    }
    ,
    methods:{
        routage(route){
          
            window.location.href = this.$path + route;
        },


        updateSelectedOption: function(event) {
            this.stars = event.target.value
            },

        getPosts(){
            var requestOptions = {
            method: 'GET',
            redirect: 'follow'
            };

            fetch(this.$path + "api/getposts", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if(result!=''){this.title=result[0].title}

            })
            .catch(error => {
                
                console.log('error in fectch getposts:'+error)
                window.location.href = this.$path;
            });

        },

        getPost(post_id){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path+"api/getpost?post_id="+post_id, requestOptions)
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

        },

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
                this.best_posts=result;
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
                this.most_Popular_posts=result;
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
                this.last_posts=result;
            })
            .catch(error => console.log('error', error));
        },

        createPost(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/createpost?title="+this.title+"&category_id="+this.category_id+"&url="+this.url+"&image_icon="+this.image_icon+"&stars_count="+this.stars_count, requestOptions)
            .then(response => response.json())
            .then(result =>{ 
                console.log(result);
                if (result.message=="Unauthenticated."){
                    
                    this.$swal("Super initiative.Pour créer un commit il faut s'identifier!").then(result=>{
                 window.location.href = this.$path + "login";
                
                })
                
            }
                else{
                this.resultado=result;
                this.titulo=result[1].title;
            }
            })
            .catch(error => {
             

                this.$swal('login in to your account').then(result=>{
                    window.location.href = this.$path + "login";
                    console.log('error in fectch createpost:'+error);   
                })     
            });
        },

        updatePost(){
            var myHeaders = new Headers(); 
            myHeaders.append("Accept", "application/json"); 
            var requestOptions = { 
            method: 'PUT', 
            headers: myHeaders, 
            redirect: 'follow' 
            }; 

            fetch(this.$path + "api/updatepost/?id="+this.id+"&title="+this.title+"&category_id="+this.category_id+"&url="+this.url+"&image_icon="+this.image_icon+"&action="+this.image_icon, requestOptions) 
            .then(response => response.json()) 
            .then(result => console.log(result)) 
            .catch(error => console.log('error', error)); 
        },
        
        deletePost(){

            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'DELETE',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/deletepost/?id=13", requestOptions)
            .then(response => response.json())
            .then(result => {
                
                console.log(result);
                if (result==1){
                    this.$swal('The post have been deleted!');
                    console.log(result);
                }
                else if (result.message=="Unauthenticated."){
                    
                    this.$swal("Bah tricheur il faut s'identifier pour effacer un Post!").then(result=>{
                        window.location.href = this.$path + "login";

                })
   
                
            }

            
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

        getComments(post_id){

            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/getcomments?id="+post_id, requestOptions)
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
        },

        getComment(comment_id){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/getcomment?id="+comment_id, requestOptions)
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

        },

        getLastComments(){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path +"api/getlastcomments", requestOptions)
            .then(response => response.json())
            .then(result => {

            console.log(result);
            this.last_comments=result;
        
            })
            .catch(error => console.log('error', error));
        },

        createComment(post_id,content){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/createcomment?content="+content+"&post_id="+post_id, requestOptions)
            .then(response => response.json())
            .then(result => {
        
                console.log(result)
                if (result.error=='comment already exist'){
                    
                    this.$swal("Le commentaire avec id: "+ result[1].id + " dans le post: "+result[1].post_id+" existe ");
                }
                else if(result.message=="Unauthenticated."){
                    this.$swal("Identifie toi avant de créer un commenatire!").then(result=>{
                        window.location.href = this.$path + "login";
                
                })
                }
                else if(result.code==0){
                    this.$swal("Le post n'existe pas!")
                }
                else{
                    
                    this.$swal("Merci pour votre commentaire!");
                }    
            })
            .catch(error => console.log('error', error));
        },

        updateComment(id,content,post_id){
            if (content==''){
                this.$swal("Ajouter un contenu à votre commentaire")
            }
            else{
            
                var myHeaders = new Headers();
                myHeaders.append("Accept", "application/json");

                var requestOptions = {
                method: 'PUT',
                headers: myHeaders,
                redirect: 'follow'
                };

                fetch(this.$path + "api/updatecomment/?id="+id+"&content=" + content + "&post_id="+ post_id +"&user_id=8", requestOptions)
                .then(response => response.json())
                .then(result => {
                    
                    console.log(result);
                   
                    if(result[0]==1){
                      
                        console.log('Comment with id: '+ result[1].id +' was updated.');
                        this.$swal("Votre commenatire a bien été modifié!");
                    }

                    else if(result.message=="Unauthenticated."){
                        this.$swal("Pour modifier un commenatire il faut être identifié!").then(result=>{
                        window.location.href = this.$path + "login";
                    })

                    }
                    else{
                          console.log(result);
                    }
                    
                    
                
                
                })
                .catch(error => console.log('error', error));
            }

        },

        deleteComment(comment_id){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'DELETE',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/deletecomment/?id="+comment_id, requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if(result[0]==0){
                    console.log(result.error);
                }

                else if(result.message=="Unauthenticated."){
                    this.$swal("Pour effacer un commenatire il faut être identifié!").then(result=>{
                    window.location.href = this.$path + "login";
                })

                }
                else{
                    this.$swal("Votre commenatire a bien été effacé!")  
                }

            
            })
            .catch(error => console.log('error', error));

        },

        createLike(comment_id){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/createlike?comment_id="+comment_id, requestOptions)
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
                    },

        deleteLike(comment_id){

            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'DELETE',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/deletelike?comment_id="+comment_id, requestOptions)
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

                    },

        createPostAlert(post_id){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/createpostalert?post_id="+post_id, requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                if(result[0]==0){
                    this.$swal("Merci pour votre alerte. Nos équipes vont la traiter dans les meilleurs delais!") 
                }
                else if(result[0]==1){
                    this.$swal("Votre alerte est en cours de traitement. Merci!") 
                }
            })
            .catch(error => console.log('error', error));
        
        },

        getAllAlertsPosts(){
            var myHeaders = new Headers();
            myHeaders.append("accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/getpostsalerts", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)
                this.posts_alerts=result;
            })
            .catch(error => console.log('error', error));

        },
        getAlertPostById(id){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/getpostalert?id="+id, requestOptions)
            .then(response => response.json())
            .then(result =>{
            console.log(result);

            } )
            .catch(error => console.log('error', error));
                    },

        deletePostAlertById(id){
            var requestOptions = {
            method: 'DELETE',
            redirect: 'follow'
            };

            fetch(this.$path + "api/deletepostalert?id="+id, requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)
                if(result==1){
                    this.$swal("L'alerte a bien été effacé"); 
                }
                else{
                    this.$swal("Impossible d'effacer l'alerte. Veuillez consulter la base de données"); 
                }
            })
            .catch(error => console.log('error', error));
        },

        getdataperdaykpi(date){
            var myHeaders = new Headers();
            myHeaders.append("accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path+"api/getdataperday?date="+date, requestOptions)
            .then(response => response.json())
            .then(result => {
                
                console.log(result);
                
            })
            .catch(error => console.log('error', error));
                    },

        getdatakpi (){
            var myHeaders = new Headers();
            myHeaders.append("accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path +"api/getdatakpi", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result);
                this.datakpi=result;
            })
            .catch(error => console.log('error', error));
        },



        },

    created(){
        // this.getposts();
    }
}
    

</script>
<style lang="">
    
</style>