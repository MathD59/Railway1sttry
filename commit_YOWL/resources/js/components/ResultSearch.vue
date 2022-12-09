<template>

<!-- AFFICHAGE DU MOT "RESULT" POUR VERSION MOBILE -->
<div class = "flex cursor-pointer rounded-lg py-2 text-gray-400 hover:bg-blue-100 hover:text-gray-500 lg:hidden">
<span class = "text-lg font-semibold text-slate-100 mt-5 md:hidden">RESULT...</span>
</div>


<!-- SCRIPT POUR VERSIONS DESKTOP & MOBILE -->
<div class="relative w-full min-h-44 border-4 border-downy shadow-lg rounded-lg mt-6 bg-black/60">
    <div class="p-1">
            <div class="flex justify-between">
                <a href=""><h1 class=" text-white font-bold">{{this.title}}</h1></a>
                <div >
                    <p class="text-xs text-white font-bold">{{this.category}}</p>
                    <img :src="('https://www.google.com/s2/favicons?domain=' + this.favicon)" class="w-6 h-6 mt-2" alt="domain favicon">
                </div>
        </div>
            <div>
                <p class="text-xs text-gray-400">par {{this.user}} le {{this.date}}</p>
            </div>
                <div class="content-start my-2 w-full">
                        <a :href=siteUrl class="text-blue-600 underline ">{{this.siteUrl}}</a>
                </div>
            <div class="border border-white mb-1 w-auto mr-auto rounded-lg bg-white bg-opacity-80 text-gray-800 text-sm">
                <p class="p-1">{{this.firstcomment}} </p>
            </div>
            <div class="flex justify-end ">
                <div v-for="n in stars_yellow">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
                        <div v-for="n in stars_blank">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>
            </div>
            <div class="flex justify-between">
            <button v-on:click="seepost" class="border-[#673281] border p-1 rounded-md text-white bg-[#4c4150] hover:opacity-80 transition w-1/4 text-center">
                see more              
            </button>
            <p class="bg-gray-100 p-3 ml-auto text-xs text-gray-800 rounded-md border border-gray-800"> {{this.numberComments}} comments</p>
        </div>
    </div>
    </div>
</template>

<script>
export default{


    props:['post_id'],
    data() {
        return {
            date:'',
            title:'',
            post:'',
            domainName : '',      
            linkUrl:'',          
            siteUrl:'#',
            checkurl:'',
            favicon:'',
            user:'',
            likecount:'',
            firstcomment:'',
            category:'',
            stars:0,
            stars_yellow:0,
            stars_blank: 5,
            numberComments:0,

        }
    },
    methods: {
        createUrl(url){
            var url = new URL(url);
                this.siteUrl = url.href;
            },

        extractDomain(url){
            var url = new URL(url);
            this.favicon = url.hostname;
            var urlParts = url.hostname.split(".");
            this.domainName = urlParts[1];
        },

        mydate(date){
            this.date = date;
        },

        getPost(myid){

            var myHeaders = new Headers();
            myHeaders.append("Accept", "application/json");

            var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
            };

            fetch(this.$path+"api/getpost?post_id=" + myid, requestOptions)
                .then(response => response.text())
                .then(result => { let contenu = JSON.parse(result);
                    this.checkurl = contenu.url;
                    this.date = this.formatDate(contenu.updated_at);
                    this.extractDomain(contenu.url);
                    this.createUrl(contenu.url);
                    this.title = contenu.title;
                    this.user = contenu.user.name;
                    if (contenu.stars > 0){this.stars = contenu.stars;}else{this.stars = 0};                   
                    this.stars_yellow = Math.round(this.stars);
                    this.stars_blank = 5 - this.stars_yellow;
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
                    this.numberComments = (Object.keys(result).length);
                    let contenu = result;
                    this.firstcomment = contenu.content;
                    this.likecount = contenu.likes_count;
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
        
        seepost(){
            // this.$router.push({
            // name: 'post',
            // params: {
            //    id: this.post_id
            // }});
            window.location.href ='/post/' + this.post_id;
        }
    },
        

   beforeMount() {
    
    this.getPost(this.post_id);
    this.getComments(this.post_id);

   },
   updated() {
    this.getPost(this.post_id);
    this.getComments(this.post_id);
   },
}
</script>
