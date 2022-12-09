<template>

<div class="grid grid-cols-1 md:grid-cols-3 w-auto">
<div class="flex flex-1 marker:max-h-screen">

<!-- AFFICHAGE DU POST -->

<div class=" max-h-full text-white p-5 m-4 px-14 bg-transparent rounded-md border-2 shadow backdrop-blur-md">

        <div class="p-4 top-0 ">
            <div class="flex justify-between">
                <p class="text-xs font-bold">{{this.category}}</p>
                <div>
                <a :href=checkurl><h1 class="text-xs text-gray-300">{{this.domainName}}</h1></a>
                <img :src="('https://www.google.com/s2/favicons?domain=' + this.favicon)" class="w-6 h-6 float-right" alt="domain favicon">
            </div>
        </div>
            <p class="text-xl font-bold">{{this.title}}</p>
                <div class="content-start mt-5 flex-initial overflow-auto">
                    <div v-if="(frameUrl.length>0)" class="justify-items-center min-w-96 min-h-96">
                        <iframe class="border border-white rounded-lg min-w-96 min-h-96" :src=frameUrl></iframe>
                    </div>
                    <div v-else-if="(twitter.length>0)" v-html="twitter" class="justify-items-center">             
                    </div>
                    <div v-else-if="(tiktok.length>0)" v-html="tiktok" class="justify-items-center">             
                    </div>
                    <div v-else-if="(videoUrl.length>0)" class="justify-items-center ">
                        <video :src=videoUrl class="border border-white justify-items-center rounded-lg h-full w-full"></video>
                    </div>
                    <div v-else-if="(objectUrl.length>0)" class="justify-items-center">
                        <object :data=objectUrl class="border border-white justify-items-center rounded-lg h-[35rem] min-w-[25rem]"></object>
                    </div>
                    <div v-else>
                        <a :href=siteUrl class="text-blue-600 underline ">{{this.siteUrl}}</a>
                    </div>
                </div>

                    <div class="flex items-center mb-4">
                        <div v-for="n in stars_yellow">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        <div v-for="n in stars_blank">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">{{this.note}}</p>
                        <button v-if="(this.authId > 0)" @click="showNote()" class="bg-gray-500 h-6 hover:bg-red-700 text-white mx-2 text-xs py-1 px-2 rounded-lg">
                            Noter
                        </button>
                    </div>
                    <div v-if="this.open" class="inline-flex">

    <div class="ml-8">
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
    <button @click="storeStars(this.post_id, this.stars)" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 h-10 mt-20 rounded-full ">
        Valider
    </button>
                    </div>

            <div v-if="!this.open" class="border border-white mb-5 rounded-lg bg-white bg-opacity-80 text-gray-800 text-sm">
                <div :id=this.title>
                <p class="p-1">{{this.firstcomment}} </p>
                </div>
                <div class="inline-flex" v-if="(this.edit == this.title)" >
                    <input class="text-sm text-gray-800 w-full whitespace-normal inline-flex border-hidden outline-none text-left bg-transparent" v-model="this.newComment"/>
                    <div class="inline-flex ml-auto ">
                        <button v-on:click="updateComment(this.newComment, this.firstcommentId, this.firstUser)"><img class="inline-flex mx-3 h-5" src="../images/accept.png" alt="save new comment"></button>
                    </div>
                </div>
            </div>
            <div v-if="!this.open" class="inline-flex">
                <div v-if="this.authId == this.firstUser || this.admin == 1">
                <button @click="editComment(this.title, this.firstcomment)" class="mx-2 bg-gray-200 rounded-full p-2">
                    <img src="../images/edit.png" alt="edit" class="h-3 w-3">
                </button>
                <button @click="deletePost(this.post_id)" class="mx-2 bg-gray-200 rounded-full p-2">
                    <img src="../images/bin.png" alt="delete" class="h-3 w-3">
                </button></div>
                <p class="text-sm text-gray-400">par {{this.user}} le {{this.date}}</p>
            </div>
            <div v-if="!this.open" class="justify-between">
                
            <div class="flex justify-end">
                <button v-if="(this.authId > 0)" @click="createLikeInitial(this.firstcommentId)" class="mx-2">
                    <img src="../images/like.png" alt="like" class="h-5 w-5">
                </button>
                <p class="w-12 rounded-lg bg-gray-100 text-green-800 text-center">
                    + {{likemin(this.likecount)}}
                </p>
                <button  v-if="(this.authId > 0)" class="bg-red-500 h-6 hover:bg-red-700 text-white mx-2 text-xs py-1 px-2 rounded">
                Signaler
            </button>
            </div>
        </div>
        </div>
    </div>
</div>


<!-- LISTE DES COMMENTAIRES -->
<div class="col-span-2 overflow-y-scroll h-screen">
<div class="">
<div class="">
    <div class="text-white p-2 m-4 backdrop-blur-xl w-[92%] h-auto rounded-md border-2 shadow inline-flex ">
        <div class="p-4 top-0 inline-flex ">
            <div class="border border-white min-w-full rounded-lg bg-white text-gray-800 text-sm">

                <div class="inline-flex" >
                    <input type="text" placeholder="entrez un nouveau commentaire" class="text-sm text-gray-800 whitespace-normal inline-flex border-hidden outline-none text-left bg-transparent" v-model="this.newComment"/>
                    <div class="inline-flex ml-auto ">
                        <button v-on:click="createComment(this.post_id, this.newComment)"><img class="inline-flex mx-3 h-5" src="../images/accept.png" alt="save new comment"></button>
                    </div>
                </div>
            </div>        
        </div>
    </div>

<div v-for="(comment, index) in comments" :key="comment.id" class="text-white p-2 m-4 px-14 backdrop-blur-xl w-full h-auto rounded-md border-2 shadow inline-flex ">
        <div class="p-4 top-0 inline-flex ">
            <div class="border border-white rounded-lg bg-white bg-opacity-80 max-w-[65%] text-gray-800 text-sm">
                <div :id="comment.id">
                <p  class="p-1 whitespace-pre-wrap">{{comment.content}} </p>
                </div>
                <div class="inline-flex" v-if="this.edit == comment.id" >
                    <input class="text-sm text-gray-800 w-full whitespace-normal inline-flex border-hidden outline-none text-left bg-transparent" v-model="this.newComment"/>
                    <div class="inline-flex ml-auto ">
                        <button v-on:click="updateComment(this.newComment, comment.id, comment.user_id)"><img class="inline-flex mx-3 h-5" src="../images/accept.png" alt="save new comment"></button>
                    </div>
                </div>
            </div>
            <div v-if="this.authId == comment.user_id || this.admin == 1" class="flex flex-col min-w-12">
                <button @click="editComment(comment.id, comment.content)" class="mx-2 mb-3 bg-gray-200 rounded-full p-2">
                    <img src="../images/edit.png" alt="edit" class="h-4 w-4">
                </button>
                <button @click="deleteComment(comment.id)" class="mx-2 bg-gray-200 rounded-full p-2">
                    <img src="../images/bin.png" alt="delete" class="h-4 w-4">
                </button>
            </div>
            <div class="justify-between">
                <p :id="comment.created_at" class="text-sm text-gray-200 font-bold mx-2 my-2"> {{getComment(comment.id, comment.created_at)}}</p>
                <p class="text-sm text-gray-200 mx-2 my-2">le {{formatDate(comment.created_at)}}</p>
            </div>
            <div class="">
                <p class="w-12  rounded-lg bg-gray-100 h-6 my-2 text-green-600 text-center">
                    + {{likemin(comment.likes_count)}}
                </p>
                <button v-if="(this.authId > 0)" @click="createLike(comment.id, index )" class="mx-2">
                    <img src="../images/like.png" alt="like" class="h-5 w-5">
                </button>
            </div>
            <button v-if="(this.authId > 0)" class="bg-red-500 h-6 hover:bg-red-700 text-white mx-2 my-2 text-xs py-1 px-2 rounded">
                Signaler
            </button>
        
        </div>
    </div>
</div>
</div>
</div></div>
</template>

<script>

export default {
    data() {
        return {
            post_id: this.$route.params.id,
            post:'',
            domainName : '',
            title:'',
            titleUrl:'titre',
            frameUrl:'',
            linkUrl:'',
            videoUrl:'',
            objectUrl:'',
            siteUrl:'',
            checkurl:'',
            twitter: '',
            tiktok:'',
            favicon:'',
            firstcomment:'',
            firstUser:'',
            firstUserId:'',
            likecount:0,
            date:'',
            user:'',
            comments:'',
            category:'',
            contenu:'',
            auth:'',
            authId:'',
            admin:'',
            newComment:'',
            edit:'',
            comment_user:'',
            open: false,
            stars:0,
            stars_yellow:0,
            stars_blank: 5,
            note:'',
        }
    },

    methods: {

        showNote(){
            this.open = !this.open;
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
            .then(result => {console.log(result); if (result[0] ==1) {this.$swal("Vous avez déjà noté ce post");}
            else{this.$swal("Vous avez noté ce post")}})
            .then(result => {location.reload();})
            .catch(error => console.log('error', error));

            },
 

        parseUrl(checkurl){
            var url = new URL(checkurl);

            if (url.hostname.includes("youtube.com") && url.pathname.includes("watch")) {
                url= url.href.replace("watch?v=", "embed/");
                var urlParts = url.split("&");
            this.frameUrl = urlParts[0];
            } else if (url.hostname.includes("twitter.com")) {
                var urlParts = url.href.split("?");
                var tweet = urlParts[0];
                this.twitter = '<blockquote class="twitter-tweet text-xs" width="350" height="300" align="center" hide_thread="true" hide_media="true"><a href="' + tweet + '"></a></blockquote>';
               
            } else if (url.hostname.includes("tiktok.com")) {
                var urlParts = url.href.split("?");
                var tik = urlParts[0];
                var video = tik.split("video/");
                var video = video[1];
                this.tiktok= '<blockquote class="tiktok-embed contain-fit" cite="' + tik + '" data-video-id="' + video + '" style="max-width: 605px;min-width: 225px;" align="center" ><a href="' + tik + '?refer=embed"></a></blockquote>';
             
            } else if (url.pathname.endsWith(".mp4") || url.pathname.endsWith(".webm")) {
                this.videoUrl = url.href;
            } else if (url.pathname.endsWith(".pdf") || url.pathname.endsWith(".gif")) {
                this.objectUrl = url.href;
            } else if (url.pathname.endsWith(".jpg") || url.pathname.endsWith(".png") || url.pathname.endsWith(".jpeg")) {
                this.frameUrl = url.href;
            } else {
            // The URL is a website
                this.siteUrl = url.href;
            }
            
        },

        extractDomain(checkurl){
            var url = new URL(checkurl);
            this.favicon = url.hostname;
            this.domainName = url.hostname;
        },

        getPost(id){

            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path+"api/getpost?post_id=" + id, requestOptions)
                .then(response => response.text())
                .then(result => { let contenu = JSON.parse(result);
                    this.checkurl = contenu.url;
                    this.date = this.formatDate(contenu.created_at);
                    this.user = contenu.user.name;
                    this.extractDomain(contenu.url);
                    this.parseUrl(contenu.url);
                    this.title = contenu.title;
                    if (contenu.stars > 0){this.stars = contenu.stars;}else{this.stars = 0};
                    
                    this.stars_yellow = Math.round(this.stars);
                    this.stars_blank = 5 - this.stars_yellow;
                    console.log("le nombre d'étoiles jaune est " + this.stars_yellow + "le nombre d'étoiles blanche est " + this.stars_blank);
                    
                    if (contenu.stars > 0){this.note = contenu.stars + " out of 5";}else{this.note="pas encore de note"};
                    this.category = contenu.category_name;})
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
                .then(result => {
                    this.comments = result;
                    let contenu = JSON.stringify(Object.values(result).shift());
                    contenu = JSON.parse(contenu);
                    this.date = this.formatDate(contenu.created_at);
                    this.firstcomment = contenu.content;
                    this.firstcommentId = contenu.id;
                    this.firstUser = contenu.user_id;
                    this.comments = JSON.stringify(Object.values(result).slice(1));
                    this.comments = JSON.parse(this.comments);
                })
                .catch(error => console.log('error', error));
            },

            formatDate(date){
            var date = new Date(date);
            let day = date.getDate();
            let month = date.getMonth();
            let year = date.getFullYear();
            let myDate = `${day}-${month}-${year}`;
            return myDate;
             },

        createLike(comment_id, index){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/createlike?comment_id="+comment_id, requestOptions)
            .then(response => response.json())
            .then(result => {console.log(result); 
                if(result[0]== 1){
                this.comments[index].likes_count -=1;
                this.deleteLike(comment_id);
            }
            else{
                this.comments[index].likes_count +=1;
            }
            })
            .catch(error => console.log('error', error));

            return this.contenu;
                    },
        createLikeInitial(comment_id){
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/createlike?comment_id="+comment_id, requestOptions)
            .then(response => response.json())
            .then(result => {console.log(result); 
                if(result[0]== 1){
                this.likecount -=1;
                this.deleteLike(comment_id);
            }
            else{
                this.likecount +=1;
            }
            })
            .catch(error => console.log('error', error));

            return this.contenu;
        },

        deleteLike(id){

            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'DELETE',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path + "api/deletelike?comment_id="+ id, requestOptions)
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

                    },

        getuser(){
            var myHeaders = new Headers();
                myHeaders.append("Accept", "application/json");

                var requestOptions = {
                method: 'GET',
                headers: myHeaders,
                redirect: 'follow'
                };

                fetch(this.$path + "api/whoami", requestOptions)
                .then(response => response.json())
                .then(result => {
                this.authId = result.id; 
                this.admin = result.admin;})
                .catch(error => console.log('error', error));
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
                if(result[0]==0){
                    console.log(result.error);
                }

                else if(result.message=="Unauthenticated."){
                    this.$swal("Pour effacer un commentaire il faut être identifié!").then(result=>{
                    window.location.href = this.$path + "login";
                })

                }
                else{
                    this.$swal("Votre commenatire a bien été effacé!").then(result => {location.reload();})
                }

            
            })
            .catch(error => console.log('error', error));
            let bye = document.getElementById(comment_id).remove();
        },
        
        editComment(id, content){
            console.log("je suis dans la fonction editComment");

            if (this.edit == id) {this.edit = ''; $('#' + id).show();}
            else{
            this.newComment = content;
            this.edit = id;
            $('#' + id).hide();
            }
        },

        updateComment(content, id, user_id){
            console.log("je suis dans l'updateComment");
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

                fetch(this.$path + "api/updatecomment/?id="+id+"&content=" + content + "&post_id="+ this.post_id +"&user_id="+ user_id, requestOptions)
                .then(response => response.json())
                .then(result => {
                    
                    console.log(result);
                   
                    if(result[0]==1){
                      
                        console.log('Comment with id: '+ result[1].id +' was updated.');
                        this.$swal("Votre commenatire a bien été modifié!")
                        .then(result => {location.reload();})
                        
                        
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
        getComment(comment_id, div_id){
            var myusername;
            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            // const response = await fetch(this.$path + "api/getcomment?id="+ comment_id, requestOptions);
            // user = await response.json();
            // myusername = await user.user_name;
            // console.log(myusername);

            fetch(this.$path + "api/getcomment?id="+comment_id, requestOptions)
            .then(response => response.json())
            .then(result => {myusername = result.user_name; 
                let cible = document.getElementById(div_id);
                cible.innerHTML=myusername;})
            .catch(error => console.log('error', error));
            
            return myusername;
        },

        deletePost(post_id){


            let go = confirm("Etes-vous sûr de vouloir supprimer ce post ? Les commentaires associés seront supprimés eux aussi.");
            if(go) {    console.log("on va effacer");
                            var myHeaders = new Headers();
                            myHeaders.append("Accept", "application/json");

                            var requestOptions = {
                            method: 'DELETE',
                            headers: myHeaders,
                            redirect: 'follow'
                            };

                            fetch(this.$path + "api/deletepost/?id=" + post_id, requestOptions)
                            .then(response => response.json())
                            .then(result => {
                                
                                console.log(result);
                                if (result==1){
                                    this.$swal('The post have been deleted!').then(result => window.location.href = this.$path);
                                    console.log(result);
                                }
                                else if (result.message=="Unauthenticated."){
                                    
                                    this.$swal("Bah tricheur il faut s'identifier pour effacer un Post!").then(result=>{
                                        window.location.href = this.$path + "login";

                                })

                                
                            }


                            })
                            .catch(error => console.log('error', error));
                                }
                else {
                    // L'utilisateur a cliqué sur Annuler, donc nous arrêtons le processus de suppression
                    // ...
                }
            

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
                    this.$swal("Identifie toi avant de créer un commentaire!").then(result=>{
                        window.location.href = this.$path + "login";
                
                })
                }
                else if(result.code==0){
                    this.$swal("Le post n'existe pas!")
                }
                else{
                    
                    this.$swal("Merci pour votre commentaire!").then(result => {location.reload();});
                }    
            })
            .catch(error => console.log('error', error));
        },
            likemin(number){
                if (number > 0) {return number;}
                else {return 0;}
            }
        },


   beforeMount() {
    this.getPost(this.post_id);
    this.getComments(this.post_id);
    this.getuser();
   },

}
</script>
